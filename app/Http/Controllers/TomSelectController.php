<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\View;

class TomSelectController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('product', 'size')->latest()->get();

        return view('tomselect.index', compact('orders'));
    }
}
