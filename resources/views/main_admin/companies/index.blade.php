@extends('layouts.app')

@section('content')





    <div >


        <div class="demo">

            <button type="button" class="btn btn-lg btn-primary waves-effect waves-themed" data-toggle="modal" data-target=".default-example-modal-right-lg">
                <span class="fal fa-plus  mr-1"></span>
                Создать компанию</button>
        </div>


        <div id="panel-7" class="panel">
            <div class="panel-hdr">
                <h2>
                    Таблица  <span class="fw-300"><i>всех компаний</i></span>
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
                        Компании
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
                    <div class="panel-tag result_of_companies_table">


                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade default-example-modal-right-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-right modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4">Форма добавления компании</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="company_id" name="company_id" >

                    <div class="form-group">
                        <label class="form-label" for="company_name">Название компании</label>
                        <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Название компании">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="company_email">Email</label>
                        <input type="email" id="company_email" name="company_email" class="form-control" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="company_info">Информация о компании</label>
                        <textarea class="form-control" id="company_info" name="company_info" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="company_phone">Контактный телефон</label>
                        <input type="text" id="company_phone" name="company_phone" class="form-control" placeholder="Контактный телефон">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="company_address">Адрес</label>
                        <input type="text" id="company_address" name="company_address" class="form-control" placeholder="Адрес">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="company_biling_address">Финансовый адрес</label>
                        <input type="text" id="company_biling_address" name="company_biling_address" class="form-control" placeholder="Финансовый адрес">
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="company_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="company_create btn btn-primary waves-effect waves-themed">Сохранить</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade default-badges-modal-right-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-right modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4">Форма добавления бэйджей для компании</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">

                   <div class="result_of_company_badges_groups_table"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="company_badges_grops_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script>

        $('.company_create').click(function(){
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
        })



        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        reloadData();
        function reloadData(){
            var module='admin.main_admin.company.data'
            var url='/admin/main_admin/company/data';
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

                    $('.result_of_companies_table').html(data);

                }
            });


        }





    </script>
@endsection
