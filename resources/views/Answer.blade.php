
<!-- Add this CSS style block to your existing styles -->

<style>
    .delete-button {
        background-color: #ff6666;
        color: #fff;
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
        transition: background-color 0.3s;
    }

    .delete-button:hover {
        background-color: #ff4d4d;
    }

    /* Existing styles... */

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

    h3 {
        color: #333;
        margin-bottom: 10px;
    }

    .answer-container {
        position: relative;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .answer-container::before {
        content: '';
        position: absolute;
        border-style: solid;
        border-width: 10px 10px 10px 0;
        border-color: transparent #fff transparent transparent;
        top: 15px;
        left: -10px;
    }

    #content {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        box-sizing: border-box;
        border: 1px solid #ddd;
        border-radius: 8px;
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
</style>

<!-- Your existing HTML code for displaying answers and adding new answers... -->



<h2>Answers</h2>
@foreach($question->answers as $answer)
    <div class="answer-container">
        <p>{{ $answer->content }}</p>
        @if ($answer->file_path)
                        <a href="{{ url('/download-filee/' . $answer->id) }}">View File</a>
                    @else
                        No Files
                    @endif
        <form action="{{ url('/delete-answer/' . $answer->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">Delete Answer</button>
        </form>
    </div>
@endforeach

<h3>Add an Answer</h3>

<form action="{{ url('/add-answer/' . $question->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="content">Your Answer:</label>
    <textarea id="content" name="content" rows="4" required></textarea>
    <br>

<label for="file_path">Attach File (PDF, DOC, DOCX):</label>
<input type="file" id="file_path" name="file_path">
<br>
    <input type="submit" value="Submit Answer">
</form>

