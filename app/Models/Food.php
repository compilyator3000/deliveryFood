<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Food extends Model
{
    public $timestamps=false;
    use HasFactory,Notifiable;
    protected $table="food";
    protected $fillable=["title","weight","price","discount","active","description","category_id","cafe_id"];
    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function  valid(){


    }
}
