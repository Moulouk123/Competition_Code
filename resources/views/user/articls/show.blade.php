@extends('user.header')
@section('content')

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .card {
            width: 90%;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card-description {
            color: #555;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .label {
            font-weight: bold;
        }

        .typeahead-container {
            position: relative;
            display: inline-block;
        }

        .tt-input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .tt-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 100;
            display: none;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .answer-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            width:80%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .answer-list {
            width: 100%;
            align-items: center;
            justify-content: center; /* Center the items horizontally */
        }

        .answer {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }

        .answer i {
            margin-right: 10px;
        }

        .filter-buttons {
            width: 30%;
            display: flex;
            justify-content: space-between;
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
        .buttonshare {
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #e3e3e3;
            color: black;
        }
        .button-secondary {
            background-color: #ecf0f1;
            color: #333;
        }

        .answer-card {
            display: flex;
            padding: 20px;
            width:100%;
            margin-bottom: 20px;
        }

        .answer-card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 20px;
        }

        .answer-content {
            flex: 1;
            margin-top: 20px;
        }

        .answer-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .answer-name {
            color: #555;
            font-weight: bold;
        }

        .answer-rating {
            color: #555;
        }

        .answer-text {
            margin-bottom: 10px;
        }

        .answer-file {
            color: #555;
        }
        .answerp-card {
            display: flex;
            padding: 20px;
            width: 80%; /* Adjust the width as needed */
            margin: 20px auto; /* Center the card */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .answerp-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 20px;
        }

        .answerp-content {
            flex: 1;
        }

        .answerp-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .answerp-name {
            color: #3498db; /* Adjust the color as needed */
            font-weight: bold;
        }

        .answerp-textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .file-input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .buttonp {
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #3498db;
            color: #fff;
        }
        .button-group {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .text-center {
            text-align: center;
            color: #3498db; /* Change the color to your preference */
            font-size: 24px; /* Adjust the font size as needed */
            margin-top: 20px; /* Add some top margin for spacing */
            font-weight: bold; /* Make the text bold */
        }

        .star-rating {
            display: flex;
        }

        .star-label {
            cursor: pointer;
            color: #ccc; /* Change to your desired inactive color for unselected stars */
            font-size: 24px; /* Adjust the size of stars as needed */
        }

        .star-label:hover,
        .star-label:hover ~ .star-label,
        .star-label.rated,
        .star-label.rated ~ .star-label {
            color: #f39c12; /* Change to your desired yellow color */
        }


        .card {
            width: 300px;
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

        .answer-count,
        .view-count {
            margin-right: 10px; /* Adjust the margin as needed */
        }
        .tags{
            margin-bottom:20px;
            margin-left:40px;
            margin-right:20px;
            width:175px ;
            border-radius: 25px;
            font-size:smaller;
            background-color: #9747FF; /* Couleur de fond */
            color: #FFFFFF; /* Couleur du texte */
            padding: 5px 10px; /* Ajoute de l'espace à l'intérieur du bouton */
            border: none; /* Supprime la bordure */
            box-shadow: #ccc ;

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
        #bt:hover{
color: #a29afc;
              }
    </style>

    <div id="contact" class="contact-us section">
        <div class="container">

            <center>
                <a href='{{ route('blog.articls')}}'><h1 class="importante" >ARTICLES</h1> </a>
            </center>
            @if(Session::has('successC'))
    <div class="alert alert-success">
        {{ Session::get('successC') }}
    </div>
    @endif
    @if(Session::has('errorC'))
    <div class="alert alert-danger">
        {{ Session::get('errorC') }}
    </div>
@endif

            <div style="background-color: blueviolet; padding:20px; width:50%; border-radius:25px; color: rgb(255, 255, 255); margin-left:5%; margin-top:25px; margin-bottom:3%">
                <h1><strong style="text-align:center;">{{$articl->title}}</strong></h1>
            </div>

            <div style="margin-top:3%; margin-left:5%; font-size:30px;">
                <strong>{{$articl->description}}</strong>
            </div>

            <div class="article">
                <div class="row">
                    <div class="col-md-8">
                        <div class="element" style="margin-left:2%; margin-right:3%; width:1000px;">
                            <div>
                                <h5 id="articleContent" class="text article-content" style="margin-bottom: 5%; width:900px;">
                                    <i class='fas fa-quote-left' style='font-size:30px; margin-right:15px;'></i>
                                    {{$articl->contenu}}
                                    <i class='fas fa-quote-right' style='font-size:30px; margin-left:15px;'></i>
                                </h5>
                            </div>

                            <div>
                                <strong style="margin-left:25%; margin-bottom:8%;">
                                    <h3> # TAGS </h3>
                                </strong>
                                @foreach($articl->tags as $tag)
                                    <strong>
                                        <button class="tags">{{$tag->nom}}</button>
                                    </strong>
                                @endforeach
                            </div>
                            <div style="display: flex; align-items: center;">

                                <form action="{{ route('art.prof', ['articl' => $articl]) }}" method="get">
                                    @csrf
                                    <button type="submit" style="background: none; border: none;">
                                        <div style="display:flex; margin-right:8px; margin-top: 20px; align-items: center;">
                                            <!-- Bouton SAVE -->
                                            <i class="far fa-bookmark" style="font-size:24px;margin-right:20px; color:black;"></i>
                                            <strong style="color:black;" id="bt"> SAVE </strong>
                                        </div>
                                    </button>
                                </form>
                                <div style="display: flex; align-items: center; margin-left: 10px;">
                                    <!-- Bouton PRINT -->
                                    <a href="{{ route('pdfarticle', ['id' => $articl->id]) }}" style="text-decoration: none; margin-right: 20px;">
                                        <i class="fas fa-print" style="font-size: 24px; margin-right: 5px;"></i>
                                        <strong id="bt">PRINT</strong>
                                    </a>

                                    <!-- Bouton LIKE ou UNLIKE -->
                                    @php
                                        $like_yes = app('App\Http\Controllers\likeController')->check(Auth::user()->id, $articl->id);
                                    @endphp
                                    @if($like_yes)
                                        <form action="{{ route('likes.destroy',  $articl->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="articl_id" value="{{ $articl->id }}">
                                            <button type="submit" style="background: none;  margin-top:20px; border: none;">
                                                <i class="fas fa-heart heart" style="font-size: 24px; margin-left: -30px; color: red;"></i>
                                                <strong  id="bt" style=" margin-bottom:-20px; color: red;"> LIKE </strong>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('likes.store') }}" method="POST" >
                                            @csrf
                                            <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="articlId" value="{{ $articl->id }}">
                                            <button type="submit" style="background: none; margin-top:20px; margin-left: -30px; border: none;" id="like">
                                                <i class="fas fa-heart heart" onclick="like()" style="font-size: 24px; margin-right: 5px; color: black;"></i>
                                                <strong id="bt" style=" color: black;"> LIKE </strong>
                                            </button>
                                        </form>
                                    @endif
                                </div>

                                <div style="display: flex; align-items: center;">
                                    <!-- Bouton SHARE -->
                                    <i class="far fa-share-square" style="font-size: 24px; margin-right: 5px;"></i>
                                    <button style="background: none; border: none;" onclick="openSharePopup()"><strong id="bt"> SHARE </strong></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="element" style="margin-right:1%; margin-left:4%; width:300px; height:1200px; border-radius:25px;">
                            <div style="background-color: blueviolet; margin-top: -150px; border-radius:15px; color: rgb(255, 255, 255); text-align:center; padding:15px;">
                                <strong style="font-size: 20px;  "> Similar articles </strong>
                            </div>

                            <div class="cardd_container">
                                @foreach( app("App\Http\Controllers\articlController")->artcat($articl) as $art)
                                    <div style="width:400px; margin:20px">
                                        <div class="card_content">
                                            <table>
                                                <tr><td>
                                                        <h6>Posted {{ $art->created_at }}</h6>
                                                        <h3>{{ $art->title }}</h3>
                                                        <p>{{ $art->description }}</p>
                                                        <strong style="color:white; background-color:blueviolet; padding:3px; border-radius:10px;">{{ $art->category->nom }}</strong> <br>
                                                    </td></tr>
                                                <tr><td>
                                                        <hr>
                                                        <a class="bbtn" href="{{ route('blog.article', $art->id) }}"><strong>READ MORE</strong> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </a>
                                                    </td></tr>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>




           <!-- Liste des commentaires -->
           <div class="answer-container">
                <div class="answer-list">
                    @foreach($comments as $com)
                        <div class="answer-card">
                            <img src="{{ asset('storage/' . \App\Models\User::find($com->user_id)->photo) }}">

                            <div class="answer-content">
                                <div class="user-name">
                                    <strong>{{ $com->user->name }}</strong>
                                </div>
                                <div class="answer-text">
                                    <div style="margin-bottom: 10px;">
                                        <p style="margin: 0;">{{ $com->contenu }}</p>
                                    </div>
                                   <!--likes comments -->
                                   @php
                                   $like_yes = app('App\Http\Controllers\commentsController')->check(Auth::user()->id, $com->id);
                               @endphp
                               @if($like_yes)

                                   <form action="{{ route('dislike', ['comId'=>$com->id,'userId'=>Auth::user()->id])}}" method="POST">
                                       @csrf
                                       <button type="submit" style="background: none;  margin-top:20px; border: none;">
                                           <i class="fas fa-heart heart" style="font-size: 24px; margin-left:20%x; color: red;"></i>
                                       </button>
                                   </form>

                               @else

                                   <form action="{{ route('like', ['comId'=>$com->id,'userId'=>Auth::user()->id])}}" method="POST" >
                                       @csrf
                                       <button type="submit" style="background: none; margin-top:20px; margin-left:20%; border: none;" id="like">
                                           <i class="fas fa-heart heart" onclick="like()" style="font-size: 24px; margin-right: 5px; color: black;"></i>
                                       </button>
                                   </form>
                               
                               @endif
                           </div>
                                   <!-- *********************************************** -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>






            <center>
                <div style="border: 1px solid #000; width: 50%; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

                    <!-- Formulaire de commentaire -->
                    <div>
                        <form class="forms-sample" action="{{ route('add_Comments') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="comment"><h4>Comments</h4></label>
                                <input type="hidden" name="articl_id" value="{{ $articl->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="text" class="form-control" name="contenu" placeholder="Put your comment" id="comment">
                            </div>
                            <button style="margin-top: 10px;" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </center>

        </div>
    </div>

@endsection


<script>
    function like() {
        var like = document.getElementById('like');
        like.style.color="red"; // Changer la couleur de l'icône en rouge
    }
</script>
<script>
    function openSharePopup() {
        // URL de l'article que vous souhaitez partager
        var articleUrl = window.location.href;

        // Construire les liens de partage pour les réseaux sociaux
        var facebookShareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(articleUrl);
        var twitterShareUrl = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(articleUrl);
        var linkedInShareUrl = 'https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(articleUrl);

        // Dimensions de la fenêtre contextuelle
        var popupWidth = 600;
        var popupHeight = 400;

        // Position de la fenêtre contextuelle au centre de l'écran
        var left = (window.innerWidth - popupWidth) / 2;
        var top = (window.innerHeight - popupHeight) / 2;

        // Ouvrir la fenêtre contextuelle avec les liens de partage
        var popupWindow = window.open('', 'Share Article', 'width=' + popupWidth + ',height=' + popupHeight + ',left=' + left + ',top=' + top);

        // Écrire le contenu HTML dans la fenêtre contextuelle avec les styles CSS
        popupWindow.document.write(`
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f9f9f9;
                margin: 0;
                padding: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%;
            }
            .share-card {
                background-color: #461474;
                color: #ffffff;
                border-radius: 10px;
                padding: 20px;
                text-align: center;
            }
            h1 {
                font-size: 24px;
                margin-bottom: 20px;
            }
            .share-link {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 10px;
                text-decoration: none;
                color: #ffffff;
                background-color: #9747FF;
                border-radius: 5px;
                padding: 10px 20px;
                transition: background-color 0.3s ease;
            }
            .share-link:hover {
                background-color: #6B1D82;
            }
            .share-link i {
                margin-right: 10px;
            }
        </style>
        <div class="share-card">
            <h1>Share this article</h1>
            <a href="${facebookShareUrl}" target="_blank" class="share-link"><i class="fab fa-facebook"></i> Share on Facebook</a>
            <a href="${twitterShareUrl}" target="_blank" class="share-link"><i class="fab fa-twitter"></i> Share on Twitter</a>
            <a href="${linkedInShareUrl}" target="_blank" class="share-link"><i class="fab fa-linkedin"></i> Share on LinkedIn</a>
        </div>
    `);
    }
</script>
