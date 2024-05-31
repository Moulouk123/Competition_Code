@extends('admin.homeadmin')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
<style>
    .tags{
        margin-bottom:20px;
        margin-left:40px;
        margin-right:20px;
        width:175px ;
        border-radius: 25px;
        font-size:smaller;
        background-color: #9747FF; /* Couleur de fond */
        color: #FFFFFF; /* Couleur du texte */
        padding: 5px 10px; /* Ajoute de l'espace à l'intérieur du bouton */
        border: none; /* Supprime la bordure */
        box-shadow: #ccc ;

    }
button.selected {
    background-color: #090663;/* Couleur de fond de votre choix */
    color: white; /* Couleur du texte de votre choix */
    /* Autres styles CSS que vous souhaitez appliquer */
}
</style>
@section('content')
@if(session('success'))
                <div id="successAlert" class="alert alert-success">
                    {{ session('success') }}
                </div>
               
                @endif
                @if(Session::has('success2'))
    <div class="alert alert-success">
        {{ Session::get('success2') }}
    </div>
@endif
@if(Session::has('info'))
    <div class="alert alert-success">
        {{ Session::get('info') }}
    </div>
@endif
    <div  class="card" >
        <div style="width: 100%;height:40%; margin-left: 10px; margin-top:20px;padding:4px; margin-bottom:50px;border-radius: 25px;">
            <h4 class="card-title" style="text-align: center; margin-top: 20px;">Articles</h4>
            <div class="card-body">
<h4 style="margin-bottom: 10px;"> Categories  </h4>
<div class="btn-group" role="group">

    @foreach($categories as $category)
         <button type="button" class="tags {{ $category->id == $selectedCategoryId ? 'selected' : '' }}" onclick="window.location.href = '{{ route('articls.category', ['category' => $category->id]) }}'">{{ $category->nom }}</button>
    @endforeach
</div>
                <a class="btn btn-primary mt-3 mb-2 float-end" href="{{ route('articls.create') }}">Create article</a>

                <div class="card">
<div class="card-body">


<div class="form-group" data-select2-id="17">


      </div>
<div style="margin-top: -10px;" class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-borderless">
          <thead>
            <tr>
              <th>Article name </th>
              <th>Likes </th>
              <th>Publication date </th>
              <th>Update</th>
              <th>Remove</th>
                <th>Show</th>
            </tr>
          </thead>
            <tbody>
                @foreach($articls as $articl)
                    <tr>
                        <td><strong>{{ $articl->title }}</strong></td>
                        @php
                        $totalLikes = \App\Models\Like::where('articl_id', $articl->id)->sum('liked');
                        @endphp
                        <td><strong>{{ $totalLikes}}</strong></td>
                        <td><strong>{{ $articl->created_at }}</strong></td>
                        <td><a type="button" class="btn btn-outline-danger btn-rounded btn-fw" href="{{ route('articls.edit', $articl->id) }}"><strong> Update </strong></a></td>
                        <td>
                            <form action="{{ route('articls.destroy', $articl->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-dark btn-rounded btn-fw" type="submit"><strong> Remove </strong></button>
                            </form>
                        </td>
                        <td><a type="button" class="btn btn-outline-primary btn-fw" href="{{ route('articls.show', $articl->id) }}"><strong>SHOW</strong></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <footer class="card-footer is-centered">
        {{ $articls->links() }}
    </footer>
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
                    buttons.forEach(function(btn) {
                        btn.classList.remove('active');
                    });

                    // Ajoutez la classe 'active' au bouton cliqué
                    button.classList.add('active');
                }
            </script>

