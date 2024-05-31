@extends('admin.homeadmin')

@section('content')
<style>

/* Add your styles here */

.form-container {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.form-container h2 {
    text-align: center;
    color: #333;
}

.form-container form {
    margin-top: 20px;
}

.form-container label {
    display: block;
    margin-bottom: 10px;
    color: #555;
}

.form-container input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 15px;
}

.form-container button {
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-container button:hover {
    background-color: #2980b9;
}



.question-list {
        max-width: 600px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
    }

    .bad-word-item {
        margin-bottom: 10px;
    }

    .remove-button {
        background-color: #e74c3c;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 5px 10px;
        cursor: pointer;
        margin-right: 10px; /* Add margin between remove buttons */
        margin-bottom: 10px;
    }

    .remove-symbol {
        margin-left: 5px;
    }

    .remove-button:hover {
        background-color: #c0392b;
    }

    </style>

<center>

<div class="card" >

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

@if(Session::has('successcc'))
    <div class="alert alert-success">
        {{ Session::get('successcc') }}
    </div>
@endif




    <div class="table-responsive">
      <table class="table" >
        <thead>
          <tr>
            <th>Comment Creator</th>
            <th>Article's Category</th>
<th>Interset'rate</th>
                    <th>Remove</th>
          </tr>
        </thead>
        <tbody >
        @foreach($comments as $comment)
            <tr>
            <td>{{ $comment->user->name }}</td>
                <td>{{ $comment ->contenu }}</td>
<td>{{ $comment ->rate }}</td>

<td>
                    <form action="{{ url('/delete-comment/' . $comment->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger btn-fw" type="submit">DELETE </button>
                    </form>

                </td>
            </tr>
        @endforeach

        </tbody>
      </table>

    </div>

  </div>
</div>
</center>
<br><br>


<div class="question-list">
    @foreach($badwords as $badWord)
        <div class="bad-word-item">
            <form action="{{ url('/delete-bad-wordcomment/' . $badWord->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="remove-button" type="submit">{{ $badWord->word }} <span class="remove-symbol">X</span></button>
            </form>
        </div>
    @endforeach
</div>
<div class="form-container">
    <h2>Add Bad Word</h2>

    <form action="{{ url('/add-bad-wordcomment') }}" method="post">
        @csrf
        <label for="word">Bad Word:</label>
        <input type="text" id="word" name="word" required>
        <button type="submit">Add Bad Word</button>
    </form>
</div>

@endsection
