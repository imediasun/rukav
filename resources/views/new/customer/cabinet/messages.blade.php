<div class="app-content app-content-aside" style="padding: 0px 0 0 0px;">
    <div class="d-flex d-lg-none p-4 order-0 justify-content-between align-items-center">
        <button type="button" class="btn btn-sm btn-primary px-3 toggle-inner-sidebar" data-target="#sidebar-inner-1">
            <i class="fas fa-ellipsis-v"></i>
        </button>
        <button type="button" class="btn btn-sm btn-primary px-3 toggle-inner-sidebar" data-target="#sidebar-inner-2">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div class="app-content--sidebar order-1 app-content--sidebar__lg" id="sidebar-inner-1">
        <div class="app-content--sidebar__content scrollbar-container">
            <div class="divider my-3"></div>
            <ul class="nav nav-pills nav-pills-hover flex-column">
                <li class="nav-header">
                    Активные переписки
                </li>

                @foreach($conversations as $conversation)
                    <?
                    $conversation['nonreaded']=false;
                    $messages=\App\Domain\Customer\Models\Connect::where('message_id',$conversation->message_id)
                        ->where('receiver_id','=',\Auth::user()->id)
                        ->where('is_viewed','=',0)
                        ->where('sender_id','=',$conversation->sender_id)
                         ->groupBy('receiver_id','message_id')->orderBy('created_at','asc')->get();
                    if(count($messages)>0){
                        $conversation['nonreaded']=true;
                    }
                    //dump($conversation['nonreaded']);
                    ?>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="reloadMessageList('{{$conversation->id}}')">
                        <div class="align-box-row">


                            <div class="card card-box my-3" style="width:100%">
                                <div class="card-indicator @if($conversation['nonreaded']) bg-first @endif"></div>
                                <div class="card-body px-4 py-3">
                                    <div class="avatar-icon-wrapper avatar-icon-md" style="display:inline-block !important">
                                        <span class="badge badge-circle badge-success">Online</span>
                                        <div class="avatar-icon rounded-circle"><img src="/storage/pictures/{{$conversation->pictures->photo}}" alt="">


                                       </div>
                                    </div>


                                        <div class="pl-2" style="display:inline-block !important">
                                        <span class="d-block">
                                            {{$conversation->message->title}}
                                            <small class="d-block text-black-50">({{$conversation->author->name}}  )</small>
                                        </span>
                                        </div>
                                        <div class="ml-auto font-size-xs" style="display:inline-block !important">
                                            <i class="fas fa-angle-right d-40 text-right d-block"></i>
                                        </div>

                                    <div class="d-flex align-items-center justify-content-start">
                                        @if($conversation['nonreaded']) <div class="badge badge-first px-3">новое сообщение</div> @endif

                                        <div class="font-size-sm text-danger px-2">
                                            <i class="far fa-clock mr-1"></i>
                                            14:22
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </a>
                </li>
            @endforeach


            </ul>
            <div class="divider my-3"></div>
            <ul class="nav nav-pills nav-pills-hover flex-column">
                <li class="nav-header text-primary pb-2">
                    <div>
                        Статистика
                    </div>
                </li>
            </ul>
            <div class="row font-size-xs">
                <div class="col">
                    <div class="card text-center my-2 p-3">
                        <div>
                            <i class="far fa-user font-size-xxl text-success"></i>
                        </div>
                        <div class="mt-2 line-height-sm">
                            <b class="font-size-lg">345</b>
                            <span class="text-black-50 d-block">friends</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center my-2 p-3">
                        <div>
                            <i class="far fa-chart-bar font-size-xxl text-danger"></i>
                        </div>
                        <div class="mt-2 line-height-sm">
                            <b class="font-size-lg">2,693</b>
                            <span class="text-black-50 d-block">messages</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="app-content--inner order-3 order-lg-2 p-0 card-box d-flex flex-column bg-secondary result_of_messageList_table">
        <div class="card bg-primary text-white text-center p-3">
            <blockquote class="blockquote mb-0">
                <p>Для просмотра сообщений выберите какую либо переписку</p>

            </blockquote>
        </div>

    </div>

    <div class="sidebar-inner-mobile-overlay"></div>
</div>




<script>
    $(document).ready(function(){
        //reloadMessageList('{{$conversations[0]->id}}')
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