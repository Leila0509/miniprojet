<?php

    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use App\Models\HomeAbout;
    use Auth;
    use Illuminate\Support\Carbon;
    use Intervention\Image\ImageManagerStatic as Image;
    use Illuminate\Support\Facades\DB;
    
    class AboutController extends Controller
    {
       public function AllAbout(){
        
        $homeabout = HomeAbout::latest()->get();
        return view('admin.about.index', compact('homeabout'));
       }
    
       public function Add(Request $req){
        $validatedData = $req->validate([
            'title' => 'required|min:4',
            
            
        ],
    
        [
            'title.required' => 'Please Input the About Title',
            'title.min' => 'About min 4',
            
            
        ]);
   
        
   
        HomeAbout::insert([
            'title' => $req->title,
            'short_dis' => $req->short_dis,
            'log_dis' => $req->log_dis,
            'created_at' => Carbon::now()
        ]);
   
   
   
       
        return Redirect()->back()->with('success', 'About inserted Successfully');
   
          
       }
    
    
       public function Edit($id){
         
         
       }
    
      public function Update(Request $req, $id){
    
          
      }
    
    
      public function Delete($id){
     }
    
    
     
    
}
