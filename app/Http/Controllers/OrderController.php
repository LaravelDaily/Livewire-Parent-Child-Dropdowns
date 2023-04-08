<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('product', 'size')->latest()->get();
        
        return view('orders.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }
}
