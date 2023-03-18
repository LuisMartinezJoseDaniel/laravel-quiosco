<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OrderResource::collection(Order::whereStatus(0)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->total = $request->total;
        $order->save();

        $id = $order->id;

        $productos = collect($request->productos)->map(function ($product) use ($id){
            return [
              'order_id' => $id,
              'product_id' => $product['id'],
              'cantidad' => $product['cantidad'],
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ];
        })->toArray();

        OrderProduct::insert($productos);



        return [
            'message' => 'Pedido realizado correctamente, estará listo en unos minutos'
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->status = 1;
        $order->save();

        return OrderResource::make($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
