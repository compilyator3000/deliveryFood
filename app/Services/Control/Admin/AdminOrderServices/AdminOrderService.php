<?php


namespace App\Services\Control\Admin\AdminOrderServices;

use App\Services\Control\Admin\AdminOrderServices\OrderInterfaces\AdminOrderServiceInterface;
use App\Services\Control\Admin\AdminOrderServices\OrderServices\Handlers\CreateOrderHandler;
use App\Services\Control\Admin\AdminOrderServices\OrderServices\Handlers\DestroyOrderHandler;
use App\Services\Control\Admin\AdminOrderServices\OrderServices\Handlers\UpdateOrderHandler;
use App\Services\Control\Admin\AdminOrderServices\OrderServices\Repositories\EloquentOrderRepository;




class AdminOrderService implements AdminOrderServiceInterface
{
    private $updateOrderHandler;
    private $orderRepository;
    private $createOrderHandler;

    private $orderDestroyHandler;

    public function __construct(
        EloquentOrderRepository $repository,
        UpdateOrderHandler      $updateOrderHandler,
        DestroyOrderHandler     $orderDestroyHandler,
        CreateOrderHandler      $createOrderHandler

    )
    {
        $this->createOrderHandler = $createOrderHandler;
        $this->orderRepository = $repository;
        $this->updateOrderHandler = $updateOrderHandler;
        $this->orderDestroyHandler = $orderDestroyHandler;
    }


    public function createOrder(array $data = [])
    {
        return $this->createOrderHandler->handle($data);
    }

    public function updateOrder(int $token)
    {
        return $this->updateOrderHandler->handle($token);
    }

    public function findOrder(int $token)
    {
        return $this->orderRepository->find( $token);
    }

    public function destroyOrder( int $token): bool
    {
        return $this->orderDestroyHandler->handle( $token);
    }


    public function getOrders()
    {
        return $this->orderRepository->getOrders();
    }
}
