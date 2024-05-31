@extends('admin.homeadmin')

@section('content')
<!--*********************************************************************************************-->

<div class="card" >
    <center>
        <div  style="width: 70%;height:10%; border:solid black 2px; margin-top:20px;padding:4px; margin-bottom:50px;border-radius: 25px;">
            <h4 class="card-title" style="margin: 20px;">Article's categories</h4>
<div  class="card-body">
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
@if(Session::has('success2'))
    <div class="alert alert-success">
        {{ Session::get('success2') }}
    </div>
@endif
@if(Session::has('success1'))
    <div class="alert alert-success">
        {{ Session::get('success1') }}
    </div>
@endif
    <div class="table-responsive">
      <table class="table" >
 
        <thead>
          <tr>
            <th>Titre</th>
            <th>POPULARITY</th>
            <th>NUMBERS</th>
            <th>UPDATE</th>
            <th>DELETE</th>
              <th>SHOW</th>
          </tr>
        </thead>
        <tbody >
            
            @foreach($categories as $category)
                <tr>
                    <td><strong>{{ $category->nom }}</strong></td>
                    <td>{{ round((($category->articls()->count())/$t)*100) }}%</td>
                    <td>{{$category->articls()->count()}}</td>
                    <!--<td><a class="button is-primary" href="{{ route('categories.show', $category->id) }}">show</a></td>-->
                    <td><a type="button" class="btn btn-outline-danger btn-rounded btn-fw"  href="{{ route('categories.edit', $category->id) }}"><strong> Update </strong></a></td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-dark btn-rounded btn-fw" type="submit">Remove </button>

                        </form>
                    </td>
                    <td><a type="button" class="btn btn-outline-primary btn-fw" href="{{ route('categories.show', $category->id) }}"> <strong>show</strong></a></td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
 <a   style="margin-bottom: 2%; margin-left:0px;" class="btn btn-primary"  href="{{ route('categories.create') }}">Add Category </a>

  </div>
</div>
    </center>
</div>
<div class="card" >
    <center>
        <div  style="width: 70%;height:10%; border:solid black 2px; margin-top:20px;padding:4px; margin-bottom:50px;border-radius: 25px;">
            <h4 class="card-title" style="margin: 20px;">Questions's categories</h4>
            <div class="card" >
                <div  class="card-body">

                    <div class="table-responsive">
                        <table class="table" >
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>POPULARITY</th>
                                <th>NUMBERS</th>
                                <th>UPDATE</th>
                                <th>DELETE</th>
                            </tr>
                            </thead>
                            <tbody >
                            @foreach($categories as $category)
                                <tr>
                                    <td><strong>{{ $category->nom }}</strong></td>
                                    <td>{{ round((($category->questions()->count())/$t)*100) }}%</td>
                                    <td>{{$category->questions()->count()}}</td>
                                    <!--<td><a class="button is-primary" href="{{ route('categories.show', $category->id) }}">show</a></td>-->
                                    <td><a type="button" class="btn btn-outline-danger btn-rounded btn-fw"  href="{{ route('categories.edit', $category->id) }}"><strong> Update </strong></a></td>
                                    <td>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-dark btn-rounded btn-fw" type="submit">Remove </button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a   style="margin-bottom: 2%; margin-left:0px;" class="btn btn-primary"  href="{{ route('categories.create') }}">Add Category </a>

                </div>
            </div>
    </center>
</div>

<div class="card" >
    <center>
        <div  style="width: 70%;height:10%; border:solid black 2px; margin-top:20px;padding:4px; margin-bottom:50px;border-radius: 25px;">
            <h4 class="card-title" style="margin: 20px;">Tip's categories</h4>
    <div class="card" >
    <div  class="card-body">

        <div class="table-responsive">
          <table class="table" >
            <thead>
              <tr>
                <th>Titre</th>
                <th>POPULARITY</th>
                <th>NUMBERS</th>
                <th>UPDATE</th>
                <th>DELETE</th>
              </tr>
            </thead>
            <tbody >
                @foreach($categories as $category)
                    <tr>
                        <td><strong>{{ $category->nom }}</strong></td>
                        <td>{{ round((($category->tips()->count())/$t)*100) }}%</td>
                        <td>{{$category->tips()->count()}}</td>
                        <!--<td><a class="button is-primary" href="{{ route('categories.show', $category->id) }}">show</a></td>-->
                        <td><a type="button" class="btn btn-outline-danger btn-rounded btn-fw"  href="{{ route('categories.edit', $category->id) }}"><strong> Update </strong></a></td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-dark btn-rounded btn-fw" type="submit">Remove </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <a   style="margin-bottom: 2%; margin-left:0px;" class="btn btn-primary"  href="{{ route('categories.create') }}">Add Category </a>

      </div>
    </div>
    </center>
</div>

  <footer class="card-footer is-centered">
    {{ $categories->links() }}
</footer>

<!--*********************************************************************************************-->


@endsection
