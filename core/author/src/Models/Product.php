<?php 

namespace Unicorn\Author\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    protected $table = 'product';

    public function values()
    {
        return $this->belongsToMany('Unicorn\Author\Models\Values', 'values_products', 'product_id', 'values_id');
    }
    public function variant()
    {
        return $this->hasMany('Unicorn\Author\Models\Variant', 'product_id', 'id');
    }
}