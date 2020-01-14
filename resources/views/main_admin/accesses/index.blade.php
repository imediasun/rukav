@extends('layouts.app')

@section('content')





    <div class="container">
        <div class="demo">
            <button type="button" class="PrependCreateAdmin btn btn-lg btn-primary waves-effect waves-themed" data-toggle="modal" data-target=".default-example-modal-right-lg">
                <span class="fal fa-plus  mr-1"></span>
                Создать администратора</button>
        </div>


        <div id="panel-7" class="panel">
            <div class="panel-hdr">
                <h2>
                    Таблица  <span class="fw-300"><i>всех администраторов</i></span>
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
                        Администраторы
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
                    <div class="panel-tag result_of_admins_table">


                    </div>

                </div>
            </div>
        </div>
    </div>

<div class="result_of_admins_form"></div>
@endsection

@section('scripts')
    <script>

        $('.admin_create').click(function(){
            console.log(222)
            var company_name=$('#company_name').val()
            var company_id=$('#company_id').val()
            var company_email=$('#company_email').val()
            var company_info=$('#company_info').val()
            var company_phone=$('#company_phone').val()
            var company_address=$('#company_address').val()
            var company_biling_address=$('#company_biling_address').val()
            console.log(company_name,company_email,company_info,company_phone,company_address,company_biling_address)

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/main_admin/company/create',
                data: {company_id: company_id,company_name: company_name,company_email:company_email,
                    company_info:company_info,company_phone:company_phone,
                    company_address:company_address,company_biling_address:company_biling_address
                },
                beforeSend: function() {
                },
                complete: function() {
                    $('.company_create_close').click();
                    $('#company_id').val('')
                    reloadData();
                },
                success: function (data) {

                    console.log('success')

                }
            });
        });

        $('.PrependCreateAdmin').click(function(event){
            console.log(11)
            event.preventDefault();
            var myModal = $(this).data('target');
            var remote_content = this.href;
            $.ajax({
                method: 'POST',
                dataType: 'html',
                async:true,
                url: '/admin/main_admin/accesses/getForm',
                data: {},
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {
                    console.log(321)
                    $('.result_of_admins_form').html(data);
                    $('.default-example-modal-right-lg').modal("show");

                    console.log('success')

                }
            });
        });



        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        reloadData();
        function reloadData(){
            var module='admin.main_admin.accesses.data'
            var url='/admin/main_admin/accesses/data';
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

                    $('.result_of_admins_table').html(data);

                }
            });


        }

        function emptyModal(){
            $('.result_of_admins_form').empty()
        }

        $('.result_of_admins_form').delegate( ".admin_create_close", "click", function() {
            $('.default-example-modal-right-lg').modal("hide");
            setTimeout(emptyModal, 200);


            console.log(555)
        }).delegate( ".admin_create_close_cross", "click", function() {
            $('.default-example-modal-right-lg').modal("hide");
            setTimeout(emptyModal, 200);


            console.log(777)
        });







    </script>
@endsection
