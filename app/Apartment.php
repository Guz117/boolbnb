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
        'visible',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }
}
