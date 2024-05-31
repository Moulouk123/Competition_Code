<!DOCTYPE html>
<html lang="en">
<head>     <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">

    </head>
<h1 class="text-primary" style="margin-bottom: 5% ;margin-top:10%;margin-left:5%"><strong>ARTICLES</strong></h1>
<div class="card_container">

    @foreach($articls as $articl)
            <div class='card'>
                <img src="{{asset('assets/images/img.jpg')}}" >
                <div class="card_content">
                    <table>
                    <tr><td>
                    <h4>Posted {{ $articl->created_at }}</h4>
                    <h3>{{ $articl->title }}</h3>
                    <p>  {{ $articl->description }} </p>
                    <strong style="color: rgb(58, 9, 58)"> {{ $articl->category->nom }}</strong> <br>
                    </td></tr>
                    <tr><td>
                    <a class="btn" href="{{ route('articls.show', $articl->id) }}">READ MORE</a></td></tr>
                    </table>
                </div>
            </div>
    @endforeach

</div>
<div class="row">
    {{ $articls->links() }}
  </div>
</html>
