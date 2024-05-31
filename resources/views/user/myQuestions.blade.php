
@extends('user.header')
    <style>
        .card {
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0;
        }

        .card img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .card-content {
            padding: 0 20px 20px;
        }

        .card-description {
            color: #555;
            margin-bottom: 20px;
            text-align: center;
        }

        .card-buttons {
            display: flex;
            justify-content: center;
        }

        .button {
            padding: 10px 20px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            margin: 0 10px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .button-primary {
            background-color: #3498db;
            color: #fff;
        }

        .button-secondary {
            background-color: #ecf0f1;
            color: #333;
        }

        .button:hover {
            background-color: #2980b9;
        }
        .card-title2 {
    display: flex;
    justify-content: space-between;
}

.answer-count,
.view-count {
    margin-right: 10px; /* Adjust the margin as needed */
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
    background-color: #3498db;
    color: #fff;
}



.button-secondary {
    background-color: #ecf0f1;
    color: #333;
}

    </style>

@section('content');

<div class="filter-buttons">
@if(Session::has('success4'))
    <div class="alert alert-success">
        {{ Session::get('success4') }}
    </div>
@endif
@if(Session::has('success2'))
    <div class="alert alert-success">
        {{ Session::get('success2') }}
    </div>
@endif
@if(session('success5'))
    <div class="alert alert-success" role="alert">
        {{ session('success5') }}
    </div>
@endif
@if(session('success3'))
    <div class="alert alert-success" role="alert">
        {{ session('success3') }}
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if(Session::has('errorC'))
    <div class="alert alert-danger">
        {{ Session::get('errorC') }}
    </div>
@endif
        <a type="button" class="button" href="{{ route('allQuestions') }}">ALL</button>
        <a type ="button" class="button button-secondary" href="{{ route('filterByCreatedAt') }}">Newest</a>
        <a type ="button" class="button button-secondary" href="{{ route('filterByCount') }}">Frequent</a>
        <a type ="button" class="button button-secondary" href="{{ route('FilterQunanswered') }}">Unanswered</a>

    </div>
<div class="container">

    <div class="row">
        @foreach ($questions as $question)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-title">
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="User Image">
                        <span>{{ \App\Models\User::find($question->user_id)->name }}</span>
                    </div>
                    <div class="card-content">
                        <p class="card-description">{{ $question->title }}</p>
                        <div class="card-title2">
                            <span class="answer-count">{{ $question->answers->count() }} Answers</span>
                            <span class="view-count">{{ $question->count }} Views</span>
                        </div>
                        <br>
                        <div class="card-buttons">
                            <form action="{{ url('/AllAnswersByQ/' . $question->id) }}" method="get">
                                @csrf
                                <button class="button button-primary">View</button>
                            </form>
                            <form action="{{ url('/AnswerQ/' . $question->id) }}" method="get">
                                @csrf
                                <button class="button button-secondary">Answer</button>
                            </form>

                        </div>
                        <div class="card-buttons">
    @if(Auth::check() && Auth::user()->id == $question->user_id)
        <form action="{{ url('/edit-question/' . $question->id) }}" method="get">
            @csrf
            <button class="button button-secondary">Update</button>
        </form>
    @endif

    <!-- Delete Button -->
    @if(Auth::check() && Auth::user()->id == $question->user_id)
        <form action="{{ url('/delete-question/' . $question->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="button button-secondary" onclick="return confirm('Are you sure you want to delete this question?')">Delete</button>
        </form>
    @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                {{ $questions->links() }}
            </div>
        @endforeach
    </div>

</div>
@endsection





