@extends('user.header')
@section('content')


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

        :root {
            --var-padding: 1em;
            --highlight: hsl(265, 87%, 15%);
            --highlight-dark: hsl(261, 54%, 58%);
            --logo-width: 6em;
            --logo-offset: 1em;
            --main-column-width: 25em;
        }

        .app {
            position: relative;
            padding-left: .5em;
            max-width: 80em;
            background: hsl(0, 0%, 100%) 100% linear-gradient(hsl(272, 85%, 26%) 0%, hsl(277, 87%, 17%) 50%, hsl(280, 90%, 20%) 50%, hsl(275, 38%, 24%) 100%);
            background-size: auto 10em;
            background-repeat: repeat-x;
            background-position: center top;
        }

        .hello {
            height: 500px;
            position: relative;
            height: 10em;
            grid-row: 1 / 3;
            grid-column: 2;
            background: url("{{asset('assets/images/open.avif')}}");
            background-size: cover;
            background-position: right center;

        img {
            display: block;
            max-width: 100%;
        }

        }

        main {
            padding: var(--var-padding);
            min-width: var(--main-column-width);
            grid-row: 2;
            grid-column: 1;
            background: #ffffff;

        }


        @media (min-width: 37.5em) {
            :root {
                --var-padding: 3em;
            }

            .app {
                display: grid;
                margin: 3em auto;
                grid-template-rows: 5em auto;
                grid-template-columns: 1.4fr 1fr;
                padding-left: 2em;
                background-size: auto;

        &::after {
             position: absolute;
             right: 1em;
             left: 1em;
             bottom: 0;
             z-index: -1;
             width: 95%;
             height: 200px;
             content: '';
             box-shadow: 0 0 5em hsl(22, 23%, 40%);
         }
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

        }
    </style>

    <div id="contact" class="contact-us section">
        <div class="container">
<center>
    <a href='{{ route('blog.tips')}}'><h1 class="importante" style="margin:5%;">TIPS</h1></a>
</center>

<div class="app">
    <div class="hello"><img src="{{asset('assets/images/open.avif')}}" alt="Header Image"></div>
    <main style="height:440px;border:black solid 1px;">

        <strong>
            <h2 style="color:rgb(87, 31, 87);font-family: 'Times New Roman', 'Times, serif','solid'"> {{$tip->title}}</h2>
        </strong>
        <hr>
        <div style="width:650px;height:260px;">
            <h4> {{$tip->description}}</h4>
            <p> {{$tip->contenu}}</p>
        </div>
    </main>
</div>

            @php
                $rate_yes = app('App\Http\Controllers\rateController')->check(Auth::user()->id, $tip->id);
            @endphp
            @if($rate_yes)
                <form action="{{ route('rates.destroy',  $tip->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="tip_Id" value="{{ $tip->id }}">
                    <button type="submit" style="background: none;  margin-top:20px; border: none;">
                        <i class="fas fa-heart heart" style="font-size: 24px; margin-left: -30px; color: red;"></i>
                        <strong  id="bt" style=" margin-bottom:-20px; color: red;"> LIKE </strong>
                    </button>
                </form>
            @else
                <form action="{{ route('rates.store') }}" method="POST" >
                    @csrf
                    <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="tip_Id" value="{{ $tip->id }}">
                    <button type="submit" style="background: none; margin-top:20px; margin-left: -30px; border: none;" id="like">
                        <i class="fas fa-heart heart" onclick="like()" style="font-size: 24px; margin-right: 5px; color: black;"></i>
                        <strong id="bt" style=" color: black;"> LIKE </strong>
                    </button>
                </form>
            @endif
        </div>

    </div>
    </div>
@endsection






    <script>
        function like() {
        var like = document.getElementById('like');
        like.style.color="red"; // Changer la couleur de l'icône en rouge
    }
</script>

