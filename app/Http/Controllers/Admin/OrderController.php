<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'items.product'])
            ->latest()
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'items.product']);

        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => ['required', 'in:pending,paid,shipped,cancelled,done'],
        ]);

        $oldStatus = $order->status;
        $newStatus = $request->status;

        DB::transaction(function () use ($order, $oldStatus, $newStatus) {
            if ($oldStatus !== 'cancelled' && $newStatus === 'cancelled') {
                foreach ($order->items as $item) {
                    $item->product->increment('stock', $item->quantity);
                }
            }

            if ($oldStatus === 'cancelled' && $newStatus !== 'cancelled') {
                foreach ($order->items as $item) {
                    $item->product->decrement('stock', $item->quantity);
                }
            }

            $order->update([
                'status' => $newStatus,
            ]);
        });

        return redirect()->route('admin.orders.show', $order->id);
    }
}
