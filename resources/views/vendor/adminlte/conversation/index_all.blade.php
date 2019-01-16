@extends('adminlte::layouts.app')

@section('htmlheader_title')
    choose conversations
@endsection
@section('contentheader_title','Conversations')

@section('contentheader_description','choose Conversations')
@section('main_page','Conversations')

@section('here_page','All Conversations')

@section('main-content')
    <div class="container-fluid spark-screen">
        <input class="operator_id" value="{{\Auth::user()->id}}" type="hidden">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Last started chats</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {{--<a href="{{route('admin.operator.create')}}">
                            <button type="button" style="margin-bottom:1%;" class="center-block btn btn-success">Add new Operator</button>                    </a>
                        </a>--}}
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>subject</th>
                                <th>time created</th>
                                <th>Department</th>
                                <th>status</th>
                                <th>preferences</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($conversations as $conversation)
                                <tr>
                                    <td>{{$conversation->subject}}</td>
                                    <td>{{$conversation->created_at}}</td>
                                    <td>{{$conversation->department->name}}</td>
                                    <td>@if($conversation->end_conv==1)<button type="button" class="btn btn-danger center-block">Finished</button>@else <button type="button" class="btn btn-success center-block">not finished</button> @endif</td>
                                    <td>
                                        {{--
                                                                        <button type="button" href="" class="btn btn-success">Show</button>
                                        --}}
                                        @if($conversation->end_conv==1)
                                        <a href="{{url('operator/conversations').'/'.$conversation->id}}"> <button type="button" class="btn btn-success center-block" style="text-decoration: none">show</button></a>
                                        @elseif($conversation->end_conv==0)
                                            <a href="{{url('operator/conversation').'/'.$conversation->id}}"> <button type="button" class="btn btn-warning center-block" style="text-decoration: none">continue chat</button></a>

                                            @endif
                                      {{--  <form action="" method="post">
                                            <input type="hidden" name="_method" value="delete" />
                                            {{csrf_field()}}
                                            <button type="submit" href="" class="btn btn-danger">DELETE</button>
                                        </form>--}}
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