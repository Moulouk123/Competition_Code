@extends('admin.homeadmin')
@section('content')


    <div class="card" >
    <center>
        <div  style="width: 70%;height:10%; border:solid black 2px; margin-top:20px;padding:4px; margin-bottom:50px;border-radius: 25px;">
            <h4 class="card-title" style="margin: 20px;">User's accounts</h4>
            <div  class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Users
                                </th>
                                <th>
                                    Likes
                                </th>
                                <th>
                                    Membre since
                                </th>
                                <th>
                                    Friends
                                </th>
                                <th>
                                    Remove
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{ asset('storage/' . $user->photo) }}" style="margin-right: 10px;" alt="image">{{$user->name}}
                                        </td>
                                        <td>
                                            {{$user->numberOfLikes}}
                                        </td>
                                        <td>
                                            {{$user->member_since}}
                                        </td>
                                        <td>
                                            @foreach($user->friends as $friend)
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
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <a style="margin: 2%;" class="btn btn-primary"  href="{{ route('user_accounts')}}">View all accounts </a>
                </div>
            </div>
    </center>
    </div>
    <div class="card" >

        <center>
            <div  style="width: 70%;height:10%; border:solid black 2px; margin-top:20px;padding:4px ;border-radius: 25px;">

                <h4 class="card-title" style="margin: 20px;">Admin accounts</h4>
                <div  class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Admin name
                                </th>
                                <th>
                                    Monthly logins
                                </th>
                                <th>
                                    Admin since
                                </th>
                                <th>
                                    Update
                                </th>
                                <th>
                                    Remove
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users_admin as $user)
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
                                            <a href="{{ route('editprofileAdmin', $user->id)}}" type="button" class="btn btn-outline-danger btn-rounded btn-fw">Update</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('user.destroy', $user->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-dark btn-rounded btn-fw">Remove</button>
                                            </form>
                                        </td>


                                    </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <a style="margin: 2%;" class="btn btn-primary"  href="{{ route('admin_accounts')}}">View all accounts </a>
                    <a style="margin: 2%;" href="{{ route('registerAdmin') }}" class="btn btn-primary">Ajouter Admin</a>
                </div>
            </div>
        </center>
    </div>




@endsection


