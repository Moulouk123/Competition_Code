<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <title>DigiMedia - Creative SEO HTML5 Template</title>

    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
   <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-digimedia-v1.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />



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

    </style>
</head>

<body>

<!-- *** Preloader Start *** -->
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
<!-- *** Preloader End *** -->

<!-- Pre-header Starts -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-7">
                <ul class="info">
                    <li><a href="#"><i class="fa fa-envelope"></i>digimedia@company.com</a></li>
                    <li><a href="#"><i class="fa fa-phone"></i>010-020-0340</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-sm-4 col-5">
                <ul class="social-media">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Pre-header End -->

<!-- *** Header Area Start *** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- *** Logo Start *** -->
                    <a href="index.html" class="logo">
                        <img src="{{asset('assets/images/logo-v1.png')}}" alt="">
                    </a>
                    <!-- *** Logo End *** -->
                    <!-- *** Menu Start *** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="#about">About</a></li>
                        <li class="scroll-to-section"><a href="#services">Services</a></li>
                        <li class="scroll-to-section"><a href="#portfolio">Projects</a>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                categories
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @foreach($categories as $category)
                                    <a href="{{ route('blog.categories', $category->id) }}">{{ $category->nom}}</a>
                            @endforeach
                                </div>
                            </li>







                        </li>
                        <li class="scroll-to-section"><a href="#blog">Blog</a></li>
                        <li class="scroll-to-section"><a href="#contact">Contact</a></li>











                        <li class="scroll-to-section">
                            <div class="border-first-button">

                        @guest
                                    @if (Route::has('login'))
                                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                            @auth
                                                <a href="{{ url('.') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                                            @else
                                                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                                @endif
                                            @endauth
                                        </div>
                                     @endif
                        @else
                            @if(Auth::user()->is_admin == 0)
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img src="{{asset('images/faces/face28.jpg')}}" alt="profile" class="me-2" style="width: 30px; height: 30px; border-radius: 50%;">
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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

                </nav>
            </div>
        </div>
    </div>
</header>
<br><br>
<br><br><br><body>

    <div class="card">
        <header class="card-header">
           <h2> <p class="card-header-title">Title : {{ $articl->title }}</p> </h2>
</header>
<div class="card">
    <div class="card-body">
         <p class="card-header-title"> Description : {{ $articl->description }}</p>
         <p class="card-header-title"> Category  : {{ $articl->category->nom }}</p>
        <div class="card-content">
            <div class="content">
                <hr>
                <p class="card-header-title"> Article content  : {{ $articl->contenu }} </p>
            </div>
        </div>
        <div class="card-content">
            <ul>
                @foreach($articl->tags as $tag)
                    <li>   {{$tag->nom}} </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
    </div>
    <footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright © 2022 DigiMedia Co., Ltd. All Rights Reserved.
                    <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
            </div>
        </div>
    </div>
</footer>


<!-- Scripts -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/owl-carousel.js')}}"></script>
<script src="{{asset('assets/js/animation.js')}}"></script>
<script src="{{asset('assets/js/imagesloaded.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>

</body>
</html>

