<?php

namespace App\Http\Controllers;
use App\Models\Order; use App\Models\Service;
use Illuminate\Http\Request; use Illuminate\Support\Facades\DB;

class OrderController extends Controller {
    public function index() {
        $services = Service::orderBy('category')->get()->groupBy('category');
        return view('customer.index', compact('services'));
    }

    public function store(Request $request) {
        $request->validate([
            'customer_name' => 'required|string|max:100',
            'whatsapp_number' => ['required', 'regex:/^08[0-9]{8,12}$/'],
            'service_id' => 'required|array',
            'quantity' => 'required|array',
        ]);
        $items = [];
        foreach ($request->service_id as $index => $serviceId) {
            $qty = (int) ($request->quantity[$index] ?? 0);
            if ($qty > 0) { $items[] = ['service_id' => $serviceId, 'quantity' => $qty]; }
        }
        $order = DB::transaction(function () use ($request, $items) {
            $order = Order::create(['customer_name' => $request->customer_name, 'whatsapp_number' => $request->whatsapp_number, 'total_price' => 0, 'status' => 'Antrean']);
            $totalPrice = 0;
            foreach ($items as $item) {
                $service = Service::findOrFail($item['service_id']);
                $subtotal = $service->price_per_unit * $item['quantity'];
                $totalPrice += $subtotal;
                $order->orderDetails()->create(['service_id' => $service->id, 'qty_or_weight' => $item['quantity'], 'subtotal' => $subtotal]);
            }
            $order->update(['total_price' => $totalPrice]);
            return $order;
        });
        return redirect()->route('home')->with('success', 'Pesanan berhasil! Total: Rp ' . number_format($order->total_price));
    }
}
