<?

/*elseif(\Auth::user()->id==$conversation->first()->sender_id){
    $recepient=$conversation->first()->receiver_id;
}*/
if(\Auth::user()->id==$conversation->first()->message->sender){
    $recepient=$conversation->first()->sender_id;
}
else{
    $recepient=$conversation->first()->receiver_id;
}

?>
<div class="app-content--inner__header rounded-0 card-header bg-white p-4 border-bottom">
    <div class="card-header--title">
        <div class="mr-2 d-inline-block">
            <span class="rounded-circle profile-image d-block" style="background-image:url('{{$conversation->first()->author->avatar}}'); background-size: cover;"></span>
        </div>
        <b>{{$conversation->first()->author->name}}</b>
    </div>
    <div class="card-header--actions">
        <a href="#" class="btn btn-sm btn-first" data-toggle="tooltip" title="Send new message">
            <i class="fas fa-plus"></i>
        </a>
    </div>
</div>
<div class="scrollbar-container">
    <div class="chat-wrapper p-3">

    @foreach($conversation as $segment)
        <!-- start .chat-segment -->
            <!--div class="chat-segment">
                <div class="time-stamp text-center mb-2 fw-400">
                    Jun 19
                </div>
            </div-->
            <!--  end .chat-segment -->
            <!-- start .chat-segment -->

            @if(\Auth::user()->id!=$segment->receiver_id)
                <div class="chat-item p-2 mb-2">
                    <div class="align-box-row">
                        <div class="avatar-icon-wrapper avatar-icon-lg align-self-start">

                        </div>
                        <div>
                            <div class="chat-box bg-first text-white">
                                <p>{{$segment->text}}</p>
                            </div>
                            <small class="mt-2 d-block text-black-50">
                                <i class="fas fa-clock mr-1 opacity-5"></i>
                                {{$segment->created_at}}
                            </small>
                        </div>
                    </div>
                </div>

            @endif
        <!--  end .chat-segment -->
            <!-- start .chat-segment -->
            @if(\Auth::user()->id==$segment->receiver_id)
                <div class="chat-item chat-item-reverse p-2 mb-2">
                    <div class="align-box-row flex-row-reverse">
                        <div class="avatar-icon-wrapper avatar-icon-lg align-self-start">

                        </div>
                        <div>
                            <div class="chat-box bg-first text-white">
                                <p>{{$segment->text}}</p>

                            </div>
                            <small class="mt-2 d-block text-black-50">
                                <i class="fas fa-clock mr-1 opacity-5"></i>
                                {{$segment->created_at}}
                            </small>
                        </div>
                    </div>
                </div>

            @endif
        <!--  end .chat-segment -->

        @endforeach

    </div>
</div>
<div class="app-content--inner__footer bg-white p-4 border-top">
    <div>
        <input id="msgr_input" class="form-control" placeholder="Write your message and hit enter to send...">
    </div>
    <div class="align-box-row mt-3">
        <div class="align-items-center">
            <a href="#" class="btn btn-link btn-link-primary p-0 font-size-xl text-success" data-toggle="tooltip" title="Add audio file">
                <i class="far fa-file-audio"></i>
            </a>
            <a href="#" class="btn btn-link btn-link-primary p-0 font-size-xl mr-2 ml-2 text-danger" data-toggle="tooltip" title="Add video file">
                <i class="far fa-file-video"></i>
            </a>
            <a href="#" class="btn btn-link btn-link-primary p-0 font-size-xl text-info" data-toggle="tooltip" title="Upload documents">
                <i class="fas fa-file-excel"></i>
            </a>
        </div>
        <div class="ml-auto">
            <a href="#" class="btn btn-primary" onclick="sendMessage()">
                Send
            </a>
        </div>
    </div>
</div>

<script>

    function sendMessage(){
        console.log('TRY')
        if($('#msgr_input').val().length>0){

            var text = $('#msgr_input').val()
            var url = '/send_message_to_client';console.log(text)
            var client_id='{{$recepient}}';
            var message_id='{{$conversation->first()->message_id}}';
            $.ajax({
                method: 'GET',
                dataType: 'json',
                async:true,
                url: url,
                data: {client_id:client_id,text: text,message_id:message_id},
                beforeSend: function() {
                    $('#loader').show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                success: function (data) {

                console.log(data)
                    console.log({{$conversation->first()->message_id}})
                reloadMessageList({{$conversation->first()->message_id}})

                }
            });
        }
    }
</script>
