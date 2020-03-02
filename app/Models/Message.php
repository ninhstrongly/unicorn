<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Unicorn\Author\Models\Users;
class Message extends Model
{
    protected $fillable = ['message', 'user_id'];

    public function users() {
        return $this->belongsTo('Unicorn\Author\Models\Users', 'user_id', 'id');
    }
}
