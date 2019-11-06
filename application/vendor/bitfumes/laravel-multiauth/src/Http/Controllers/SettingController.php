<?php

namespace Bitfumes\Multiauth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

use App\Setting;
use SettingTableSeeder;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $settings = Setting::find(1);
        return view('multiauth::pages.settings.index')->with('settings', $settings);
    }

    public function generalSettings(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|max:20',
            'game_name' => 'required|max:20',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }else{
            
            $settings= Setting::find(1);

            $settings->company_name = $request->company_name;
            $settings->game_name = $request->game_name;
            
            if($request->file('company_logo')){
                $file_pointer = public_path($settings->company_logo);
                try {
                    unlink($file_pointer);//code...
                } catch (\Throwable $th) {
                    //throw $th;
                }
                  
                
                $company_logo = uniqid().$request->file('company_logo')->getClientOriginalName();
                $settings->company_logo = $company_logo;
                $request->file('company_logo')->move(public_path(), $company_logo);
            }

            if($request->file('game_logo')){
                $file_pointer = public_path($settings->game_logo);
                try {
                    unlink($file_pointer);
                } catch (\Throwable $th) {
                    //throw $th;
                }
                    
                
                $game_logo = uniqid().$request->file('game_logo')->getClientOriginalName();
                $settings->game_logo = $game_logo;
                $request->file('game_logo')->move(public_path(), $game_logo);
            }
           
            
            $settings->save();

            return response()->json(['success'=> 'Settings updated successfully']);
        }
    }

    public function heroImageSettings (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hero_image_title' => 'required|max:20',
            'hero_image_subtitle' => 'required|max:100',
            'hero_image_description' => 'required|max:500',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }else{


            $settings= Setting::find(1);

            $settings->hero_image_title = $request->hero_image_title;
            $settings->hero_image_subtitle = $request->hero_image_subtitle;
            $settings->hero_image_description = $request->hero_image_description;
            
            if($request->file('hero_image')){
                $file_pointer = public_path($settings->hero_image);
                try {
                    unlink($file_pointer);
                } catch (\Throwable $th) {
                    //throw $th;
                }
                
                $hero_image = uniqid().$request->file('hero_image')->getClientOriginalName();
                $settings->hero_image = $hero_image;
                $request->file('hero_image')->move(public_path(), $hero_image);
            }
            $settings->save();

            return response()->json(['success'=> 'Settings updated successfully']);
        }
        
    }

    public function promotionSettings (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'promotion_title' => 'required|max:20',
            'promotion_subtitle' => 'required|max:100',
            'promotion_description' => 'required|max:500',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }else{


            $settings= Setting::find(1);

            $settings->promotion_title = $request->promotion_title;
            $settings->promotion_subtitle = $request->promotion_subtitle;
            $settings->promotion_description = $request->promotion_description;
            
            if($request->file('promotion_image')){
                $file_pointer = public_path($settings->promotion_image);
                try {
                    unlink($file_pointer);
                } catch (\Throwable $th) {
                    // return response()->json(['errors'=> ["Unlink unsuccessfull"]]);
                }
                
                $promotion_image = uniqid().$request->file('promotion_image')->getClientOriginalName();
                $settings->promotion_image = $promotion_image;
                $request->file('promotion_image')->move(public_path(), $promotion_image);
            }
            $settings->save();

            return response()->json(['success'=> 'Settings updated successfully']);
        }
        
    }

    public function blogSettings(Request $request)
    {
        $settings = Setting::find(1);
        if($request->file('blog_image')){
            $file_pointer = public_path($settings->blog_image);
            try {
                unlink($file_pointer);
            } catch (\Throwable $th) {
                // return response()->json(['errors'=> ["Blog image unlink unsuccessfull"]]);
            }
            
            $blog_image = uniqid().$request->file('blog_image')->getClientOriginalName();
            $settings->blog_image = $blog_image;
            $request->file('blog_image')->move(public_path(), $blog_image);
        }
        if($request->file('postpage_image')){
            $file_pointer = public_path($settings->postpage_image);
            try {
                unlink($file_pointer);
            } catch (\Throwable $th) {
                // return response()->json(['errors'=> ["Post image unlink unsuccessfull"]]);
            }
            
            $postpage_image = uniqid().$request->file('postpage_image')->getClientOriginalName();
            $settings->postpage_image = $postpage_image;
            $request->file('postpage_image')->move(public_path(), $postpage_image);
        }
        if($request->file('userpage_image')){
            $file_pointer = public_path($settings->userpage_image);
            try {
                unlink($file_pointer);
            } catch (\Throwable $th) {
                // return response()->json(['errors'=> ["User image unlink unsuccessfull"]]);
            }
            
            $userpage_image = uniqid().$request->file('userpage_image')->getClientOriginalName();
            $settings->userpage_image = $userpage_image;
            $request->file('userpage_image')->move(public_path(), $userpage_image);
        }
        $settings->save();
        return response()->json(['success'=> 'Settings updated successfully']);
        
    }

    public function footerSettings (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'footer_title' => 'required|max:20',
            'footer_youtube' => 'required|max:200',
            'footer_twiter' => 'required|max:200',
            'footer_facebook' => 'required|max:200',
            'footer_google' => 'required|max:200',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }else{


            $settings= Setting::find(1);

            $settings->footer_title = $request->footer_title;
            $settings->footer_youtube = $request->footer_youtube;
            $settings->footer_twiter = $request->footer_twiter;
            $settings->footer_facebook = $request->footer_facebook;
            $settings->footer_google = $request->footer_google;
            
            if($request->file('footer_image')){
                $file_pointer = public_path($settings->footer_image);
                try {
                    unlink($file_pointer);
                } catch (\Throwable $th) {
                    //throw $th;
                }
                $footer_image = uniqid().$request->file('footer_image')->getClientOriginalName();
                $settings->footer_image = $footer_image;
                $request->file('footer_image')->move(public_path(), $footer_image);
            }
            $settings->save();

            return response()->json(['success'=> 'Settings updated successfully']);
        }
        
    }
}
