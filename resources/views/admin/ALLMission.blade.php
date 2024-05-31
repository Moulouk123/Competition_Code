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
                <h2 id="form-title" id="Form">Add Mission</h2>
        <form id="missionForm" action="{{ url('/addMission') }}" method="post">
            @csrf
            <!-- Hidden input to store mission ID during update -->
            <input type="hidden" id="missionId" name="missionId" value="">
            <label for="word">Mission:</label>
            <input type="text" id="mission" name="mission" required>
            <button style="background-color: #9747FF;" type="submit" id="submitButton">Add Mission</button>
        </form>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mission</th>
                            <th>Remove</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($missions as $mission)
                        <tr>
                            <td>{{ $mission->mission }}</td>
                            <td>
                                <form action="{{ url('/deleteMission/' . $mission->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-dark btn-rounded btn-fw" type="submit">Remove</button>
                                </form>
                            </td>
                            <td>
                                <!-- Update form -->
<form class="update-form" action="{{ url('/updateMission/' . $mission->id) }}" method="post">
    @csrf

    <!-- Pass mission ID as data attribute -->
    <button  class="btn btn-outline-dark btn-rounded btn-fw  update-button" type="button" data-mission="{{ $mission->mission }}" data-mission-id="{{ $mission->id }}">Edit</button>
</form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
</center>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    var missionForm = document.getElementById('missionForm');
    var missionIdInput = document.getElementById('missionId');
    var missionInput = document.getElementById('mission');
    var submitButton = document.getElementById('submitButton');
    var formTitle = document.getElementById('form-title');

    // Get all update buttons
    var updateButtons = document.querySelectorAll('.update-button');

    // Add click event listener to each update button
    updateButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Get the mission content and ID from the data attributes
            var mission = this.getAttribute('data-mission');
            var missionId = this.getAttribute('data-mission-id');

            // Fill the form fields with mission details
            missionIdInput.value = missionId;
            missionInput.value = mission;

            // Change form action and button text for update
            missionForm.action = '{{ url('/updateMission') }}/' + missionId;
            submitButton.innerText = 'Update Mission';

            // Change form title
            formTitle.innerText = 'Update Mission';
        });
    });
});

</script>

@endsection
