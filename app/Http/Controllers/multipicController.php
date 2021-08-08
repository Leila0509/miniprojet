<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\multipic;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class multipicController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function multi(){
        $images = multipic::all();
        return view('admin.multi', compact('images'));
    }

    public function StoreImage(Request $req){
        $validatedData = $req->validate([
           
            'image' => 'required',
            
        ],
    
        [
            
            'image.required' => 'Please Input the Brand Image',
            
        ]);

        $image = $req->file('image');

        foreach($image as $multi_img){
            $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
            Image::make($multi_img)->fit(200)->save('image/multi/'.$name_gen);
    
            $last_img = 'image/multi/'.$name_gen;
    
    
            multipic::insert([
                
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        }//end of foreach

        



       
        return Redirect()->back()->with('success', 'Images inserted Successfully');
    }
}
