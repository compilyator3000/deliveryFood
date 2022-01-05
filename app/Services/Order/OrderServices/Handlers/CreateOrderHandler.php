<?php

namespace App\Services\Order\OrderServices\Handlers;

use App\Services\Order\OrderServices\Repositories\EloquentOrderRepository;
use App\Validators\CreateOrderValidator;

class CreateOrderHandler
{

    private $orderRepository;

    public function __construct(
        EloquentOrderRepository $orderRepository
    )
    {
        $this->orderRepository = $orderRepository;
    }

    public function handle(array $order)//: Order
    {
        $validator = new CreateOrderValidator();
        if (!$validator->validOrder($order)) {
            return false;
        }

        return $this->orderRepository->createFromArray($order);
    }


}
