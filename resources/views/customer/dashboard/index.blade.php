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

                    <h1 class="subheader-title">
                        <i class='subheader-icon fal fa-chart-area'></i> Analytics <span class='fw-300'>Dashboard</span>
                    </h1>

                 </div>
        <div class="row" style="padding-bottom:50px;padding-left:15px">
            <div class="filters align-items-center" style="clear:both;display:block">
                <button id="filterAll" type="button" class="btn btn-xs btn-outline-primary waves-effect waves-themed" onclick="localStorage.setItem('lentaFilter',0);reloadData('start');reloadFilterButtons()">All</button>
                <button id="filterMyTeam" type="button" class="btn btn-xs btn-outline-warning waves-effect waves-themed " onclick="localStorage.setItem('lentaFilter',1);reloadData('start');reloadFilterButtons()">My Team</button>
                <button id="filterMe" type="button" class="btn btn-xs btn-outline-info waves-effect waves-themed" onclick="localStorage.setItem('lentaFilter',2);reloadData('start');reloadFilterButtons()">Me</button>
            </div>
        </div>
                <div class="row">

                    <div class="col-lg-6">
                        <div class="timeline">

                        </div>

                        <div style="margin-top:50px">
                            <button class="btn btn-sm btn-primary previous" onclick="reloadFilterButtons()"> Предыдущая страница</button>
                            <button class="btn btn-sm btn-primary next" onclick="reloadFilterButtons()"> Следующая страница</button>

                        </div>

                    </div>



                    <div class="col-lg-3">
                        <div id="leadersSentData">

                    </div>



                        <div id="leadersReceivedData">

                        </div>
                    </div>




                </div>
    </div>
@endsection
<? $current=(!isset($current)) ? 'undefined' : $current;?>
@section('scripts')

    <script>

        reloadFilterButtons()
        function reloadFilterButtons(){
            if(localStorage.getItem('lentaFilter')==1){
                $('#filterMyTeam').addClass('active')
                $('#filterMe').removeClass('active')
                $('#filterAll').removeClass('active')
            }
            if(localStorage.getItem('lentaFilter')==0){
                $('#filterAll').addClass('active')
                $('#filterMe').removeClass('active')
                $('#filterMyTeam').removeClass('active')
            }
            if(localStorage.getItem('lentaFilter')==2){
                $('#filterMe').addClass('active')
                $('#filterAll').removeClass('active')
                $('#filterMyTeam').removeClass('active')
            }

        }


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
            var view_url='/customer/user_interface/data';
            var leaders_sent_url='/customer/user_interface/leadersSentData';
            var leaders_received_url='/customer/user_interface/leadersReceivedData';
            var perpage=4

            if(!window.page){
                var page= 1;
                console.log('current=>',page)
            }
            else{ var page= window.page; console.log('current=>',page)}

            var user_id='{{$user_id}}';
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:true,
                url: url,
                data: {module: module,page:page,user_id:user_id,action:action,perpage:perpage,lenta_filter:lentaFilter},
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

                    $.ajax({
                        method: 'POST',
                        dataType: 'html',
                        async:true,
                        url: leaders_sent_url,
                        data: {array: data.result},
                        beforeSend: function() {
                            $('#loader').show();
                        },
                        complete: function() {
                            $('#loader').hide();
                        },
                        success: function (wata) {
                            $('#leadersSentData').html(wata);
                            console.log('leadersBoard',wata)

                        }
                    });

                    $.ajax({
                        method: 'POST',
                        dataType: 'html',
                        async:true,
                        url: leaders_received_url,
                        data: {array: data.result},
                        beforeSend: function() {
                            $('#loader').show();
                        },
                        complete: function() {
                            $('#loader').hide();
                        },
                        success: function (wata) {
                            $('#leadersReceivedData').html(wata);
                            console.log('leadersBoard',wata)

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