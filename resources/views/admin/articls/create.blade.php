@extends('admin.homeadmin')
<style>

</style>

@section('content')

<div class="card">
    <div style="width: 100%;height:40%; margin-left: 10px; margin-top:20px;padding:4px; margin-bottom:50px;border-radius: 25px;">
        <h4 class="card-title" style="text-align: left; margin-top: 20px;">Create Article</h4>
        <div class="card-body">
            <div class="card">

                <form class="forms-sample" action="{{ route('articls.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label><h4>Title</h4></label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="article title">
                    </div>
                    <div class="form-group">
                        <label><h4>Description</h4> </label>
                        <input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="article description ">
                    </div>
                    <div class="form-group">
                        <label><h4>Content of the article </h4></label>
                        <textarea class="form-control" rows="4" name="contenu"
                            placeholder="content of the article">{{ old('contenu') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1"><h4> Select category </h4></label>
                        <select class="form-control form-control-lg" name="category_id" style="color:black">
                            <option value="">-- Choose Category --</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                data-select2-id="3">{{ $category->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label><h4>Tags of the article</h4> </label>
                        <input type="text" class="form-control" name="tags" placeholder="#tag ">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>

                </form>

            

            </div>
        </div>

    </div>
</div>
@endsection
