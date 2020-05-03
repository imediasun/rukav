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
<div class="flex-grow-0">
    <!-- inbox title -->
    <div class="d-flex align-items-center p-0 border-faded border-top-0 border-left-0 border-right-0 flex-shrink-0">
        <div class="d-flex align-items-center w-100 pl-3 px-lg-4 py-2 position-relative">
            <div class="d-flex flex-row align-items-center mt-1 mb-1">
                <div class="mr-2 d-inline-block">
                    <span class="rounded-circle profile-image d-block" style="background-image:url('{{$conversation->first()->author->avatar}}'); background-size: cover;"></span>
                </div>
                <div class="info-card-text">
                    <a href="javascript:void(0);" class="fs-lg text-truncate text-truncate-lg" data-toggle="dropdown" aria-expanded="false">
                        {{$conversation->first()->author->name}}
                        <i class="fal fa-angle-down d-inline-block ml-1 fs-md"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item px-3 py-2" href="#">Send Email</a>
                        <a class="dropdown-item px-3 py-2" href="#">Create Appointment</a>
                        <a class="dropdown-item px-3 py-2" href="#">Block User</a>
                    </div>
                    <span class="text-truncate text-truncate-md opacity-80">{{$conversation->first()->message->title}}</span>
                </div>
            </div>
            <!--div class="ml-auto">
                <a href="javascript:void(0);" data-toggle="button" class="btn btn-outline-danger btn-icon rounded-circle">
                    <i class="fal fa-volume-mute fs-md"></i>
                </a>
                <a href="javascript:void(0);" class="btn btn-outline-info btn-icon rounded-circle ml-1">
                    <i class="fal fa-phone fs-md"></i>
                </a>
                <a href="javascript:void(0);" class="btn btn-outline-info btn-icon rounded-circle ml-1">
                    <i class="fal fa-video fs-md"></i>
                </a>
            </div-->
        </div>
        <!-- button for mobile -->
        <!--a href="javascript:void(0);" class="px-3 py-2 d-flex d-lg-none align-items-center justify-content-center mr-2 btn" data-action="toggle" data-class="slide-on-mobile-left-show" data-target="#js-chat-contact">
            <i class="fal fa-ellipsis-v h1 mb-0 "></i>
        </a-->
        <!-- end button for mobile -->
    </div>
    <!-- end inbox title -->
</div>
<!-- end inbox header -->
<!-- inbox message -->
<div class="flex-wrap align-items-center flex-grow-1 position-relative bg-gray-50">
    <div class="position-absolute pos-top pos-bottom w-100 overflow-hidden">
        <div class="d-flex h-100 flex-column">
            <!-- message list (the part that scrolls) -->
            <!-- BEGIN msgr-list -->
            <!-- END msgr-list -->
            <!-- BEGIN msgr -->
            <div class="msgr d-flex h-100 flex-column bg-white ">




<!-- BEGIN custom-scroll -->
<div class="custom-scroll flex-1 h-100">
    <div id="chat_container" class="w-100 p-4">

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
        <div class="chat-segment chat-segment-sent">
            <div class="chat-message">
                <p>
                    {{$segment->text}}
                </p>
            </div>
            <div class="text-right fw-300 text-muted mt-1 fs-xs">
                {{$segment->created_at}}
            </div>
        </div>
        @endif
        <!--  end .chat-segment -->
        <!-- start .chat-segment -->
            @if(\Auth::user()->id==$segment->receiver_id)
        <div class="chat-segment chat-segment-get">
            <div class="chat-message">
                <p>
                    {{$segment->text}}
                </p>
            </div>
            <div class="fw-300 text-muted mt-1 fs-xs">
                {{$segment->created_at}}
            </div>
        </div>
            @endif
        <!--  end .chat-segment -->

       @endforeach

    </div>
</div>
<!-- END custom-scroll  -->
<!-- BEGIN msgr__chatinput -->
<div class="d-flex flex-column">
    <div class="border-faded border-right-0 border-bottom-0 border-left-0 flex-1 mr-3 ml-3 position-relative shadow-top">
        <div class="pt-3 pb-1 pr-0 pl-0 rounded-0" tabindex="-1">
            <div id="msgr_input" contenteditable="true" data-placeholder="Type your message here..." class="height-10 form-content-editable"></div>
        </div>
    </div>
    <div class="height-8 px-3 d-flex flex-row align-items-center flex-wrap flex-shrink-0">
        <a href="javascript:void(0);" class="btn btn-icon fs-xl width-1 mr-1" data-toggle="tooltip" data-original-title="More options" data-placement="top">
            <i class="fal fa-ellipsis-v-alt color-fusion-300"></i>
        </a>
        <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Attach files" data-placement="top">
            <i class="fal fa-paperclip color-fusion-300"></i>
        </a>
        <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Insert photo" data-placement="top">
            <i class="fal fa-camera color-fusion-300"></i>
        </a>
        <div class="ml-auto">
            <a href="javascript:void(0);" onclick="sendMessage()" class="btn btn-info">Send</a>
        </div>
    </div>
</div>
<!-- END msgr__chatinput -->



            </div>
            <!-- END msgr -->
            <!-- end message list -->
        </div>
    </div>
</div>

<script>

    function sendMessage(){
        if($('#msgr_input').text().length>0){

            var text = $('#msgr_input').text()
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
