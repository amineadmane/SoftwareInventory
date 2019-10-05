<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'id','nom', 'description','Nver','editeur','DMP','DDM','nomserveur','adressIP',
        'OS','verOS','DB','verDB','typeapp','adsys','adbd','user_id','admetier','struct_id',
    ];

    public function structure()
    {
        return $this->belongsTo('App\structure');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
