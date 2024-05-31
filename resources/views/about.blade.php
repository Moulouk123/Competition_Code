

@extends('user.header')
@section('content')
<div id="contact" class="contact-us section">
    <div class="container">
        <h1 style="text-align: center;">Empowering the world to develop technology <br> through collective knowledge.</h1>
        <p style="text-align: center;">Our products and tools enable people to ask, share and <br>learn at work or at home.</p>
        <h2>Our mission</h2>
        @foreach($missions as $mission)
            <ul>
                <li>{{$mission->mission}}</li>
            </ul>
        @endforeach
        <h2 id="h222">What sets us apart</h2>
        <ul>
            @foreach($setups as $set)
                <li>{{$set->title}} <span style="color:black; font-weight: normal;">{{$set->description}}</span></li>
            @endforeach
        </ul>

        <h2 id="h222">Nos valeurs</h2>
        <div class="row">
            @foreach($values as $val)
                <div style="margin-top: 20px;" class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <div class="down-content text-center">
                                <h4>{{$val->title}}</h4>
                                <span>{{$val->description}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

@endsection







