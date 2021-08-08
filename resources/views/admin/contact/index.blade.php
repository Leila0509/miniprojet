
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
    
                        <div class="card-header"> All Contact Messages </div>
            @endif
                   
            <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Address</th>
          <th scope="col">Phone</th>
          <th scope="col">Email</th>
          <th scope="col">Created At</th>
          <th scope="col">Action</th>
    
        </tr>
      </thead>
      <tbody>
        
         @foreach ($contacts as $contact)
         <tr>
            <th scope="row">{{ $contact->id }}</th>
           
            <td>{{ $contact->address }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>
                @if($contact->created_at == NULL)
                <span class="text-danger">No Date </span>
                @else
                {{ Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}
                 @endif
            
            </td>
            <td>
              <a href=" {{ url('admin/contact/edit/'.$brand->id )}} " class="btn btn-info">Edit</a>
              <a href="{{ url('admin/contact/delete/'.$brand->id )}}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger">Delete</a>
              
            </td>
          </tr>
         @endforeach
        
    
      </tbody>
    </table>
    {{-- {{ $brands->links() }} --}}
    
    </div>
    </div>
    
    
    </div>
    </div>
    </div>
@endsection
