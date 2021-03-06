

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
        Login1 - - SmartAdmin v4.0.2
    </title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/vendors.bundle.css">
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/app.bundle.css">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="/NewSmartAdmin/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/NewSmartAdmin/img/favicon/favicon-32x32.png">
    <link rel="mask-icon" href="/NewSmartAdmin/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <!-- Optional: page related CSS-->
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/page-login.css">
</head>


<body>
<div class="page-wrapper">
    <div class="page-inner bg-brand-gradient">
        <div class="page-content-wrapper bg-transparent m-0">
            <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                <div class="d-flex align-items-center container p-0">
                    <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                        <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                            <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                            <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex-1" style="background: url(/NewSmartAdmin/img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                    <div class="row">
                        <div class="col-xl-12">
                            <h2 class="fs-xxl fw-500 mt-4 text-white text-center">
                                Login now!
                                <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60 hidden-sm-down">
                                    If you have no access to our system please ask your admin give it to you.
                                    <br>It is ready to go wherever you go!
                                </small>
                            </h2>
                        </div>
                        <div class="col-xl-6 ml-auto mr-auto">


                            <div class="blankpage-form-field" style="margin-top:100px">
                                <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
                                    <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                                        <img src="/NewSmartAdmin/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                                        <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                                        <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                                    </a>
                                </div>
                                <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
                                    <form method="POST" action="{{ route('login.submit') }}">
                                        <div class="form-group">
                                            <label class="form-label" for="username">Username</label>
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                            <span class="help-block">
                            Your unique username to app
                        </span>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="password">Password</label>
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                            <span class="help-block">
                            Your password
                        </span>
                                        </div>
                                        <div class="form-group text-left">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rememberme">
                                                <label class="custom-control-label" for="rememberme"> Remember me for the next 30 days</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-default float-right">Secure login</button>
                                    </form>
                                </div>
                                <div class="blankpage-footer text-center">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        <strong>Recover Password</strong>
                                    </a>
                                    | <a href="#"><strong>Register Account</strong></a>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                    2019 © SmartAdmin by&nbsp;<a href='https://www.gotbootstrap.com' class='text-white opacity-40 fw-500' title='gotbootstrap.com' target='_blank'>gotbootstrap.com</a>
                </div>
            </div>
        </div>
    </div>
</div>
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
<script src="js/vendors.bundle.js"></script>
<script src="js/app.bundle.js"></script>
<script>
    $("#js-login-btn").click(function(event)
    {

        // Fetch form to apply custom Bootstrap validation
        var form = $("#js-login")

        if (form[0].checkValidity() === false)
        {
            event.preventDefault()
            event.stopPropagation()
        }

        form.addClass('was-validated');
        // Perform ajax submit here...
    });

</script>
</body>
</html>







