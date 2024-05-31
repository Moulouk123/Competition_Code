
@extends('admin.homeadmin')
@section('content')

    <style>
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
            background-color:  #9747FF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
            <div  style="width: 70%;height:10%;  margin-top:20px;padding:4px ;border-radius: 25px;">
<h2>FAQs Management</h2>

<!-- Add or Update Form -->
<form action="{{ isset($editMode) ? url('/faqs/update', $faq->id) : url('/faqs/add') }}" method="post">
    @csrf
    @if(isset($editMode))
        @method('PATCH')
    @endif

    <label for="question">Question</label>
    <input type="text" id="question" name="question" value="{{ isset($faq) ? $faq->question : '' }}" required>

    <label for="details">Answer</label>
    <textarea id="details" name="details" required>{{ isset($faq) ? $faq->details : '' }}</textarea>

    <button type="submit">{{ isset($editMode) ? 'Update FAQ' : 'Add FAQ' }}</button>
</form>


                <div  class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faqs as $faq)
                                <tr>
                                    <td>{{ $faq->question }}</td>
                                    <td>{{ $faq->details }}</td>
                                    <td>
                                        <a type="button" class="btn btn-outline-danger btn-rounded btn-fw" href="{{ url('/faqs/edit', $faq->id) }}">Edit</a>
                                        <a type="button" class="btn btn-outline-dark btn-rounded btn-fw" href="{{ url('/faqs/delete', $faq->id) }}" onclick="return confirm('Are you sure you want to delete this FAQ?')">Delete</a>
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

@endsection
