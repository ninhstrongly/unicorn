<?php 

namespace Unicorn\Author\Models;

use Illuminate\Database\Eloquent\Model;

class Values extends Model{
    
    protected $table = 'values';
    public $timestamps = false;

    public function attribute()
    {
        return $this->belongsTo('Unicorn\Author\Models\Attribute', 'attr_id', 'id');
    }
}