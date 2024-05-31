@extends('admin.homeadmin')

@section('content')


    <title>Update Policy</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
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

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>


    <div class="card" >
        <center>
            <div  style="width: 70%;height:10%; margin-top:20px;padding:4px ;border-radius: 25px;">
                <div class="form-container">
                    <h2 id="form-title">Update Policy</h2>

<form action="{{ url('/policies/update', $policy->id) }}" method="post">
    @csrf
    @method('PUT')

    <label for="content">Policy Content:</label>
    <input type="text" id="content" name="content" value="{{ $policy->content }}" required>

    <label for="category_id">Category:</label>
    <select id="category_id" name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $policy->category_id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <button style="background-color: #9747FF;" type="submit">Update</button>
</form>
                </div>
            </div>
        </center>
    </div>

@endsection
