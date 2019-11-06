<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Asset;
use App\Category;
use App\Post;
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WelcomeController extends Controller
{
    public function index ()
    {
        $categories = Category::all();
        $posts = Post::latest()->limit(3)->get();
        $assets = Asset::latest()->get();
        return view ('welcome')
                    ->with('posts', $posts)
                    ->with('assets',$assets)
                    ->with('categories', $categories);
    }

    public function play ()
    {
        return view('play');
    }

    public function updateProfile (Request $request, $id)
    {
        if($request->email == null){
            $validator = Validator::make($request->all(), [
                'player_displayname' => 'max:50|unique:players',
                'player_country' => 'max:50',
                'player_sex' => 'max:50',
                'player_dob' => 'max:50',
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'player_displayname' => 'max:50|unique:players',
                'email' => 'max:50|unique:players,email',
                'player_country' => 'max:50',
                'player_sex' => 'max:50',
                'player_dob' => 'max:50',
            ]);
        }
        
       

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }else{
            $player = Player::where('id_player', $id)->first();
            if(!empty($request->player_displayname)){  
                $player->player_displayname = $request->player_displayname;
            }
            if(!empty($request->email)){
                $player->email = $request->email;
            }
            if(!empty($request->player_country)){   
                $player->player_country = $request->player_country;
            }
            if(!empty($request->player_sex)){   
                $player->player_sex = $request->player_sex;
            }
            if(!empty($request->player_dob)){    
                $player->player_dob = $request->player_dob;
            }
            $player->save();
            return response()->json(['success'=>'Profile updated successfully', 'value'=> $player]);
        }
        
    }


    public function changePassword (Request $request, $id)
    {
        $player = Player::where('id_player', $id)->first();
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|max:8|min:4',
            'password' => 'required|confirmed|min:4|max:8'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }else{
            if($player->player_password){
                if(Hash::check($request->old_password, $player->player_password)){
                    $player->player_password = Hash::make($request->password);
                    $player->save();
                    return response()->json(['success'=>'Password updated successfully.']);
                }
            }else{
                return response()->json(['errors'=>['Logged in with social account. Can not change you password here.']]);
            }
            
        }
    }
}
