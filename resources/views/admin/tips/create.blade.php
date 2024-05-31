@extends('admin.homeadmin')


@section('content')
<h1 class="text-primary" style="margin-bottom: 5%"><strong>Tips</strong></h1>
    <div class="card">
        <div class="card-body">
            <h2 class="text-primary" style="margin-bottom: 5%">Add Tip</h2>
                <form class="forms-sample" action="{{ route('tipss.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label><h4>title</h4></label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="tip title">
                      </div>
                      <div class="form-group">
                        <label><h4>description</h4> </label>
                        <input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="tip description ">
                      </div>
                      <div class="form-group">
                        <label ><h4>content of the tip </h4></label>
                        <textarea class="form-control"  rows="4" name="contenu" placeholder="content of the article" {{ old('contenu') }}></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1" style="color: black"><h4> select category </h4></label>
                        <select class="form-control form-control-lg" name="category_id" style="color: black">
                            @foreach($categories as $category)
                                    <option value="{{ $category->id }}" data-select2-id="3" style="color: black">{{ $category->nom }}</option>
                            @endforeach
                        </select>
                      </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>



       </div>
</div>

                </form>
        </div>
    </div>
@endsection


