<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slider;
use Auth;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class SlidersController extends Controller
{
   public function AllSliders(){
      $sliders = slider::latest()->get();
      return view('admin.sliders.index', compact('sliders'));

   }

   public function AddSlider(Request $req){
    
      $validatedData = $req->validate([
         'title' => 'required|unique:sliders|min:4',
         'description' => 'required|min:4',
         'image' => 'required|mimes:jpg,jpeg,png',
         
     ],
 
     [
         'title.required' => 'Please Input the Slider Title',
         'title.min' => 'Slider min 4',
         'image.required' => 'Please Input the Slider Image',
         
     ]);

     $image = $req->file('image');

     $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
     Image::make($image)->fit(1920,1088)->save('frontend/assets/img/slide/'.$name_gen);

     $last_img = 'frontend/assets/img/slide/'.$name_gen;


     slider::insert([
         'title' => $req->title,
         'description' => $req->description,
         'image' => $last_img,
         'created_at' => Carbon::now()
     ]);



    
     return Redirect()->back()->with('success', 'Slider inserted Successfully');

   }


   public function Edit($id){
     
      $sliders = DB::table('sliders')->where('id', $id)->first();
     return view('admin.sliders.edit', compact('sliders'));
  }


  public function Update(Request $req, $id){

      $validatedData = $req->validate([
         'title' => 'required|min:4',
         'description' => 'required|min:4',
         'image' => 'mimes:jpg,jpeg,png',
         
     ],
 
     [
         'title.required' => 'Please Input the Slider Title',
         'title.min' => 'Slider min 4',
         'image.required' => 'Please Input the Slider Image',
         
          
      ]);
      $image = $req->file('image');

      if($image){
      $old_img = $req->old_image;
      $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->fit(1920,1088)->save('frontend/assets/img/slide/'.$name_gen);
 
      $last_img = 'frontend/assets/img/slide/'.$name_gen; 

      unlink($old_img);

      slider::find($id)->update([
          'title' => $req->title,
          'description' => $req->description,
          'image' => $last_img,
          'updated_at' => Carbon::now()
      ]);

      return Redirect()->route('home.sliders')->with('success', 'sliders Updated Successfully');

      }else{
          slider::find($id)->update([
              'title' => $req->title,
              'description' => $req->description,
              'updated_at' => Carbon::now()
          ]);

          return Redirect()->route('home.sliders')->with('success', 'sliders Updated Successfully');
      }
      
  }


  public function Delete($id){

      $image = slider::find($id)->image;
      unlink($image);
          
      slider::find($id)->forceDelete();
      return Redirect()->back()->with('success', 'Slider Deleted Permanently Successfully');
  }


 

}
