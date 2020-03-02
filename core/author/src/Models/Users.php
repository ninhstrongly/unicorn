<?php
namespace Unicorn\Author\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Message;
class Users extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'full','email','address','phone','password',
    ];
    public function roles()
    {
        return $this->belongsToMany('Unicorn\Author\Models\Role', 'role_user', 'user_id', 'role_id');
    }
    public function messages() {
        return $this->hasMany('App\Models\Message', 'user_id', 'id');
    }

}



