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


    </style>
    </head>

    <div id="contact" class="contact-us section">
        <div class="container">
            <center>
                <a href='{{ route('blog.tips')}}'><h1 class="importante" style="margin:5%;">TIPS</h1></a>
            </center>

            <div class="row">
                <div class="col-md-3">
                    <h3>Tips Categories</h3>
                    <div class="btn-group-vertical" role="group">
                        <ul>
                        @foreach($categories as $category)

                           <li><button type="button" class="btn btn-block tags {{ $category->id == $selectedCategoryId ? 'selected' : '' }}"
                                    onclick="window.location.href = '{{ route('tips.category', ['category' => $category->id]) }}'">{{ $category->nom }}</button>
                        </li>
                        @endforeach
                        </ul>
                    </div>
                </div>


                <div class="col-md-9">
                    <div style="display: flex; justify-content: center; flex-wrap: wrap; margin-top: 50px;">
                        @if(isset($cat))
                            @foreach($cat->tips as $tip)
                                <div class="card mb-3" style="max-width: 540px; box-shadow: 0 4px 8px rgba(200, 76, 222, 0.1);">
                                    <div class="row no-gutters" style="border-radius: 30px; box-shadow: #8a2be2;">
                                        <div  class="col-md-4">
                                            <img src="{{ asset('assets/images/img2.jpg') }}" style="width: 180px; height: 180px; margin-top: 8%; " alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $tip->title }}</h5>
                                                <p class="card-text"><small class="text-muted">{{ $tip->description }}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        @else
                            @foreach($tips as $tip)
                                <div class="card mb-3" style="width: 560px; box-shadow: 0 4px 8px rgba(89, 25, 101, 0.1); height: 260px;">
                                    <div class="row no-gutters" style="padding-left: 13px; border-radius: 30px; box-shadow: #8a2be2">
                                        <div class="col-md-4">
                                            <img src="{{asset('assets/images/img2.jpg')}}" style="width: 180px; height: 180px; margin-top: 20px; margin-bottom: 2px; margin-left: 10px;" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <table>
                                                    <tr>
                                                        <td><strong><h5>{{ $tip->title }}</h5></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p class="card-text">{{ $tip->description }}</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a class="btn" href="{{ route('blog.tip', $tip->id) }}" style="margin-bottom: 0px;"> DISCOVER <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<script>
    function highlightButton(button) {
        // Supprimez d'abord la classe 'active' de tous les boutons
        var buttons = document.querySelectorAll('.max');
        buttons.forEach(function (btn) {
            btn.classList.remove('active');
        });

        // Ajoutez la classe 'active' au bouton cliqué
        button.classList.add('active');
    }
</script>
