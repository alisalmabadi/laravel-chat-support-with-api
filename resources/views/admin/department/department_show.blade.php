@extends('admin.layouts.app')

@section('htmlheader_title')
    Departments
@endsection
@section('contentheader_title','Departments')

@section('contentheader_description','all Departments')
@section('main_page','Departments')

@section('here_page','All Departments')

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Departments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="{{route('admin.department.create')}}">
                        <button type="button" style="margin-bottom:1%;" class="center-block btn btn-success">Add new Department</button>                    </a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>name</th>
                            <th>description</th>
                            <th>company</th>
                            <th>operators</th>
                            <th>edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $department)
                        <tr>
                            <td>{{$department->name}}</td>
                            <td>{{$department->description}}</td>
                            <td>{{$department->company->name}}</td>
                            <td>
                                <ul>
                                @foreach($department->operators as $operator)
                                  <li>{{$operator->name}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
{{--
                                <button type="button" href="" class="btn btn-success">Show</button>
--}}
                             <a href="{{route('admin.department.edit',$department)}}"> <button type="button" class="btn btn-primary">Edit</button></a>
                                <form action="{{ url('admin/department', ['id' => $department->id]) }}" method="post">
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
