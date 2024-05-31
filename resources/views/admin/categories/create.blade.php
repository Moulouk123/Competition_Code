@extends('admin.homeadmin')
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
    <div  class="card" >
        <div style="width: 100%;height:40%; margin-left: 10px; margin-top:20px;padding:4px; margin-bottom:50px;border-radius: 25px;">
            <h4 class="card-title" style="text-align: left; margin-top: 20px;">Create Category</h4>
            <div class="card-body">
                <div class="card">
      <form class="forms-sample" action="{{ route('categories.store') }}" method="POST" >
        @csrf
        <div class="form-group">
          <label><h4>Title</h4></label>
          <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" placeholder="category title">
        </div>
        <div class="form-group">
            <label><h4>Description</h4> </label>
            <input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="category description ">
          </div>

          <div class="form-group">
            <label><h4>Category's Tags</h4> </label>
            <input type="text" class="form-control" name="tags"  placeholder="#tag  #tag ">
          </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>

      </form>
    </div>
  </div>
        </div>
    </div>

@endsection
