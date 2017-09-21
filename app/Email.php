<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //
    protected $fillable=[
        'email', 'contact_id',
    ];

    public function contact(){
        return $this->belongsTo('App\Contact');
    }
}
