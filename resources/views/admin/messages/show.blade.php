@extends('admin.homeadmin')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title ecr">Détails du message recu</h4>

                    <div class="table-responsive m-t-40">
                        <table id="example23"
                               class="display nowrap table table-hover table-striped border"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Mesaage</th>
                                <th>User Id</th>


                            </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>{{$msg->id}}</td>
                                    <td>{{$msg->firstname}}</td>
                                    <td>{{$msg->lastname}}</td>
                                   <td>{{$msg->email}}</td>
                                    <td>{{$msg->message}}</td>
                                    <td>{{$msg->user_id}}</td>
                                </tr>
                            </tbody>


                        </table>
                        <a style="float:right; margin-top: 20px;" href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $msg->email }}" class="btn btn-primary">Answer</a>


                    </div>
                </div>
            </div>
        </div></div>




@endsection


