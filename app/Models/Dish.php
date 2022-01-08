<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Dish extends Model
{
    public $timestamps = false;
    use HasFactory, Notifiable;

    protected $fillable = ["title", "weight", "price", "discount", "active", "description", "category_id", "company_id","id"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
