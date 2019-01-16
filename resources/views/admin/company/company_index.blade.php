@extends('admin.layouts.app')


@section('htmlheader_title')
    Companies
@endsection
@section('contentheader_title','Companies')

@section('contentheader_description','all Companies')
@section('main_page','Companies')

@section('here_page','All Companies')


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Companies</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="{{route('admin.company.create')}}">
                        <button type="button" style="margin-bottom:1%;" class="center-block btn btn-success">Add new company</button>                    </a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>name</th>
                            <th>tel</th>
                            <th>email</th>
                            <th>web</th>
                            <th>token</th>
                            <th>edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <td>{{$company->name}}</td>
                            <td>{{$company->tel}}</td>
                            <td>{{$company->email}}</td>
                            <td>{{$company->web}}</td>
                            <td>{{$company->token}}</td>
                            <td>
                                <a href="{{route('admin.company.show',$company->id)}}"> <button type="button" href="" class="btn btn-success">Show</button></a>
                             <a href="{{route('admin.company.edit',$company)}}"> <button type="button" class="btn btn-primary">Edit</button></a>
                                <form action="{{ url('admin/company', ['id' => $company->id]) }}" method="post">
                                    <input type="hidden" name="_method" value="delete" />
                                    {{csrf_field()}}
                                    <button type="submit" href="" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>

                        </tr>
                          @endforeach
                        </tbody>
                        {{--<tfoot>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                        </tfoot>--}}
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

        </div>
    </div>
@endsection
@section('iternal_css')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}}">
@endsection
@section('inline_script')
    <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable();
            /*   $('#example1').DataTable({
                   'paging'      : true,
                   'lengthChange': false,
                   'searching'   : true,
                   'ordering'    : true,
                   'info'        : true,
                   'autoWidth'   : false
               });*/
        })
    </script>
@endsection
