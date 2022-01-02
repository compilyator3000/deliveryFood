<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property int $cafe_id
 * @property string $title
 * @property-read \App\Models\Cafe $cafe
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCafeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTitle($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table="categories";
protected $fillable=["cafe_id","title"];
//    public function cafe(){
//        return $this->hasMany(Food::class);
//    }

    public function food(){
        return $this->hasMany(Food::class);
    }



}
