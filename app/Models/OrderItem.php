<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "order_items";
    protected $fillable = ["id", "order_id", "dish_id", "company_id", "count", "price"];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
