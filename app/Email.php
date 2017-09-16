<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //
    protected $fillable=[
        'email'
    ];

    public function contact(){
        return $this->belongsTo('App\Contact');
    }
}
