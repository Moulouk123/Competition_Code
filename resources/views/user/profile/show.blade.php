@extends('user.header')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0-beta3/css/all.min.css"
          integrity="sha384-... (laissé à titre indicatif) ..." crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
    <style>
        .card {
            width: 40%;
            height: 35%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(188, 105, 221, 0.1);
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
            /** width: 50px;
            height: 50px;
         border-radius:25px;
            margin-right: 10px;*/
        }

        .card-content {
            padding: 0 30px 30px;
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

        .profile {
            position: absolute;
            top: 65%; /* ajustez la position verticale */
            left: 57%; /* ajustez la position horizontale */
            transform: translate(-50%, -50%);
            border: 5px solid #fff; /* facultatif : pour ajouter une bordure à la photo de profil */
            border-radius: 50%; /* facultatif : pour arrondir les coins de la photo de profil */
            width: 100px; /* ajustez selon vos besoins */
            height: 100px; /* ajustez selon vos besoins */
        }

        .button-secondary {
            background-color: #ecf0f1;
            color: #333;
        }


        .title {
            font-family: 'Montserrat', sans-serif; /* Police de caractères */
            font-size: 4rem; /* Taille du texte */
            color: #461474; /* Couleur violette */
            text-transform: uppercase; /* Conversion en majuscules */
            letter-spacing: 3px; /* Espacement entre les lettres */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Ombre portée */
        }

        .question-card {
            border-radius: 30px; /* Arrondir les coins */
            background-color: #ffffff; /* Couleur de fond */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Ombre portée */
            padding: 20px; /* Espacement interne */
            margin-bottom: 20px; /* Marge en bas pour séparer les cartes */
        }

        .question-card h3 {
            font-size: 20px; /* Taille de la police pour le titre */
            margin-bottom: 10px; /* Marge en bas pour séparer le titre du contenu */
            color: #9747FF;
            font-weight: bold;
        }

        .question-card p {
            font-size: 16px; /* Taille de la police pour le contenu */
        }


    </style>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row justify-content-center">

                <!-- Première colonne pour les informations -->
                <div class="col-md-6" style="border: black 2px solid ">
                    <center><strong><h1 style="margin-top:1%">QUESTIONS HISTORY</h1></strong></center>

                    @foreach($questionHistory as $question)
                        <div class="question-card">
                            <p>Posted {{$question->created_at}}</p>
                            <h3>{{ $question->title }}</h3>
                            <h6>{{ $question->details }}</h6>
                        </div>
                    @endforeach

                </div>

                <!-- Deuxième colonne pour le formulaire de connexion -->
                <div class="col-md-6">
                    <div>
                        <img class="couverture" src="{{asset('assets/images/code.jpg')}}">
                        <img class="profile" src="{{ asset('storage/' . $user->photo) }}">


                    </div>

                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                        <!--*****************************************************************************************-->
                        @auth
                            @if(auth()->user()->id === $user->id)
                                <a class="max" style=" margin-left: 70%;margin-bottom:10%" type="button"
                                   href="{{ route('editprofileUser') }}"><i style="padding: 5px;"
                                                                            class="fas fa-edit"></i>Edit Profile</a>
                                <!--*****************************************************************************************-->
                            @else

                                @php
                                    $areFriends = app('App\Http\Controllers\profilController')->check(Auth::user()->id, $user->id);

                                @endphp

                                @if($areFriends)
                                    <div style="display: flex; margin-left: 65%; margin-bottom: 30px;">
                                        <button class="max" style="margin-bottom:10%"
                                                onclick="openChatifyWithUser({{ $user->id }})">Send message
                                        </button>

                                        <form id="removeFriendForm"
                                              action="{{ action([\App\Http\Controllers\profilController::class, 'removeFriend'], ['userId' => Auth::user()->id, 'friendId' => $user->id]) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="removeFriend()"
                                                    style="background: none; border: none;">
                                                <i style='font-size:24px; margin-top: 40%;'
                                                   class="fas fa-user-minus"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <script>
                                        function removeFriend() {
                                            var form = document.getElementById('removeFriendForm');
                                            if (confirm('are you sure ?')) {
                                                form.submit();
                                            }
                                        }
                                    </script>

                                @else

                                        <form
                                            action="{{ action([\App\Http\Controllers\profilController::class, 'store']) }}"
                                            method="POST">
                                            @csrf

                                            <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="friendId" value="{{ $user->id }}">

                                            <button type="submit" style="background: none; border: none; color:black;"
                                                    onclick="addFriend()">
                                                <i id="friendIcon" style="font-size:24px; margin-top: 40%; margin-left: 80%; margin-bottom: 10%; "
                                                   class="fas fa-user-plus"></i>

                                            </button>
                                        </form>

                                @endif
                            @endif
                            <!--*****************************************************************************************-->
                        @endauth
                        <!--*****************************************************************************************-->

                        <div style="margin-top: -30px;" class="profile-description">

                            <div class="details">
                                <div class="detail">
                                    <strong><span>{{$user->name}}</span></strong>
                                </div>
                                <div class="detail">
                                    <i style='font-size:22px' class='fas'>&#xf0b1;</i>
                                    <span><strong>Profession :</strong> {{$user->job}}</span>
                                </div>
                                <div class="detail">
                                    <i class="fas fa-graduation-cap"></i>
                                    <span><strong>school:  </strong>{{$user->ecole}}</span>
                                </div>
                                <div class="detail">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><strong>De :   </strong>{{$user->adresse}}</span>
                                </div>
                                <div class="detail">
                                    <i style='font-size:24px' class='far'>&#xf2bb;</i>
                                    <span><strong>member:   </strong>{{$user->activity}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <center><strong style="font-size: 26px;">FRIENDS</strong></center>

                    <ul>
                        @foreach($user->friends as $friend)
                            <a href="{{ route('user.profile', ['user_id' => $friend->ami->id]) }}">
                                <img style="margin-right: 80px; margin-left: 80px; margin-bottom: 8%;" class="ami"
                                     src="{{ asset('storage/' . $friend->ami->photo) }}">
                                <h3 style="margin-left: 20%;">{{ $friend->ami->name }}</h3>
                            </a>
                        @endforeach
                    </ul>


                    <!--      <ul>
                 @foreach($user->friends as  $friend)
                        <img style="margin-right:80px;margin-left:80px;margin-bottom:8%" class="ami" src="{{asset('images/faces/face28.jpg')}}"> <h3 style="margin-left:20%;margin-bottom:8%">ami {{ $friend->ami->name}}</h3>

                    @endforeach
                    </ul>  -->

                    <hr>
                    <center><strong style="font-size: 26px;">INTERESTED</strong></center>
                    <ul>
                        @foreach($interestedCategories as $category)
                            <li style="margin-top: -10px;" class="question-card">
                                <strong><h3>{{ $category->nom }}</h3></strong>
                                <h6>{{ $category->description }}</h6>
                            </li>
                        @endforeach
                    </ul>

                </div>

            </div>
        </div>
    </div>
    <!--*****************************************************************************************-->
    @auth
        @if(auth()->user()->id === $user->id)
            <div class="col-md-6">
                <strong><h1 style="margin-top:1%;margin-left:5%;margin-bottom:2%">SAVED ARTICLES</h1></strong>

                @foreach(Auth::user()->saves as $articl)
                    <div class="col-md-6" style="width: 300px; box-shadow: 0 4px 8px rgba(89, 25, 101, 0.1); height: 260px;margin-left:5%">
                        <div class="row no-gutters" style="padding-left: 13px; border-radius: 30px; box-shadow: #8a2be2">

                            <div style="padding: 20px;" class="card_content">
                                <h6>Posted {{ $articl->created_at }}</h6>
                                <h3>{{ $articl->title }}</h3>
                                <p>{{ Str::limit($articl->description, 100) }}</p>
                                <strong style="color: rgb(58, 9, 58)"> {{ $articl->category->nom }}</strong> <br>

                                <a class="btn" href="{{ route('blog.article', $articl->id) }}">READ MORE <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>

                        </div>
                    </div>
            </div>

            @endforeach
        @endif
    @endauth
    <!--*****************************************************************************************-->
@endsection
<script>
    function removeFriend() {
        var form = document.getElementById('removeFriendForm');
        if (confirm('are you sure ?')) {
            form.submit();
        }
    }
</script>
<script>
    function openChatifyWithUser(userId) {
        var url = "http://127.0.0.1:8000/chatify/" + userId;

        // Open the link in a new tab or window
        window.open(url, '_blank');
    }
</script>
