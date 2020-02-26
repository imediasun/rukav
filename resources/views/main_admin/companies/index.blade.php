@extends('layouts.app_customer')
@section('styles')
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css">
<style>


    /*Styling for errors on form*/
    .form_error span {
    width: 80%;
    height: 35px;
    margin: 3px 10%;
    font-size: 1.1em;
    color: #D83D5A;
    }
    .form_error input {
    border: 1px solid #D83D5A;
    }

    /*Styling in case no errors on form*/
    .form_success span {
        width: 80%;
        height: 35px;
        margin: 3px 10%;
        font-size: 1.1em;
        color: green;
    }
    .form_success input {
        border: 1px solid green;
    }
    #error_msg {
        color: red;
        text-align: center;
        margin: 10px auto;
    }
    </style>
@endsection

@section('content')

<?
$createdAt = \Carbon\Carbon::now();
$today=$createdAt->format('m/d/Y');

?>



    <div >


        <div class="demo">

            <button onclick="clearCompanyAdding()" type="button" class="btn btn-lg btn-primary waves-effect waves-themed" data-toggle="modal" data-target=".default-example-modal-right-lg-company">
                <span class="fal fa-plus  mr-1"></span>
                Создать компанию</button>
        </div>


        <div id="panel-7" class="panel">
            <div class="panel-hdr">
                <h2>
                    Таблица  <span class="fw-300"><i>всех компаний</i></span>
                </h2>
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

    <div class="modal fade default-example-modal-right-lg-company" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-right modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4">Форма добавления компании</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>

                <form class="needs-validation" id="company_create" novalidate >
                <div class="modal-body">
                    <input type="hidden" id="company_id" name="company_id" >

                    <div class="form-group">
                        <label class="form-label" for="company_name">Название компании</label>
                        <input type="text" id="company_name" name="company_name" class="form-control" required placeholder="Название компании">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="company_admin_name">Имя администратора</label>
                        <input type="text" id="company_admin_name" name="company_admin_name" class="form-control" required placeholder="Имя администратора">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="company_admin_name">Фамилия администратора</label>
                        <input type="text" id="company_admin_sername" name="company_admin_sername" class="form-control" required placeholder="Фамилия администратора">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="company_email">Email администратора</label>
                        <input type="email" id="company_email" name="company_email" class="form-control " pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  required placeholder="Email">
                        <span class="has_been_taken_message" style="display:none;color:red"> Email has been taken</span>
                        <span></span>
                    </div>

                    <!--div class="form-group">
                        <label class="form-label" for="company_info">Информация о компании</label>
                        <textarea class="form-control" id="company_info" name="company_info" rows="5"></textarea>
                    </div-->

                    <div class="form-group">
                        <label class="form-label" for="company_phone">Контактный телефон</label>
                        <input type="text" id="company_phone" name="company_phone" class="form-control" required placeholder="Контактный телефон">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="company_address">Адрес</label>
                        <input type="text" id="company_address" name="company_address" class="form-control" required placeholder="Адрес">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="company_biling_address">Финансовый адрес</label>
                        <input type="text" id="company_biling_address" name="company_biling_address" class="form-control" required placeholder="Финансовый адрес">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="company_address">Web</label>
                        <input type="text" id="company_web" name="company_web" class="form-control" required placeholder="Web">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label col-12 col-lg-3 form-label text-lg-right">Registration date</label>
                        <div class="col-12 col-lg-6 ">
                            <input type="text" class="form-control" id="datepicker-1" readonly placeholder="Select date" value="{{$today}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="company_clients_segment">Clients Segment</label>
                        <input type="text" id="company_clients_segment" name="company_clients_segment" required class="form-control" placeholder="Clients Segment">
                    </div>




                </div>

                    <div class="modal-footer">
                        <button type="button" class="company_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="company_create btn btn-primary waves-effect waves-themed">Сохранить</button>
                    </div>
                </form>

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
    <script src="/NewSmartAdmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script>
        $(document).ready(function () {
            $("#company_create").submit(function (event) {
                event.preventDefault();
                $('.has_been_taken_message').hide();
                //console.log(form[0].checkValidity())

                if (localStorage.getItem('email_state') == 1) {
                    console.log(777)
                    console.log(555)
                    $('#company_email').closest('.form-control').removeClass('is-valid').addClass('is-invalid')
                    $('#company_create').removeClass('was-validated')
                    $('.has_been_taken_message').show();
                }
                else {
                    $('#customer_create').addClass('was-validated')
                    console.log(222)
                    var company_name = $('#company_name').val()
                    var company_admin_name = $('#company_admin_name').val()
                    var company_admin_sername = $('#company_admin_sername').val()
                    var company_id = $('#company_id').val()
                    var company_email = $('#company_email').val()
                    var company_info = $('#company_info').val()
                    var company_phone = $('#company_phone').val()
                    var company_address = $('#company_address').val()
                    var company_web = $('#company_web').val()
                    var company_clients_segment = $('#company_clients_segment').val()
                    var company_biling_address = $('#company_biling_address').val()

                    var company_registration_date = $('#datepicker-1').val()
                    console.log(company_name, company_email, company_info, company_phone, company_address, company_biling_address, company_clients_segment)


                    $.ajax({
                        url: '/admin/main_admin/company/create',
                        method: 'POST',
                        dataType: 'json',
                        async: false,

                        data: {
                            company_id: company_id,
                            company_name: company_name,
                            company_admin_name: company_admin_name,
                            company_admin_sername: company_admin_sername,
                            company_email: company_email,
                            company_info: company_info,
                            company_phone: company_phone,
                            company_address: company_address,
                            company_web: company_web,
                            company_biling_address: company_biling_address,
                            registration_date: company_registration_date,
                            clients_segment: company_clients_segment

                        },
                        beforeSend: function () {
                        },
                        complete: function () {
                            $('.company_create_close').click();
                            $('#company_id').val('')
                            reloadData();
                        },
                        success: function (data) {

                            console.log('success')

                        }
                    });


                    /*    })*/
                }

            });

            runDatePicker();
        })
        // Class definition

        var controls = {
            leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
            rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
        }

        var runDatePicker = function()
        {

            // minimum setup
            $('#datepicker-1').datepicker(
                {
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: controls
                });


            // input group layout
            $('#datepicker-2').datepicker(
                {
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: controls
                });

            // input group layout for modal demo
            $('#datepicker-modal-2').datepicker(
                {
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: controls
                });

            // enable clear button
            $('#datepicker-3').datepicker(
                {
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });

            // enable clear button for modal demo
            $('#datepicker-modal-3').datepicker(
                {
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });

            // orientation
            $('#datepicker-4-1').datepicker(
                {
                    orientation: "top left",
                    todayHighlight: true,
                    templates: controls
                });

            $('#datepicker-4-2').datepicker(
                {
                    orientation: "top right",
                    todayHighlight: true,
                    templates: controls
                });

            $('#datepicker-4-3').datepicker(
                {
                    orientation: "bottom left",
                    todayHighlight: true,
                    templates: controls
                });

            $('#datepicker-4-4').datepicker(
                {
                    orientation: "bottom right",
                    todayHighlight: true,
                    templates: controls
                });

            // range picker
            $('#datepicker-5').datepicker(
                {
                    todayHighlight: true,
                    templates: controls
                });

            // inline picker
            $('#datepicker-6').datepicker(
                {
                    todayHighlight: true,
                    templates: controls
                });
        }



        $('#company_email').change(function(){
            var company_email = $('#company_email').val()

            $.ajax({
                url: '/admin/main_admin/company/email_check',
                method: 'POST',
                dataType: 'json',
                async: false,
                data: {
                    'email_check': 1,
                    'email': company_email,
                },
                success: function (response) {
                    console.log(response )
                    if (response == 'taken') {
                        localStorage.setItem('email_state',1);
console.log(response )
                        $('#company_email').addClass("is-invalid");
                        $('#company_email').removeClass("is-valid");
             /*           $('#company_email').parent().removeClass();
                        $('#company_email').parent().addClass("form_error");
                        $('#company_email').siblings("span").text('Sorry... Email already taken');*/
                    } else if (response == 'not_taken') {
                        console.log(response )
                        localStorage.setItem('email_state',0);
                        $('#company_email').removeClass("is-invalid");
                        $('#company_email').addClass("is-valid");
                 /*       $('#company_email').parent().removeClass();
                        $('#company_email').parent().addClass("form_success");
                        $('#company_email').siblings("span").text('Email available');*/
                    }
                }
            });
        })

     /*   $('.company_create').click(function(){*/

        function  theSubmitFunction() {

        }


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


function clearCompanyAdding(){
    $('#company_id').val("")
    $('#company_name').val("")
    $('#company_admin_name').val("")
    $('#company_admin_sername').val("")
    $('#company_email').val("")
    $('#company_info').val("")
    $('#company_phone').val("")
    $('#company_address').val("")
    $('#company_biling_address').val("")
    $('#company_clients_segment').val("")
            $('#company_create').removeClass('was-validated');

}


        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false || localStorage.getItem('email_state')==1) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        if(localStorage.getItem('email_state') != 1){
                            console.log(888)
                            form.classList.add('was-validated');}
                    }, false);
                });
            }, false);
        })();


    </script>
@endsection
