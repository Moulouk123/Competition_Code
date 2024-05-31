@extends('admin.homeadmin')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title ecr">Liste des abouts</h4>



                    <div class="table-responsive m-t-40">
                        <table id="example23"
                               class="display nowrap table table-hover table-striped border"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>

                                <th>mission</th>
                                <th>competence</th>
                                <th>competence description</th>
                                <th>valeur</th>
                                <th>valeur description</th>


                            </tr>
                            </thead>

                            <tbody>

                                <tr>

                                    <td>{{$about->mission}}</td>
                                    <td>{{$about->competence}}</td>
                                    <td>{{$about->comp_desc}}</td>
                                    <td>{{$about->valeur}}</td>
                                    <td>{{$about->val_des}}</td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div></div>




@endsection


