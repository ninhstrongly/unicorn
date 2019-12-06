<?php 

namespace Unicorn\Author\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model{
    
    protected $table = 'attribute';
    public $timestamps = false;

    public function values()
    {
        return $this->hasMany('Unicorn\Author\Models\Values', 'attr_id', 'id');
    }
    
}