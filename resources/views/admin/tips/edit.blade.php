@extends('admin.homeadmin')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />

@section('content')
    <div  class="card" >
        <div style="width: 70%;height:10%; margin-left: 170px; border:solid black 2px; margin-top:20px;padding:4px; margin-bottom:50px;border-radius: 25px;">
            <h4 class="card-title" style="text-align: center; margin-top: 20px;">Tips</h4>
             <div class="card-body">
                <form class="forms-sample" action="{{ route('tips.update', $tip->id) }}"method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <strong><label><h4>title</h4></label></strong>
                        <input type="text" class="form-control" name="title" value="{{ old('title', $tip->title) }}" placeholder="tip title">
                      </div>
                      <div class="form-group">
                        <strong><label  ><h4>description</h4></label></strong>
                        <input type="text" class="form-control"  rows="4" name="description" placeholder="description" value="{{ old('description', $tip->description) }}">
                      </div>
                      <div class="form-group">
                       <strong> <label ><h4>content of the tip </h4></label></strong>
                        <textarea class="form-control"  rows="4" name="contenu" placeholder="GET A NEW TRICK" >{{ old('contenu', $tip->contenu) }} </textarea>
                      </div>
                      <div class="form-group">
                       <strong> <label  for="exampleFormControlSelect1"><h4> select category </h4></label></strong>
                        <select class="form-control form-control-lg" name="category_id" style="color:black">
                            @foreach($categories as $category)
                            <option value="{{$category->id }}" @if($category->id ==$tip->category_id) selected @endif data-select2-id="3">{{ $category->nom }}</option>
                    @endforeach
                        </select>
                      </div>
        <button type="submit" class="btn btn-outline-primary btn-fw" style="border:2px solid "> <strong>Update</strong></button>
    </form>
       </div>
    </div>
<div class="card" style="margin-top:2%;border: black solid 2px ; ">
       <div class="card-body">
        <p class="card-title mb-0">Tips</p>
        <div class="table-responsive">
          <table class="table table-striped table-borderless">

            <thead>
              <tr>
                <th>Num </th>
                <th>TIPS </th>
                <th>TIPS's category </th>
                <th>Update</th>
                <th>Remove</th>
              </tr>
            </thead>
              <tbody>
                  @foreach($tips as $tip)
                      <tr>
                            <td><strong>{{ $tip->id }}</strong></td>
                            <td><strong>{{ $tip->title }}</strong></td>
                            <td><strong>{{ $tip->category->nom }}</strong></td>
                          <td><a type="button" class="btn btn-outline-danger btn-rounded btn-fw" href="{{ route('tips.edit', $tip->id) }}"><strong> UPDATE </strong></a></td>
                          <td>
                              <form action="{{ route('tips.destroy', $tip->id) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-outline-dark btn-rounded btn-fw" type="submit"><strong> Remove </strong></button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>

          </table>
        </div>
      </div>

</div>


</div>







@endsection


