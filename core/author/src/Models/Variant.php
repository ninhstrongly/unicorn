<?php 

namespace Unicorn\Author\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model{
    protected $table = 'variant';
    public $timestamps = false;

    public function values()
    {
        return $this->belongsToMany('Unicorn\Author\Models\Values', 'variant_values', 'variant_id', 'values_id');
    }
}