<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function AllBrand(){

        $brands = Brand::latest()->paginate(5);
       
        return view('admin.brand.index', compact('brands'));
    }

    public function StoreBrand(Request $req){

        $validatedData = $req->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
            
        ],
    
        [
            'brand_name.required' => 'Please Input the Brand Name',
            'brand_name.min' => 'Brand min 4',
            'brand_image.required' => 'Please Input the Brand Image',
            
        ]);

        $brand_image = $req->file('brand_image');

        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());

        // $img_name = $name_gen.'.'.$img_ext;
        // $up_location = "image/brand/";
        // $last_img = $up_location.$img_name;

        // $brand_image->move($up_location, $img_name);

        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->fit(200)->save('image/brand/'.$name_gen);

        $last_img = 'image/brand/'.$name_gen;


        Brand::insert([
            'brand_name' => $req->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);



       
        return Redirect()->back()->with('success', 'Brand inserted Successfully');
    }

    public function Edit($id){
        // $categories = Category::find($id);

        // USING QUERY BUILDER
        $brands = DB::table('brands')->where('id', $id)->first();
       return view('admin.brand.edit', compact('brands'));
    }

    // public function Update(Request $req, $id){
    //     // $update = Category::find($id)->update(
    //     //     [
    //     //         'category_name' => $req->category_name,
    //     //         'user_id' => Auth::user()->id
                
    //     //     ]
    //     // );

    //     // USING DB
    //     $data = array();
    //     $data['category_name'] = $req->category_name;
    //     $data['user_id'] = Auth::user()->id;
    //     $data['updated_at'] = Carbon::now();
    //     DB::table('categories')->where('id', $id)->update($data);


    //   return Redirect()->route('all.category')->with('success', 'Category Updated Successfully');
    // }

    public function Update(Request $req, $id){

        $validatedData = $req->validate([
            'brand_name' => 'required|min:4',
            
            
        ],
    
        [
            'brand_name.required' => 'Please Input the Brand Name',
            'brand_name.min' => 'Brand min 4',
           
            
        ]);
        $brand_image = $req->file('brand_image');

        if($brand_image){
        $old_img = $req->old_image;

       

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());

        $img_name = $name_gen.'.'.$img_ext;
        $up_location = "image/brand/";
        $last_img = $up_location.$img_name;

        $brand_image->move($up_location, $img_name);

        unlink($old_img);

        Brand::find($id)->update([
            'brand_name' => $req->brand_name,
            'brand_image' => $last_img,
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('all.Brand')->with('success', 'Brand Updated Successfully');

        }else{
            Brand::find($id)->update([
                'brand_name' => $req->brand_name,
                'updated_at' => Carbon::now()
            ]);

            return Redirect()->route('all.Brand')->with('success', 'Brand Updated Successfully');
        }
        
    }

    public function Delete($id){

        $image = Brand::find($id)->brand_image;
        unlink($image);
            
        Brand::find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Brand Deleted Permanently Successfully');
    }


    public function Logout(){
        Auth::logout();

        return Redirect()->route('login')->with('success', 'Logout successfully');
    }

  

}
