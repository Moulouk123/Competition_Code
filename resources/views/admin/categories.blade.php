@extends('admin.homeadmin')

@section('content')

    <style>
        body {
            font-family: Arial, sans-serif;
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

        form label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            background-color: #007bff; /* Blue color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 12px; /* Adjusted margin for space */
            display: inline-block; /* Make the button an inline block element */
            margin-right: 10px; /* Add some space between buttons */
        }

        form button.details {
            background-color: #28a745; /* Green color for Details button */
        }

        form button.update {
            background-color: #ffc107; /* Yellow color for Update button */
        }

        form button.delete {
            background-color: #dc3545; /* Red color for Delete button */
        }



        th, td {
            padding: 15px; /* Increased padding for better spacing */
            text-align: left;
        }



        td {
            border-bottom: 1px solid #ddd;
        }

        .button-icon {
            margin-right: 5px;
        }

        /* Adjusted styles for buttons in table cells */
        td form {
            display: flex;
            align-items: center;
        }

        td form button {
            margin-right: 10px;
            margin-bottom: 10px; /* Add space between buttons */
        }
    </style>


<div class="card" >
    <center>
        <div  style="width: 70%;height:10%; margin-top:20px;padding:4px ;border-radius: 25px;">
            <div class="form-container">
                <h2 id="form-title">Categories Policies Management</h2>

<form action="{{ url('/categories/add') }}" method="post">
    @csrf
    <label for="name">New Category Name </label>
    <input type="text" id="name" name="name" required>
    <button style="background-color: #9747FF;" type="submit">Create Category</button>
</form>
@if(request()->session()->has('success'))
    <div class="alert alert-success">
        {{ request()->session()->get('success') }}
    </div>
@endif

@if(request()->session()->has('error'))
    <div class="alert alert-danger">
        {{ request()->session()->get('error') }}
    </div>
@endif

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
        <tr>
            <th>Category Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>
                <form action="{{ url('/AllPoliciesByCat', $category->id) }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-outline-info "><i class="fas fa-eye button-icon"></i>Details</button>
                </form>
                <form action="{{ url('/categories/edit', $category->id) }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger "><i class="fas fa-edit button-icon"></i>Update</button>
                </form>



                <form action="{{ url('/categories/delete', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" class="btn btn-outline-dark "><i class="fas fa-trash-alt button-icon"></i>Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        </div>
    </center>
</div>





@endsection

