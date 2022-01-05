<?php

namespace App\Services\Order\OrderInterfaces;

interface OrderServiceInterface
{
    public function getOrders(int $idCompany);

    public function createOrder(array $data = []);

    public function updateOrder(int $idCompany, int $token);

    public function findOrder(int $idCompany, int $token);

    public function destroyOrder(int $idCompany, int $token);


}
