@extends('layouts.app')

@section('content')





    <div class="container">


        <div class="demo">

            <button type="button" class="btn btn-lg btn-primary waves-effect waves-themed" data-toggle="modal" data-target=".default-example-modal-right-lg">
                <span class="fal fa-plus  mr-1"></span>
                Создать группу бэйджей</button>
        </div>


        <div id="panel-7" class="panel">
            <div class="panel-hdr">
                <h2>
                    Таблица  <span class="fw-300"><i>всех групп бэйджей</i></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="panel-tag">
                        Вы можете редактировать информацию нажав на  <a href="utilities_color_pallet.html" title="Color Pallets">карандаш</a> справа от информации
                    </div>
                    <h5 class="frame-heading">
                        Пользователи
                    </h5>
                    <div id="loader">
                        <div class="border p-3">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-tag result_of_badges_groups_table">


                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade default-example-modal-right-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-right modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4">Форма добавления группы бэйджей</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="badges_group_id" name="badges_group_id" >

                    <div class="form-group">
                        <label class="form-label" for="badges_group_name">Название группы бэйджей</label>
                        <input type="text" id="badges_group_name" name="badges_group_name" class="form-control" placeholder="Имя пользователя">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="badges_group_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="badges_group_create btn btn-primary waves-effect waves-themed">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        $('.badges_group_create').click(function(){
            console.log(222)
            var badges_group_name=$('#badges_group_name').val()
            var badges_group_id=$('#badges_group_id').val()

            console.log(badges_group_name)

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/badges_groups/create',
                data: {badges_group_id: badges_group_id,badges_group_name: badges_group_name
                },
                beforeSend: function() {
                },
                complete: function() {
                    $('.badges_group_create_close').click();
                    $('#badges_group_id').val('')
                    reloadData();
                },
                success: function (data) {

                    console.log('success')

                }
            });
        })



        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        reloadData();
        function reloadData(){
            var module='admin.company.users.data'
            var url='/admin/main_admin/badges_groups/data';
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

                    $('.result_of_badges_groups_table').html(data);

                }
            });


        }





    </script>
@endsection
