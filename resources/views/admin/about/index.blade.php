



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
    
                        <div class="card-header"> About Us </div>
            @endif
                   
            <table class="table">
      <thead>
        <tr>
          <th scope="col" width="5%">#</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">log</th>
          <th scope="col">Created At</th>
          <th scope="col">Action</th>
    
        </tr>
      </thead>
      <tbody>
          {{-- @php($i = 1) --}}
         @foreach ($homeabout as $about)
         <tr>
            <th scope="row">{{ $about->id }}</th>
            {{-- <td>{{ $category->user->name }}</td> --}}
            {{-- JOINTURE --}}
            <td>{{ $about->title }}</td>
            <td>{{ $about->short_dis }}</td>
            <td>{{ $about->log_dis }}</td>
             <td>
                @if($about->created_at == NULL)
                <span class="text-danger">No Date </span>
                @else
                {{ Carbon\Carbon::parse($about->created_at)->diffForHumans() }}
                 @endif
            
            </td>
            <td>
              <a href=" {{ url('admin/about/edit/'.$about->id )}} " class="btn btn-info">Edit</a>
              <a href="{{ url('admin/about/delete/'.$about->id )}}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger">Delete</a>
              
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
                        <div class="card-header"> Add About </div>
    
    <div class ="card-body">
    
    
         <form action=" {{ route('store.about') }} " method="POST" enctype="multipart/form-data">
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
        <textarea class="form-control" id="exampleFormControlTextArea1" rows="3" name="short_dis"></textarea>
            @error('short_dis')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
    
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Long Description</label>
        <input type="text" name="log_dis" class="form-control" id="exampleInputEmail1"  placeholder="Enter Title">
        
            @error('log_dis')
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
