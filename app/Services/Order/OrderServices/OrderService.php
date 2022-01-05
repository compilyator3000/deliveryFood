<?php


namespace App\Services\Order\OrderServices;

use App\Services\Order\OrderInterfaces\OrderServiceInterface;
use App\Services\Order\OrderServices\Handlers\CreateOrderHandler;
//use App\Services\Order\OrderServices\Handlers\FindOrderHandler;
use App\Services\Order\OrderServices\Handlers\DestroyOrderHandler;
use App\Services\Order\OrderServices\Handlers\UpdateOrderHandler;
use App\Services\Order\OrderServices\Repositories\EloquentOrderRepository;

class OrderService implements OrderServiceInterface
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

    public function updateOrder(int $idCompany, int $token)
    {
        return $this->updateOrderHandler->handle($idCompany, $token);
    }

    public function findOrder(int $idCompany, int $token)
    {
        return $this->orderRepository->find($idCompany, $token);
    }

    public function destroyOrder(int $idCompany, int $token): bool
    {
        return $this->orderDestroyHandler->handle($idCompany, $token);
    }


    public function getOrders(int $idCompany)
    {
        return $this->orderRepository->getOrders($idCompany);
    }
}
