<?php

namespace App\Http\Controllers\Administrator;
use App\Http\Controllers\Controller;
use App\Models\Order;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('administrator.order.index', [
            "orders" => $orders
        ]);
    }

    public function show(int $id = 0)
    {
        $order = Order::with(['order_item.product.category'])->findOrFail($id);

        return view('administrator.order.show', [
            "orders" => $order
        ]);
    }
}

