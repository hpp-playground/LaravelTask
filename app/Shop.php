<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Shop
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Shop extends Model
{

    protected $fillable= [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
