@extends('layouts.app_customer')
@section('styles')
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css">
@endsection
@section('theme_scripts')


    <?
    $createdAt = \Carbon\Carbon::now();
    $today=$createdAt->format('m/d/Y');

    ?>

    <script>
        /**
         *	This script should be placed right after the body tag for fast execution
         *	Note: the script is written in pure javascript and does not depend on thirdparty library
         **/

        var company_id='{{$company_id}}';



        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/customer/get_theme", true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(JSON.stringify({
            company_id: company_id
        }));
        xhr.onload = function() {
            console.log("HELLO")
            console.log(this.responseText);
            var data = JSON.parse(this.responseText);
            console.log(data);
            localStorage.setItem("themeSettings",data.theme_options);
        }


        console.log(company_id)



        'use strict';

        var classHolder = document.getElementsByTagName("BODY")[0],
            /**
             * Load from localstorage
             **/
            themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
            themeURL = themeSettings.themeURL || '',
            themeOptions = themeSettings.themeOptions || '';
        /**
         * Load theme options
         **/
        if (themeSettings.themeOptions)
        {
            classHolder.className = themeSettings.themeOptions;
            console.log("%c✔ Theme settings loaded", "color: #148f32");
        }
        else
        {
            console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
        }
        if (themeSettings.themeURL && !document.getElementById('mytheme'))
        {
            var cssfile = document.createElement('link');
            cssfile.id = 'mytheme';
            cssfile.rel = 'stylesheet';
            cssfile.href = themeURL;
            document.getElementsByTagName('head')[0].appendChild(cssfile);
        }
        /**
         * Save to localstorage
         **/
        var saveSettings = function()
        {
            themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
            {
                return /^(nav|header|mod|display)-/i.test(item);
            }).join(' ');
            if (document.getElementById('mytheme'))
            {
                themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
            };
            localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            console.log('Saved Theme setting')

        }
        /**
         * Reset settings
         **/
        var resetSettings = function()
        {
            localStorage.setItem("themeSettings", "");
        }

    </script>
@endsection
@section('content')




        <div class="demo">

            <button type="button" onclick="clearCustomerAdding()" class="btn btn-lg btn-primary waves-effect waves-themed" data-toggle="modal" data-target=".default-example-modal-right-lg-user">
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


    <div class="modal fade default-example-modal-right-lg-user" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-right modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4">Форма добавления пользователя</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>

                <form class="needs-validation" id="customer_create" novalidate onsubmit="theSubmitFunction(); return false;">

                <div class="modal-body">
                    <input type="hidden" id="customer_id" name="customer_id" value="0">
                    <input type="hidden" id="company_id" name="company_id" value="{{$company->id}}">
                    <input type="hidden" id="manager_id" name="manager_id" value="1">




                    <div class="form-group">
                        <label class="form-label" for="customer_name">Имя пользователя</label>
                        <input type="text" id="customer_name" name="customer_name" required class="form-control" placeholder="Имя пользователя">

                    </div>
                    <div class="form-group">
                        <label class="form-label" for="customer_sername">Фамилия пользователя</label>
                        <input type="text" id="customer_sername" name="customer_sername" required class="form-control" placeholder="Фамилия пользователя">

                    </div>

                    <div class="form-group">
                        <label class="form-label" for="customer_sex">Пол</label>
                        <select class="form-control" id="customer_sex">
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="managerSwitch" >
                            <label class="custom-control-label" for="managerSwitch">Менеджер/не менеджер</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="select">Назначить этому пользователю менеджера</label>
                        <select   class="form-control" id="select">
                              @foreach($managers as $manager)
                                    <option value="{{$manager->id}}">{{$manager->user->name}} {{$manager->user->sername}}</option>
                                @endforeach
                        </select>




                    </div>

                    <div class="form-group">
                        <label class="form-label" for="customer_location">Местонахождение пользователя</label>
                        <input type="text" id="customer_location" name="customer_location" class="form-control" placeholder="Локация пользователя">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="customer_email">Email</label>
                        <input type="email" id="customer_email" name="customer_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required email class="form-control" placeholder="Email">

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
                        <label class="form-label" for="customer_phone">Контактный телефон</label>
                        <input type="text" id="customer_phone" name="customer_phone" class="form-control" placeholder="Контактный телефон">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label col-12 col-lg-3 form-label text-lg-right">Birth date</label>
                        <div class="col-12 col-lg-6 ">
                            <input type="text" class="form-control" id="datepicker-1" readonly placeholder="Select date" value="{{$today}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label col-12 col-lg-3 form-label text-lg-right">Start date</label>
                        <div class="col-12 col-lg-6 ">
                            <input type="text" class="form-control" id="datepicker-2" readonly placeholder="Select date" value="{{$today}}">
                        </div>
                    </div>






                </div>
                <div class="modal-footer">
                    <button type="button" class="customer_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="customer_create btn btn-primary waves-effect waves-themed" >Сохранить</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/NewSmartAdmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script>


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


$(document).ready(function(){ runDatePicker();})

$('#managerSwitch').change(function(){
    console.log('Manager1',$(this).is(':checked'))
})


       /* $('.customer_create').click(function(){*/
function  theSubmitFunction () {


    var form=$('#customer_create')
    if (form[0].checkValidity() === false) {
console.log(777)
    }
    else {


        console.log(222, company_id)
        var customer_name = $('#customer_name').val()
        var customer_sername = $('#customer_sername').val()
        var customer_sex = $('#customer_sex').val()
        var customer_location = $('#customer_location').val()
        var customer_id = $('#customer_id').val()
        var manager = $('#managerSwitch').is(':checked')
        var manager_id = $('#select').val()
        var customer_department = $('#customer_department').val()
        var customer_position = $('#customer_position').val()
        var customer_email = $('#customer_email').val()
        var customer_birth_date = $('#datepicker-1').val()
        var customer_start_date = $('#datepicker-2').val()
        console.log(customer_name, customer_email, company_id)

        $.ajax({
            method: 'POST',
            dataType: 'json',
            async: false,
            url: '/company/users/create',
            data: {
                customer_id: customer_id, customer_name: customer_name, customer_sername: customer_sername,
                customer_sex: customer_sex, customer_location: customer_location,
                customer_department: customer_department, company_id: company_id, manager_id: manager_id,
                customer_position: customer_position,
                customer_email: customer_email, manager: manager,
                birth_date:customer_birth_date,
                start_date:customer_start_date
            },
            beforeSend: function () {
            },
            complete: function () {
                $('.customer_create_close').click();
                $('#customer_id').val('')
                reloadData();

            },
            success: function (data) {

                console.log('success')
                reloadData();
            }
        });
    }
}
      /*  })*/



        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        reloadData();
        function reloadData(){

            var module='admin.company.users.data'
            var url='/company/users/data';
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


(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();


function clearCustomerAdding(){
    $('#customer_create').removeClass('was-validated');
    $('#customer_id').val("")
    $('#customer_name').val("")
    $('#customer_sername').val("")
    $('#customer_location').val("")
    $('#customer_department').val("")
    $('#customer_position').val("")
    $('#customer_email').val("")
    $('#customer_phone').val("")

}


    </script>
@endsection
