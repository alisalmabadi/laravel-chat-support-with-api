
    @foreach($message as $messages)
        @if($messages->type==2)
            <div class="direct-chat-msg right">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">
                        {{\Auth::user()->name}}
                    </span>
                    <span class="direct-chat-timestamp pull-left">{{$messages->created_at}}</span>
                </div>
                <img src="{{Gravatar::get(Auth::user()->email)}}" alt="Message User Image" class="direct-chat-img">
                <div class="direct-chat-text">
                        {{$messages->text}}
                </div>
            </div>

        @else
            <div class="direct-chat-msg">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">
                        Customer
                    </span>
                    <span class="direct-chat-timestamp pull-right">{{$messages->created_at}}</span>
                </div>
                <!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="{{asset('img/picture.png')}}" alt="Message User Image"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
            {{$messages->text}}
                </div>
                <!-- /.direct-chat-text -->
            </div>

        @endif

    @endforeach



