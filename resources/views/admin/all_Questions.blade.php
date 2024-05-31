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
    background-color:  #9747FF;
;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
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
.filter-buttons {
    width: 90%;
    display: flex;
    justify-content: flex-end; /* Change this line to align to the right */
    align-items: flex-start;
}

.button {
    margin-bottom: 10px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #9747FF;
;
    color: #fff;
}



.button-secondary {
    background-color: #ecf0f1;
    color: #333;
}

    </style>
   
<div class="card" >
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
    <center>

        @php
            $all = app('App\Http\Controllers\questionController')->all();
        @endphp
        <div  style="width: 70%;height:10%; border:solid black 2px; margin-top:20px;padding:4px ;border-radius: 25px;">
<h3 style="margin-top: 10px;" style="margin-bottom: 5%"> {{$all}}  Questions </h3>
<div class="filter-buttons">
<a type="button" class="button " href="{{ route('all_QuestionsA') }}">ALL</a>
        <a type ="button" class="button button-secondary" href="{{ route('filterByCreatedAtA') }}">Newest</a>
        <a type ="button" class="button button-secondary" href="{{ route('filterByCountA') }}">Frequent</a>
        <a type ="button" class="button button-secondary" href="{{ route('filterQunansweredA') }}">Unanswered</a>
</div>


<div  class="card-body">

    <div class="table-responsive">
      <table class="table" >
        <thead>
          <tr>
            <th>Question Creator</th>
            <th>Question's Category</th>
            <th>Intereset Rate</th>

            <th>Remove</th>
          </tr>
        </thead>
        <tbody >
        @foreach($questions as $question)
            <tr>
            <td>{{ $question->user->name }}</td>
                <td>{{ $question->title }}</td>
                <td>{{ app('App\Http\Controllers\QuestionController')->calculateInterestRate($question->id) }} %</td>
                               <td>
                    <form action="{{ url('/delete-question/' . $question->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-dark btn-rounded btn-fw" type="submit">Remove </button>
                    </form>

                </td>
            </tr>
        @endforeach

        </tbody>

      </table>
        <div>
            {{ $questions->links() }}
        </div>
    </div>

  </div>
</div>

</center>
<br><br>


<div class="question-list">
    @foreach($badwords as $badWord)
        <div class="bad-word-item">
            <form action="{{ url('/delete-bad-word/' . $badWord->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="remove-button" type="submit">{{ $badWord->word }} <span class="remove-symbol">X</span></button>
            </form>
        </div>
    @endforeach
</div>
<div class="form-container">
    <h2>Add Bad Word</h2>

    <form action="{{ url('/add-bad-word') }}" method="post">
        @csrf
        <label for="word">Bad Word:</label>
        <input type="text" id="word" name="word" required>
        <button type="submit">Add Bad Word</button>
    </form>
</div>

@endsection
