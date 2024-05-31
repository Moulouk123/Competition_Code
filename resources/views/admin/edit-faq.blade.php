@extends('admin.homeadmin')

@section('content')

    <style>
        body {
            font-family: 'Arial', sans-serif;
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
            padding: 10px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .delete-btn {
            background-color: #dc3545;
            margin-right: 10px; /* Adjust margin to create space between buttons */
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
    <div class="card" >
        <center>
            <div  style="width: 70%;height:10%;  margin-top:20px;padding:4px ;border-radius: 25px;">
                <h3>FAQs Management</h3>



<form action="{{ url('/faqs/update', $faq->id) }}" method="post">
    @csrf
    @method('PATCH')

    <label for="question">Question</label>
    <input type="text" id="question" name="question" value="{{ $faq->question }}" required>

    <label for="details">Answers</label>
    <textarea id="details" name="details" required>{{ $faq->details }}</textarea>

    <!-- Add any additional fields you want to edit -->

    <button type="submit" class="btn btn-outline-danger btn-rounded btn-fw">Update FAQ</button>
    <button type="button" class="btn btn-outline-dark btn-rounded btn-fw" onclick="deleteFAQ({{ $faq->id }})">Delete FAQ</button>
</form>
            </div>
        </center>
    </div>
<!-- JavaScript for delete confirmation -->
<script>
    function deleteFAQ(faqId) {
        if (confirm('Are you sure you want to delete this FAQ?')) {
            // Perform delete action using AJAX or redirect to the delete route
            // Example using window.location.href:
            window.location.href = "{{ url('/faqs/delete') }}/" + faqId;
        }
    }
</script>


@endsection
