<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["dish_id", "company_id", "token_order", "executed", "phone", "customer", "count", "deadline", "delivery_type", "result_sum"];

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

}
