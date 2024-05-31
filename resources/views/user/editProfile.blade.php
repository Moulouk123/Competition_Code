@extends('user.header')
@section('content')

    <style>
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
            margin-bottom:-20px;
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

    </style>
    <!--

    TemplateMo 568 DigiMedia

    https://templatemo.com/tm-568-digimedia

    -->





<div id="contact" class="contact-us section">
    <div class="container">
        <div class="card border-0">
            <div class="card-body text-center">
                <form class="forms-sample" method="POST" action="{{ route('updateProfil')}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div style="position: relative; display: inline-block;">
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="profile" class="me-2" style="width: 100px; height: 95px; border-radius: 50%;">
                        <input type="file" id="photoInput" name="photo" style="display: none;" onchange="document.getElementById('uploadBtn').click()">
                        <label for="photoInput" style="position: absolute; bottom: 0; margin-left: -30px; border-radius: 10px; background-color: #9747FF; color:white; border-color:#9747FF; cursor: pointer; width:26px;">
                            <i class="fa fa-edit"></i>
                        </label>
                    </div>
                    <div class="form-group" style="border-bottom: 1px solid #ddd;">
                        <input type="text" class="form-control" id="exampleInputUsername1" name="name" value="{{ Auth::user()->name }}" placeholder="Name" style="border: none; outline: none; background: transparent; margin: 20px 0;">
                    </div>
                    <div class="form-group" style="border-bottom: 1px solid #ddd;">
                        <input type="email" class="form-control" id="exampleInputUsername1" name="email" value="{{ Auth::user()->email }}" placeholder="Email" style="border: none; outline: none; background: transparent; margin: 20px 0;">
                    </div>
                    <div class="form-group" style="border-bottom: 1px solid #ddd;">
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" style="border: none; outline: none; background: transparent; margin: 20px 0;">
                    </div>
                    <div class="form-group" style="border-bottom: 1px solid #ddd;">
                        <input type="text" class="form-control" id="exampleInputUsername1" name="job" value="{{ Auth::user()->job }}" placeholder="job" style="border: none; outline: none; background: transparent; margin: 20px 0;">
                    </div>
                    <div class="form-group" style="border-bottom: 1px solid #ddd;">
                        <input type="text" class="form-control" id="exampleInputUsername1" name="ecole" value="{{ Auth::user()->ecole }}" placeholder="ecole" style="border: none; outline: none; background: transparent; margin: 20px 0;">
                    </div>
                    <div class="form-group" style="border-bottom: 1px solid #ddd;">
                        <input type="text" class="form-control" id="exampleInputUsername1" name="activity" value="{{ Auth::user()->activity }}" placeholder="activity" style="border: none; outline: none; background: transparent; margin: 20px 0;">
                    </div>
                    <div class="form-group" style="border-bottom: 1px solid #ddd;">
                        <input type="text" class="form-control" id="exampleInputUsername1" name="adresse" value="{{ Auth::user()->adresse }}" placeholder="adresse" style="border: none; outline: none; background: transparent; margin: 20px 0;">
                    </div>
                    <div class="buttons" style="float: right; margin-top: 20px;">
                        <button type="button" onclick="window.location.href='{{ route('user.homeuser') }}'" style="background-color: #F8F8FF; color: #9747FF;border: none;padding: 10px 20px;font-size: 16px;border-radius: 5px;cursor: pointer;transition: 0.3s;"><i class="fa fa-home"></i> Back to Home</button>
                        <button type="submit" style="background-color: #9747FF; color: white;border: none;padding: 10px 20px;font-size: 16px;border-radius: 5px;cursor: pointer;transition: 0.3s;"><i class="fa fa-save"></i> Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection








