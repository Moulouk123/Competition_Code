@extends('admin.homeadmin')
@section('content')
<style>
    .file-upload-btn {
        position: absolute;
        bottom: 0;
        right: 0; /* Vous pouvez ajuster cette valeur pour contrôler l'emplacement du bouton */
        border-radius: 50%; /* Pour rendre le bouton rond */
        background-color: #9747FF; /* Couleur de fond */
        color: white; /* Couleur du texte */
        border: none; /* Supprimer la bordure */
        cursor: pointer; /* Curseur pointeur */
        width: 26px; /* Largeur du bouton */
        height: 26px; /* Hauteur du bouton */
        text-align: center; /* Alignement du texte au centre */
        line-height: 26px; /* Hauteur de ligne pour centrer verticalement le texte */
    }


</style>
<div id="contact" class="contact-us section">
    <div class="container">
        <div class="card border-0">
            <div class="card-body text-center">
                <form class="forms-sample" method="POST" action="{{ route('admin.update',$user->id )}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div style="position: relative; display: inline-block;">
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="profile" class="me-2" style="width: 100px; height: 95px; border-radius: 50%;">

                        <!-- Bouton de téléchargement de fichier avec icône -->
                        <label for="photoInput" class="file-upload-btn">
                            <i class="fa fa-edit"></i>
                        </label>
                        <input type="file" id="photoInput" name="photo" onchange="document.getElementById('uploadBtn').click()" style="display: none;">
                    </div>

                    <div class="form-group" style="border-bottom: 1px solid #ddd;">
                        <input type="text" class="form-control" id="exampleInputUsername1" name="name" value="{{ $user->name }}" placeholder="Name" style="border: none; outline: none; background: transparent; margin: 20px 0;">
                    </div>
                    <div class="form-group" style="border-bottom: 1px solid #ddd;">
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $user->email }}" placeholder="Email" style="border: none; outline: none; background: transparent; margin: 20px 0;">
                    </div>
                    <div class="form-group" style="border-bottom: 1px solid #ddd;">
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" style="border: none; outline: none; background: transparent; margin: 20px 0;">
                    </div>

                    <div class="buttons" style="float: right; margin-top: 20px;">
                        <button type="button" onclick="window.location.href='{{ route('admin.homeadmin') }}'" style="background-color: #F8F8FF; color: #9747FF;border: none;padding: 10px 20px;font-size: 16px;border-radius: 5px;cursor: pointer;transition: 0.3s;"><i class="fa fa-home"></i> Back to Home</button>
                        <button type="submit" style="background-color: #9747FF; color: white;border: none;padding: 10px 20px;font-size: 16px;border-radius: 5px;cursor: pointer;transition: 0.3s;"><i class="fa fa-save"></i> Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection




