@extends('admin.homeadmin')
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
    <div  class="card" >
        <div style="width: 100%;height:40%; margin-left: 10px; margin-top:20px;padding:4px; margin-bottom:50px;border-radius: 25px;">
            <h4 class="card-title" style="text-align: left; margin-top: 20px;">Edit Article</h4>
            <div class="card-body">
                <div class="card">

      <form class="forms-sample" action="{{ route('articls.update', $articl->id) }}" method="POST" >
        @csrf
        @method('put')
        <div class="form-group">
            <label><h4>title</h4></label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $articl->title) }}"  placeholder="article title">
          </div>
          <div class="form-group">
            <label><h4>description </h4></label>
             <input type="text" class="form-control" name="description" value="{{ old('description', $articl->description) }}"  placeholder="article description ">
           </div>
           <div class="form-group">
            <label ><h4>content of the article </h4></label>
            <textarea class="form-control"  rows="4" name="contenu" placeholder="content of the article" >{{ old('contenu', $articl->contenu) }}</textarea>
          </div>

          <div class="form-group">
            <label ><h4> select category </h4></label>
            <select class="form-control form-control-lg" name="category_id" style="color:black">
                @foreach($categories as $category)
                <option value="{{$category->id }}"  @if($category->id ==$articl->category_id) selected @endif data-select2-id="3">{{ $category->nom }}</option>
        @endforeach
        </select>
        </div>


          <div class="form-group">
            <label><h4>Tags of the article</h4></label>
            <input type="text" class="form-control" value="{{ implode(',', $articl->tags->pluck('nom')->toArray()) }}" name="tags" placeholder="#tag">
        </div>

        <button type="submit" class="btn btn-primary mr-2">Update</button>

      </form>
    </div>
</div>


@endsection
