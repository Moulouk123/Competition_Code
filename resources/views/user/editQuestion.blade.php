

@extends('user.header')

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
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        div.star-rating {
            font-size: 20px;
            color: #ffcc00;
            margin-bottom: 12px;
        }

        div.star-rating input[type="radio"] {
            display: none;
        }

        div.star-rating label {
            display: inline-block;
            margin-right: 5px;
            cursor: pointer;
        }

        div.star-rating label:before {
            content: '\2605'; /* Unicode character for a star */
        }

        div.star-rating input[type="radio"]:checked + label:before {
            color: #ffcc00;
        }

.btn-primary{
    color: #fff;
    background-color: #2980b9;

    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
    text-align:center;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: green;
}


 </style>
@section('content')

    <div id="contact" class="contact-us section">
        <div class="container">

    <form action="{{ url('/update-question/' . $question->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h4 class="card-title  text-center">Edit Question</h4>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $question->title) }}" required>

        <label for="details">Details of the Problem:</label>
        <textarea id="details" name="details" rows="4" required>{{ old('details', $question->details) }}</textarea>
        <br>

        <label for="tried">What Have You Tried:</label>
        <textarea id="tried" name="tried" rows="4">{{ old('tried', $question->tried) }}</textarea>
        <br>

        <label for="expected">Expected Outcome:</label>
        <textarea id="expected" name="expected" rows="4">{{ old('expected', $question->expected) }}</textarea>
        <br>

        <label for="tags">Tags (comma-separated):</label>
        <input type="text" id="tags" name="tags" value="{{ implode(',', $question->tags()->pluck('nom')->toArray()) }}">
        <br>

        <div class="form-group">
            <label ><h4> select category </h4></label>
            <select class="form-control form-control-lg" name="selectedCategory" style="color:black">
                @foreach($categories as $category)
                    <option value="{{$category->id }}" data-select2-id="3">{{ $category->nom }}</option>
                @endforeach
            </select>


        </div>

        <label for="file_path">File (PDF, DOC, DOCX):</label>
        <input type="file" id="file_path" name="file_path">
        <br>

        <button type="submit" class="btn btn-primary mr-2">Edit</button>
    </form>
        </div>
    </div>

@endsection
<script>
    function clearForm() {
        document.getElementById('questionForm').reset();
    }
</script>


