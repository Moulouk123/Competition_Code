@extends('admin.homeadmin')

@section('content')

    <style>
        body {
            font-family: Arial, sans-serif;

            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .delete-button {
            background-color: #f44336;
            color: #fff;
        }

        .delete-button:hover {
            background-color: #d32f2f;
        }
    </style>


    <div class="card-group" >
        <center>
            <div  style="width: 70%;height:10%; margin-top:20px;padding:4px ;border-radius: 25px;">
                <div class="form-container">
                    <h2 id="form-title">Update Policy</h2>
<form action="{{ url('/categories/update', $category->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="name">Category Policy Name</label>
    <input type="text" id="name" name="name" value="{{ $category->name }}" required>
    <button class="btn btn-outline-danger btn-rounded btn-fw" type="submit">Update </button>
</form>

<form action="{{ url('/categories/delete', $category->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button class="btn btn-outline-dark btn-rounded btn-fw" type="submit" >Delete </button>
</form>
            </div>
        </div>
    </center>
</div>

@endsection
