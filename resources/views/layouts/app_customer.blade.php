<!DOCTYPE html>
<!--
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.0.2
Author: Sunnyat Ahmmed
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        Page Titile - category_1 - SmartAdmin v4.0.2
    </title>
    <meta name="description" content="Page Titile">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/vendors.bundle.css">
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/app.bundle.css">
    <link rel="stylesheet" media="screen, print" href="/style.css">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="/NewSmartAdmin/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/NewSmartAdmin/img/favicon/favicon-32x32.png">
    <link rel="mask-icon" href="/NewSmartAdmin/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/formplugins/select2/select2.bundle.css">
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/formplugins/summernote/summernote.css">
@yield('styles')
    <!--<link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/your_styles.css">-->
</head>
<body class="mod-bg-1 ">
<!-- DOC: script to save and load page settings -->
<script>
    /**
     *	This script should be placed right after the body tag for fast execution
     *	Note: the script is written in pure javascript and does not depend on thirdparty library
     **/
    var company_id='{{$company_id}}';
window.company_id='{{$company_id}}';


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
        if(data){
        localStorage.setItem("themeSettings",data.theme_options);}
    }

    'use strict';

    var classHolder = document.getElementsByTagName("BODY")[0],
        /**
         * Load from localstorage
         **/
        themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) : {},


        themeURL = themeSettings.themeURL || '',
        themeOptions = themeSettings.themeOptions || '';
    console.log(themeSettings)
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
        console.log('here')
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
        var company_id='<? echo $company_id;?> ';
        console.log(company_id);
        $.ajax({
            method: 'POST',
            dataType: 'html',
            async:true,
            url: '/company/save_theme',
            data: {theme_options: JSON.stringify(themeSettings),company_id:company_id},
            beforeSend: function() {
                $('#loader').show();
            },
            complete: function() {
                $('#loader').hide();
            },
            success: function (data) {


            }
        });
    }
    /**
     * Reset settings
     **/
    var resetSettings = function()
    {
        localStorage.setItem("themeSettings", "");
    }

</script>
<!-- DOC: script to save and load page settings -->


<!-- BEGIN Page Wrapper -->
<div class="page-wrapper">

        <div style="position:absolute;top:0px;left:0px;width:100%;height:250px;background-image: url('/storage/banners/1.jpg') !important;background-position: center;background-size: cover;">


        </div>
    <div class="Menu_giveBadgeWrap__28NpB" style="margin-top:200px" data-toggle="modal" data-target=".default-example-modal-right-lg" onclick="localStorage.setItem('personalBadegeCustomerId',0);reloadPage()">Создать</div>


    <style>

        .Menu_giveBadgeWrap__28NpB {
            padding: 34px 0 28px;
            width: 86px;
            position: absolute;
            top: -20px;
            right: calc(50% - 47px);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Sans Semibold,Arial,sans-serif;
            font-size: 14px;
            line-height: 24px;
            text-transform: uppercase;
            border: 4px solid #fff;
            border-radius: 50%;
            background: #62a231;
            background: linear-gradient(250deg,#c8de49,#62a231);
            box-shadow: 0 4px 22px 0 rgba(44,47,60,.16);
            transition: background 1s ease;
            cursor: pointer;
            z-index:999;
        }

        .single_badge{
            width:100px;
            height:100px;
            transition: all .1s ease-in-out;
        }
        .single_badge:hover{
            cursor:pointer;
            transform: scale(1.4);
         }
        .single_badge:hover >.badge_border{
            width:170px;
            height:170px;
            overflow:hidden;
        }

        span.select2-container {
            //z-index:10050;
        }
    </style>


    <div style="display:block;width:160px;height:160px;position:absolute;top:90px;left:40px;z-index:99999">
        <img src="/NewSmartAdmin/img/demo/avatars/avatar-admin.png" style="position:relative;width:160px;height:160px;" class="profile-image " alt="Dr. Codex Lantern">
    </div>




    <div class="modal fade default-example-modal-right-lg" id="badges_modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-right modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4 sending_badge_title">Новая благодарность сотруднику</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="company_id" name="company_id" >

                    @foreach($company_badges_groups as $group)
                        @if($group->group)
                        <h3>{{$group->group->name}}</h3>
                        <?$i=1;

                        $cnt=count($group->badges);
                        ?>
                        @foreach($group->badges as $badges)
                            @if($i==1 || (($i%4+1)==2) )
                                <div>
                                @else

                                    @endif


                                    <div class="badge_border" style="position:relative;padding:30px;width:170px;height:170px;display:inline-block;border: 1px solid #eee">
                                        <input type="hidden" class="badge_num" value="{{$i}}">
                                        <input type="hidden" class="badge_id" value="{{$badges->id}}">
                                        <input type="hidden" class="badge_name" value="{{$badges->name}}">
                                        <img src="/storage/badges/{{$badges->photo}}" style="position:absolute" class="single_badge"> </div>

                                    <!--Или  если бейдж принадлежит остатку бейджей в группе-->
                                    @if($i%4==0 || $cnt==$i)


                                            <div style="height:750px;width:100%;background:#eee;position:relative;display:none;padding-top:25px" class="sending_group">
                                                <input type="hidden" class="sending_badges_group" value="{{$group->id}}">
                                                <input type="hidden" class="sending_badges_customer" value="{{\Auth::user()->id}}">

                                                <form class="badges_form" id="badge_form_{{$badges->id}}">

                                                    <h3 class="badge_name"></h3>

                                                    <input type="hidden" class="sending_badge_user" value="">
                                                    <div class="form-group personal_select" >
                                                        <label class="form-label" >
                                                            Select remote Ajax search
                                                        </label>
                                                        <select data-placeholder="Select a state..." class="js-data-example-ajax form-control " ></select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="example-email-2">Облвсть видимости юэйджа</label>
                                                        <select class="form-control sending_badge_visibility">

                                                            <option value="1">All</option>
                                                            <option value="2">Employe & manager</option>
                                                            <option value="3">Employe</option>

                                                        </select>
                                                    </div>

                                                    <div class="form-group">

                                                        <input type="hidden" class="form-control sending_badge_title" value="" />
                                                    </div>

                                                    <div class="form-group summerBlock">
                                                        <label class="form-label" for="example-textarea">Сопроводительный текст</label>


                                                        <!--textarea class="form-control sending_badge_textarea"  rows="5"></textarea-->
                                                    </div>

                                                    <button type="button" data-toggle="modal" data-target="#getCroppedCanvasModal" data-dismiss="modal" data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }" class=" sending_badge_submit btn btn-primary waves-effect waves-themed">Отправить бэйдж</button>
                                                </form>
                                            </div>

                                    @endif



                @if($i%4==0 || $cnt==$i )
                    </div>
                        @endif

                <?$i++;?>
                        @endforeach
                        @endif
                    @endforeach


                </div>
                <div class="modal-footer">
                    <button type="button" class="company_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>




    <div class="page-inner" style="left:0px;position:relative;margin-top:250px">
        <!-- BEGIN Left Aside -->

            <!-- BEGIN PRIMARY NAVIGATION -->
    @include('layouts.nav')
            <!-- END PRIMARY NAVIGATION -->

        <!-- END Left Aside -->
        <div class="page-content-wrapper">
            <!-- BEGIN Page Header -->
            <header class="page-header" role="banner" style="z-index:99">
                <!-- we need this logo when user switches to nav-function-top -->
                <div class="page-logo">
                    <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                        <img src="/NewSmartAdmin/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                        <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                        <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                        <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                    </a>
                </div>
                <!-- DOC: nav menu layout change shortcut -->
                <div class="hidden-md-down dropdown-icon-menu position-relative">
                    <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
                        <i class="ni ni-menu"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                                <i class="ni ni-minify-nav"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                                <i class="ni ni-lock-nav"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- DOC: mobile button appears during mobile width -->
                <div class="hidden-lg-up">
                    <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                        <i class="ni ni-menu"></i>
                    </a>
                </div>
                <div class="search">
                    <form class="app-forms hidden-xs-down" role="search" action="page_search.html" autocomplete="off">
                        <input type="text" id="search-field" placeholder="Search for anything" class="form-control" tabindex="1">
                        <a href="#" onclick="return false;" class="btn-danger btn-search-close js-waves-off d-none" data-action="toggle" data-class="mobile-search-on">
                            <i class="fal fa-times"></i>
                        </a>
                    </form>
                </div>
                <div class="ml-auto d-flex">
                    <!-- activate app search icon (mobile) -->
                    <div class="hidden-sm-up">
                        <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Search">
                            <i class="fal fa-search"></i>
                        </a>
                    </div>
                    <!-- app settings -->
                    <div class="hidden-md-down">
                        <a href="#" class="header-icon" data-toggle="modal" data-target=".js-modal-settings">
                            <i class="fal fa-cog"></i>
                        </a>
                    </div>
                    <!-- app shortcuts -->
                    <div>
                        <a href="#" class="header-icon" data-toggle="dropdown" title="My Apps">
                            <i class="fal fa-cube"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated w-auto h-auto">
                            <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center rounded-top">
                                <h4 class="m-0 text-center color-white">
                                    Quick Shortcut
                                    <small class="mb-0 opacity-80">User Applications & Addons</small>
                                </h4>
                            </div>
                            <div class="custom-scroll h-100">
                                <ul class="app-list">
                                    <li>
                                        <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-2 icon-stack-3x color-primary-600"></i>
                                                        <i class="base-3 icon-stack-2x color-primary-700"></i>
                                                        <i class="ni ni-settings icon-stack-1x text-white fs-lg"></i>
                                                    </span>
                                            <span class="app-list-name">
                                                        Services
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-2 icon-stack-3x color-primary-400"></i>
                                                        <i class="base-10 text-white icon-stack-1x"></i>
                                                        <i class="ni md-profile color-primary-800 icon-stack-2x"></i>
                                                    </span>
                                            <span class="app-list-name">
                                                        Account
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-9 icon-stack-3x color-success-400"></i>
                                                        <i class="base-2 icon-stack-2x color-success-500"></i>
                                                        <i class="ni ni-shield icon-stack-1x text-white"></i>
                                                    </span>
                                            <span class="app-list-name">
                                                        Security
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-18 icon-stack-3x color-info-700"></i>
                                                        <span class="position-absolute pos-top pos-left pos-right color-white fs-md mt-2 fw-400">28</span>
                                                    </span>
                                            <span class="app-list-name">
                                                        Calendar
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-7 icon-stack-3x color-info-500"></i>
                                                        <i class="base-7 icon-stack-2x color-info-700"></i>
                                                        <i class="ni ni-graph icon-stack-1x text-white"></i>
                                                    </span>
                                            <span class="app-list-name">
                                                        Stats
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-4 icon-stack-3x color-danger-500"></i>
                                                        <i class="base-4 icon-stack-1x color-danger-400"></i>
                                                        <i class="ni ni-envelope icon-stack-1x text-white"></i>
                                                    </span>
                                            <span class="app-list-name">
                                                        Messages
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-4 icon-stack-3x color-fusion-400"></i>
                                                        <i class="base-5 icon-stack-2x color-fusion-200"></i>
                                                        <i class="base-5 icon-stack-1x color-fusion-100"></i>
                                                        <i class="fal fa-keyboard icon-stack-1x color-info-50"></i>
                                                    </span>
                                            <span class="app-list-name">
                                                        Notes
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-16 icon-stack-3x color-fusion-500"></i>
                                                        <i class="base-10 icon-stack-1x color-primary-50 opacity-30"></i>
                                                        <i class="base-10 icon-stack-1x fs-xl color-primary-50 opacity-20"></i>
                                                        <i class="fal fa-dot-circle icon-stack-1x text-white opacity-85"></i>
                                                    </span>
                                            <span class="app-list-name">
                                                        Photos
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-19 icon-stack-3x color-primary-400"></i>
                                                        <i class="base-7 icon-stack-2x color-primary-300"></i>
                                                        <i class="base-7 icon-stack-1x fs-xxl color-primary-200"></i>
                                                        <i class="base-7 icon-stack-1x color-primary-500"></i>
                                                        <i class="fal fa-globe icon-stack-1x text-white opacity-85"></i>
                                                    </span>
                                            <span class="app-list-name">
                                                        Maps
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-5 icon-stack-3x color-success-700 opacity-80"></i>
                                                        <i class="base-12 icon-stack-2x color-success-700 opacity-30"></i>
                                                        <i class="fal fa-comment-alt icon-stack-1x text-white"></i>
                                                    </span>
                                            <span class="app-list-name">
                                                        Chat
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-5 icon-stack-3x color-warning-600"></i>
                                                        <i class="base-7 icon-stack-2x color-warning-800 opacity-50"></i>
                                                        <i class="fal fa-phone icon-stack-1x text-white"></i>
                                                    </span>
                                            <span class="app-list-name">
                                                        Phone
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-6 icon-stack-3x color-danger-600"></i>
                                                        <i class="fal fa-chart-line icon-stack-1x text-white"></i>
                                                    </span>
                                            <span class="app-list-name">
                                                        Projects
                                                    </span>
                                        </a>
                                    </li>
                                    <li class="w-100">
                                        <a href="#" class="btn btn-default mt-4 mb-2 pr-5 pl-5"> Add more apps </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- app message -->
                    <a href="#" class="header-icon" data-toggle="modal" data-target=".js-modal-messenger">
                        <i class="fal fa-globe"></i>
                        <span class="badge badge-icon">!</span>
                    </a>
                    <!-- app notification -->
                    <div>
                        <a href="#" class="header-icon" data-toggle="dropdown" title="You got 11 notifications">
                            <i class="fal fa-bell"></i>
                            <span class="badge badge-icon">11</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-xl">
                            <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center rounded-top mb-2">
                                <h4 class="m-0 text-center color-white">
                                    11 New
                                    <small class="mb-0 opacity-80">User Notifications</small>
                                </h4>
                            </div>
                            <ul class="nav nav-tabs nav-tabs-clean" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link px-4 fs-md js-waves-on fw-500" data-toggle="tab" href="#tab-messages" data-i18n="drpdwn.messages">Messages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-4 fs-md js-waves-on fw-500" data-toggle="tab" href="#tab-feeds" data-i18n="drpdwn.feeds">Feeds</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-4 fs-md js-waves-on fw-500" data-toggle="tab" href="#tab-events" data-i18n="drpdwn.events">Events</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-notification">
                                <div class="tab-pane active p-3 text-center">
                                    <h5 class="mt-4 pt-4 fw-500">
                                                <span class="d-block fa-3x pb-4 text-muted">
                                                    <i class="ni ni-arrow-up text-gradient opacity-70"></i>
                                                </span> Select a tab above to activate
                                        <small class="mt-3 fs-b fw-400 text-muted">
                                            This blank page message helps protect your privacy, or you can show the first message here automatically through
                                            <a href="#">settings page</a>
                                        </small>
                                    </h5>
                                </div>
                                <div class="tab-pane" id="tab-messages" role="tabpanel">
                                    <div class="custom-scroll h-100">
                                        <ul class="notification">
                                            <li class="unread">
                                                <a href="#" class="d-flex align-items-center">
                                                            <span class="status mr-2">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-c.png')"></span>
                                                            </span>
                                                    <span class="d-flex flex-column flex-1 ml-1">
                                                                <span class="name">Melissa Ayre <span class="badge badge-primary fw-n position-absolute pos-top pos-right mt-1">INBOX</span></span>
                                                                <span class="msg-a fs-sm">Re: New security codes</span>
                                                                <span class="msg-b fs-xs">Hello again and thanks for being part...</span>
                                                                <span class="fs-nano text-muted mt-1">56 seconds ago</span>
                                                            </span>
                                                </a>
                                            </li>
                                            <li class="unread">
                                                <a href="#" class="d-flex align-items-center">
                                                            <span class="status mr-2">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-a.png')"></span>
                                                            </span>
                                                    <span class="d-flex flex-column flex-1 ml-1">
                                                                <span class="name">Adison Lee</span>
                                                                <span class="msg-a fs-sm">Msed quia non numquam eius</span>
                                                                <span class="fs-nano text-muted mt-1">2 minutes ago</span>
                                                            </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="d-flex align-items-center">
                                                            <span class="status status-success mr-2">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-b.png')"></span>
                                                            </span>
                                                    <span class="d-flex flex-column flex-1 ml-1">
                                                                <span class="name">Oliver Kopyuv</span>
                                                                <span class="msg-a fs-sm">Msed quia non numquam eius</span>
                                                                <span class="fs-nano text-muted mt-1">3 days ago</span>
                                                            </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="d-flex align-items-center">
                                                            <span class="status status-warning mr-2">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-e.png')"></span>
                                                            </span>
                                                    <span class="d-flex flex-column flex-1 ml-1">
                                                                <span class="name">Dr. John Cook PhD</span>
                                                                <span class="msg-a fs-sm">Msed quia non numquam eius</span>
                                                                <span class="fs-nano text-muted mt-1">2 weeks ago</span>
                                                            </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="d-flex align-items-center">
                                                            <span class="status status-success mr-2">
                                                                <!-- <img src="/NewSmartAdmin/img/demo/avatars/avatar-m.png" data-src="/NewSmartAdmin/img/demo/avatars/avatar-h.png" class="profile-image rounded-circle" alt="Sarah McBrook" /> -->
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-h.png')"></span>
                                                            </span>
                                                    <span class="d-flex flex-column flex-1 ml-1">
                                                                <span class="name">Sarah McBrook</span>
                                                                <span class="msg-a fs-sm">Msed quia non numquam eius</span>
                                                                <span class="fs-nano text-muted mt-1">3 weeks ago</span>
                                                            </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="d-flex align-items-center">
                                                            <span class="status status-success mr-2">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-m.png')"></span>
                                                            </span>
                                                    <span class="d-flex flex-column flex-1 ml-1">
                                                                <span class="name">Anothony Bezyeth</span>
                                                                <span class="msg-a fs-sm">Msed quia non numquam eius</span>
                                                                <span class="fs-nano text-muted mt-1">one month ago</span>
                                                            </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="d-flex align-items-center">
                                                            <span class="status status-danger mr-2">
                                                                <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-j.png')"></span>
                                                            </span>
                                                    <span class="d-flex flex-column flex-1 ml-1">
                                                                <span class="name">Lisa Hatchensen</span>
                                                                <span class="msg-a fs-sm">Msed quia non numquam eius</span>
                                                                <span class="fs-nano text-muted mt-1">one year ago</span>
                                                            </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-feeds" role="tabpanel">
                                    <div class="custom-scroll h-100">
                                        <ul class="notification">
                                            <li class="unread">
                                                <div class="d-flex align-items-center show-child-on-hover">
                                                            <span class="d-flex flex-column flex-1">
                                                                <span class="name d-flex align-items-center">Administrator <span class="badge badge-success fw-n ml-1">UPDATE</span></span>
                                                                <span class="msg-a fs-sm">
                                                                    System updated to version <strong>4.0.2</strong> <a href="intel_build_notes.html">(patch notes)</a>
                                                                </span>
                                                                <span class="fs-nano text-muted mt-1">5 mins ago</span>
                                                            </span>
                                                    <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                        <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-center show-child-on-hover">
                                                    <div class="d-flex flex-column flex-1">
                                                                <span class="name">
                                                                    Adison Lee <span class="fw-300 d-inline">replied to your video <a href="#" class="fw-400"> Cancer Drug</a> </span>
                                                                </span>
                                                        <span class="msg-a fs-sm mt-2">Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day...</span>
                                                        <span class="fs-nano text-muted mt-1">10 minutes ago</span>
                                                    </div>
                                                    <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                        <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-center show-child-on-hover">
                                                    <!--<img src="/NewSmartAdmin/img/demo/avatars/avatar-m.png" data-src="/NewSmartAdmin/img/demo/avatars/avatar-k.png" class="profile-image rounded-circle" alt="k" />-->
                                                    <div class="d-flex flex-column flex-1">
                                                                <span class="name">
                                                                    Troy Norman'<span class="fw-300">s new connections</span>
                                                                </span>
                                                        <div class="fs-sm d-flex align-items-center mt-2">
                                                            <span class="profile-image-md mr-1 rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-a.png'); background-size: cover;"></span>
                                                            <span class="profile-image-md mr-1 rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-b.png'); background-size: cover;"></span>
                                                            <span class="profile-image-md mr-1 rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-c.png'); background-size: cover;"></span>
                                                            <span class="profile-image-md mr-1 rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-e.png'); background-size: cover;"></span>
                                                            <div data-hasmore="+3" class="rounded-circle profile-image-md mr-1">
                                                                <span class="profile-image-md mr-1 rounded-circle d-inline-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-h.png'); background-size: cover;"></span>
                                                            </div>
                                                        </div>
                                                        <span class="fs-nano text-muted mt-1">55 minutes ago</span>
                                                    </div>
                                                    <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                        <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-center show-child-on-hover">
                                                    <!--<img src="/NewSmartAdmin/img/demo/avatars/avatar-m.png" data-src="/NewSmartAdmin/img/demo/avatars/avatar-e.png" class="profile-image-sm rounded-circle align-self-start mt-1" alt="k" />-->
                                                    <div class="d-flex flex-column flex-1">
                                                        <span class="name">Dr John Cook <span class="fw-300">sent a <span class="text-danger">new signal</span></span></span>
                                                        <span class="msg-a fs-sm mt-2">Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</span>
                                                        <span class="fs-nano text-muted mt-1">10 minutes ago</span>
                                                    </div>
                                                    <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                        <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-center show-child-on-hover">
                                                    <div class="d-flex flex-column flex-1">
                                                        <span class="name">Lab Images <span class="fw-300">were updated!</span></span>
                                                        <div class="fs-sm d-flex align-items-center mt-1">
                                                            <a href="#" class="mr-1 mt-1" title="Cell A-0012">
                                                                <span class="d-block img-share" style="background-image:url('/NewSmartAdmin/img/thumbs/pic-7.png'); background-size: cover;"></span>
                                                            </a>
                                                            <a href="#" class="mr-1 mt-1" title="Patient A-473 saliva">
                                                                <span class="d-block img-share" style="background-image:url('/NewSmartAdmin/img/thumbs/pic-8.png'); background-size: cover;"></span>
                                                            </a>
                                                            <a href="#" class="mr-1 mt-1" title="Patient A-473 blood cells">
                                                                <span class="d-block img-share" style="background-image:url('/NewSmartAdmin/img/thumbs/pic-11.png'); background-size: cover;"></span>
                                                            </a>
                                                            <a href="#" class="mr-1 mt-1" title="Patient A-473 Membrane O.C">
                                                                <span class="d-block img-share" style="background-image:url('/NewSmartAdmin/img/thumbs/pic-12.png'); background-size: cover;"></span>
                                                            </a>
                                                        </div>
                                                        <span class="fs-nano text-muted mt-1">55 minutes ago</span>
                                                    </div>
                                                    <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                        <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-center show-child-on-hover">
                                                    <!--<img src="/NewSmartAdmin/img/demo/avatars/avatar-m.png" data-src="/NewSmartAdmin/img/demo/avatars/avatar-h.png" class="profile-image rounded-circle align-self-start mt-1" alt="k" />-->
                                                    <div class="d-flex flex-column flex-1">
                                                        <div class="name mb-2">
                                                            Lisa Lamar<span class="fw-300"> updated project</span>
                                                        </div>
                                                        <div class="row fs-b fw-300">
                                                            <div class="col text-left">
                                                                Progress
                                                            </div>
                                                            <div class="col text-right fw-500">
                                                                45%
                                                            </div>
                                                        </div>
                                                        <div class="progress progress-sm d-flex mt-1">
                                                            <span class="progress-bar bg-primary-500 progress-bar-striped" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></span>
                                                        </div>
                                                        <span class="fs-nano text-muted mt-1">2 hrs ago</span>
                                                        <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                            <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-events" role="tabpanel">
                                    <div class="d-flex flex-column h-100">
                                        <div class="h-auto">
                                            <table class="table table-bordered table-calendar m-0 w-100 h-100 border-0">
                                                <tr>
                                                    <th colspan="7" class="pt-3 pb-2 pl-3 pr-3 text-center">
                                                        <div class="js-get-date h5 mb-2">[your date here]</div>
                                                    </th>
                                                </tr>
                                                <tr class="text-center">
                                                    <th>Sun</th>
                                                    <th>Mon</th>
                                                    <th>Tue</th>
                                                    <th>Wed</th>
                                                    <th>Thu</th>
                                                    <th>Fri</th>
                                                    <th>Sat</th>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted bg-faded">30</td>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>5</td>
                                                    <td><i class="fal fa-birthday-cake mt-1 ml-1 position-absolute pos-left pos-top text-primary"></i> 6</td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>8</td>
                                                    <td>9</td>
                                                    <td class="bg-primary-300 pattern-0">10</td>
                                                    <td>11</td>
                                                    <td>12</td>
                                                    <td>13</td>
                                                </tr>
                                                <tr>
                                                    <td>14</td>
                                                    <td>15</td>
                                                    <td>16</td>
                                                    <td>17</td>
                                                    <td>18</td>
                                                    <td>19</td>
                                                    <td>20</td>
                                                </tr>
                                                <tr>
                                                    <td>21</td>
                                                    <td>22</td>
                                                    <td>23</td>
                                                    <td>24</td>
                                                    <td>25</td>
                                                    <td>26</td>
                                                    <td>27</td>
                                                </tr>
                                                <tr>
                                                    <td>28</td>
                                                    <td>29</td>
                                                    <td>30</td>
                                                    <td>31</td>
                                                    <td class="text-muted bg-faded">1</td>
                                                    <td class="text-muted bg-faded">2</td>
                                                    <td class="text-muted bg-faded">3</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="flex-1 custom-scroll">
                                            <div class="p-2">
                                                <div class="d-flex align-items-center text-left mb-3">
                                                    <div class="width-5 fw-300 text-primary l-h-n mr-1 align-self-start fs-xxl">
                                                        15
                                                    </div>
                                                    <div class="flex-1">
                                                        <div class="d-flex flex-column">
                                                                    <span class="l-h-n fs-md fw-500 opacity-70">
                                                                        October 2020
                                                                    </span>
                                                            <span class="l-h-n fs-nano fw-400 text-secondary">
                                                                        Friday
                                                                    </span>
                                                        </div>
                                                        <div class="mt-3">
                                                            <p>
                                                                <strong>2:30PM</strong> - Doctor's appointment
                                                            </p>
                                                            <p>
                                                                <strong>3:30PM</strong> - Report overview
                                                            </p>
                                                            <p>
                                                                <strong>4:30PM</strong> - Meeting with Donnah V.
                                                            </p>
                                                            <p>
                                                                <strong>5:30PM</strong> - Late Lunch
                                                            </p>
                                                            <p>
                                                                <strong>6:30PM</strong> - Report Compression
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 px-3 bg-faded d-block rounded-bottom text-right border-faded border-bottom-0 border-right-0 border-left-0">
                                <a href="#" class="fs-xs fw-500 ml-auto">view all notifications</a>
                            </div>
                        </div>
                    </div>
                    <!-- app user menu -->
                    <div>
                        <a href="#" data-toggle="dropdown" title="drlantern@bootstrap.com" class="header-icon d-flex align-items-center justify-content-center ml-2">
                            <img src="/NewSmartAdmin/img/demo/avatars/avatar-admin.png" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
                            <!-- you can also add username next to the avatar with the codes below:
                            <span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">Me</span>
                            <i class="ni ni-chevron-down hidden-xs-down"></i> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                            <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                                <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                            <span class="mr-2">
                                                <img src="/NewSmartAdmin/img/demo/avatars/avatar-admin.png" class="rounded-circle profile-image" alt="Dr. Codex Lantern">
                                            </span>
                                    <div class="info-card-text">
                                        <div class="fs-lg text-truncate text-truncate-lg">{{\Auth::user()->name}}</div>
                                        <span class="text-truncate text-truncate-md opacity-80">{{\Auth::user()->email}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider m-0"></div>
                            <a href="#" class="dropdown-item" data-action="app-reset">
                                <span data-i18n="drpdwn.reset_layout">Reset Layout</span>
                            </a>
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target=".js-modal-settings">
                                <span data-i18n="drpdwn.settings">Settings</span>
                            </a>
                            <div class="dropdown-divider m-0"></div>
                            <a href="#" class="dropdown-item" data-action="app-fullscreen">
                                <span data-i18n="drpdwn.fullscreen">Fullscreen</span>
                                <i class="float-right text-muted fw-n">F11</i>
                            </a>
                            <a href="#" class="dropdown-item" data-action="app-print">
                                <span data-i18n="drpdwn.print">Print</span>
                                <i class="float-right text-muted fw-n">Ctrl + P</i>
                            </a>
                            <div class="dropdown-multilevel dropdown-multilevel-left">
                                <div class="dropdown-item">
                                    Language
                                </div>
                                <div class="dropdown-menu">
                                    <a href="#?lang=fr" class="dropdown-item" data-action="lang" data-lang="fr">Français</a>
                                    <a href="#?lang=en" class="dropdown-item active" data-action="lang" data-lang="en">English (US)</a>
                                    <a href="#?lang=es" class="dropdown-item" data-action="lang" data-lang="es">Español</a>
                                    <a href="#?lang=ru" class="dropdown-item" data-action="lang" data-lang="ru">Русский язык</a>
                                    <a href="#?lang=jp" class="dropdown-item" data-action="lang" data-lang="jp">日本語</a>
                                    <a href="#?lang=ch" class="dropdown-item" data-action="lang" data-lang="ch">中文</a>
                                </div>
                            </div>
                            <div class="dropdown-divider m-0"></div>
                            <a class="dropdown-item fw-500 pt-3 pb-3" href="/admin/logout">
                                <span data-i18n="drpdwn.page-logout">Logout</span>
                                <span class="float-right fw-n">&commat;codexlantern</span>
                            </a>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END Page Header -->
            <!-- BEGIN Page Content -->
            <!-- the #js-page-content id is needed for some plugins to initialize -->
            <main id="js-page-content" role="main" class="page-content">
                @yield('content')


            </main>
            <!-- this overlay is activated only when mobile menu is triggered -->
            <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
            <!-- BEGIN Page Footer -->
            <footer class="page-footer" role="contentinfo">
                <div class="d-flex align-items-center flex-1 text-muted">
                    <span class="hidden-md-down fw-700">2019 © SmartAdmin by&nbsp;<a href='https://www.gotbootstrap.com' class='text-primary fw-500' title='gotbootstrap.com' target='_blank'>gotbootstrap.com</a></span>
                </div>
                <div>
                    <ul class="list-table m-0">
                        <li><a href="intel_introduction.html" class="text-secondary fw-700">About</a></li>
                        <li class="pl-3"><a href="info_app_licensing.html" class="text-secondary fw-700">License</a></li>
                        <li class="pl-3"><a href="info_app_docs.html" class="text-secondary fw-700">Documentation</a></li>
                        <li class="pl-3 fs-xl"><a href="https://wrapbootstrap.com/user/MyOrange" class="text-secondary" target="_blank"><i class="fal fa-question-circle" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </footer>
            <!-- END Page Footer -->
            <!-- BEGIN Shortcuts -->
            <div class="modal fade modal-backdrop-transparent" id="modal-shortcut" tabindex="-1" role="dialog" aria-labelledby="modal-shortcut" aria-hidden="true">
                <div class="modal-dialog modal-dialog-top modal-transparent" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <ul class="app-list w-auto h-auto p-0 text-left">
                                <li>
                                    <a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
                                        <div class="icon-stack">
                                            <i class="base base-7 icon-stack-3x opacity-100 color-primary-500 "></i>
                                            <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                            <i class="fal fa-home icon-stack-1x opacity-100 color-white"></i>
                                        </div>
                                        <span class="app-list-name">
                                                    Home
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="page_inbox_general.html" class="app-list-item text-white border-0 m-0">
                                        <div class="icon-stack">
                                            <i class="base base-7 icon-stack-3x opacity-100 color-success-500 "></i>
                                            <i class="base base-7 icon-stack-2x opacity-100 color-success-300 "></i>
                                            <i class="ni ni-envelope icon-stack-1x text-white"></i>
                                        </div>
                                        <span class="app-list-name">
                                                    Inbox
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
                                        <div class="icon-stack">
                                            <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                            <i class="fal fa-plus icon-stack-1x opacity-100 color-white"></i>
                                        </div>
                                        <span class="app-list-name">
                                                    Add More
                                                </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Shortcuts -->
            <!-- BEGIN Color profile -->
            <!-- this area is hidden and will not be seen on screens or screen readers -->
            <!-- we use this only for CSS color refernce for JS stuff -->
            <p id="js-color-profile" class="d-none">
                <span class="color-primary-50"></span>
                <span class="color-primary-100"></span>
                <span class="color-primary-200"></span>
                <span class="color-primary-300"></span>
                <span class="color-primary-400"></span>
                <span class="color-primary-500"></span>
                <span class="color-primary-600"></span>
                <span class="color-primary-700"></span>
                <span class="color-primary-800"></span>
                <span class="color-primary-900"></span>
                <span class="color-info-50"></span>
                <span class="color-info-100"></span>
                <span class="color-info-200"></span>
                <span class="color-info-300"></span>
                <span class="color-info-400"></span>
                <span class="color-info-500"></span>
                <span class="color-info-600"></span>
                <span class="color-info-700"></span>
                <span class="color-info-800"></span>
                <span class="color-info-900"></span>
                <span class="color-danger-50"></span>
                <span class="color-danger-100"></span>
                <span class="color-danger-200"></span>
                <span class="color-danger-300"></span>
                <span class="color-danger-400"></span>
                <span class="color-danger-500"></span>
                <span class="color-danger-600"></span>
                <span class="color-danger-700"></span>
                <span class="color-danger-800"></span>
                <span class="color-danger-900"></span>
                <span class="color-warning-50"></span>
                <span class="color-warning-100"></span>
                <span class="color-warning-200"></span>
                <span class="color-warning-300"></span>
                <span class="color-warning-400"></span>
                <span class="color-warning-500"></span>
                <span class="color-warning-600"></span>
                <span class="color-warning-700"></span>
                <span class="color-warning-800"></span>
                <span class="color-warning-900"></span>
                <span class="color-success-50"></span>
                <span class="color-success-100"></span>
                <span class="color-success-200"></span>
                <span class="color-success-300"></span>
                <span class="color-success-400"></span>
                <span class="color-success-500"></span>
                <span class="color-success-600"></span>
                <span class="color-success-700"></span>
                <span class="color-success-800"></span>
                <span class="color-success-900"></span>
                <span class="color-fusion-50"></span>
                <span class="color-fusion-100"></span>
                <span class="color-fusion-200"></span>
                <span class="color-fusion-300"></span>
                <span class="color-fusion-400"></span>
                <span class="color-fusion-500"></span>
                <span class="color-fusion-600"></span>
                <span class="color-fusion-700"></span>
                <span class="color-fusion-800"></span>
                <span class="color-fusion-900"></span>
            </p>
            <!-- END Color profile -->
        </div>
    </div>
</div>
<!-- END Page Wrapper -->
<!-- BEGIN Quick Menu -->
<!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->

<!-- BEGIN Messenger -->
<div class="modal fade js-modal-messenger modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-right">
        <div class="modal-content h-100">
            <div class="dropdown-header bg-trans-gradient d-flex align-items-center w-100">
                <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                            <span class="mr-2">
                                <span class="rounded-circle profile-image d-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-d.png'); background-size: cover;"></span>
                            </span>
                    <div class="info-card-text">
                        <a href="javascript:void(0);" class="fs-lg text-truncate text-truncate-lg text-white" data-toggle="dropdown" aria-expanded="false">
                            Tracey Chang
                            <i class="fal fa-angle-down d-inline-block ml-1 text-white fs-md"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Send Email</a>
                            <a class="dropdown-item" href="#">Create Appointment</a>
                            <a class="dropdown-item" href="#">Block User</a>
                        </div>
                        <span class="text-truncate text-truncate-md opacity-80">IT Director</span>
                    </div>
                </div>
                <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body p-0 h-100 d-flex">
                <!-- BEGIN msgr-list -->
                <div class="msgr-list d-flex flex-column bg-faded border-faded border-top-0 border-right-0 border-bottom-0 position-absolute pos-top pos-bottom">
                    <div>
                        <div class="height-4 width-3 h3 m-0 d-flex justify-content-center flex-column color-primary-500 pl-3 mt-2">
                            <i class="fal fa-search"></i>
                        </div>
                        <input type="text" class="form-control bg-white" id="msgr_listfilter_input" placeholder="Filter contacts" aria-label="FriendSearch" data-listfilter="#js-msgr-listfilter">
                    </div>
                    <div class="flex-1 h-100 custom-scroll">
                        <div class="w-100">
                            <ul id="js-msgr-listfilter" class="list-unstyled m-0">
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="tracey chang online">
                                        <div class="d-table-cell align-middle status status-success status-sm ">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-d.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                Tracey Chang
                                                <small class="d-block font-italic text-success fs-xs">
                                                    Online
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="oliver kopyuv online">
                                        <div class="d-table-cell align-middle status status-success status-sm ">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-b.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                Oliver Kopyuv
                                                <small class="d-block font-italic text-success fs-xs">
                                                    Online
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="dr john cook phd away">
                                        <div class="d-table-cell align-middle status status-warning status-sm ">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-e.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                Dr. John Cook PhD
                                                <small class="d-block font-italic fs-xs">
                                                    Away
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney online">
                                        <div class="d-table-cell align-middle status status-success status-sm ">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-g.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                Ali Amdaney
                                                <small class="d-block font-italic fs-xs text-success">
                                                    Online
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="sarah mcbrook online">
                                        <div class="d-table-cell align-middle status status-success status-sm">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-h.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                Sarah McBrook
                                                <small class="d-block font-italic fs-xs text-success">
                                                    Online
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney offline">
                                        <div class="d-table-cell align-middle status status-sm">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-a.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                oliver.kopyuv@gotbootstrap.com
                                                <small class="d-block font-italic fs-xs">
                                                    Offline
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney busy">
                                        <div class="d-table-cell align-middle status status-danger status-sm">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-j.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                oliver.kopyuv@gotbootstrap.com
                                                <small class="d-block font-italic fs-xs text-danger">
                                                    Busy
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney offline">
                                        <div class="d-table-cell align-middle status status-sm">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-c.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                oliver.kopyuv@gotbootstrap.com
                                                <small class="d-block font-italic fs-xs">
                                                    Offline
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney inactive">
                                        <div class="d-table-cell align-middle">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/NewSmartAdmin/img/demo/avatars/avatar-m.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                +714651347790
                                                <small class="d-block font-italic fs-xs opacity-50">
                                                    Missed Call
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="filter-message js-filter-message"></div>
                        </div>
                    </div>
                    <div>
                        <a class="fs-xl d-flex align-items-center p-3">
                            <i class="fal fa-cogs"></i>
                        </a>
                    </div>
                </div>
                <!-- END msgr-list -->
                <!-- BEGIN msgr -->
                <div class="msgr d-flex h-100 flex-column bg-white">
                    <!-- BEGIN custom-scroll -->
                    <div class="custom-scroll flex-1 h-100">
                        <div id="chat_container" class="w-100 p-4">
                            <!-- start .chat-segment -->
                            <div class="chat-segment">
                                <div class="time-stamp text-center mb-2 fw-400">
                                    Jun 19
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment -->
                            <div class="chat-segment chat-segment-sent">
                                <div class="chat-message">
                                    <p>
                                        Hey Tracey, did you get my files?
                                    </p>
                                </div>
                                <div class="text-right fw-300 text-muted mt-1 fs-xs">
                                    3:00 pm
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment -->
                            <div class="chat-segment chat-segment-get">
                                <div class="chat-message">
                                    <p>
                                        Hi
                                    </p>
                                    <p>
                                        Sorry going through a busy time in office. Yes I analyzed the solution.
                                    </p>
                                    <p>
                                        It will require some resource, which I could not manage.
                                    </p>
                                </div>
                                <div class="fw-300 text-muted mt-1 fs-xs">
                                    3:24 pm
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment -->
                            <div class="chat-segment chat-segment-sent chat-start">
                                <div class="chat-message">
                                    <p>
                                        Okay
                                    </p>
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment -->
                            <div class="chat-segment chat-segment-sent chat-end">
                                <div class="chat-message">
                                    <p>
                                        Sending you some dough today, you can allocate the resources to this project.
                                    </p>
                                </div>
                                <div class="text-right fw-300 text-muted mt-1 fs-xs">
                                    3:26 pm
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment -->
                            <div class="chat-segment chat-segment-get chat-start">
                                <div class="chat-message">
                                    <p>
                                        Perfect. Thanks a lot!
                                    </p>
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment -->
                            <div class="chat-segment chat-segment-get">
                                <div class="chat-message">
                                    <p>
                                        I will have them ready by tonight.
                                    </p>
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment -->
                            <div class="chat-segment chat-segment-get chat-end">
                                <div class="chat-message">
                                    <p>
                                        Cheers
                                    </p>
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment for timestamp -->
                            <div class="chat-segment">
                                <div class="time-stamp text-center mb-2 fw-400">
                                    Jun 20
                                </div>
                            </div>
                            <!--  end .chat-segment for timestamp -->
                        </div>
                    </div>
                    <!-- END custom-scroll  -->
                    <!-- BEGIN msgr__chatinput -->
                    <div class="d-flex flex-column">
                        <div class="border-faded border-right-0 border-bottom-0 border-left-0 flex-1 mr-3 ml-3 position-relative shadow-top">
                            <div class="pt-3 pb-1 pr-0 pl-0 rounded-0" tabindex="-1">
                                <div id="msgr_input" contenteditable="true" data-placeholder="Type your message here..." class="height-10 form-content-editable"></div>
                            </div>
                        </div>
                        <div class="height-8 px-3 d-flex flex-row align-items-center flex-wrap flex-shrink-0">
                            <a href="javascript:void(0);" class="btn btn-icon fs-xl width-1 mr-1" data-toggle="tooltip" data-original-title="More options" data-placement="top">
                                <i class="fal fa-ellipsis-v-alt color-fusion-300"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Attach files" data-placement="top">
                                <i class="fal fa-paperclip color-fusion-300"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Insert photo" data-placement="top">
                                <i class="fal fa-camera color-fusion-300"></i>
                            </a>
                            <div class="ml-auto">
                                <a href="javascript:void(0);" class="btn btn-info">Send</a>
                            </div>
                        </div>
                    </div>
                    <!-- END msgr__chatinput -->
                </div>
                <!-- END msgr -->
            </div>
        </div>
    </div>
</div>
<!-- END Messenger -->
<!-- BEGIN Page Settings -->
<div class="modal fade js-modal-settings modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-right modal-md">
        <div class="modal-content">
            <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100">
                <h4 class="m-0 text-center color-white">
                    Layout Settings
                    <small class="mb-0 opacity-80">User Interface Settings</small>
                </h4>
                <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="settings-panel">
                    <div class="mt-4 d-table w-100 px-5">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">
                                App Layout
                            </h5>
                        </div>
                    </div>
                    <div class="list" id="fh">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="header-function-fixed"></a>
                        <span class="onoffswitch-title">Fixed Header</span>
                        <span class="onoffswitch-title-desc">header is in a fixed at all times</span>
                    </div>
                    <div class="list" id="nff">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-fixed"></a>
                        <span class="onoffswitch-title">Fixed Navigation</span>
                        <span class="onoffswitch-title-desc">left panel is fixed</span>
                    </div>
                    <div class="list" id="nfm">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-minify"></a>
                        <span class="onoffswitch-title">Minify Navigation</span>
                        <span class="onoffswitch-title-desc">Skew nav to maximize space</span>
                    </div>
                    <div class="list" id="nfh">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-hidden"></a>
                        <span class="onoffswitch-title">Hide Navigation</span>
                        <span class="onoffswitch-title-desc">roll mouse on edge to reveal</span>
                    </div>
                    <div class="list" id="nft">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-top"></a>
                        <span class="onoffswitch-title">Top Navigation</span>
                        <span class="onoffswitch-title-desc">Relocate left pane to top</span>
                    </div>
                    <div class="list" id="mmb">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-main-boxed"></a>
                        <span class="onoffswitch-title">Boxed Layout</span>
                        <span class="onoffswitch-title-desc">Encapsulates to a container</span>
                    </div>
                    <div class="expanded">
                        <ul class="">
                            <li>
                                <div class="bg-fusion-50" data-action="toggle" data-class="mod-bg-1"></div>
                            </li>
                            <li>
                                <div class="bg-warning-200" data-action="toggle" data-class="mod-bg-2"></div>
                            </li>
                            <li>
                                <div class="bg-primary-200" data-action="toggle" data-class="mod-bg-3"></div>
                            </li>
                            <li>
                                <div class="bg-success-300" data-action="toggle" data-class="mod-bg-4"></div>
                            </li>
                        </ul>
                        <div class="list" id="mbgf">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-fixed-bg"></a>
                            <span class="onoffswitch-title">Fixed Background</span>
                        </div>
                    </div>
                    <div class="mt-4 d-table w-100 px-5">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">
                                Mobile Menu
                            </h5>
                        </div>
                    </div>
                    <div class="list" id="nmp">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-push"></a>
                        <span class="onoffswitch-title">Push Content</span>
                        <span class="onoffswitch-title-desc">Content pushed on menu reveal</span>
                    </div>
                    <div class="list" id="nmno">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-no-overlay"></a>
                        <span class="onoffswitch-title">No Overlay</span>
                        <span class="onoffswitch-title-desc">Removes mesh on menu reveal</span>
                    </div>
                    <div class="list" id="sldo">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-slide-out"></a>
                        <span class="onoffswitch-title">Off-Canvas <sup>(beta)</sup></span>
                        <span class="onoffswitch-title-desc">Content overlaps menu</span>
                    </div>
                    <div class="mt-4 d-table w-100 px-5">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">
                                Accessibility
                            </h5>
                        </div>
                    </div>
                    <div class="list" id="mbf">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-bigger-font"></a>
                        <span class="onoffswitch-title">Bigger Content Font</span>
                        <span class="onoffswitch-title-desc">content fonts are bigger for readability</span>
                    </div>
                    <div class="list" id="mhc">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-high-contrast"></a>
                        <span class="onoffswitch-title">High Contrast Text (WCAG 2 AA)</span>
                        <span class="onoffswitch-title-desc">4.5:1 text contrast ratio</span>
                    </div>
                    <div class="list" id="mcb">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-color-blind"></a>
                        <span class="onoffswitch-title">Daltonism <sup>(beta)</sup> </span>
                        <span class="onoffswitch-title-desc">color vision deficiency</span>
                    </div>
                    <div class="list" id="mpc">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-pace-custom"></a>
                        <span class="onoffswitch-title">Preloader Inside</span>
                        <span class="onoffswitch-title-desc">preloader will be inside content</span>
                    </div>
                    <div class="mt-4 d-table w-100 px-5">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">
                                Global Modifications
                            </h5>
                        </div>
                    </div>
                    <div class="list" id="mcbg">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-clean-page-bg"></a>
                        <span class="onoffswitch-title">Clean Page Background</span>
                        <span class="onoffswitch-title-desc">adds more whitespace</span>
                    </div>
                    <div class="list" id="mhni">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-nav-icons"></a>
                        <span class="onoffswitch-title">Hide Navigation Icons</span>
                        <span class="onoffswitch-title-desc">invisible navigation icons</span>
                    </div>
                    <div class="list" id="dan">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-disable-animation"></a>
                        <span class="onoffswitch-title">Disable CSS Animation</span>
                        <span class="onoffswitch-title-desc">Disables CSS based animations</span>
                    </div>
                    <div class="list" id="mhic">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-info-card"></a>
                        <span class="onoffswitch-title">Hide Info Card</span>
                        <span class="onoffswitch-title-desc">Hides info card from left panel</span>
                    </div>
                    <div class="list" id="mlph">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-lean-subheader"></a>
                        <span class="onoffswitch-title">Lean Subheader</span>
                        <span class="onoffswitch-title-desc">distinguished page header</span>
                    </div>
                    <div class="list" id="mnl">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-nav-link"></a>
                        <span class="onoffswitch-title">Hierarchical Navigation</span>
                        <span class="onoffswitch-title-desc">Clear breakdown of nav links</span>
                    </div>
                    <div class="list mt-1">
                        <span class="onoffswitch-title">Global Font Size <small>(RESETS ON REFRESH)</small> </span>
                        <div class="btn-group btn-group-sm btn-group-toggle my-2" data-toggle="buttons">
                            <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-sm" data-target="html">
                                <input type="radio" name="changeFrontSize"> SM
                            </label>
                            <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text" data-target="html">
                                <input type="radio" name="changeFrontSize" checked=""> MD
                            </label>
                            <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-lg" data-target="html">
                                <input type="radio" name="changeFrontSize"> LG
                            </label>
                            <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-xl" data-target="html">
                                <input type="radio" name="changeFrontSize"> XL
                            </label>
                        </div>
                        <span class="onoffswitch-title-desc d-block mb-0">Change <strong>root</strong> font size to effect rem
                                    values</span>
                    </div>
                    <hr class="mb-0 mt-4">
                    <div class="mt-2 d-table w-100 pl-5 pr-3">
                        <div class="fs-xs text-muted p-2 alert alert-warning mt-3 mb-2">
                            <i class="fal fa-exclamation-triangle text-warning mr-2"></i>The settings below uses localStorage to load
                            the external CSS file as an overlap to the base css. Due to network latency and CPU utilization, you may
                            experience a brief flickering effect on page load which may show the intial applied theme for a split
                            second. Setting the prefered style/theme in the header will prevent this from happening.
                        </div>
                    </div>
                    <div class="mt-2 d-table w-100 pl-5 pr-3">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">
                                Theme colors
                            </h5>
                        </div>
                    </div>
                    <div class="expanded theme-colors pl-5 pr-3">
                        <ul class="m-0">
                            <li>
                                <a href="#" id="myapp-0" data-action="theme-update" data-themesave data-theme="" data-toggle="tooltip" data-placement="top" title="Wisteria (base css)" data-original-title="Wisteria (base css)"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-1" data-action="theme-update" data-themesave data-theme="/NewSmartAdmin/css/themes/cust-theme-1.css" data-toggle="tooltip" data-placement="top" title="Tapestry" data-original-title="Tapestry"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-2" data-action="theme-update" data-themesave data-theme="/NewSmartAdmin/css/themes/cust-theme-2.css" data-toggle="tooltip" data-placement="top" title="Atlantis" data-original-title="Atlantis"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-3" data-action="theme-update" data-themesave data-theme="/NewSmartAdmin/css/themes/cust-theme-3.css" data-toggle="tooltip" data-placement="top" title="Indigo" data-original-title="Indigo"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-4" data-action="theme-update" data-themesave data-theme="/NewSmartAdmin/css/themes/cust-theme-4.css" data-toggle="tooltip" data-placement="top" title="Dodger Blue" data-original-title="Dodger Blue"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-5" data-action="theme-update" data-themesave data-theme="/NewSmartAdmin/css/themes/cust-theme-5.css" data-toggle="tooltip" data-placement="top" title="Tradewind" data-original-title="Tradewind"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-6" data-action="theme-update" data-themesave data-theme="/NewSmartAdmin/css/themes/cust-theme-6.css" data-toggle="tooltip" data-placement="top" title="Cranberry" data-original-title="Cranberry"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-7" data-action="theme-update" data-themesave data-theme="/NewSmartAdmin/css/themes/cust-theme-7.css" data-toggle="tooltip" data-placement="top" title="Oslo Gray" data-original-title="Oslo Gray"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-8" data-action="theme-update" data-themesave data-theme="/NewSmartAdmin/css/themes/cust-theme-8.css" data-toggle="tooltip" data-placement="top" title="Chetwode Blue" data-original-title="Chetwode Blue"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-9" data-action="theme-update" data-themesave data-theme="/NewSmartAdmin/css/themes/cust-theme-9.css" data-toggle="tooltip" data-placement="top" title="Apricot" data-original-title="Apricot"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-10" data-action="theme-update" data-themesave data-theme="/NewSmartAdmin/css/themes/cust-theme-10.css" data-toggle="tooltip" data-placement="top" title="Blue Smoke" data-original-title="Blue Smoke"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-11" data-action="theme-update" data-themesave data-theme="/NewSmartAdmin/css/themes/cust-theme-11.css" data-toggle="tooltip" data-placement="top" title="Green Smoke" data-original-title="Green Smoke"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-12" data-action="theme-update" data-themesave data-theme="/NewSmartAdmin/css/themes/cust-theme-12.css" data-toggle="tooltip" data-placement="top" title="Wild Blue Yonder" data-original-title="Wild Blue Yonder"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-13" data-action="theme-update" data-themesave data-theme="/NewSmartAdmin/css/themes/cust-theme-13.css" data-toggle="tooltip" data-placement="top" title="Emerald" data-original-title="Emerald"></a>
                            </li>
                        </ul>
                    </div>
                    <hr class="mb-0 mt-4">
                    <div class="pl-5 pr-3 py-3 bg-faded">
                        <div class="row no-gutters">
                            <div class="col-6 pr-1">
                                <a href="#" class="btn btn-outline-danger fw-500 btn-block" data-action="app-reset">Reset Settings</a>
                            </div>
                            <div class="col-6 pl-1">
                                <a href="#" class="btn btn-danger fw-500 btn-block" data-action="factory-reset">Factory Reset</a>
                            </div>
                        </div>
                    </div>
                </div> <span id="saving"></span>
            </div>
        </div>
    </div>
</div>


<div class="modal modal-al modal-alert fade" id="getCroppedCanvasModal" tabindex="-1" aria-labelledby="getCroppedCanvasTitle" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="getCroppedCanvasTitle">Бэйдж успешно отправлен !</h5>

            </div>
            <div class="modal-body">
                сообщение послано на email вашего колеги...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END Page Settings -->
<!-- base vendor bundle:
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations
						+ pace.js (recommended)
						+ jquery.js (core)
						+ jquery-ui-cust.js (core)
						+ popper.js (core)
						+ bootstrap.js (core)
						+ slimscroll.js (extension)
						+ app.navigation.js (core)
						+ ba-throttle-debounce.js (core)
						+ waves.js (extension)
						+ smartpanels.js (extension)
						+ src/../jquery-snippets.js (core) -->
<script src="/NewSmartAdmin/js/vendors.bundle.js"></script>
<script src="/NewSmartAdmin/js/app.bundle.js"></script>
<script src="/NewSmartAdmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="/NewSmartAdmin/js/formplugins/summernote/summernote.js"></script>
<script type="text/javascript">
    /* Activate smart panels */
    $('#js-page-content').smartPanel();

</script>
<script>

</script>
<script>
$(document).ready(function(){
    localStorage.setItem("personalBadegeCustomerId",0)

    reloadPage();





})


function summernoteInit(){

    var autoSave = $('#autoSave');
    var interval;
    var timer = function()
    {
        interval = setInterval(function()
        {
            //start slide...
            if (autoSave.prop('checked'))
                saveToLocal();

            clearInterval(interval);
        }, 3000);
    };

    //save
    var saveToLocal = function()
    {
        localStorage.setItem('summernoteData', $('#saveToLocal').summernote("code"));
        console.log("saved");
    }

    //delete
    var removeFromLocal = function()
    {
        localStorage.removeItem("summernoteData");
        $('#saveToLocal').summernote('reset');
    }



    $('.js-summernote').summernote({
        height: 200,
        tabsize: 2,
        placeholder: "Type here...",
        dialogsFade: true,
        toolbar: [
            ['style', ['style']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
                ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks:
            {
                //restore from localStorage
                onInit: function(e)
                {
                    $('.js-summernote').summernote("code", localStorage.getItem("summernoteData"));
                },
                onChange: function(contents, $editable)
                {
                    console.log('change summernote')
                    //clearInterval(interval);
                    //timer();
                    localStorage.setItem("summernoteData",contents)
                    console.log(contents);
                }
            }
    });
}

function reloadPage(){

   var personalBadegeCustomerId= localStorage.getItem("personalBadegeCustomerId")
    console.log('personalBadegeCustomerId',personalBadegeCustomerId);
    if(personalBadegeCustomerId>0){
       $('.personal_select').hide()

    }
    else{
        $('.personal_select').show()
        $('.sending_badge_title').text('Новая благодарность сотруднику')
    }
}

    $('.single_badge').click(function(){


        $(this).parent().parent().find('.sending_group').find('.badges_form').find('.summerBlock').empty();
        $(this).parent().parent().find('.sending_group').find('.badges_form').find('.summerBlock').append('<div class="js-summernote" ></div>')
        summernoteInit();
        window.slide_allow=0

        localStorage.setItem("summernoteData","")
        var badge_name_h=$(this).parent().parent().find('.sending_group').find('.badge_name')
        var badge_title=$(this).parent().parent().find('.sending_group').find('.sending_badge_title')

        var badge_submit=$(this).parent().parent().find('.sending_group').find('.sending_badge_submit')

        var sending_badges_group=$(this).parent().parent().find('.sending_group').find('.sending_badges_group').val()
        var sending_badges_customer=$(this).parent().parent().find('.sending_group').find('.sending_badges_customer').val()
        console.log('group_id',sending_badges_group)
        var current_badge_name=$(this).parent().find('.badge_name').val()
        var badge=$(this).parent().find('.badge_id').val()

        var sending_group=$(this).parent().parent().find('.sending_group')
        badge_name_h.text(current_badge_name)
        badge_title.val(current_badge_name)

        $('.sending_group').slideUp({
            duration: 'slow',
            easing: 'linear'
        })
        //Проверить сколько золотых бэйджей отправлено в текущем месяце

        $.ajax({
            method: 'POST',
            dataType: 'json',
            async:false,
            url: '/customer/golden_badge/check',
            data: {customer: sending_badges_customer
            },
            beforeSend: function() {
            },
            complete: function() {

            },
            success: function (data) {
            console.log(data)
                if(data>=3 && sending_badges_group==3 ){
                    console.log('trying to send Golden badge')
                alert('Вы уже отправили 3 золотых бэйджа в этом месяце')

                }else {
                    window.slide_allow=1

                }


                console.log('success  golden badge')

            }
        });


            sending_group.slideDown({
                duration: 'slow',
                easing: 'linear'
            })





console.log('first step')
        badge_submit.click(function(){
            console.log('second step')

            var customer=$(this).parent('.badges_form').find('.sending_badge_user').val()


            var visibility=$(this).parent('.badges_form').find('.form-group').find('.sending_badge_visibility').val()
            var message=$(this).parent('.badges_form').find('.form-group').find('.sending_badge_textarea').val()
            console.log('Therd step',message)
            message=localStorage.getItem("summernoteData")
            console.log('Therd step',message)
            var title=$(this).parent('.badges_form').find('.form-group').find('.sending_badge_title').val()
            console.log('visibility=>',visibility)
            console.log('customer=>',customer)
            console.log(message)
            console.log(badge)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/customer/badge/send',
                data: {customer: customer,message:message,badge:badge,title:title,visibility:visibility
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {

                    $('.default-example-modal-right-lg').modal("hide");



                    console.log('success')

                }
            });







        })

console.log('here',$(this).parent().parent())

        $(this).parent().parent().find('.sending_group').find('.badges_form').each(function (index, value){
            console.log('here')
             var form_id=$(this).attr('id')
            var dropdown=$(this).find('.form-group').find('.js-data-example-ajax')
            console.log('dropdown',dropdown);



            dropdown.select2(
                {

                    dropdownParent: $("#"+form_id),
                    ajax:
                        {
                            url: "/customer/badge/get_addressant",//"https://api.github.com/search/repositories"
                            dataType: 'json',
                            delay: 250,
                            type: "GET",
                            data: function(params)
                            {
                                return {
                                    q: params.term, // search term
                                    page: params.page
                                };
                            },
                            results: function(resp){
                                console.log('success',resp);
                            },
                            processResults: function(data, params)
                            {

                                console.log('results,',data)
                                console.log(params)
                                // parse the results into the format expected by Select2
                                // since we are using custom formatting functions we do not need to
                                // alter the remote JSON data, except to indicate that infinite
                                // scrolling can be used
                                params.page = params.page || 1;

                                return {
                                    results: data.items,
                                    pagination:
                                        {
                                            more: (params.page * 30) < data.total_count
                                        }
                                };
                            },
                            success: function(resp){
                                console.log('success',resp);
                            },
                            cache: true
                        },
                    placeholder: 'Search for a repository',
                    formatResult: function(element){
                        console.log(element.id)
                        return element.text + ' (' + element.id + ')';
                    },
                    success: function(resp){
                        console.log('success',resp);
                    },
                    formatSelection: function(element){
                        console.log('selection',element.id)
                        return element.text + ' (' + element.id + ')';
                    },

                    escapeMarkup: function(markup)
                    {
                        //console.log(markup)
                        return markup;
                    }, // let our custom formatter work
                    minimumInputLength: 1,
                    templateResult: formatRepo,
                    templateSelection: function (data, container) {

                        var personalBadegeCustomerId= localStorage.getItem("personalBadegeCustomerId")
                        if(personalBadegeCustomerId==0){
                        $('#'+form_id).find('.sending_badge_user').val(data.id)
                        }

                        console.log($('#'+form_id).find('.sending_badge_user').val());
                        $(data.element).attr('data-custom-attribute', data.id);
                        return data.full_name;
                    }
                });

$('.js-data-example-ajax').change(function(){
    console.log('change')
})

            function icon(elm)
            {
                elm.element;
                return elm.id ? "<i class='" + $(elm.element).data("icon") + " mr-2'></i>" + elm.text : elm.text
            }






            function formatRepo(repo)
            {
                if (repo.loading)
                {
                    return repo.text;
                }

                var markup = "<div class='select2-result-repository clearfix d-flex'>" +
                    "<div class='select2-result-repository__avatar mr-2'><img src='" + repo.owner.avatar_url + "' class='width-2 height-2 mt-1 rounded' /></div>" +
                    "<div class='select2-result-repository__meta'>" +
                    "<div class='select2-result-repository__title fs-lg fw-500'>" + repo.full_name + "</div>";

                if (repo.description)
                {
                    markup += "<div class='select2-result-repository__description fs-xs opacity-80 mb-1'>" + repo.description + "</div>";
                }

                markup += "<div class='select2-result-repository__statistics d-flex fs-sm'>" +
                    "<div class='select2-result-repository__forks mr-2'><i class='fal fa-lightbulb'></i> " + repo.forks_count + " Forks</div>" +
                    "<div class='select2-result-repository__stargazers mr-2'><i class='fal fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
                    "<div class='select2-result-repository__watchers mr-2'><i class='fal fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
                    "</div>" +
                    "</div></div>";

                return markup;
            }

            function formatRepoSelection(repo)
            {
                console.log(repo.full_name)
                return repo.full_name || repo.text;
            }






        });


    });



$('.personal_badge').click(function(){

var personal_badge_customer_id= $(this).parent().find('.personal_badge_customer_id').val()
    console.log(personal_badge_customer_id);
    localStorage.setItem("personalBadegeCustomerId",personal_badge_customer_id)

    $.ajax({
        method: 'POST',
        dataType: 'json',
        async:false,
        url: '/customer/get_customer_info',
        data: {customer_id: personal_badge_customer_id
        },
        beforeSend: function() {
        },
        complete: function() {

        },
        success: function (data) {
            console.log('success'.data)
            $('.sending_badge_title').text('Новая Персональная благодарность сотруднику'+' '+data.name+' '+data.sername)
            $('.sending_badge_user').val(data.id)


        }
    });

    reloadPage();

})

</script>
@yield('scripts')
</body>
</html>

