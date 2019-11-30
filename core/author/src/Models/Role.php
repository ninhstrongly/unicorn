<?php 

namespace Unicorn\Author\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model{

    
    protected $table = 'role';
    
    protected $fillable = [
        'name','display_name','permission',
    ];


}