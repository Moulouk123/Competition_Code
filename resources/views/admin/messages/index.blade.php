@extends('admin.homeadmin')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title ecr">Liste des messages recus</h4>
    
@if(Session::has('success2'))
    <div class="alert alert-success">
        {{ Session::get('success2') }}
    </div>
@endif
                    <div class="table-responsive m-t-40">
                        <table id="example23"
                               class="display nowrap table table-hover table-striped border"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>


                            </tr>
                            </thead>

                            <tbody>
                            @foreach($messages as $msg)
                                <tr>
                                    <td>{{$msg->id}}</td>
                                    <td>{{$msg->firstname}}</td>
                                    <td>{{$msg->lastname}}</td>
                                    <td>
                                    <form action="{{ route('message.destroy', $msg->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-dark btn-rounded btn-fw">Remove</button>
                                    @if ($msg->is_read==1)
                                        <a class="btn btn-success btn-rounded btn-fw" href="{{ route('message.show', $msg) }}">Consulted </a>
                                        @else
                                            <a class="btn btn-primary btn-rounded btn-fw" href="{{ route('message.show', $msg) }}">To consult</a>
                                        @endif
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div></div>




@endsection


