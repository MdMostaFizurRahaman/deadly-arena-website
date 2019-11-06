<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class ApiController extends Controller
{
    public function register(Request $request)
    {


        $pn = $request->p_n; //Player Nane
        $pdn = $request->p_dn; //Player Display Name
        $pe = $request->p_e; // Player Email
        $pp = $request->p_p; // Player Password
        $pc = $request->p_c; // Player Country
        $pdob = $request->p_dob; // Player Date of Birth
        $ps = $request->p_s; // Player Status
        $pgg = $request->p_gg; // Player Google
        $pfb = $request->p_fb; // Player 
        
        return $request;
       
        $gs_error = '';

        // if(strlen($pdn) > 0){
        //     if((strlen($pdn) > 0 && strlen($pp) > 0) || strlen($pgg) > 0 || strlen($pfb) > 0){
        //         $sql = "INSERT INTO players (player_name, player_displayname, player_email, player_password, player_country, player_dob, 
        //         player_sex, player_google, player_fb, player_ip, player_status, player_agent) 
        //         VALUES ('$pn', '$pdn', '$pe', '$pp', '$pc', '$pdob', '$ps', '$pgg', '$pfb', '$ip', '1', '$_SERVER[HTTP_USER_AGENT]')";
        //         if($query = $pdo_conn->query($sql)){
        //             if(strlen($pdn) > 0 && strlen($pp) > 0)
        //                 $sql = "select id_player from players where player_displayname='$pdn' and player_password='$pp'";
        //             else if(strlen($pgg) > 0)
        //                 $sql = "select id_player from players where player_google='$pgg'";
        //             else if(strlen($pfb) > 0)
        //                 $sql = "select id_player from players where player_fb='$pfb'";
        //             else {
        //                 $gs_error = '-12';
        //                 return $gs_error; //no auth protocol for registration
        //             }
        //             $query = $pdo_conn->query($sql);
        //             if($data = $query->fetch(PDO::FETCH_ASSOC)){
        //                 $gs_error = 'pid3:'.$data[id_player];
        //                 return '{"player id":"'.$data[id_player].'"}';
        //             } else {
        //                 $gs_error = '-103';
        //                 return $gs_error;	//player Id not found
        //             }
        //         } else {
        //             $gs_error = '-104';
        //             return $gs_error;	//Database duplicate entr
        //         }
        //     } else {
        //         $gs_error = '-3';
        //         return $gs_error; //no auth protocol for registrati
        //     }
        // } else {
        //     $gs_error = '-9';
        //     return $gs_error;	//display name bl
        // }
       
    }
}
