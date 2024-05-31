@extends('admin.homeadmin')
@section('content')
    <div class="card">
        <header class="card-header">
           <h1> <p class="card-header-title"> TITLE : {{ $category->nom }}</p> </h1>
          </header>
         <p class="card-header-title"> description : {{ $category->description }}</p>

        <div class="card-content">
            <div class="content">
                    <table class="table is-hoverable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titre</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articls as $articl)
                                <tr>
                                    <td>{{ $articl->id }}</td>
                                    <td><strong>{{ $articl->title }}</strong></td>
                                    <td> {{$articl->category->nom}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
@endsection
