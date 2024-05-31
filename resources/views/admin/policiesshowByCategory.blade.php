@extends('admin.homeadmin')

@section('content')

    <title>Policies List</title>
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
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Styles for list items */
        .policy-list {
            list-style: none;
            padding: 0;
            margin: 20px auto;
            max-width: 400px;
        }

        .policy-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }



    </style>


    <div class="card" >
        <center>
            <div  style="width: 70%;height:10%; margin-top:20px;padding:4px ;border-radius: 25px;">
                <div class="form-container">
                    <h2 id="form-title">Add Policy</h2>

<form action="{{ url('/policies/addByCat', $category) }}" method="post">
    @csrf
    @method('POST')
    <label for="content">New Policy Name:</label>
    <input type="text" id="content" name="content" required>
    <button style="background-color: #9747FF;" type="submit">Create Policy</button>
</form>

<!-- List of policies -->
<ul class="policy-list">
    @forelse($policies as $policy)
        <li class="policy-item">
            {{ $policy->content }}
            <form action="{{ url('/policies/delete', $policy->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-dark btn-rounded btn-fw" type="submit">Delete</button>
            </form>
            <form action="{{ url('/policies/edit', $policy->id) }}" method="get">
                <button class="btn btn-outline-danger btn-rounded btn-fw" type="submit " >Update</button>
            </form>
        </li>
    @empty
        <p>No policies available under this category.</p>
    @endforelse
</ul>

                </div>
            </div>
        </center>
    </div>

@endsection
