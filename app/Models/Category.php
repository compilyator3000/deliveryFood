<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property int $cafe_id
 * @property string $title
 * @property-read Dish $cafe
 * @method static CategoryFactory factory(...$parameters)
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCafeId($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereTitle($value)
 * @mixin Eloquent
 */
class Category extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "categories";
    protected $fillable = ["company_id", "title"];


    public function dish()
    {
        return $this->hasMany(Dish::class);
    }


}
