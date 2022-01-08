<?php

namespace App\Http\Controllers;

use App\Events\OrderEvent;
use App\Models\Order;
use App\Services\Order\OrderInterfaces\OrderServiceInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderService;

    public function __construct(
        OrderServiceInterface $orderService
    )
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        return $this->orderService->getOrders($request->user()->id);
    }

    public function show(Request $request, $token)
    {
        $order= $this->orderService->findOrder($request->user()->id, $token);
        if($order==false)
            return response()->json("not found",404);
        return response()->json($order);

    }


    public function store(Request $request)
    {
        $created = $this->orderService->createOrder($request->json()->all());
        if ($created) {
            event(new OrderEvent("You have a new order"));
            return response()->json($created,201);
        }
        return $created;


    }

    public function destroy(Request $request, $token)//тарблы есть
    {
        return $this->orderService->destroyOrder($request->user()->id, $token);
    }


    public function update(Request $request, $token)
    {
        return $this->orderService->updateOrder($request->user()->id, $token);
    }
}
