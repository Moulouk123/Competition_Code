
@extends('user.header')

    <style>
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
.title {
    font-family: 'Montserrat', sans-serif;
    font-size: 4rem;
    color: #461474;
    text-transform: uppercase;
    letter-spacing: 3px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}
        .custom-row {
            display: flex;
            flex-wrap: wrap;
            margin: -5px; /* Pour compenser la marge négative des colonnes */
        }

        .custom-col {
            flex-grow: 1;
            margin: 5px; /* Marge autour de chaque carte */
        }

        .custom-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height: 180px;
            width:800px;
        }

        .custom-card-title {
            padding: 10px;
            display: flex;
            align-items: center;
        }

        .user-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-name {
            font-weight: bold;
        }

        .custom-card-content {
            padding: 10px;
        }

        .custom-card-title2 {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .answer-count,
        .view-count {
            font-size: 14px;
        }


    </style>
@section('content')
    <div id="contact" class="contact-us section">
        <div class="container">
            <center>
                <h1 class="importante" style="margin:5%;">CATEGORIES</h1>
            </center>
            <center>
                <div style="background-color: blueviolet; padding:20px; width:50%; border-radius:25px; color: rgb(255, 255, 255); margin-top:20px; margin-bottom:3%">
                    <h1><strong style="text-align:center">{{ $cat->nom }}</strong></h1>
                </div>
                <strong style="margin-top:5%">{{ $cat->description }}</strong>
            </center>

            <div class="row">
                <!-- Barre latérale gauche -->
                <div class="col-md-3">
                    <div class="article">
                        <div class="element" style="background-color:rgb(227, 217, 235); width:300px; height:2200px; border-radius:25px;">
                            <strong>
                                <h3 style="color: rgb(58, 9, 58); margin: 5px; padding:10px;"> Questions </h3>
                            </strong>
                            <ul>
                                <li style="margin-left: 50px; margin-bottom:20px;"><a href="{{ route('gotoaddQuestionCat', ['id' => $cat->id]) }}"> Write Questions</a> </li>
                                <li style="margin-left: 50px;"><a a href="{{ route('allQuestionsCat', ['id' => $cat->id]) }}"> Read Questions </a></li>
                            </ul>
                            <strong>
                                <h3 style="color: rgb(58, 9, 58); margin: 10px; padding:10px;"> Discussions </h3>
                                <h3 style="color: rgb(58, 9, 58); margin: 10px; padding:10px;"> Tags </h3>
                            </strong>
                            <div>
                                @foreach($cat->tags as $tag)
                                    <strong>
                                        <button class="tags">{{ $tag->nom }}</button>
                                    </strong>
                                @endforeach
                            </div>
                            <strong>
                                <h3 style="color: rgb(58, 9, 58); margin: 10px; padding:10px;"> Tips </h3>
                            </strong>
                        </div>
                        <div class="element"></div>
                    </div>
                </div>

                <!-- Cartes d'articles -->
                <div class="col-md-9">
                    <div class="card_container row">
                        @foreach($articls as $articl)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class='card' style="margin:30px">
                                    <img src="{{asset('assets/images/img.jpg')}}" >
                                    <div style="padding: 10px;" class="card_content">
                                        <h6>Posted {{ $articl->created_at }}</h6>
                                        <h3>{{ $articl->title }}</h3>
                                        <p>{{ $articl->description }}</p>
                                        <strong style="color: rgb(58, 9, 58)">{{ $articl->category->nom }}</strong> <br>
                                        <a class="btn" href="{{ route('blog.article', $articl->id) }}">READ MORE <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            {{ $articls->links() }}
                        </ul>
                    </nav>
                    <h3>Questions Posed</h3>
                    <div class="row custom-row">
                        @foreach(app("App\Http\Controllers\QuestionController")->allQuestionsCatuser($articl->category_id) as $question)
                            <div class="custom-col">
                                <div class="card custom-card">
                                    <div class="card-title custom-card-title">
                                        <a href="{{ route('user.profile', ['user_id' => $question->user_id]) }}">
                                            <img class="user-image" src="{{ asset('storage/' .\App\Models\User::find($question->user_id)->photo ) }}" alt="User Image">
                                        </a>
                                        <span class="user-name">{{ \App\Models\User::find($question->user_id)->name }}</span>
                                    </div>
                                    <div class="card-content custom-card-content">
                                        <p class="card-description">{{ $question->title }}</p>
                                        <div class="card-title2 custom-card-title2">
                                            <span class="answer-count">{{ $question->answers->count() }} Answers</span>
                                            <span class="view-count">{{ $question->count }} Views</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
                <div class="col-md-9">




                </div>
                </div>

            </div>
        </div>
    </div>


    <div style="margin-top:50px;" class="container">
        <div class="row justify-content-between">
            <!-- Div pour les Popular Tips -->
            <div class="col-md-5">
                <div>
                    <strong><h2 style="color: #633192; margin-left: 2%"> POPULAR TIPS </h2></strong>
                </div>
                @foreach($tips as $tip)
                    <!-- Votre code pour afficher chaque tip -->
                    <div style="width: 560px; height: 260px; box-shadow: 0 8px 8px rgba(200, 76, 222, 0.1); margin: 20px; padding: 20px; border: 0.5px rgb(255, 234, 255) solid">
                        <div class="row no-gutters" style="padding-left: 13px; border-radius: 30px; box-shadow: #8a2be2">
                            <div class="col-md-4">
                                <img src="{{ asset('assets/images/img2.jpg') }}" style="width: 180px; height: 180px; margin-top: 8%px; margin-right: 30px" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <table>
                                        <h5> {{ $tip->title }}</h5>
                                        <p class="card-text"><small class="text-muted">{{ $tip->description }}</small></p>
                                        <tr>
                                            <td>
                                                <a class="btn" href="{{ route('blog.tip', $tip->id) }}" style="margin-bottom: 0px;"> DISCOVER <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Div pour les Similar Tips -->
            <div  class="col-md-5">
                <div>
                    <strong><h2 style="color: #633192; margin-left: 2%"> SIMILAR TIPS </h2></strong>
                </div>
                @foreach($sim_tips as $s)
                    <!-- Votre code pour afficher chaque tip -->
                    <div style="width: 560px; height: 260px; box-shadow: 0 8px 8px rgba(200, 76, 222, 0.1); margin: 20px; padding: 20px; border: 0.5px rgb(255, 234, 255) solid">
                        <div class="row no-gutters" style="padding-left: 13px; border-radius: 30px; box-shadow: #8a2be2">
                            <div class="col-md-4">
                                <img src="{{ asset('assets/images/img2.jpg') }}" style="width: 180px; height: 180px; margin-top: 8%px; margin-right: 30px" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <table>
                                        <h5> {{ $s->title }}</h5>
                                        <p class="card-text"><small class="text-muted">{{ $s->description }}</small></p>
                                        <tr>
                                            <td>
                                                <a class="btn" href="{{ route('blog.tip', $s->id) }}" style="margin-bottom: 0px;"> DISCOVER <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

