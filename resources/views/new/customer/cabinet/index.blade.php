@extends('new.layouts.app_cabinet')

@section('content')


    <div class="container">

<button onclick="send();" class="title">Send</button>
        <div class="card card-box mb-5">
            <div class="card-header">
                <h5 class="my-3">
                    Basic
                </h5>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-folder mr-1"></i>Manage my Ads</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" onclick="reloadMessages()" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-envelope mr-1"></i>Сообщения</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" onclick="reloadFavorits()" role="tab" aria-controls="messages" aria-selected="false"><i class="fa fa-heart mr-1"></i>Избранное</a>
                    </li>
                </ul>

                <div class="tab-content p-3 pb-0">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div id="loader">
                            <div class="border p-3">
                                <div class="d-flex justify-content-center">
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-tag result_of_cabinet_table">


                        </div>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        <div id="loader2">
                            <div class="border p-3">
                                <div class="d-flex justify-content-center">
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-tag result_of_messages_table">


                        </div>
                         </div>
                    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                        <div id="loader3">
                            <div class="border p-3">
                                <div class="d-flex justify-content-center">
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-tag result_of_cabinet_favorits">


                        </div>

                         </div>
                </div>

            </div>
        </div>


    </div>
@endsection

@section('scripts')
<script src="/js/autobahn.js"></script>
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
/*     Pusher.logToConsole = true;

    var pusher = new Pusher('500e0547867ccfe184af', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    }); */

	
	
	
	
        /*        $.ajaxSetup({
         headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
         }
         })*/

        reloadData();
        function reloadData(){
            var module='staff.roles'
            console.log();
            var url='/cabinet/data';
            $.ajax({
                method: 'POST',
                dataType: 'html',
                async:true,
                url: url,
                data: {module: module},
                beforeSend: function() {
                    $('#loader').show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                success: function (data) {

                    $('.result_of_cabinet_table').html(data);

                }
            });



        }


        function reloadMessages(){

            var module='staff.roles'
            console.log();
            var url='/cabinet/messagesData';
            $.ajax({
                method: 'POST',
                dataType: 'html',
                async:false,
                url: url,
                data: {module: module},
                beforeSend: function() {
                    $('#loader2').show();
                },
                complete: function() {
                    $('#loader2').hide();
                },
                success: function (data) {

                    $('.result_of_messages_table').html(data);

                }
            });
        }

        function reloadFavorits(){
            var module='staff.roles'
            console.log();
            var url='/cabinet/favoritsData';
            $.ajax({
                method: 'POST',
                dataType: 'html',
                async:true,
                url: url,
                data: {module: module},
                beforeSend: function() {
                    $('#loader3').show();
                },
                complete: function() {
                    $('#loader3').hide();
                },
                success: function (data) {

                    $('.result_of_cabinet_favorits').html(data);

                }
            });



        }




    </script>
@endsection


@section('scripts_table')
    <script>
        $(document).ready(function(){
            $('.result_of_cabinet_table').delegate('.customSwitch2','change',function(){
                var message=$(this).parent().find('.customSwitch2_id').val()
                var state = $(this).is(":checked")

                $.ajax({
                    method: 'POST',
                    dataType: 'json',
                    async:false,
                    url: '/admin/messages/message_activity_set',
                    data: {message: message,state:state
                    },
                    beforeSend: function() {
                    },
                    complete: function() {

                    },
                    success: function (data) {

                        console.log('success')
                    }
                });
            })
        })
    </script>

@endsection