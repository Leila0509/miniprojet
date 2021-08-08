@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Edit Slide </div>
                  <div class ="card-body">
                    <form action=" {{ url('sliders/update/'.$sliders->id)}} " method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="old_image" value=" {{ $sliders->image }} ">
                       <div class="form-group">
                          <label for="exampleInputEmail1">Update Title</label>
                             <input type="text" name="title" class="form-control" id="exampleInputEmail1"  placeholder="Enter Title" value="{{ $sliders->title }}">      
             @error('title')
              <span class="text-danger"> {{ $message }} </span>
              @enderror
                        
                         </div>

                         <div class="form-group">
                            <label for="exampleInputEmail1">Update Description</label>
                            <textarea class="form-control" id="exampleFormControlTextArea1" rows="3" name="description" value="{{ $sliders->description }}">{{ $sliders->description }}</textarea>

                 @error('description')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
                          
                           </div>

                         <div class="form-group">
                         <img src ="{{ asset($sliders->image)}}" width="100%">
                            
                               <input type="file" name="image" class="form-control" id="exampleInputEmail1"  placeholder="Image" value="{{ $sliders->image }}"> 

               @error('image')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
                           </div>


        
                 <button type="submit" class="btn btn-primary">Edit Title</button>
                     </form>
                  </div>
             </div>

        </div>
    </div>
    </div>
</div>

@endsection
