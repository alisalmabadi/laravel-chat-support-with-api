@extends('adminlte::layouts.app')

@section('htmlheader_title')
     conversation
@endsection
@section('contentheader_title','Conversation')

@section('contentheader_description','...')
@section('main_page','Conversations')

@section('here_page','Conversation page')

@section('main-content')
    <input type="hidden" class="token" value="{{$conversation->token}}">
    <div class="container-fluid spark-screen">
        <div class="row">
{{--
            <div class="col-md-12">
--}}
                <!-- DIRECT CHAT PRIMARY -->
                <div class="box box-primary direct-chat direct-chat-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Title:  {{$conversation->subject}}</h3>
                        <a style="width: 20%;" href="{{url('operator/conversation')}}" class="btn btn-danger center-block endconv">End Conversation</a>
                        <div class="box-tools pull-right">
{{--
                            <span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="3 New Messages">3</span>
--}}
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                           {{-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                                <i class="fa fa-comments"></i></button>--}}
{{--
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
--}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Conversations are loaded here -->
                        <div class="direct-chat-messages" style="height: auto;">

                        </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                       {{-- <form action="#" method="post">--}}
                            <div class="input-group input-chat">
                                <input class="form-control message" type="text" name="message" placeholder="Type Message and press Enter ...">
                           {{--     <span class="input-group-btn">--}}
{{--
                        <button type="submit" class="btn btn-primary btn-flat">Send</button>
--}}
                     {{-- </span>--}}
                            </div>
                        {{--</form>--}}
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!--/.direct-chat -->
{{--
            </div>
--}}

        </div>
    </div>
@endsection
@section('inline_script')
<script text="text/javascript">

    $(document).ready(function()
    {
        pullData();
        $('.message').keyup(function(e) {
            if (e.keyCode == 13){
                sendMessage();
            }
        });


    });

    function pullData()
    {
       // alert('pull');
        retrieveChatMessages();
        setTimeout(pullData,3000);
    }

    function retrieveChatMessages()
    {
        var token = $('.token').val();
        $.post('{{route('operator.recievemessage')}}', {token:token, _token: $('meta[name="csrf-token"]').attr('content')}, function(data)
        {
         /*   if (data.length > 0) {*/
                /*
                                $('.direct-chat-messages').append('<div class="direct-chat-msg"><div class="direct-chat-info clearfix"><span class="direct-chat-name pull-left">Customer</span>/!* <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>*!/</div> <img src="http://company.new/images/avatar.png" alt="Message User Image" class="direct-chat-img"><div class="direct-chat-text">'+data+'</div> </div>');
                */
                $('.direct-chat-messages').html('');
                $('.direct-chat-messages').html(data.data);
           /* }*/

        });
    }


    function sendMessage()
    {
        var text = $('.form-control.message').val();
        var token = $('.token').val();

        if (text.length > 0)
        {
            $.post('{{route('operator.sendmessage')}}', {text: text , _token: $('meta[name="csrf-token"]').attr('content'),conversation_token : token}, function()
            {
                $('.direct-chat-messages').append('<div class="direct-chat-msg right"><div class="direct-chat-info clearfix"><span class="direct-chat-name pull-right">{{\Auth::user()->name}}</span> <span class="direct-chat-timestamp pull-left">2018-08-25 16:59:47</span></div>  <img src="{{Gravatar::get(Auth::user()->email)}}" alt="Message User Image" class="direct-chat-img"> <div class="direct-chat-text">'+text+' </div> </div>');
                $('.message').val('');
            });
        }
    }


</script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.endconv').click(function () {
                var token = $('.token').val();
            $.post('{{route('operator.endconv')}}', { _token: $('meta[name="csrf-token"]').attr('content'),conversation_token : token}, function()
            {
            });
        });
        });
    </script>
@endsection

@section('iternal_css')
<style>
    .input-chat{
        width: 100%;
    }
</style>
    @endsection