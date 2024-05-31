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

    /* Add green color for the Update button on hover */
    .update-button:hover {
        background-color: #4CAF50;
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
@if(Session::has('success3'))
    <div class="alert alert-success">
        {{ Session::get('success3') }}
    </div>
@endif
    <center>
        <div  style="width: 70%;height:10%; margin-top:20px;padding:4px ;border-radius: 25px;">
            <div class="form-container">
                <h2 id="form-title">Add Set Up</h2>

        <form id="valueForm" action="{{ url('/addSetUp') }}" method="post">
            @csrf
            <!-- Hidden input to store value ID during update -->
            <input type="hidden" id="valueId" name="valueId" value="">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" required>
            <button style="background-color: #9747FF;" type="submit" id="submitButton">Add Set Up</button>
        </form>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Remove</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($values as $value)
                        <tr>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->description }}</td>

                            <td>
                                <form action="{{ url('/deleteSetUp/' . $value->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-dark btn-rounded btn-fw" type="submit">Remove</button>
                                </form>
                            </td>
                            <td>
                                <!-- Update form -->
                                <form class="update-form" action="{{ url('/updateSetUp/' . $value->id) }}" method="post">
                                    @csrf
                                    <!-- Pass value ID as data attribute -->
                                    <button class="btn btn-outline-dark btn-rounded btn-fw update-button" type="button"
                                        data-value="{{ $value->title }}" data-value-desc="{{$value->description}}" data-value-id="{{ $value->id }}">Edit</button>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var valueForm = document.getElementById('valueForm');
        var valueIdInput = document.getElementById('valueId');
        var titleInput = document.getElementById('title');
        var descriptionInput = document.getElementById('description');
        var submitButton = document.getElementById('submitButton');
        var formTitle = document.getElementById('form-title');

        // Get all update buttons
        var updateButtons = document.querySelectorAll('.update-button');

        // Add click event listener to each update button
        updateButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Get the value content and ID from the data attributes
                var title = this.getAttribute('data-value');
                var valueId = this.getAttribute('data-value-id');
                var description = this.getAttribute('data-value-desc');

                // Fill the form fields with value details
                valueIdInput.value = valueId;
                titleInput.value = title;
                descriptionInput.value = description;

                // Change form action and button text for update
                valueForm.action = '{{ url('/updateSetUp') }}/' + valueId;
                submitButton.innerText = 'Update Set Up';

                // Change form title
                formTitle.innerText = 'Update Set Up';
            });
        });
    });

</script>

@endsection
