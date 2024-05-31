<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-... (laissé à titre indicatif) ..." crossorigin="anonymous">

    <title>Site web code warriors</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-digimedia-v1.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">


    <style>

        .ff {
            display: flex;
            justify-content: center;
        }

        input[type="email"] {
            background-color: #f7f7f7;
            border: 1px solid #ccc;
            font-size: 16px;
            margin-right: 20px;
            width: 552px;
            height: 42px;
            top: 29px;
            left: 370px;
            padding: 11px 404px 11px 25px;
            border-radius: 50px;

        }

        button[type="submit"] {
            background-color: #9747FF;
            color: #fff;
            border: none;
            font-size: 16px;
            cursor: pointer;
            min-width: 132px;
            min-height: 42px;
            top: 29px;
            left: 972px;
            padding: 11px 45px 11px 46px;
            border-radius: 49px;

        }

        section {
            margin-top: 50px;
            background-color: #9747FF;
            color: #fff;
            padding: 20px 0;
            font-family: 'Poppins', sans-serif;

        }

        .conteneur {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            height:350px;
            justify-content: space-between;
            background-color: #9747FF;
            margin-top:80px;
            margin-left: 70px;
        }
        .conteneur img {

            width: 253px;
            height: 150px;
            margin-top: 60px;
            margin-left: -50px;
            margin-right: 60px;


        }

        .categories,
        .ressources,
        .contact {
            width: 33.33%;
            margin-left: 30px;


        }

        #h22 {
            margin-bottom: 10px;
            color: black;
            font-size: 24px;
            font-weight: 700;
            line-height: 30px;
            letter-spacing: 0em;
            text-align: left;
        }

        ul {
            list-style: none;
            padding: 0;
            margin-top: 50px;
        }

        li {
            margin-bottom: 15px;
            font-size: 16px;
            font-weight: 600;
        }

        a {
            color: black;
            text-decoration: none;

        }

        .copyright p{
            font-size: 12px;
            font-weight: 600;
            line-height: 22px;
            letter-spacing: 0.07038461416959763px;
            text-align: center;
            color: white;



        }

        @media (max-width: 768px) {
            .conteneur {
                flex-direction: column;
            }

            .categories,
            .ressources,
            .contact {
                width: 100%;
            }
        }
        button:hover {
            background-color: purple;
        }



    </style>


</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Pre-header Starts -->

<!-- Pre-header End -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img style="padding: 22px;" src="{{asset('assets/images/logo.png')}}" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="/" >Home</a></li>


                        <li style="margin-top: -8px;" class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Categories
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @foreach( app("App\Http\Controllers\categoryController")->categories() as $category)
                                    <a class="dropdown-item" href="{{ route('blog.categories', $category) }}">{{ $category->nom}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li><a href="{{ route('blog.articls') }}">Articles</a></li>
                        <li><a href="/Blog/tips">Tips</a></li>
                        <li style="margin-top: -8px;" class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Questions
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('allQuestions') }}" >
                                    All Questions
                                </a>
                                @auth
                                    <a class="dropdown-item" href="{{ route('gotoaddQuestion', ['id' => Auth::user()->id]) }}" >
                                        Ask Question
                                    </a>
                                    <a class="dropdown-item" href="{{ route('FilterMyQuestions', ['id' => Auth::user()->id]) }}" >
                                        My Questions
                                    </a>
                                @endauth
                            </div>
                        </li>
                        <li><a href="{{ route('getfaqs') }}">FAQ</a></li>
                        <li><a href="{{ route('showAllpolicies') }}">Policies</a></li>
                        <li>
                            <div class="border-first-button">

                                @guest
                                    @if (Route::has('login'))
                                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                            @auth
                                                <a href="{{ url('.') }}" class="font-semibold text-gray-600  dark:text-gray-400  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                                            @else
                                                <a href="{{ route('login') }}" class="border-first-button-SignIn">Sign In</a>
                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}" class="border-first-button-SignUp">Sign Up</a>
                                                @endif
                                            @endauth
                                        </div>
                        @endif
                        @else
                            @if(Auth::user()->is_admin == 0)
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="profile" class="me-2" style="width: 30px; height: 30px; border-radius: 50%;">
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/editprofile">{{ __('Edit profile') }}</a>
                                        <a class="dropdown-item" href="{{ route('user.profile', ['user_id' => Auth()->user()->id]) }}">{{ __('View profile') }}</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none ff">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                            @else
                                <script>window.location = "{{ route('admin.homeadmin') }}";</script>
                @endif
                @endguest

            </div>
            </li>
            </ul>
            <!--    <a class='menu-trigger'>
                  <span>Menu</span>
              </a>
             ***** Menu End ***** -->
            </nav>
        </div>
    </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->




@yield('content')

<section>
    <div class="conteneur">
        <div>
            <img src="{{asset('assets/images/logo1.png')}}" alt="">
        </div>
        <div class="categories">
            <h2 id="h22">Categories</h2>
            <ul>
                @foreach( app("App\Http\Controllers\categoryController")->categories() as $category)
                    <li><a  href="{{ route('blog.categories', $category) }}">{{ $category->nom}}</a></li>
                @endforeach
            </ul>
        </div>



        <div class="ressources">
            <h2 id="h22">Ressources</h2>
            <ul>
                <li><a href="https://stackoverflow.com/">Stackoverflow</a></li>
                <li><a href="https://www.udemy.com/fr/">Udemy</a></li>
                <li><a href="https://www.coursera.org/">Coursera</a></li>
            </ul>
        </div>
        <div class="contact">
            <h2 id="h22">Contact</h2>

            <ul>
                <ul>
                    @foreach(app("App\Http\Controllers\SocialNetworkController")->getAllSocial() as $socialwork)
                        <li>
                            <a style="margin-left: 10px;" href="{{ $socialwork->link }}">
                                {!! $socialwork->icon !!}  {{ $socialwork->link }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <ul style="display: flex; ">
                    @foreach(app("App\Http\Controllers\SocialNetworkController")->getAllSocial() as $socialwork)
                        <li>
                            <a style="margin-left: 10px;" href="{{ $socialwork->link }}">
                                {!! $socialwork->icon !!}
                            </a>
                        </li>
                    @endforeach
            </ul>
            </ul>
        </div>


    </div>
    <div class="copyright">
        <p>&copy; Copy Rights ENET Com Junior Entreprise</p>
    </div>
</section>


<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/owl-carousel.js')}}"></script>
<script src="{{asset('assets/js/animation.js')}}"></script>
<script src="{{asset('assets/js/imagesloaded.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>

</body>
</html>
