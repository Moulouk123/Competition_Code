@extends('admin.homeadmin')

@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>

    <!-- Add your custom styles here -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #007bff;
        }

        h2 {
            margin-top: 20px;
            color: #343a40;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        p {
            color: #868e96;
        }

        .photo-column {
            max-width: 50px; /* Adjust as needed */
        }

        .photo-column img {
            max-width: 100%;
            height: auto;
        }

        .file-path-column {
            max-width: 200px; /* Adjust as needed */
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-group">
<h1>Search Results for "{{ $input }}"</h1>

@foreach ($searchResults as $table => $results)
    <h2>{{ ucfirst($table) }}</h2>

    @if (count($results) > 0)
        <table>
            <thead>
            <tr>
                @foreach ($results[0] as $key => $value)
                    @if (!in_array($key, ['id', 'activity','photo', 'email_verified_at', 'password', 'is_admin', 'created_at', 'updated_at', 'is_read', 'user_id', 'active_status', 'avatar', 'dark_mode', 'two_factor_secret', 'two_factor_recovery_codes', 'two_factor_confirmed_at', 'remember_token', 'messenger_color', 'count', 'file_path', 'category_id','rate_id','articl_id']))
                        <th>{{ $key }}</th>
                    @endif
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach ($results as $result)
                <tr>
                    @foreach ($result as $key => $value)
                        @if (!in_array($key, ['id', 'activity', 'email_verified_at', 'password', 'is_admin', 'created_at', 'updated_at', 'is_read', 'user_id', 'active_status', 'avatar', 'dark_mode', 'two_factor_secret', 'two_factor_recovery_codes', 'two_factor_confirmed_at', 'remember_token', 'messenger_color', 'count', 'file_path', 'category_id','articl_id']))
                            <td class="{{ $key == 'photo' ? 'photo-column' : ($key == 'file_path' ? 'file-path-column' : '') }}">
                                @if ($key == 'photo' && $value)
                                    <img src="{{ asset($value) }}" alt="User Photo">
                                @elseif ($key == 'file_path' && is_file($value))
                                    <a href="{{ asset($value) }}" target="_blank">View File</a>
                                @else
                                    {{ $value }}
                                @endif
                            </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No results found for {{ ucfirst($table) }}</p>
    @endif

@endforeach
    </div>
</div>

@endsection

