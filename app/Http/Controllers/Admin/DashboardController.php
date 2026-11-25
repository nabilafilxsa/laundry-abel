<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; use App\Models\Order; use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index(Request $request) {
        $query = Order::with('orderDetails.service');

        // FITUR FILTER (Sesuai papan tulis)
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $orders = $query->latest()->get();
        return view('admin.dashboard', compact('orders'));
    }
}
