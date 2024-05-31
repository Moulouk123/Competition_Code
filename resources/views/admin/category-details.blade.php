@extends('admin.homeadmin')

@section('content')
<style>
    /* styles.css */

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .details-container {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
        text-align: center;
    }

    .details {
        margin-bottom: 20px;
    }

    .details p {
        margin: 0;
        line-height: 1.6;
        color: #555;
    }

    .actions {
        display: flex;
        justify-content: space-between;
    }

    .actions button {
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
    }

    .actions button:hover {
        background-color: #45a049;
    }
</style>


<div class="card" >
    <center>
        <div  style="width: 70%;height:10%; margin-top:20px;padding:4px ;border-radius: 25px;">
            <div class="form-container">
                <h2 id="form-title">Categories details</h2>

    <div class="details">
        <p><strong>Category Name </strong> {{ $category->name }}</p>


    <div class="actions">


                <form action="{{ url('/categories/edit', $category->id) }}" method="get">
                    @csrf
                    <button type="submit">Update</button>
                </form>

                <form action="{{ url('/categories', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                <form action="{{ url('/AllPoliciesByCat', $category->id) }}" method="get">
                    @csrf
                    <button type="submit">Policies Details</button>
                </form>
            </div>
</div>
            </div>
        </div>
    </center>
</div>



@endsection
