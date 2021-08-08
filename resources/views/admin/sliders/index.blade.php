



@extends('admin.admin_master')

@section('admin')
    <div class="py-12">
        <div class="container">
            <div class ="row">
                <div class="col-md-8">
                    <div class="card">
            @if(session('success'))
                        <div class="alert alert-success" role="alert">
                          <strong> {{ session('success') }} </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
    
                        <div class="card-header"> All Sliders </div>
            @endif
                   
            <table class="table">
      <thead>
        <tr>
          <th scope="col" width="5%">#</th>
          <th scope="col" width="10%">Title</th>
          <th scope="col" width="15%">Description</th>
          <th scope="col" width="10%">Image</th>
          <th scope="col" width="15%">Created At</th>
          <th scope="col" width="20%">Action</th>
    
        </tr>
      </thead>
      <tbody>
          {{-- @php($i = 1) --}}
         @foreach ($sliders as $slider)
         <tr>
            <th scope="row">{{ $slider->id }}</th>
            {{-- <td>{{ $category->user->name }}</td> --}}
            {{-- JOINTURE --}}
            <td>{{ $slider->title }}</td>
            <td>{{ $slider->description }}</td>
            <td><img src ="{{ asset($slider->image)}}" style="heigh:60px; width:90px;"></td>
            <td>
                @if($slider->created_at == NULL)
                <span class="text-danger">No Date </span>
                @else
                {{ Carbon\Carbon::parse($slider->created_at)->diffForHumans() }}
                 @endif
            
            </td>
            <td>
              <a href=" {{ url('sliders/edit/'.$slider->id )}} " class="btn btn-info">Edit</a>
              <a href="{{ url('sliders/delete/'.$slider->id )}}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger">Delete</a>
              
            </td>
          </tr>
         @endforeach
        
    
      </tbody>
    </table>
    {{-- {{ $sliders->links() }} --}}
    
    </div>
    </div>
    
    <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> Add Brand </div>
    
    <div class ="card-body">
    
    
         <form action=" {{ route('store.sliders') }} " method="POST" enctype="multipart/form-data">
             @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Slider Title</label>
        <input type="text" name="title" class="form-control" id="exampleInputEmail1"  placeholder="Enter Title">
        
            @error('title')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
    
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Slider description</label>
        <textarea class="form-control" id="exampleFormControlTextArea1" rows="3" name="description"></textarea>
            @error('description')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
    
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Slider Image</label>
        <input type="file" name="image" class="form-control" id="exampleInputEmail1"  placeholder="Enter Image">
        
            @error('image')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
    
      </div>
      
      <button type="submit" class="btn btn-primary">Add Slider</button>
    </form>
    </div>
            </div>
        </div>
    
    </div>
    </div>
    </div>
@endsection
