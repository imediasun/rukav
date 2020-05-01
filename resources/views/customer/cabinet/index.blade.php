@extends('layouts.app_cabinet')

@section('content')

    <div class="modal fade default-example-modal-center" id="default-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Редактирование роли

                    </h4>

                </div>
                <div class="modal-body">
                    <div class="panel-tag">

                        <input type="hidden" id="role_id" >

                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Название (русский)</label>
                                    <input type="text" id="role_name_russian" class="form-control">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Название (english)</label>
                                    <input type="text" id="role_name_english" class="form-control">
                                </div>
                            </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="role_change_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="role_change btn btn-primary waves-effect waves-themed">Сохранить</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container">




        <div class="panel-container show">
            <div class="panel-content">
                <div class="border px-3 pt-3 pb-0 rounded">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#js_pill_border_icon-2"><i class="fal fa-folder mr-1"></i>Manage my Ads</a></li>
                        <li class="nav-item"><a id="messages" class="nav-link" onclick="reloadMessages()" data-toggle="tab" href="#js_pill_border_icon-3"><i class="fal fa-envelope mr-1"></i>Сообщения</a></li>
                        <li class="nav-item"><a id="Favorites" class="nav-link" data-toggle="tab" href="#js_pill_border_icon-4"><i class="fal fa-heart mr-1"></i>Избранное</a></li>
                    </ul>
                    <div class="tab-content py-3">
                        <div class="tab-pane fade active show" id="js_pill_border_icon-1" role="tabpanel">
                            <div id="panel-1" class="panel">
                                <div class="panel-hdr">
                                    <h2>
                                        Default <span class="fw-300"><i>Panel</i></span>
                                    </h2>
                                </div>
                                <div class="panel-container show">
                                    <div class="panel-content">
                                        <div class="panel-tag">
                                            All panels needs to have an unique ID in order to use the panel funtions. <code>.panel</code> is a container with no padding, <code>.panel-hdr</code> has a <code>min-height</code> value and default <code>flexbox</code> properties. The <code>.panel-toolbar</code> is inserted into <code>.panel-hdr</code> for extra elements. The <code>.panel-container</code> wraps <code>.panel-content</code> which has a predefined padding.
                                        </div>
                                        <p>
                                            Default panel text.
                                        </p>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="tab-pane fade" id="js_pill_border_icon-2" role="tabpanel">

                            <div id="panel-1" class="panel">
                                <div class="panel-hdr">
                                    <h2>
                                        Роли
                                    </h2>
                                </div>


                                <div class="panel-container show">
                                    <div class="panel-content">
                                        <div class="panel-tag">
                                            <div class="demo">
                                            </div>

                                        </div>
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
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="js_pill_border_icon-3" role="tabpanel">

                            <div id="panel-1" class="panel">
                                <div class="panel-hdr">
                                    <h2>
                                        Сообщения
                                    </h2>
                                </div>


                                <div class="panel-container show">
                                    <div class="panel-content">
                                        <div class="panel-tag">
                                            <div class="demo">
                                            </div>

                                        </div>
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
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

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
                async:true,
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