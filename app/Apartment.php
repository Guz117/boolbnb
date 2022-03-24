<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'rooms',
        'beds',
        'bathrooms',
        'square',
        'address',
        'latitude',
        'longitude',
        'image',
        'visible'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
