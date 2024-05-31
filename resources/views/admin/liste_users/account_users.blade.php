@extends('admin.homeadmin')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Membre since</th>
                        <th>Friends</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        @if(!$user->is_admin)
                            <tr>
                                <td class="py-1">
                                    <img src="{{ asset('storage/' . $user->photo) }}" style="margin-right: 10px;" alt="image">{{$user->name}}
                                </td>
                                <td>
                                    $ 77.99
                                </td>
                                <td>
                                    {{$user->member_since}}
                                </td>
                                <td>
                                    @foreach ($user->friends as $friend)
                                        <img src="{{ asset('storage/' . $friend->user->photo) }}" alt="{{ $friend->user->name }}">
                                    @endforeach
                                </td>
                                <td>
                                    <form action="{{ route('user.destroy', $user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-dark btn-rounded btn-fw">Remove</button>
                                    </form>
                                </td>


                            </tr>
                        @endif
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>







@endsection
