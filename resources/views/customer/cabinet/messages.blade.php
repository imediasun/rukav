<div class="d-flex flex-grow-1 p-0 border-faded shadow-4" style="max-height:800px;min-height:800px">
    <!-- left slider -->
    <div id="js-chat-contact" class="flex-wrap position-relative slide-on-mobile slide-on-mobile-left border-faded border-left-0 border-top-0 border-bottom-0">
        <!-- BEGIN msgr-list -->
        <div class="d-flex flex-column bg-faded position-absolute pos-top pos-bottom w-100">
            <div class="px-3 py-4">
                <input type="text" class="form-control bg-white" placeholder="Search key words">
            </div>
            <div class="flex-1 h-100 custom-scrollbar">
                <div class="w-100">
                    <div class="nav-title m-0 px-3 text-muted">Chat History</div>
                    <ul class="list-unstyled m-0">
                        @foreach($conversations as $conversation)
                        <li >
                            <div class="d-flex w-100 px-3 py-2 text-dark hover-white cursor-pointer show-child-on-hover" onclick="reloadMessageList('{{$conversation->id}}')">
                                <div class="profile-image-md rounded-circle" style="background-image:url('/storage/pictures/{{$conversation->pictures->photo}}'); background-size: cover;"></div>
                                <div class="px-2 flex-1">
                                    <div class="text-truncate text-truncate-md">
                                        {{$conversation->message->title}}
                                        <small class="d-block text-muted text-truncate text-truncate-md">
                                            {{$conversation->author->name}}  {{$conversation->created_at}}
                                        </small>
                                    </div>
                                </div>
                                <div class="position-absolute pos-right mt-2 mr-3 show-on-hover-parent">
                                    <button class="btn btn-danger btn-xs btn-icon rounded-circle shadow-0" data-toggle="tooltip" data-template="<div class=&quot;tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-inner bg-danger-500&quot;></div></div>" data-original-title="Delete">
                                        <i class="fal fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </li>
                            @endforeach

                    </ul>

                </div>
            </div>
        </div>
        <!-- END msgr-list -->
    </div>
    <div class="slide-backdrop" data-action="toggle" data-class="slide-on-mobile-left-show" data-target="#js-chat-contact"></div> <!-- end left slider -->
    <!-- inbox container -->
    <div class="d-flex flex-column flex-grow-1 bg-white result_of_messageList_table">
        <!-- inbox header -->

        <!-- end inbox message -->
    </div>
    <!-- end inbox container -->
</div>



<script>
    $(document).ready(function(){
        reloadMessageList('{{$conversations->first()->id}}')
    })

    function reloadMessageList(conversation){

        var module='conversation'
        console.log('conversation',conversation);
        var url='/cabinet/conversation';
        $.ajax({
            method: 'POST',
            dataType: 'html',
            async:false,
            url: url,
            data: {module: module, conversation:conversation},
            beforeSend: function() {
                $('#loader2').show();
            },
            complete: function() {
                $('#loader2').hide();
            },
            success: function (data) {
//console.log(data)
                $('.result_of_messageList_table').html(data);

            }
        });
    }
</script>