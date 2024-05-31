<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .star-rating {
            font-size: 20px;
            color: #ffcc00;
        }
         form {
            display: inline-block; 
        }

        button {
            background-color: #f44336; 
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #d32f2f; /* Darker red on hover */
        }
    </style>
</head>
<body>
    <h2>Question Table</h2>
    
    <!-- Your existing HTML code... -->

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Details</th>
            <th>Tried</th>
            <th>Expected</th>
            <th>Tags</th>
            <th>File</th> <!-- New column for file -->
            <th>Action</th> <!-- New column for delete button -->
        </tr>
    </thead>
    <tbody>
        @foreach($questions as $question)
            <tr>
                <td>{{ $question->title }}</td>
                <td>{{ $question->details }}</td>
                <td>{{ $question->tried }}</td>
                <td>{{ $question->expected }}</td>
                <td>{{ $question->tags }}</td>
                <td>
                    
                </td>
                <td>
                    @if ($question->file_path)
                        <a href="{{ url('/download-file/' . $question->id) }}">View File</a>
                    @else
                        No Files
                    @endif
                </td>
                <td>
                    <form action="{{ url('/delete-question/' . $question->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <form action="{{ url('/get-details-question/' . $question->id) }}" method="get">
                        @csrf
                        <button type="submit">Details</button>
                    </form>
                    <form action="{{ url('/show_all_Answers/' . $question->id) }}" method="get">
                        @csrf
                        <button type="submit">Answer</button>
                    </form>
                    <form action="{{ url('/edit-question/' . $question->id) }}" method="get">
                        @csrf
                        <button type="submit">Edit</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Your existing HTML code... -->

</body>
</html>
