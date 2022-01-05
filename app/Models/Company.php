<?php

namespace App\Models;

use Database\Factories\CompanyFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * App\Models\Company
 *
 * @property int $id
 * @property string $location
 * @property string $name
 * @property int $status_of_working
 * @property string $town
 * @property string $description
 * @property string $password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @method static CompanyFactory factory(...$parameters)
 * @method static Builder|Company newModelQuery()
 * @method static Builder|Company newQuery()
 * @method static Builder|Company query()
 * @method static Builder|Company whereCreatedAt($value)
 * @method static Builder|Company whereDescription($value)
 * @method static Builder|Company whereId($value)
 * @method static Builder|Company whereLocation($value)
 * @method static Builder|Company whereName($value)
 * @method static Builder|Company wherePassword($value)
 * @method static Builder|Company whereStatusOfWorking($value)
 * @method static Builder|Company whereTown($value)
 * @method static Builder|Company whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Company extends Authenticatable implements JWTSubject
{
    protected $fillable = ["email", "location", "status_of_working", "town", "description", "password"];
    protected $guarded = ["password"];
    use HasFactory, Notifiable, SoftDeletes;

    public function dish()
    {
        return $this->hasMany(Dish::class);

    }

    public function categories()
    {
        return $this->hasMany(Category::class);

    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [

            "id" => $this->id,

        ];
    }


    static public function validCategory(Category $category, $id)
    {
        if ($category->company_id != $id) {
            return false;
        }
        return true;

    }
}
