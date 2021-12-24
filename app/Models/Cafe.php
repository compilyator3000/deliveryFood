<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    protected $fillable=["name","location","status_of_working","town","description","password"];
    use HasFactory;
    public function categories(){
        return $this->hasMany(Category::class);

    }
}
