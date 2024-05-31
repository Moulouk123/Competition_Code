@extends('admin.homeadmin')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"/>

@section('content')
    <div  class="card" >
        <div style="width: 70%;height:10%; margin-left: 170px; border:solid black 2px; margin-top:20px;padding:4px; margin-bottom:50px;border-radius: 25px;">
            <h4 class="card-title" style="text-align: center; margin-top: 20px;">Tips</h4>
            <div class="card-body">
                <form class="forms-sample" action="{{ route('tips.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title"><h4>Title</h4></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Tip title">
                    </div>
                    <div class="form-group">
                        <label for="description"><h4>Description</h4></label>
                        <input type="text" class="form-control" id="description" name="description" rows="4" placeholder="Description" {{ old('description') }}>
                    </div>
                    <div class="form-group">
                        <label for="contenu"><h4>Content of the tip</h4></label>
                        <textarea class="form-control" id="contenu" name="contenu" rows="4" placeholder="Get a new trick" {{ old('contenu') }}></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id"><h4>Select category</h4></label>
                        <select class="form-control form-control-lg" id="category_id" name="category_id">
                            <option value="">-- Choose category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" data-select2-id="3">{{ $category->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">ADD</button>
                </form>
            </div>
        </div>
        <div class="card" style="margin-top:2%;border: black solid 2px ; ">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                        <thead>
                        <tr>
                            <th>TIPS</th>
                            <th>TIPS's category</th>
                            <th>Interest rate</th>
                            <th>Update</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tips as $tip)
                            <tr>
                                <td><strong>{{ $tip->title }}</strong></td>
                                <td><strong>{{ $tip->category->nom }}</strong></td>
                                @php
                                    $totalLikes = \App\Models\Rate::where('tip_id', $tip->id)->sum('rating');
                                @endphp
                                <td><strong>{{ $totalLikes}}</strong></td>
                                <td><a type="button" class="btn btn-outline-danger btn-rounded btn-fw" href="{{ route('tips.edit', $tip->id) }}"><strong> Update </strong></a></td>
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
