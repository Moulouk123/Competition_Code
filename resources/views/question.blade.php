<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask a Question</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #add8e6; 
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        form {
            max-width: 600px;
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
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="file"] {
            margin-bottom: 12px;
        }
        input[type="checkbox"] {
            margin-bottom: 12px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="radio"] {
            display: none; 
        }

        input[type="radio"]:checked ~ label {
            color: #ffcc00; 
        }

        label[for="rate"] {
            display: inline-block; 
            margin-bottom: 8px; 
            color: #555;
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
        }

        .answer-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Writing a good question</h2>
        <p>You’re ready to ask a programming-related question, and this form will help guide you through the process.</p>
        <p>Looking to ask a non-programming question? See the topics here to find a relevant site.</p>
        <p><strong>Steps</strong></p>
        <ol>
            <li>Summarize your problem in a one-line title.</li>
            <li>Describe your problem in more detail.</li>
            <li>Describe what you tried and what you expected to happen.</li>
            <li>Add “tags” which help surface your question to members of the community.</li>
            <li>Review your question and post it to the site.</li>
        </ol>
    </div>
    <h2>Ask a Question</h2>
    
    <form action="{{ url('/add_Question') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br>

        <label for="details">Details of the Problem:</label>
        <textarea id="details" name="details" rows="4" required></textarea>
        <br>

        <label for="tried">What Have You Tried:</label>
        <textarea id="tried" name="tried" rows="4"></textarea>
        <br>

        <label for="expected">Expected Outcome:</label>
        <textarea id="expected" name="expected" rows="4"></textarea>
        <br>

        <label for="tags">Tags (comma-separated):</label>
        <input type="text" id="tags" name="tags">
        <br>

      
        <br>

        <label for="file_path">Attach File (PDF, DOC, DOCX):</label>
        <input type="file" id="file_path" name="file_path">
        <br>

        <input type="submit" value="Submit Question">
    </form>
    @if(session('deleteAlert'))
    <script>
        setTimeout(function(){
            alert('Question removed due to inappropriate content.');
        }, 5000);
    </script>
@endif

    <a href="{{ url('all_Questions') }}" class="answer-button">All Question</a>

</body>
</html>
