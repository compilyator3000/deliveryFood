<?php

namespace App\Models;

use App\Http\Requests\CategoryStoreRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * App\Models\Cafe
 *
 * @property int $id
 * @property string $location
 * @property string $name
 * @property int $status_of_working
 * @property string $town
 * @property string $description
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @method static \Database\Factories\CafeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Cafe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cafe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cafe query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cafe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cafe whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cafe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cafe whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cafe whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cafe wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cafe whereStatusOfWorking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cafe whereTown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cafe whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cafe extends Authenticatable implements JWTSubject
{
    protected $fillable=["email","location","status_of_working","town","description","password"];
    use HasFactory, Notifiable,SoftDeletes;
    public function food(){
        return $this->hasMany(Food::class);

    }
    public function categories(){
        return $this->hasMany(Category::class);

    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [

            "id"=>$this->id,

        ];
    }


    static public function  validCategory(Category $category,$id){
        if($category->cafe_id!=$id){
            return false;
        }
        return true;

    }
}
