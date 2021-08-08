<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{ 

    public function __construct(){
        $this->middleware('auth');
    }

    public function AllCat(){
        // JOINTURE
        // $categories = DB::table('categories')
        // ->join('users', 'categories.user_id', 'users.id')
        // ->select('categories.*','users.name')
        // ->latest()->paginate(5);


        //from latest to oldest
       $categories = Category::latest()->paginate(5);
        // $categories = DB::table('categories')->latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(2);



        return view('admin.category.index', compact('categories', 'trashCat'));
    }


    public function AddCat(Request $req){
        $validated = $req->validate([
            'category_name' => 'required|unique:categories|max:25',
            
        ],
    
        [
            'category_name.required' => 'Please Input the Category Name',
            'category_name.max' => 'Category max 25',
            
        ]);

       /*   Category::insert([
            'category_name' => $req->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
      $category = new Category;
        $category->category_name = $req->category_name;
        $category->user_id = Auth::user()->id;
       // $category->created_at = Carbon::now();
        $category->save();
    */

    
     $data = array();
    $data['category_name'] = $req->category_name;
    $data['user_id'] = Auth::user()->id;
    $data['created_at'] = Carbon::now();
    DB::table('categories')->insert($data);
    
    return Redirect()->back()->with('success', 'Category inserted Successfully');

    }

    public function Edit($id){
        // $categories = Category::find($id);

        // USING QUERY BUILDER
        $categories = DB::table('categories')->where('id', $id)->first();
       return view('admin.category.edit', compact('categories'));
    }

    public function Update(Request $req, $id){
        // $update = Category::find($id)->update(
        //     [
        //         'category_name' => $req->category_name,
        //         'user_id' => Auth::user()->id
                
        //     ]
        // );

        // USING DB
        $data = array();
        $data['category_name'] = $req->category_name;
        $data['user_id'] = Auth::user()->id;
        $data['updated_at'] = Carbon::now();
        DB::table('categories')->where('id', $id)->update($data);


      return Redirect()->route('all.category')->with('success', 'Category Updated Successfully');
    }

    public function SoftDelete($id){
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success', 'Category Deleted Successfully');
    }


    public function Restore($id){
        $restore = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Category Restored Successfully');
    }

    public function PDelete($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Category Deleted Permanently Successfully');
    }


    
}
