<?php


namespace App\Services\Control\Admin\AdminOrderServices\OrderServices\Handlers;


use App\Models\Order;
use App\Models\Company;
use App\Services\Order\OrderServices\Repositories\EloquentOrderRepository;

class UpdateOrderHandler
{

    private $orderRepository;

    public function __construct(
        EloquentOrderRepository $orderRepository
    )
    {
        $this->orderRepository = $orderRepository;
    }


    public function handle($token)
    {
        $order = (Order::query()->where("token_order", "=", $token)->get());
        $order = Order::query()->findOrFail($order->toArray()[0]["id"]);
        return $this->orderRepository->updateFromArray($order);


    }

}
