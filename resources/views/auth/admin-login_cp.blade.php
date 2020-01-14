<!DOCTYPE html>
<html lang="en-us" id="extr-page">
<head>
    <meta charset="utf-8">
    <title>Realty - LogIn</title>
    <meta name="description" content="Realty - LogIn">
    <meta name="author" content="Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- #CSS Links -->
    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/admin/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/admin/font-awesome.min.css')}}">

    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    <link rel="stylesheet" type="text/css" media="screen"
          href="{{asset('css/admin/smartadmin-production-plugins.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/admin/smartadmin-production.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/admin/smartadmin-skins.min.css')}}">

    <!-- SmartAdmin RTL Support -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/admin/smartadmin-rtl.min.css')}}">

    <!-- We recommend you use "your_style.css" to override SmartAdmin
         specific styles this will also ensure you retrain your customization with each SmartAdmin update.
    <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

    <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/admin/demo.min.css')}}">

    <!-- #FAVICONS -->
    <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

    <!-- #GOOGLE FONT -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">


</head>

<body class="animated fadeInDown">

<header id="header">

    <div id="logo-group">
        <span id="logo"> <img src="{{asset('img/logo.png')}}" alt="SmartAdmin"> </span>
    </div>


</header>

<div id="main" role="main">

    <!-- MAIN CONTENT -->
    <div id="content" class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                <div class="well no-padding">
                    <form id="login-form" class="smart-form client-form" method="POST"
                          action="{{ route('admin.login.submit')}}"
                          aria-label="{{ __('Login') }}">
                        <header>
                            Sign In
                        </header>

                        <fieldset>

                            <section>
                                <label class="label">E-mail</label>
                                <label class="input"> <i class="icon-append fa fa-user"></i>
                                    <input type="email" name="email">
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i>
                                        Please enter email address/username</b></label>
                            </section>

                            <section>
                                <label class="label">Password</label>
                                <label class="input"> <i class="icon-append fa fa-lock"></i>
                                    <input type="password" name="password">
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter
                                        your password</b> </label>
                            </section>

                            <section>
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" checked="">
                                    <i></i>Stay signed in</label>
                            </section>
                        </fieldset>
                        <footer>
                            <button type="submit" class="btn btn-primary">
                                Sign in
                            </button>
                        </footer>
                    </form>

                </div>

            </div>
        </div>
    </div>

</div>

<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script src="{{asset('js/admin/plugin/pace/pace.min.js')}}"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script> if (!window.jQuery) {
        document.write('<script src="{{asset('js/admin/libs/jquery-3.2.1.min.js')}}"><\/script>');
    } </script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script> if (!window.jQuery.ui) {
        document.write('<script src="{{asset('js/admin/libs/jquery-ui.min.js')}}"><\/script>');
    } </script>

<!-- IMPORTANT: APP CONFIG -->
<script src="{{asset('js/admin/app.config.js')}}"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events
<script src="{{asset('js/admin/plugin/jquery-touch/jquery.ui.touch-punch.min.js')}}"></script> -->

<!-- BOOTSTRAP JS -->
<script src="{{asset('js/admin/bootstrap/bootstrap.min.js')}}"></script>

<!-- JQUERY VALIDATE -->
<script src="{{asset('js/admin/plugin/jquery-validate/jquery.validate.min.js')}}"></script>

<!-- JQUERY MASKED INPUT -->
<script src="{{asset('js/admin/plugin/masked-input/jquery.maskedinput.min.js')}}"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

<!-- MAIN APP JS FILE -->
<script src="{{asset('js/admin/app.min.js')}}"></script>

<script>
    runAllForms();

    $(function () {
        // Validation
        $("#login-form").validate({
            // Rules for form validation
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
                }
            },

            // Messages for form validation
            messages: {
                email: {
                    required: 'Please enter your email address',
                    email: 'Please enter a VALID email address'
                },
                password: {
                    required: 'Please enter your password'
                }
            },

            // Do not change code below
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            }
        });
    });
</script>

</body>
</html>