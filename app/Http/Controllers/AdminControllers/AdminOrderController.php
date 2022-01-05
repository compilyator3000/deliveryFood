<?php

namespace App\Http\Controllers\AdminControllers;

use App\Events\OrderEvent;
use App\Http\Controllers\Controller;
use App\Models\Order;

use App\Services\Control\Admin\AdminOrderServices\OrderInterfaces\AdminOrderServiceInterface;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    private $orderService;

    public function __construct(
        AdminOrderServiceInterface $orderService
    )
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        return $this->orderService->getOrders();
    }

    public function show($token)
    {
        return $this->orderService->findOrder($token);

    }


    public function store(Request $request)
    {
        return $this->orderService->createOrder($request->json()->all());
    }

    public function destroy($token)//тарблы есть
    {
        return $this->orderService->destroyOrder($token);
    }


    public function update($token)
    {
        return $this->orderService->updateOrder($token);
    }
}
