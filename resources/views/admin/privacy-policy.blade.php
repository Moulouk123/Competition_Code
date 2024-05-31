@extends('admin.homeadmin')

@section('content')
<!DOCTYPE html>
<html lang="en"><head></head><body>
<h2>Policies</h2>

<form action="{{ url('/categories/add') }}" method="post">
    @csrf
    <label for="name">New Category Name:</label>
    <input type="text" id="name" name="name" required>
    <button type="submit">Create Category</button>
</form>
@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($policies as $policy)
            <tr>
                <td>{{ $policy->id }}</td>
                <td>{{ $policy->category_of_policy }}</td>
                <td>{{ $policy->content }}</td>
                <td>
                    <a href="{{ route('edit', $policy->id) }}">Edit</a>
                    <form action="{{ route('destroy', $policy->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</body></html>
@endsection