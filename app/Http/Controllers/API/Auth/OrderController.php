<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {

        $request->validate([
            'motorcycles_count' => 'required',
            'total_amount' => 'required',
            'distribution_status' => 'required',
            'aggrement_status' => 'required',
            'receipt_number' => 'required',

        ]);
        $user = Auth::user();

        $order = Order::create([
            'user_id' =>  $user->id,
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'total_amount' => $request->input('total_amount') ?? 0.00,
            'motorcycles_count' => $request->input('motorcycles_count') ?? 0,
            'distribution_status' => $request->input('distribution_status') ?? 0,
            'aggrement_status' => $request->input('aggrement_status') ?? 0,
            'receipt_number' => $request->input('receipt_number') ?? 0,

        ]);

        return response()->json(['order' => $order]);
    }
}
