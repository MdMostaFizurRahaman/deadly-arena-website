<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = ['name', 'image', 'price', 'description', 'category_id', 'status'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function options()
    {
        return $this->belongsToMany('App\Option');
    }

    public function players()
    {
        return $this->belongsToMany('App\Player', 'asset_player', 'asset_id', 'player_id');
    }
}
