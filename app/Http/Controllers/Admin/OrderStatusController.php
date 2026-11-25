<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; use App\Models\Order; use Illuminate\Http\Request;

class OrderStatusController extends Controller {
    public function update(Request $request, Order $order) {
        $validated = $request->validate(['status' => 'required|in:Antrean,Dicuci,Selesai']);
        $order->update($validated);
        return back()->with('success', 'Status pesanan diperbarui.');
    }
}
