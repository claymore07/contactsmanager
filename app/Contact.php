<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable=[
        'fname', 'lname',  'path' ,'user_id', 'group_id', 'address', 'company',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function emails(){
        return $this->hasMany('App\Email');
    }

    public function phones(){
        return $this->hasMany('App\Phone');
    }

}
