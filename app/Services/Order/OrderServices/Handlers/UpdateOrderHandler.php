<?php


namespace App\Services\Order\OrderServices\Handlers;


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


    public function handle($idCompany, $token)//: Order
    {
        $order = (Order::query()->where("token_order", "=", $token)->get());
        $order = $order->where("company_id", "=", $idCompany);
        $order = Order::query()->findOrFail($order->toArray()[0]["id"]);

        if ($order->company_id == $idCompany) {

            return $this->orderRepository->updateFromArray($order);

        }
        return false;


    }

}
