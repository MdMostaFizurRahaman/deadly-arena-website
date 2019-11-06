<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['name', 'image'];

    public function assets()
    {
        return $this->belongsToMany('App\Asset');
    }
}
