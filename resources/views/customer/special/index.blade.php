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


                <ol class="breadcrumb page-breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">SmartAdmin</a></li>
                    <li class="breadcrumb-item">Application Intel</li>
                    <li class="breadcrumb-item active">Analytics Dashboard</li>
                    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                </ol>
                <div class="subheader">

                    <h1 class="subheader-title d-sm-flex" style="width:60px">
                        <span class="profile-image rounded-circle d-block" style="display:inline-block;padding-bottom:50px;padding-left:15px;@if(isset($special_customer->getCustomersCompany)) background-image:url('/storage/avatars/{{$special_customer->getCustomersCompany->photo}}') @else  background-image:url('/storage/avatars/avatar-a.png')@endif; background-size: cover;"> </span>

                    </h1>
                    <h1 class="subheader-title  align-items-center" style="margin-left:-350px;">
                    <i  class='subheader-icon fal fa-chart-area'></i> {{$special_customer->sername}} <span class='fw-300'>{{$special_customer->name}}</span>
                    </h1>
                    <h1 class="subheader-title  align-items-center" style="width:500px">

                    </h1>

                </div>

        <div class="row">
           </div>
        <div class="row" style="padding-bottom:50px;padding-left:15px">
            <div class="filters align-items-center" style="clear:both;display:block">
            <button type="button" class="btn btn-xs btn-outline-info waves-effect waves-themed personal_badge" data-toggle="modal" data-target=".default-example-modal-right-lg">Отправить персональный бэйдж пользователю <i  class='subheader-icon fal fa-chart-area'></i> {{$special_customer->sername}} <span class='fw-300'>{{$special_customer->name}}</span></button>
                <input type="hidden" class="personal_badge_customer_id" value="{{$special_customer->id}}">
            </div>
        </div>
                <div class="row">

                    <div class="col-lg-6">
                        <div class="timeline">

                        </div>

                        <div style="margin-top:50px">
                            <button class="btn btn-sm btn-primary previous"> Предыдущая страница</button>
                            <button class="btn btn-sm btn-primary next"> Следующая страница</button>

                        </div>

                    </div>



                    <div class="col-lg-3">
                        <div id="panel-2" class="panel" data-panel-fullscreen="false">
                            <div class="panel-hdr">
                                <h2>
                                    Leadersboard sent
                                </h2>
                            </div>
                            <div class="frame-wrap">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Gives</th>
                                        <th>Received</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-j.png')"></span>
                                                            </span>


                                        </td>
                                        <td>22</td>
                                        <td>33</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-admin.png')"></span>
                                                            </span>

                                        </td>
                                        <td>21</td>
                                        <td>23</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>
                                           <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-j.png')"></span>
                                                            </span>

                                        </td>
                                        <td>12</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>
                                            <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-admin.png')"></span>
                                                            </span>

                                        </td>
                                        <td >11</td>
                                        <td>10</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>




                        <div id="panel-2" class="panel" data-panel-fullscreen="false">
                            <div class="panel-hdr">
                                <h2>
                                    Leadersboard received
                                </h2>
                            </div>
                            <div class="frame-wrap">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Gives</th>
                                        <th>Received</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-j.png')"></span>
                                                            </span>


                                        </td>
                                        <td>22</td>
                                        <td>33</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-admin.png')"></span>
                                                            </span>

                                        </td>
                                        <td>21</td>
                                        <td>23</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>
                                           <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-j.png')"></span>
                                                            </span>

                                        </td>
                                        <td>12</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>
                                            <span class="status status-danger">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-admin.png')"></span>
                                                            </span>

                                        </td>
                                        <td >11</td>
                                        <td>10</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>




                </div>
    </div>
@endsection
<? $current=(!isset($current)) ? 'undefined' : $current;?>
@section('scripts')

    <script>
        window.current=null;
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })
        localStorage.setItem('lentaFilter',0);
        reloadData('start');
        function reloadData(action){

            var lentaFilter=localStorage.getItem('lentaFilter');
            var last = '{{ $current }}'
            var module='admin.company.users.data'
            var url='/customer/user_interface/getData';
            var view_url='/customer/user_interface/dataSpecial';
            var perpage=4

            if(!window.page){
                var page= 1;
                console.log('current=>',page)
            }
            else{ var page= window.page; console.log('current=>',page)}
            var special_customer='{{$special_customer_id}}'
            var user_id='{{$user_id}}';
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:true,
                url: url,
                data: {module: module,page:page,user_id:user_id,action:action,perpage:perpage,lenta_filter:lentaFilter,special_customer:special_customer},
                beforeSend: function() {
                    $('#loader').show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                success: function (data) {
                console.log('RESULT=>',data.result)
                    console.log('PREVIOUS <=',data.previous)
                    console.log('NEXT =>',data.next)
                    console.log('NEXT_Button =>',data.next_button)
                    if(data.next_button==false){
                    $('.next').hide();
                    }
                    else if(data.next_button==true){
                        $('.next').show();
                    }
                    if(data.previous_button==false){
                        $('.previous').hide();
                    }
                    else if(data.previous_button==true){
                        $('.previous').show();
                    }
                    window.page=data.page
                     //$('.timeline').html(data);
                    $.ajax({
                        method: 'POST',
                        dataType: 'html',
                        async:true,
                        url: view_url,
                        data: {array: data.result},
                        beforeSend: function() {
                            $('#loader').show();
                        },
                        complete: function() {
                            $('#loader').hide();
                        },
                        success: function (sata) {
                            $('.timeline').html(sata);

                        }
                    });

                }
            });


        }


        $('.next').click(function(){
            reloadData('next');
        })

        $('.previous').click(function(){
            reloadData('previous');
        })


    </script>

    @endsection