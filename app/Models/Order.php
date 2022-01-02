<?php

namespace App\Models;


use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=["food_id","cafe_id","token_order",   "executed", "phone", "customer","count","deadline"];

    public function validation(Order  $order ){



    }

}
