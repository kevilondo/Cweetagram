<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vehicle()
    {
        return $this->hasMany('App\Models\Vehicle');
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->nickname} {$this->surname}";
    }
}
