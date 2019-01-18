<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;
class Product extends Model
{
    protected $fillable = [
        'name',
        'detail',
        'stock',
        'price',
        'discount'
    ];//parametros a considerar cuando se llama al modelo
    public function reviews() {
        return $this->hasMany(Review::class);
    }
}
