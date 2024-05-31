@extends('user.header')
@section('content')


<style>
        body {

            margin: 20px;


        }

        .category-container {
            margin-bottom: 20px;
        }

        .category-name {
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .policy-list {
            list-style-type: disc;
            padding: 0;
            text-align: left;
            margin-left: 20px;
        }

        .policy-list-item {
            margin-bottom: 10px;
        }
    </style>



<div id="contact" class="contact-us section">
    <div class="container">
<div class="container">
<h2 style="text-align:center; color:blue;">Our Privacy Policies</h2>
<br>
@foreach($categories as $category)
    <div class="category-container">
        <div class="category-name">{{ $category->id }}){{ $category->name }} </div>
        <div class="policy-list">
            <ul type="disk">
            @foreach($category->privacyPolicies as $policy)
                <div class="policy-list-item"><li>{{ $policy->content }}</li></div>
            @endforeach
    </ul>
        </div>
    </div>
@endforeach
    </div>
    </div>
</div>
@endsection


