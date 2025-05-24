<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'orderItems.product'])->get();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'shipping_address' => 'required|string',
            'billing_address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'notes' => 'nullable|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0'
        ]);

        $order = Order::create([
            'user_id' => $validated['user_id'],
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),
            'total_amount' => $validated['total_amount'],
            'payment_method' => $validated['payment_method'],
            'shipping_address' => $validated['shipping_address'],
            'billing_address' => $validated['billing_address'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
            'payment_status' => 'pending'
        ]);

        foreach ($validated['items'] as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['quantity'] * $item['price']
            ]);
        }

        return response()->json($order->load('orderItems.product'), 201);
    }

    public function show(Order $order)
    {
        return response()->json($order->load(['user', 'orderItems.product']));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'string|in:pending,processing,completed,cancelled',
            'payment_status' => 'string|in:pending,paid,failed',
            'notes' => 'nullable|string'
        ]);

        $order->update($validated);
        return response()->json($order->load(['user', 'orderItems.product']));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }

    public function userOrders($userId)
    {
        $orders = Order::where('user_id', $userId)
            ->with(['orderItems.product'])
            ->get();
        return response()->json($orders);
    }
} 