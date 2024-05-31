<!-- question-details.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .details {
            margin-bottom: 20px;
        }

        .answer-button {
            background-color: #4caf50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
        }

        .answer-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Question Details</h2>

        <div class="details">
            <strong>Title:</strong> {{ $question->title }}
        </div>
        <div class="details">
            <strong>Details:</strong> {{ $question->details }}
        </div>
        <div class="details">
            <strong>Tried:</strong> {{ $question->tried }}
        </div>
        <div class="details">
            <strong>Expected:</strong> {{ $question->expected }}
        </div>
        <div class="details">
            <strong>Tags:</strong> {{ $question->tags }}
        </div>
        <div class="details">
            <strong>Rate:</strong> {{ $question->rate }}
        </div>

       
            <div class="details">
                <strong>File:</strong>
                @if ($question->file_path)
                        <a href="{{ url('/download-file/' . $question->id) }}">View File</a>
                    @else
                        No Files
                    @endif            </div>
      

        <a href="{{ url('all_Questions') }}" class="answer-button">All Question</a>

        <a href="{{ url('/show_all_Answers/' . $question->id) }}" class="answer-button">Answer this Question</a>

    </div>
</body>
</html>
