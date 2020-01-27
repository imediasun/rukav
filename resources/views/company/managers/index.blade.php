@extends('layouts.app_customer')
@section('theme_scripts')


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





    <div class="container">


        <div class="demo">

            <button type="button" class="btn btn-lg btn-primary waves-effect waves-themed" data-toggle="modal" data-target=".default-example-modal-right-lg">
                <span class="fal fa-plus  mr-1"></span>
                Создать менеджера</button>
        </div>


        <div id="panel-7" class="panel">
            <div class="panel-hdr">
                <h2>
                    Таблица  <span class="fw-300"><i>всех менеджеров компании</i></span>
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
                    <div class="panel-tag result_of_managers_table">


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
                    <input type="hidden" id="manager_id" name="manager_id" >
                    <input type="hidden" id="company_id" name="company_id" value="{{$company->id}}">

                    <div class="form-group">
                        <label class="form-label" for="manager_name">Имя пользователя</label>
                        <input type="text" id="manager_name" name="manager_name" class="form-control" placeholder="Имя пользователя">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="manager_login">Логин пользователя</label>
                        <input type="text" id="manager_login" name="manager_login" class="form-control" placeholder="Логин пользователя">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="manager_email">Email</label>
                        <input type="email" id="manager_email" name="manager_email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="company_department">Департамент</label>
                        <input type="text" id="manager_department" name="manager_department" class="form-control" placeholder="Департамент">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="manager_info">Информация о пользователе</label>
                        <textarea class="form-control" id="manager_info" name="manager_info" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="company_address">Адрес</label>
                        <input type="text" id="manager_address" name="manager_address" class="form-control" placeholder="Адрес">
                    </div>





                </div>
                <div class="modal-footer">
                    <button type="button" class="manager_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="manager_create btn btn-primary waves-effect waves-themed">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        $('.manager_create').click(function(){
            console.log(222)
            var manager_name=$('#manager_name').val()
            var manager_id=$('#manager_id').val()
            var manager_login=$('#manager_login').val()
            var company_id=$('#company_id').val()
            var manager_department=$('#manager_department').val()
            var manager_email=$('#manager_email').val()
            var manager_info=$('#manager_info').val()
            var manager_address=$('#manager_address').val()
            console.log(manager_name,manager_email,manager_info,manager_address)

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/managers/create',
                data: {manager_id: manager_id,manager_name: manager_name,manager_login: manager_login,
                    manager_department: manager_department,company_id: company_id,

                    manager_email:manager_email,
                    manager_info:manager_info,
                    manager_address:manager_address
                },
                beforeSend: function() {
                },
                complete: function() {
                    $('.manager_create_close').click();
                    $('#manager_id').val('')
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

                    $('.result_of_managers_table').html(data);

                }
            });


        }





    </script>
@endsection
