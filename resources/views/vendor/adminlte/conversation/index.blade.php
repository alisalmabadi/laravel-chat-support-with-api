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
        <div id="messages">
        <div class="row">
            <div class="alert alert-info alert-dismissible">
{{--
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
--}}
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                new conversations load every 5 seconds so You dont need to refresh the pege!
            </div>
            @if($conversations!=null)
@foreach($conversations as $conversation)
            <div class="col-md-3" >
                <div class="box box-danger box-solid">
                    <div class="box-header with-border">
                        <h5 style="font-size: 15px;" class="box-title">{{$conversation->subject}}</h5>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>

                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    @if($conversation->status==1)
                        <div class="box-body">
                            <div class="btn-group">
                                <button type="button" class="btn bg-navy btn-flat">Department :</button>
                                <button type="button" class="btn bg-maroon  ">{{$conversation->department->name}}</button>
                            </div>
                             <br><br>
                            <a target="_blank" class="btn btn-primary center-block" href="{{url('operator/conversation').'/'.$conversation->id}}" data-id="{{$conversation->id}}">resume conversation</a><br>
                            <a type="button" class="btn btn-warning center-block disactive" data-widget="remove" data-id="{{$conversation->id}}">Disactive this conversation</a>

                        </div>
                        <!-- /.box-body -->
                </div>
                    @else
                    <div class="box-body">
                        <div class="btn-group">
                            <button type="button" class="btn bg-navy btn-flat">Department :</button>
                            <button type="button" class="btn bg-maroon  ">{{$conversation->department->name}}</button>
                        </div>
                        <br><br>

                        <div class="click_start">   <a target="_blank" class="btn btn-success center-block active" href="{{url('operator/conversation').'/'.$conversation->id}}" data-id="{{$conversation->id}}">start conversation </a></div> <br>
                        <a type="button" class="btn btn-warning center-block disactive" data-widget="remove" data-id="{{$conversation->id}}">Disactive this conversation</a>

                    </div>
                    <!-- /.box-body -->
                  </div>
                    @endif
                <!-- /.box -->
            </div>
    @endforeach
    @else
    
    this user has no department so can't have any conversation!
    @endif
        </div>
        </div>
    </div>
@endsection

@section('inline_script')
    <script type="text/javascript">
        $('.disactive').click(function () {
            var id= $(this).data('id');
            $.post('{{route('operator.disactive')}}', {id: id , _token: $('meta[name="csrf-token"]').attr('content')}, function()
            {

            });
        });
        $('.active').click(function () {
            var operator_id= $('.operator_id').val();
            var id= $(this).data('id');
            $.post('{{route('operator.active')}}', {id: id , _token: $('meta[name="csrf-token"]').attr('content'), operator_id:operator_id}, function()
            {
            });
        });
        setInterval(function () {
            loadmessages();
        },5000);

        function loadmessages() {
            $("#messages").load("{{route('operator.allconv')}} #messages");
        }

    </script>
    @endsection