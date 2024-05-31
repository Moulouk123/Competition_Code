@extends('admin.homeadmin')
<link rel="stylesheet" href="{{asset('assets/css/article.css')}}">
@section('content')

    <div class="card">
        <header class="card-header">
            <h1><p class="card-header-title">CATEGORY: {{ $category->nom }}</p></h1>
        </header>
        <p class="card-header-title">Description: {{ $category->description }}</p>
        <p class="card-header-title">TAGS:</p>
        <ul>
            @foreach($category->tags as $tag)
                <li>{{ $tag->nom }}</li>
            @endforeach
        </ul>


        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Catégorie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articls as $articl)
                        <tr>
                            <td>{{ $articl->id }}</td>
                            <td><strong>{{ $articl->title }}</strong></td>
                            <td>{{ $articl->category->nom }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
