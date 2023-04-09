<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\View;

class VirtualSelectController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('product', 'size')->latest()->get();

        return view('virtualselect.index', compact('orders'));
    }
}
