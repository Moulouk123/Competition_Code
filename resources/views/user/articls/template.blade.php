@extends('user.header')
@section('content')

<style>
    .card {
        width: 300px;
        height: 500px;
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
        margin: 20px auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: bold;
        margin: 20px 0;
    }

    .card img {
        /**width: 50px;
       height: 50px;
    border-radius: 50%;
       margin-right: 10px;*/
    }

    .card-content {
        padding: 0 20px 20px;
    }

    .card-description {
        color: #555;
        margin-bottom: 20px;
        text-align: center;
    }

    .card-buttons {
        display: flex;
        justify-content: center;
    }

    .button {
        padding: 10px 20px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        margin: 0 10px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .button-primary {
        background-color: #3498db;
        color: #fff;
    }

    .button-secondary {
        background-color: #ecf0f1;
        color: #333;
    }

    .button:hover {
        background-color: #2980b9;
    }

    .card-title2 {
        display: flex;
        justify-content: space-between;
    }
    .tags {
        margin-bottom: 20px;
        margin-left: 40px;
        margin-right: 20px;
        width: 175px;
        border-radius: 25px;
        font-size: smaller;
        background-color: #9747FF; /* Couleur de fond */
        color: #FFFFFF; /* Couleur du texte */
        padding: 5px 10px; /* Ajoute de l'espace à l'intérieur du bouton */
        border: none; /* Supprime la bordure */
        box-shadow: #ccc;
        transition: background-color 0.3s ease; /* Animation de transition */
        cursor: pointer; /* Curseur de souris */
    }

    .tags.selected {
        background-color: #6B1D82; /* Couleur de fond lorsqu'il est sélectionné */
    }
    .importante {
        font-size: 3em; /* Taille de police plus grande */
        font-weight: bold; /* Police en gras */
        color:#9747FF;  /* Couleur vive (orange vif) */
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); /* Ombre portée */
        letter-spacing: 1px; /* Espacement des lettres */
        background-color: #f8f8f8; /* Fond coloré */
        padding: 10px 20px; /* Espacement intérieur */
        border-radius: 10px; /* Coins arrondis */
    }
    .answer-count,
    .view-count {
        margin-right: 10px; /* Adjust the margin as needed */
    }

    .filter-buttons {
        width: 90%;
        display: flex;
        justify-content: flex-end; /* Change this line to align to the right */
        align-items: flex-start;
    }

    .button {
        margin-bottom: 10px;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background-color: #3498db;
        color: #fff;
    }

    .button-secondary {
        background-color: #ecf0f1;
        color: #333;
    }

</style>
<div id="contact" class="contact-us section">
    <div class="container">
        <center>
            <a href='{{ route('blog.articls')}}'><h1 class="importante" style="margin:5%;">ARTICLES</h1></a>
        </center>

        <div class="row">
            <!-- Barre latérale gauche -->
            <div class="col-md-3">
                <div class="article">
                    <div class="element" style="background-color:rgb(227, 217, 235); width:300px; height:1200px; border-radius:25px;">
                        <strong>
                            <h3 style="color: rgb(58, 9, 58); margin: 10px; padding:10px;"> Questions </h3>
                        </strong>
                        <ul>
                            <li style="margin-left: 50px; margin-bottom:20px;"><a href="{{ route('gotoaddQuestion', ['id' => Auth::user()->id]) }}"> Write Questions</a> </li>
                            <li style="margin-left: 50px;"><a href="{{ route('allQuestions') }}"> Read Questions </a></li>
                        </ul>
                        <strong>
                            <h3 style="color: rgb(58, 9, 58); margin: 10px; padding:10px;"> Discussions </h3>
                            <h3 style="color: rgb(58, 9, 58); margin: 10px; padding:10px;"> Recommended Tags </h3>
                        </strong>
                        <div>
                            <!-- Boutons pour les tags recommandés -->
                            <div>
                                @foreach($recommendedTags as $tag)
                                    <button type="button" class="tags" onclick="window.location.href = '{{ route('art.tag', ['tag' => $tag->id]) }}'">{{ $tag->nom }}</button>
                                @endforeach
                            </div>
                        </div>
                        <strong>
                            <h3 style="color: rgb(58, 9, 58); margin: 10px; padding:10px;"> Tips </h3>
                        </strong>
                    </div>
                    <div class="element"></div>
                </div>
            </div>

            <!-- Section principale des articles -->
            <div class="col-md-9">
                <div style="text-align: center;" class="element">
                    <h4 style="margin-bottom: 30px;"><strong> Recommanded : </strong></h4>
                    <div>
                        @foreach($max as $m)
                            <button type="button" class="tags" onclick="window.location.href = '{{ route('art.category', ['category' => $m->id]) }}'">{{ $m->nom }}</button>
                        @endforeach
                    </div>
                </div>

                <!-- Articles -->
                <div class="row">
                    @foreach($articls as $articl)
                        <div  class="col-lg-4 col-md-6 mb-4">
                            <div class='card' style="margin:30px; max-height: 500px;">
                                <img src="{{asset('assets/images/img.jpg')}}">
                                <div style="padding: 20px;" class="card_content">
                                                <h6>Posted {{ $articl->created_at }}</h6>
                                                <h5>{{ Str::limit($articl->title, 100) }}</h5>
                                                <p>{{ Str::limit($articl->description, 100) }}</p>
                                                <strong style="color: rgb(58, 9, 58)"> {{ optional($articl->category)->nom }} </strong> <br>

                                                <a class="btn" href="{{ route('blog.article', $articl->id) }}">READ MORE <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="row">
                    {{ $articls->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection