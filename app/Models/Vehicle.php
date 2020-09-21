<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function device()
    {
        return $this->hasOne('App\Models\Device');
    }

    public function getDisplayNameAttribute()
    {
        return "{$this->number_plate} {$this->make} owned by {$this->client->full_name}";
    }

    public function getNameAttribute()
    {
        return "{$this->make} {$this->model} {$this->number_plate}";
    }
}
