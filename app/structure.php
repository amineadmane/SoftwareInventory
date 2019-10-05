<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class structure extends Model
{
    protected $fillable = [
        'nom', 'nb_app','nb_users'
    ];
    public function users()
    {
        return $this->hasMany('App\User');
    }
    public function applications()
    {
        return $this->hasMany('App\Application');
    }
}
