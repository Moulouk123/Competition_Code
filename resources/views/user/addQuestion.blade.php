@extends('user.header')

<style>
    /* Add your styles here */


    .card {
        margin: 20px auto;
        max-width: 600px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .card-title {
        color: #333;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .card-description {
        color: #555;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-check {
        margin-bottom: 20px;
    }

    .form-check-label {
        color: #555;
    }

    .btn-primary {
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #2980b9;
    }

    .btn-light {
        background-color: #ecf0f1;
        color: #333;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-light:hover {
        background-color: #d0d3d4;
    }


    /* Your existing styles for body, header, etc. remain unchanged */

    .custom-form {
        margin: 20px auto;
        max-width: 600px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .custom-form .card-title {
        color: #333;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .custom-form .card-description {
        color: #555;
        margin-bottom: 20px;
    }

    .custom-form .form-group {
        margin-bottom: 20px;
    }

    .custom-form .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .custom-form .form-check {
        margin-bottom: 20px;
    }

    .custom-form .form-check-label {
        color: #555;
    }

    .custom-form .btn-primary {
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .custom-form .btn-primary:hover {
        background-color: #2980b9;
    }

    .custom-form .btn-light {
        background-color: #ecf0f1;
        color: #333;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .custom-form .btn-light:hover {
        background-color: #d0d3d4;
    }

</style>
@section('content')
    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="card">
                <div>
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="profile" class="me-2" style="width: 30px; height: 30px; border-radius: 50%;">
                    {{ Auth::user()->name }}


                </div>
                <div class="card-body">
                    <h4 class="card-title  text-center">Ask a Question</h4>
                    <p class="card-description">
                        You’re ready to ask a programming-related question, and this form will help guide you through the process.
                    </p>
                    <form id="questionForm" class="forms-sample" action="{{ url('/add_Question/' . Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">

                            <label for="title">Title:</label>
                            <input type="text" id="title" class="form-control" name="title" required>
                            <br></div>
                        <div class="form-group">
                            <label for="details">Details of the Problem:</label>
                            <textarea id="details" name="details" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tried">What Have You Tried:</label>
                            <textarea id="tried" name="tried" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="expected">Expected Outcome:</label>
                            <textarea id="expected" name="expected" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags (#-separated):</label>
                            <input type="text" class="form-control" name="tags"  placeholder="#tag ">
                        </div>


                        <div class="form-group">
                            <label>File upload (PDF, DOC, DOCX):</label>
                            <div class="input-group col-xs-12">
                                <input type="file" id="file_path" name="file_path" class="form-control file-upload-info" placeholder="Upload File">

                            </div>
                        </div>
                        <div class="form-group">
                            <label > Select category </label>
                            <select class="form-control form-control-lg" name="selectedCategory" >
                                <option value="">--Choose category--</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id }}" data-select2-id="3">{{ $category->nom }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="button-container">
                            <button type="submit" class="">Submit</button>
                            <button type="button" class="btn btn-light" onclick="clearForm()">Cancel</button>
                            <a href="{{ url('allQuestions') }}" class="btn btn-success">All Questions</a>
                        </div>
                    </form>
                    @if(session('deleteAlert'))
                        <script>
                            setTimeout(function(){
                                alert('Question removed due to inappropriate content.');
                            }, 5000);
                        </script>
                    @endif


                </div>
            </div>


        </div>
    </div>


    <!-- Scripts -->
@endsection
<script>
    function clearForm() {
        document.getElementById('questionForm').reset();
    }
</script>
