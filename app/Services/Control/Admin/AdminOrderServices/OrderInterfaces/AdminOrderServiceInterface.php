<?php

namespace App\Services\Control\Admin\AdminOrderServices\OrderInterfaces;

interface AdminOrderServiceInterface
{
    public function getOrders();

    public function createOrder(array $data = []);

    public function updateOrder( int $token);

    public function findOrder( int $token);

    public function destroyOrder(int $token);


}
