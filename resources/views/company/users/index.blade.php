@extends('layouts.app')

@section('content')





    <div class="container">


        <div class="demo">

            <button type="button" class="btn btn-lg btn-primary waves-effect waves-themed" data-toggle="modal" data-target=".default-example-modal-right-lg">
                <span class="fal fa-plus  mr-1"></span>
                Создать пользователя</button>
        </div>


        <div id="panel-7" class="panel">
            <div class="panel-hdr">
                <h2>
                    Таблица  <span class="fw-300"><i>всех пользователей компании</i></span>
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
                    <div class="panel-tag result_of_customers_table">


                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade default-example-modal-right-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-right modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4">Форма добавления пользователя</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="customer_id" name="customer_id" >
                    <input type="hidden" id="company_id" name="company_id" value="{{$company->id}}">
                    <input type="hidden" id="manager_id" name="manager_id" value="1">




                    <div class="form-group">
                        <label class="form-label" for="customer_name">Имя пользователя</label>
                        <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Имя пользователя">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="customer_sername">Фамилия пользователя</label>
                        <input type="text" id="customer_sername" name="customer_sername" class="form-control" placeholder="Фамилия пользователя">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="customer_login">Логин пользователя</label>
                        <input type="text" id="customer_login" name="customer_login" class="form-control" placeholder="Логин пользователя">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="customer_email">Email</label>
                        <input type="email" id="customer_email" name="customer_email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="company_department">Департамент</label>
                        <input type="text" id="customer_department" name="customer_department" class="form-control" placeholder="Департамент">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="company_position">Должность</label>
                        <input type="text" id="customer_position" name="customer_position" class="form-control" placeholder="Должность">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="customer_info">Информация о пользователе</label>
                        <textarea class="form-control" id="customer_info" name="customer_info" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="customer_phone">Контактный телефон</label>
                        <input type="text" id="customer_phone" name="customer_phone" class="form-control" placeholder="Контактный телефон">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="company_address">Адрес</label>
                        <input type="text" id="customer_address" name="customer_address" class="form-control" placeholder="Адрес">
                    </div>





                </div>
                <div class="modal-footer">
                    <button type="button" class="customer_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="customer_create btn btn-primary waves-effect waves-themed">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        $('.customer_create').click(function(){
            console.log(222)
            var customer_name=$('#customer_name').val()
            var customer_sername=$('#customer_sername').val()
            var customer_id=$('#customer_id').val()
            var customer_login=$('#customer_login').val()
            var company_id=$('#company_id').val()
            var manager_id=$('#manager_id').val()
            var customer_department=$('#customer_department').val()
            var customer_position=$('#customer_position').val()
            var customer_email=$('#customer_email').val()
            var customer_info=$('#customer_info').val()
            var customer_phone=$('#customer_phone').val()
            var customer_address=$('#customer_address').val()
            console.log(customer_name,customer_email,customer_info,customer_phone,customer_address)

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/company/users/create',
                data: {customer_id: customer_id,customer_name: customer_name,customer_sername: customer_sername,customer_login: customer_login,
                    customer_department: customer_department,company_id: company_id,manager_id: manager_id,
                    customer_position: customer_position,
                    customer_email:customer_email,
                    customer_info:customer_info,customer_phone:customer_phone,
                    customer_address:customer_address
                },
                beforeSend: function() {
                },
                complete: function() {
                    $('.customer_create_close').click();
                    $('#customer_id').val('')
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
            var url='/admin/company/users/data';
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

                    $('.result_of_customers_table').html(data);

                }
            });


        }





    </script>
@endsection
