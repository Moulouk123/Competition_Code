@extends('admin.homeadmin')

@section('content')
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
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

        .socialworks-list {
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
        }

        .socialwork-item {
            margin-bottom: 10px;
        }

        .remove-button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
            margin-right: 10px;
        }

        .remove-button:hover {
            background-color: #c0392b;
        }

        /* Add green color for the Update button on hover */
        .update-button:hover {
            background-color: #4CAF50;
        }
    </style>
<div class="card">
    <center>
        <div class="form-container">
            <h2 id="form-title">Add Social Network</h2>

            <form id="socialworkForm" action="{{ route('socialworks.add') }}" method="post">
                @csrf
                <!-- Hidden input to store socialwork ID during update -->
                <input type="hidden" id="socialworkId" name="socialworkId" value="">
                <label for="icon">Icon:</label>
                <input type="text" id="iconn" name="icon" required>
                <label for="link">Link:</label>
                <input type="text" id="link" name="link" required>
                <button style="background-color: #9747FF;" id="submitButton" type="submit">Add Socialwork</button>
            </form>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Link</th>
                            <th>Remove</th>
                            <th>Update</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($socialworks as $socialwork)
                            <tr class="socialwork-item">
                                <td>{!! $socialwork->icon !!}</td>
                                <td><a href="{{ $socialwork->link }}" >{{ $socialwork->link }}</a></td>

                                <td>
                                    <form action="{{ route('socialworks.delete', $socialwork->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-dark btn-rounded btn-fw" type="submit">Remove</button>
                                    </form>
                                </td>
                                <td>
                                    <!-- Update form -->
                                    <form class="update-form" action="{{ route('socialworks.update', $socialwork->id) }}" method="post">
                                        @csrf

                                        <!-- Pass socialwork ID as data attribute -->
                                        <button class="btn btn-outline-danger btn-rounded btn-fw update-button" type="button"  data-iconn="{{ $socialwork->icon }}" data-link="{{ $socialwork->link}}" data-socialwork-id="{{ $socialwork->id }}"> Update</button>
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
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var socialworkForm = document.getElementById('socialworkForm');
            var socialworkIdInput = document.getElementById('socialworkId');
            var iconInput = document.getElementById('iconn');
            var linkInput = document.getElementById('link');
            var submitButton = document.getElementById('submitButton');
            var formTitle = document.getElementById('form-title');

            // Get all update buttons
            var updateButtons = document.querySelectorAll('.update-button');

            // Add click event listener to each update button
            updateButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    // Get the socialwork content and ID from the data attributes
                    var icon = this.getAttribute('data-iconn');
                    var socialworkId = this.getAttribute('data-socialwork-id');
                    var link = this.getAttribute('data-link');

                    // Fill the form fields with socialwork details
                    socialworkIdInput.value = socialworkId;
                    iconInput.value = icon;
                    linkInput.value = link;

                    // Change form action and button text for update
                    socialworkForm.action = '{{ url('/socialworks/update') }}/' + socialworkId;
                    submitButton.innerText = 'Update Socialwork';

                    // Change form title
                    formTitle.innerText = 'Update Socialwork';
                });
            });
        });

    </script>

@endsection
