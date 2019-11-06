<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use Bitfumes\Multiauth\Model\Admin;
use Bitfumes\Multiauth\Model\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;


use App\Player;

class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $players = Player::all();
        return view('multiauth::pages.player.index')->with('players', $players);
    }

    public function create()
    {

    }

    public function edit($id)
    {
        $player = player::find($id);
        $players = player::all();
        return view('multiauth::pages.player.index')->with('player', $player)->with('players', $players);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',
            'image' => 'required|unique:players'
        ]);

        if ($validator->fails()) {
            return redirect('admin/player')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $imageName = uniqid().$request->file('image')->getClientOriginalName();
            $player= new player;

            $player->name = $request->name;
            $player->image = $imageName;
            $request->file('image')->move(public_path(), $imageName);
            $player->save();
           

            return redirect('admin/player')->with('success', 'player created successfully');
        }

    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',
        ]);

        if ($validator->fails()) {
            return redirect('admin/player')
                        ->withErrors($validator)
                        ->withInput();
        }else{
     
            $player= player::find($id);

            $player->name = $request->name;
            if($request->hasFile('image')){
                $file_pointer = public_path($player->image);
                unlink($file_pointer);
                $imageName = uniqid().$request->file('image')->getClientOriginalName();
                $player->image = $imageName;
                $request->file('image')->move(public_path(), $imageName);
            }
            $player->save();
           

            return redirect('admin/player')->with('success', 'player updated successfully');
        }
    }

    public function destroy($id)
    {
        $player = player::find($id);
        $file_pointer = public_path($player->image);
       
        if(unlink($file_pointer)){
            $player->delete();
            return redirect('admin/player')->with('success', 'player deleted successfully');
        }

    }

    public function updateStatus (Request $request)
    {
        $player = Player::where('id_player', $request->id)->first();
        $player->player_status = $request->status;
        $player->save();
       // echo $request->id;
        echo 'success';
    }
}
