
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bad Word</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>/* styles.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.form-container {
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

form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #555;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 12px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}
.bad-word-list {
            margin-top: 20px;
        }

        .bad-word-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px;
            border: 1px solid #ddd;
            margin-bottom: 8px;
            border-radius: 4px;
        }

        .delete-button {
            background-color: #f44336;
            color: #fff;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Add Bad Word</h2>

    <form action="{{ url('/add-bad-word') }}" method="post">
        @csrf
        <label for="word">Bad Word:</label>
        <input type="text" id="word" name="word" required>
        <button type="submit">Add Bad Word</button>
    </form>
</div>

<div class="bad-word-list">
    <h2>Bad Words List</h2>

    @foreach($badWords as $badWord)
        <div class="bad-word-item">
            <span>{{ $badWord->word }}</span>
            <form action="{{ url('/delete-bad-word/' . $badWord->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">Delete</button>
            </form>
        </div>
    @endforeach
</div>


</body>
</html>