<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    //
    protected $fillable=[
        'phone', 'category_id', 'contact_id'
    ];

    public function contact(){
        return $this->belongsTo('App\Contact');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
