@extends('admin.homeadmin')
<link rel="stylesheet" href="{{asset('assets/css/article.css')}}">
@section('content')
    <div class="card">

        <div class="article-details">
            <p class="article-detail"><strong>TITLE:</strong> {{ $articl->title }}</p>
            <p class="article-detail"><strong>DESCRIPTION:</strong> {{ $articl->description }}</p>
            <p class="article-detail"><strong>CATEGORY:</strong> {{ $articl->category->nom }}</p>
            <hr>
            <p class="article-content"><strong>ARTICLE CONTENT:</strong><br>{{ $articl->contenu }}</p>
            <div class="article-tags">
                <strong>Tags:</strong>
                <ul>
                    @foreach($articl->tags as $tag)
                        <li>{{ $tag->nom }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
