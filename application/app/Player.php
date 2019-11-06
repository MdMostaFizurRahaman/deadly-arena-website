<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Player extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'id_player';

    protected $fillable = ['player_name', 'player_displayname', 'email', 'player_password', 'player_country', 'player_dob',
     'player_sex', 'player_google', 'player_fb', 'player_ip', 'player_status', 'player_agent', 'd_bot', 'a_bot', 
     'd_weapon', 'a_weapon', 'd_helmet', 'a_helmet'
    ];


    public function assets()
    {
        return $this->belongsToMany('App\Asset', 'asset_player', 'player_id', 'asset_id')->withPivot('amount', 'created_at');

    }
    public function getAuthPassword(){  
        return $this->player_password;
    }
    
}
