
<!doctype html>
<html lang="en">





<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Bamburgh HTML5 UI Kit with Bootstrap PRO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <link rel="shortcut icon" href="/Bamburgh/favicon/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/Bamburgh/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/Bamburgh/favicon/favicon-32x32.png">
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Bamburgh UI Kit Stylesheets -->

    <link rel="stylesheet" type="text/css" href="/Bamburgh/assets/css/bamburgh.min.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaZXMHQgJkoXZkkBbtelY8SLAwMOasg0Y&libraries=places&language=en"></script>
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/formplugins/cropperjs/cropper.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .cropper-container{
            width:600px !important;
            height:400px !important;
        }
        .pac-container {
            background-color: #FFF;
            z-index: 20;
            position: fixed;
            display: inline-block;
            float: left;
        }

        .pac-container {
            z-index: 10519 !important;
        }

        .ui-autocomplete {
            z-index: 10519 !important;
        }
        .modal{
            z-index: 9999 !important;
        }
        .modal-backdrop{
            z-index: 10;
        }​




        .strange{width:300px !important;}

        @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
        input {padding:6px;border:3px solid #999;background:none;font-family:'Montserrat',sans-serif;color:#666;font-size:16px;width:260px;}
        input:focus {border-color:#00aeff;outline:0;background:#f9f9f9;}
        input[type=submit] {width:80px;background:#00aeff;border-color:#00aeff;color:#eee;cursor:pointer;}
        span.zip {margin:1em 0;display:block;text-transform:uppercase;font-size:0.9em;color:#999;} span.zip:before {content:'ZIP code: '}


        .popover.popover-custom-md {
            width: 100% !important;
            max-width: 100% !important;
        }

    </style>


    @yield('styles')
</head>
<body id="app-top">


<div class="modal fade" id="modal-bbb4" tabindex="-1" role="dialog" aria-labelledby="modal-bbb4" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if(!\Auth::user())
                    <h5 class="modal-title h4 sending_badge_title">Войдите в учетную запись чтобы подать объявление</h5>
                @else
                    <h5 class="modal-title h4 sending_badge_title">Подать Новое объявление </h5>
                    <h5 style="cursor:pointer" class="Cat_name modal-title h4"></h5>
                @endif
                <button type="button" class="close categoryModalClose" data-dismiss="modal" aria-label="Close" onclick="localStorage.setItem('openAddMessageModal',0);">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            @if(!\Auth::user())

                <div class="blankpage-form-field">
                    <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
                        <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                            <!--img src="/NewSmartAdmin/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo"-->

                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="270px" height="75px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                 viewBox="0 0 2706 755.26"
                                 xmlns:xlink="http://www.w3.org/1999/xlink">
 <defs>
     <style type="text/css">
         <![CDATA[
    .fil0 {fill:none}
         .fil2 {fill:#A269F7}
         .fil1 {fill:black;fill-rule:nonzero}
         .fil3 {fill:white;fill-rule:nonzero}
         ]]>
     </style>
 </defs>
                                <g id="Слой_x0020_1">
                                    <metadata id="CorelCorpID_0Corel-Layer"/>
                                    <rect class="fil0" width="2706" height="755.26"/>
                                    <g id="_1090375648">
                                        <g>
                                            <path class="fil1" d="M920.35 571.72l0 -386.5 137.79 0c37.74,0 68.32,12.1 91.77,36.3 23.44,24.21 35.16,53.27 35.16,87.19 0,23.64 -6,44.98 -18.01,64.04 -12.01,19.06 -28.87,33.35 -50.6,42.88l73.18 156.09 -93.76 0 -62.9 -144.08 -28.58 0 0 144.08 -84.05 0zm84.05 -210.98l49.74 0c13.72,0 24.87,-4.76 33.45,-14.29 8.57,-9.53 12.86,-22.11 12.86,-37.74 0,-15.24 -4.38,-27.73 -13.15,-37.44 -8.77,-9.72 -19.82,-14.58 -33.16,-14.58l-49.74 0 0 104.05z"/>
                                            <path class="fil1" d="M1276.94 442.5l0 -257.28 84.05 0 0 250.42c0,22.49 5.62,40.12 16.87,52.89 11.24,12.77 26.2,19.15 44.88,19.15 18.68,0 33.64,-6.48 44.88,-19.44 11.25,-12.96 16.87,-30.49 16.87,-52.6l0 -250.42 84.04 0 0 257.28c0,39.64 -14.19,72.33 -42.59,98.06 -28.4,25.73 -62.8,38.59 -103.2,38.59 -40.79,0 -75.28,-12.77 -103.49,-38.31 -28.2,-25.54 -42.31,-58.31 -42.31,-98.34z"/>
                                            <polygon class="fil1" points="1659.72,571.72 1659.72,185.22 1743.77,185.22 1743.77,328.15 1843.82,185.22 1942.16,185.22 1818.09,353.88 1959.89,571.72 1860.4,571.72 1767.21,423.06 1743.77,455.08 1743.77,571.72 "/>
                                            <path class="fil1" d="M1999.93 571.72l116.06 -386.5 97.2 0 116.06 386.5 -85.19 0 -25.72 -93.2 -107.49 0 -25.73 93.2 -85.19 0zm129.79 -161.23l69.75 0 -20.01 -73.19c-4.58,-15.63 -9.53,-37.54 -14.87,-65.75 -3.81,20.58 -8.76,42.5 -14.86,65.75l-20.01 73.19z"/>
                                            <path class="fil1" d="M2444.95 571.72l-116.07 -386.5 85.19 0 64.61 234.41c4.19,14.87 9.15,37.74 14.87,68.61 5.71,-30.87 10.67,-53.74 14.86,-68.61l64.61 -234.41 85.19 0 -116.07 386.5 -97.19 0z"/>
                                        </g>
                                        <g>
                                            <path class="fil2" d="M386.58 38.84c187.11,0 338.79,151.68 338.79,338.79 0,187.11 -151.68,338.79 -338.79,338.79 -187.11,0 -338.79,-151.68 -338.79,-338.79 0,-187.11 151.68,-338.79 338.79,-338.79z"/>
                                            <path class="fil3" d="M448.3 710.8l-156.76 -158.15c-13.96,-10.6 -22.97,-27.37 -22.97,-46.25 0,-30.23 23.11,-55.06 52.63,-57.79 4.82,-0.45 11.6,-1 16.16,-1l70.66 0c22.11,0 40.76,-7.53 55.97,-22.89 15.36,-15.21 23.05,-33.87 23.05,-55.97 0,-21.95 -7.69,-40.61 -23.05,-55.97 -15.21,-15.21 -33.86,-22.89 -55.97,-22.89 -44.58,0 -88.36,-0.33 -132.81,-0.33 -1.93,0 -3.84,-0.08 -5.72,-0.23 -31.64,-0.47 -57.16,-26.27 -57.16,-58.03 0,-0.17 0.01,-0.35 0.01,-0.53 -0.08,-6.17 0.9,-12.02 2.88,-17.57 7.38,-22.49 28.13,-38.92 52.85,-39.89 0.92,-0.04 1.84,-0.06 2.77,-0.06l137.18 0c54.4,0 100.65,18.97 138.59,57.07 38.1,38.09 57.07,84.34 57.07,138.74 0,44.06 -13.33,83.72 -39.98,118.68 -26.65,34.96 -61.46,58.32 -104.26,70.08l107.13 106.86c-35.53,22.32 -75.49,38.24 -118.27,46.12z"/>
                                        </g>
                                    </g>
                                </g>
</svg>



                            <span class="page-logo-text mr-1">Русские объявления со всей Британии</span>
                            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                        </a>
                    </div>
                    <div id="loginForm">
                        <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
                            <form method="POST" action="{{ route('web.login.submit') }}">
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


                                <br />
                                <p style="margin-left:265px">OR</p>
                                <br />
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 col-md-offset-2">
                                            <a href="{{url('/redirect')}}" class="btn btn-primary"><i class="fa fa-google"></i>Google</a>
                                        </div>

                                        <div class="col-md-2 col-md-offset-2">
                                            <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook"></i> Facebook</a>
                                        </div>
                                    </div>
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
                            | <a href="#" onclick="switchToRegister()"><strong>Register Account</strong></a>
                        </div>

                    </div>



                    <div id="registrationForm" style="display:none">
                        <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>


                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">

                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="blankpage-footer text-center">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                <strong>Recover Password</strong>
                            </a>
                            | <a href="#" onclick="switchToLogin()"><strong>Login</strong></a>
                        </div>

                    </div>




                </div>






            @endif
            <div class="modal-body" @if(!\Auth::user()) style="display:none" @endif>
                <input type="hidden" id="company_id" name="company_id" >
                <div id="photoForm" style="display:none">
                <div class="example-box example-box-alt pb-5">
                    <h4 class="heading-2 pb-4">Загрузка фотографий</h4>

                    <div class="dropzone dropzone-multiple" data-toggle="dropzone" data-dropzone-multiple data-dropzone-url="/dropzone">
                        <div class="fallback">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="dropzoneMultipleUpload" multiple>
                                <label class="custom-file-label" for="dropzoneMultipleUpload">Choose file</label>
                            </div>
                        </div>
                        <ul class="dz-preview dz-preview-multiple mt-5 list-group list-group-lg">
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-md-3 text-center">
                                        <img class="img-fluid w-50 rounded" src="" alt="" data-dz-thumbnail>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="mb-1" data-dz-name>...</h4>
                                        <p class="small text-muted mb-0" data-dz-size>...</p>
                                    </div>
                                    <div class="col-md-3 text-right">
                    <span class="dropdown">
                        <a href="#" class="btn btn-sm btn-primary" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item" data-dz-remove>
                                Remove
                            </a>
                        </div>
                    </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>


                </div>
                </div>
                <?$i=1;

                $cnt=count($company_badges_groups);

                ?>
                @foreach($company_badges_groups as $badges)
                    @if($i==1 || (($i%4+1)==2) )
                        <div>
                            @else

                            @endif
                            <div class="modal modal-al modal-alert fade" id="getCroppedCanvasModal_{{$badges->id}}" tabindex="-1" aria-labelledby="getCroppedCanvasTitle" role="dialog" aria-hidden="true" >
                                <div class="modal-dialog modal-dialog-centered" >
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="getCroppedCanvasTitle">Изображение записано в базу данных</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Осталось сохранит запись о логотипе...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <form style="display:none" class="badges_form needs-validation" id="badge_form_{{$badges->id}}">

                                <h3 class="badge_name"></h3>

                                <input type="hidden" class="sending_badge_user" value="">
                                <div class="form-group personal_select" >
                                    <label class="form-label" >
                                        Выберите вложенную категорию
                                    </label>
                                    <?

                                    $subcats=\App\Domain\Customer\Models\ProductCategory::where('parent_id',$badges->id)->get();

                                    ?>
                                    <div class="form-group mb-5">
                                        <select class="form-control category_select" data-toggle="custom-select2" placeholder="Choose one entry..." data-allow-clear="1" id="select-single" >
                                                @foreach($subcats as $cat)
                                                    <option value="{{$cat->id}}" data-icon="fa {{$cat->icon}} text-dark" selected="">{{$cat->name}}</option>
                                                @endforeach


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="name-f">Контактная информация по объявлению</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text text-success">
                                                            <i class="ni ni-user fs-xl"></i>
                                                        </span>
                                            </div>
                                            <input type="text" aria-label="First name" class="form-control email_input" required placeholder="Email" id="name-f">
                                            <input type="text" aria-label="Last name" class="form-control phone_input" required placeholder="Phone" id="name-l">
                                        </div>
                                    </div>

                                    <div class="form-group auto_complete_form_group">


                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="price-f">Дополнительная информация по объявлению</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text text-success">
                                                            <i class="ni ni-user fs-xl"></i>
                                                        </span>
                                            </div>
                                            <input type="text" aria-label="First name" class="form-control price_input" required placeholder="Цена(необязательно)" id="price-f">
                                            <input type="text" aria-label="Last name" class="form-control title_input" required placeholder="Название" id="tytle-l">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">

                                </div>

                                <div class="form-group">

                                    <input type="hidden" class="form-control sending_badge_title" value="" />
                                </div>
                                <div class="form-group photo_form_place"></div>
                                <div class="container">
                                    <div class="example-box example-box-alt pb-5">
                                        <h4 class="heading-2 pb-4">Текст объявления</h4>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="quill" data-toggle="quill" ></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"  data-target="#getCroppedCanvasModal_{{$badges->id}}"  data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }" class=" sending_badge_submit btn btn-primary waves-effect waves-themed">Отправить объявление</button>
                            </form>


                            <div class="badge_border" style="position:relative;padding:10px;width:170px;height:200px;display:inline-block;border: 1px solid #eee">
                                <input type="hidden" class="badge_num" value="{{$i}}">
                                <input type="hidden" class="badge_id" value="{{$badges->id}}">
                                <input type="hidden" class="badge_name" value="{{$badges->name}}">
                                <img src="/storage/root_cat_photos/{{$badges->photo}}" style="position:absolute;width:150px" class="single_badge"> <h3 style="color:black;
                                                font: 20px Arial, sans-serif;
                                                text-shadow: #cad5e2 1px 1px 0, #cad5e2 2px 2px 0,
                 #cad5e2 3px 3px 0, #cad5e2 4px 4px 0,
                 #cad5e2 5px 5px 0;
                                                font-weight:bold;position:absolute;z-index:999;
bottom: 1px;
left:2px;
   text-align: center;
   width: 100%;
">{{$badges->name}}</h3></div>

                            <!--Или  если бейдж принадлежит остатку бейджей в группе-->
                            @if($i%4==0 || $cnt==$i)


                                <div style="height:1550px;width:100%;background:#eee;position:relative;display:none;padding-top:25px" class="sending_group">
                                    <!--input type="hidden" class="sending_badges_group" value=""-->
                                    <!--input type="hidden" class="sending_badges_customer" value=""-->


                                </div>

                            @endif



                            @if($i%4==0 || $cnt==$i )
                        </div>
                    @endif

                    <?$i++;?>
                @endforeach




            </div>
            <div class="modal-footer">
                <button type="button" class="company_create_close btn btn-secondary waves-effect waves-themed" onclick="localStorage.setItem('openAddMessageModal',0);" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<div class="hero-wrapper bg-composed-wrapper bg-white">
    <div class="input-group location_input" style="display:none;z-index:9999;">
        <div class="input-group-prepend">
                                                        <span class="input-group-text text-success">
                                                            <i class="fal fa-compass"></i>
                                                            <!--i class="ni ni-location fs-xl"></i-->
                                                        </span>
            <input  type="text" id="location" style="width:47%" name="location" placeholder="City or ZIP code">
        </div>

    </div>
    <div class="header-nav-logo justify-content-start" style="z-index:9999;position:absolute;top:10px;left:10px;">

        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="270px" height="75px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
             viewBox="0 0 2706 755.26"
             xmlns:xlink="http://www.w3.org/1999/xlink">
 <defs>
     <style type="text/css">
         <![CDATA[
    .fil0 {fill:none}
         .fil2 {fill:#A269F7}
         .fil1 {fill:black;fill-rule:nonzero}
         .fil3 {fill:white;fill-rule:nonzero}
         ]]>
     </style>
 </defs>
            <g id="Слой_x0020_1">
                <metadata id="CorelCorpID_0Corel-Layer"/>
                <rect class="fil0" width="2706" height="755.26"/>
                <g id="_1090375648">
                    <g>
                        <path class="fil1" d="M920.35 571.72l0 -386.5 137.79 0c37.74,0 68.32,12.1 91.77,36.3 23.44,24.21 35.16,53.27 35.16,87.19 0,23.64 -6,44.98 -18.01,64.04 -12.01,19.06 -28.87,33.35 -50.6,42.88l73.18 156.09 -93.76 0 -62.9 -144.08 -28.58 0 0 144.08 -84.05 0zm84.05 -210.98l49.74 0c13.72,0 24.87,-4.76 33.45,-14.29 8.57,-9.53 12.86,-22.11 12.86,-37.74 0,-15.24 -4.38,-27.73 -13.15,-37.44 -8.77,-9.72 -19.82,-14.58 -33.16,-14.58l-49.74 0 0 104.05z"/>
                        <path class="fil1" d="M1276.94 442.5l0 -257.28 84.05 0 0 250.42c0,22.49 5.62,40.12 16.87,52.89 11.24,12.77 26.2,19.15 44.88,19.15 18.68,0 33.64,-6.48 44.88,-19.44 11.25,-12.96 16.87,-30.49 16.87,-52.6l0 -250.42 84.04 0 0 257.28c0,39.64 -14.19,72.33 -42.59,98.06 -28.4,25.73 -62.8,38.59 -103.2,38.59 -40.79,0 -75.28,-12.77 -103.49,-38.31 -28.2,-25.54 -42.31,-58.31 -42.31,-98.34z"/>
                        <polygon class="fil1" points="1659.72,571.72 1659.72,185.22 1743.77,185.22 1743.77,328.15 1843.82,185.22 1942.16,185.22 1818.09,353.88 1959.89,571.72 1860.4,571.72 1767.21,423.06 1743.77,455.08 1743.77,571.72 "/>
                        <path class="fil1" d="M1999.93 571.72l116.06 -386.5 97.2 0 116.06 386.5 -85.19 0 -25.72 -93.2 -107.49 0 -25.73 93.2 -85.19 0zm129.79 -161.23l69.75 0 -20.01 -73.19c-4.58,-15.63 -9.53,-37.54 -14.87,-65.75 -3.81,20.58 -8.76,42.5 -14.86,65.75l-20.01 73.19z"/>
                        <path class="fil1" d="M2444.95 571.72l-116.07 -386.5 85.19 0 64.61 234.41c4.19,14.87 9.15,37.74 14.87,68.61 5.71,-30.87 10.67,-53.74 14.86,-68.61l64.61 -234.41 85.19 0 -116.07 386.5 -97.19 0z"/>
                    </g>
                    <g>
                        <path class="fil2" d="M386.58 38.84c187.11,0 338.79,151.68 338.79,338.79 0,187.11 -151.68,338.79 -338.79,338.79 -187.11,0 -338.79,-151.68 -338.79,-338.79 0,-187.11 151.68,-338.79 338.79,-338.79z"/>
                        <path class="fil3" d="M448.3 710.8l-156.76 -158.15c-13.96,-10.6 -22.97,-27.37 -22.97,-46.25 0,-30.23 23.11,-55.06 52.63,-57.79 4.82,-0.45 11.6,-1 16.16,-1l70.66 0c22.11,0 40.76,-7.53 55.97,-22.89 15.36,-15.21 23.05,-33.87 23.05,-55.97 0,-21.95 -7.69,-40.61 -23.05,-55.97 -15.21,-15.21 -33.86,-22.89 -55.97,-22.89 -44.58,0 -88.36,-0.33 -132.81,-0.33 -1.93,0 -3.84,-0.08 -5.72,-0.23 -31.64,-0.47 -57.16,-26.27 -57.16,-58.03 0,-0.17 0.01,-0.35 0.01,-0.53 -0.08,-6.17 0.9,-12.02 2.88,-17.57 7.38,-22.49 28.13,-38.92 52.85,-39.89 0.92,-0.04 1.84,-0.06 2.77,-0.06l137.18 0c54.4,0 100.65,18.97 138.59,57.07 38.1,38.09 57.07,84.34 57.07,138.74 0,44.06 -13.33,83.72 -39.98,118.68 -26.65,34.96 -61.46,58.32 -104.26,70.08l107.13 106.86c-35.53,22.32 -75.49,38.24 -118.27,46.12z"/>
                    </g>
                </g>
            </g>
</svg>
    </div>

    <div class="header-nav-wrapper header-nav-wrapper-lg d-none d-lg-flex"></div>
    <div class="header-nav-wrapper header-nav-wrapper-lg w-100 navbar-dark headroom" id="headroom-header">
        <div class="container">

            <div class="header-nav-menu d-none d-lg-block">
                <ul class="nav justify-content-center">

                    <li class="nav-item dropdown d-flex align-items-center">
                        <a class="nav-link popover-custom





        " href="#" data-trigger="click" data-placement="bottom" data-popover-class="popover-custom-wrapper rounded shadow-lg popover-custom-md" data-rel="popover-close-outside" data-tip="header-nav-0">
                            Категории
                            <i class="fas fa-angle-down ml-2 opacity-5"></i>
                        </a>
                        <div id="header-nav-0" class="d-none" style="width:300px">
                            <div class="py-3 px-4" style="width:300px">
                                <div class="list-group list-group-flush strange" style="position:absolute;left:10px;width:300px">
                                   @include('new.layouts.rubrics')
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="search">

                            <input type="text" id="search-field" style="border: 3px solid #666;display:inline-flex;width:300px" placeholder="Ищите что либо..." class="form-control" >
                            <input  type="text" style="display:inline-flex;width:200px;background:#fff" id="location_search" name="location" placeholder="City or ZIP code">
                            <input type="submit" style="display:inline-flex" value="Искать" id="go">

                        </div>
                    </li>
                </ul>

            </div>
            <div class="header-nav-actions justify-content-end">


        <span class="d-block d-lg-none">
            <button  type="button" data-toggle="collapse" data-toggle="modal" data-target="#modal-bbb4" aria-controls="nav-inner-home" aria-expanded="false" aria-label="Toggle navigation">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </span>
                <span class="d-none d-lg-block">
                    <button class=" btn btn-pill btn-warning"  data-toggle="modal" data-target="#modal-bbb4">

                Подать объявление
            </button>
        </span>
            </div>
            <div id="nav-inner-home" class="nav-collapsed-wrapper navbar-collapse collapse">
                <div class="navbar-collapse-inner p-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item bg-secondary px-4 py-3">
                            <div class="d-flex align-items-stretch navbar-light align-content-center">
                                <div class="header-nav-logo justify-content-start">
                                    <a href="/Bamburgh/index.html" title="Bamburgh HTML5 UI Kit with Bootstrap PRO">
                                        <div class="navbar-brand d-50 bg-primary rounded-circle text-center" data-toggle="tooltip"
                                             data-html="true" title="Enjoy your stay with us 😀">
                                            <img src="/Bamburgh/assets/img/logo-inverse.png" class="d-inline-block my-auto" width="26px">
                                        </div>
                                    </a>
                                </div>
                                <button class="navbar-toggler is-active collapsed hamburger hamburger--elastic" type="button" data-toggle="collapse" data-target="#nav-inner-home" aria-controls="nav-inner-home" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="list-group-item p-2">
                            <a class="d-flex px-3 align-items-center dropdown-item rounded " href="ui-elements.html">
                                <div class="align-box-row w-100">
                                    <div class="mr-3">
                                        <div class="bg-strong-bliss text-center text-white d-40 rounded-circle">
                                            <i class="fas fa-shapes"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-weight-bold text-primary d-block">UI Elements</div>
                                        <small class="text-black-50">
                                            Easy to customise
                                        </small>
                                    </div>
                                    <div class="ml-auto card-hover-indicator align-self-center">
                                        <i class="fas fa-chevron-right font-size-lg"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="list-group-item p-2">
                            <a class="d-flex px-3 align-items-center dropdown-item rounded " href="form-widgets.html">
                                <div class="align-box-row w-100">
                                    <div class="mr-3">
                                        <div class="bg-plum-plate text-center text-white d-40 rounded-circle">
                                            <i class="fas fa-car-battery"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-weight-bold text-primary d-block">Form widgets</div>
                                        <small class="text-black-50">
                                            Multiple options available
                                        </small>
                                    </div>
                                    <div class="ml-auto card-hover-indicator align-self-center">
                                        <i class="fas fa-chevron-right font-size-lg"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="list-group-item p-2">
                            <a class="d-flex px-3 align-items-center dropdown-item rounded " href="tables.html">
                                <div class="align-box-row w-100">
                                    <div class="mr-3">
                                        <div class="bg-grow-early text-center text-white d-40 rounded-circle">
                                            <i class="fas fa-table"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-weight-bold text-primary d-block">Tables</div>
                                        <small class="text-black-50">
                                            Dynamic and sortable examples
                                        </small>
                                    </div>
                                    <div class="ml-auto card-hover-indicator align-self-center">
                                        <i class="fas fa-chevron-right font-size-lg"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="list-group-item p-2">
                            <a class="d-flex px-3 align-items-center dropdown-item rounded " href="maps.html">
                                <div class="align-box-row w-100">
                                    <div class="mr-3">
                                        <div class="bg-ripe-malin text-center text-white d-40 rounded-circle">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-weight-bold text-primary d-block">Maps</div>
                                        <small class="text-black-50">
                                            Everything you'll need, included
                                        </small>
                                    </div>
                                    <div class="ml-auto card-hover-indicator align-self-center">
                                        <i class="fas fa-chevron-right font-size-lg"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="list-group-item p-2">
                            <a class="d-flex px-3 align-items-center dropdown-item rounded " href="presentation-blocks.html">
                                <div class="align-box-row w-100">
                                    <div class="mr-3">
                                        <div class="bg-malibu-beach text-center text-white d-40 rounded-circle">
                                            <i class="fas fa-cubes"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-weight-bold text-primary d-block">Presentation blocks</div>
                                        <small class="text-black-50">
                                            Build perfect websites today
                                        </small>
                                    </div>
                                    <div class="ml-auto card-hover-indicator align-self-center">
                                        <i class="fas fa-chevron-right font-size-lg"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="list-group-item p-2 accordion" id="navAccordion">
                            <a href="#" class="d-flex px-3 align-items-center dropdown-item rounded collapsed" aria-expanded="false" aria-controls="navAccordion" data-toggle="collapse" data-target="#navAccordionCollapse">
                                <div class="align-box-row w-100">
                                    <div class="mr-3">
                                        <div class="bg-strong-bliss text-center text-white d-40 rounded-circle">
                                            <i class="fas fa-pager"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-weight-bold text-primary d-block">Landing pages</div>
                                        <small class="text-black-50">
                                            Complex examples of dynamic elements...
                                        </small>
                                    </div>
                                    <div class="ml-auto card-hover-indicator align-self-center">
                                        <i class="fas fa-chevron-down font-size-lg"></i>
                                    </div>
                                </div>
                            </a>
                            <div id="navAccordionCollapse" class="collapse" data-parent="#navAccordion">
                                <div class="card card-box shadow-none border-light list-group mt-3 mb-2">
                                    <a href="landing-page-1.html" class="list-group-item bg-transparent list-group-item-action border-light font-size-sm">
                                        Landing page 1
                                    </a>
                                    <a href="landing-page-2.html" class="list-group-item bg-transparent list-group-item-action border-light font-size-sm">
                                        Landing page 2
                                    </a>
                                    <a href="landing-page-3.html" class="list-group-item bg-transparent list-group-item-action border-light font-size-sm">
                                        Landing page 3
                                    </a>
                                    <a href="landing-page-4.html" class="list-group-item bg-transparent list-group-item-action border-light font-size-sm">
                                        Landing page 4
                                    </a>
                                    <a href="landing-page-5.html" class="list-group-item bg-transparent list-group-item-action border-light font-size-sm">
                                        Landing page 5
                                    </a>
                                    <a href="landing-page-6.html" class="list-group-item bg-transparent list-group-item-action border-light font-size-sm">
                                        Landing page 6
                                    </a>
                                    <a href="landing-page-7.html" class="list-group-item bg-transparent list-group-item-action border-light font-size-sm">
                                        Landing page 7
                                    </a>
                                    <a href="landing-page-8.html" class="list-group-item bg-transparent list-group-item-action border-light font-size-sm">
                                        Landing page 8
                                    </a>
                                    <a href="landing-page-9.html" class="list-group-item bg-transparent list-group-item-action border-light font-size-sm">
                                        Landing page 9
                                    </a>
                                    <a href="landing-page-10.html" class="list-group-item bg-transparent list-group-item-action border-light font-size-sm">
                                        Landing page 10
                                    </a>
                                    <a href="landing-page-11.html" class="list-group-item bg-transparent list-group-item-action border-light font-size-sm">
                                        Landing page 11
                                    </a>
                                    <a href="landing-page-12.html" class="list-group-item bg-transparent list-group-item-action border-light font-size-sm">
                                        Landing page 12
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action align-box-row p-2">
                            <a href="https://uifort.com/template/bamburgh-html5-ui-kit-bootstrap-pro" target="_blank" class="btn btn-pill btn-second btn-block">
                                Buy now
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="flex-grow-1 w-100 d-flex align-items-center">
        <div class="bg-composed-wrapper--image bg-composed-filter-rm opacity-9" style="z-index:0;background-image: url('/Bamburgh/assets/img/hero-bg/hero-7.jpg');"></div>
        <div class="bg-composed-wrapper--content py-5">

        </div>
    </div>
@yield('content')

</div>


<!-- Bamburgh UI Kit Javascript Core -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="/Bamburgh/assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!--Bootstrap init-->

<script src="/Bamburgh/assets/js/demo/bootstrap/bootstrap.min.js"></script>

<!-- Bamburgh UI Kit Javascript Widgets -->

<!--Perfect scrollbar-->

<script src="/Bamburgh/assets/vendor/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>

<!--Perfect scrollbar init-->

<script src="/Bamburgh/assets/js/demo/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!--StickyKit-->

<script src="/Bamburgh/assets/vendor/stickykit/js/stickykit.min.js"></script>

<!--StickyKit init-->

<script src="/Bamburgh/assets/js/demo/stickykit/stickykit.min.js"></script>

<!--Headroom-->

<script src="/Bamburgh/assets/vendor/headroom/js/headroom.min.js"></script>

<!--Headroom init-->

<script src="/Bamburgh/assets/js/demo/headroom/headroom.min.js"></script>

<!--Animations-->

<script src="/Bamburgh/assets/vendor/wow/js/wow.min.js"></script>

<!--Animations init-->

<script src="/Bamburgh/assets/js/demo/wow/wow.min.js"></script>


<!--Slick slideshow-->

<script src="/Bamburgh/assets/vendor/slick/js/slick.min.js"></script>

<!--Slick slideshow init-->

<script src="/Bamburgh/assets/js/demo/slick/slick.min.js"></script>

<!--MetisMenu-->

<script src="/Bamburgh/assets/vendor/metismenu/js/metismenu.min.js"></script>

<!--MetisMenu init-->

<script src="/Bamburgh/assets/js/demo/metismenu/metismenu.min.js"></script>


<!--FeatherIcons-->

<script src="/Bamburgh/assets/vendor/feather-icons/js/feather-icons.min.js"></script>

<!--FeatherIcons init-->

<script src="/Bamburgh/assets/js/demo/feather-icons/feather-icons.min.js"></script>

<!--Layout-->

<script src="/Bamburgh/assets/js/bamburgh.min.js"></script>

<script src="/NewSmartAdmin/js/formplugins/summernote/summernote.js"></script>
<script src="/NewSmartAdmin/js/formplugins/cropperjs/cropper.js"></script>
<script src="/NewSmartAdmin/js/formplugins/select2/select2.bundle.js"></script>
<!--Dropzone-->

<script src="/Bamburgh/assets/vendor/dropzone/js/dropzone.min.js"></script>

<!--Dropzone init-->

<script src="/Bamburgh/assets/js/demo/dropzone/dropzone.min.js"></script>

<!-- Quill -->

<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>


<!-- Quill init -->

<script type="text/javascript" src="/Bamburgh/assets/js/demo/quill-editor/quill-editor.min.js"></script>

<!--Select2-->

<script type="text/javascript" src="/Bamburgh/assets/vendor/select2/js/select2.min.js"></script>

<!--Select2 init-->

<script type="text/javascript" src="/Bamburgh/assets/js/demo/select2/select2.min.js"></script>

@yield('scripts')
<script>
    console.log('ready')
    $(document).ready(function(){
        console.log('ready')
        console.log('window_height',$(window).height())
        //$('.popover-body').height($(window).height()+50)
        $('.fa-angle-down').click(function(){
            console.log($('.strange').height())
            console.log('window_height',$(window).height())

        })

        $(function ()
        {
            console.log('HERE')
            $(function() {
                $(document).on('mouseover', '.main_category_list', function(event) {
                    console.log()
                    $('.reshow').children().hide()
                    $(this).parent().find('.strange').addClass('reshow_').removeClass('hide')
                    $(this).parent().children().show()
                    //$

                    var blocks = $('.strange ul');
var height_menu=[];
                    blocks.each(function(index, value) {
                        height_menu.push($(this).height());
                    });
                    var max_height=Math.max.apply(Math,height_menu);
                    console.log(max_height)
                    $('.popover-body').height(max_height+50)


                });
            });
        });

    })
</script>


<?
if(\Auth::user()){
    $auth=\Auth::user()->id;
}
else{
    $auth=0;
}
?>

<script>

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
            $('.sending_badge_title').text('Подать Новое объявление')
        }
    }

    $('.single_badge').click(function(){


        $.ajax({
            method: 'POST',
            dataType: 'json',
            async:false,
            url: '/customer/reload_photo_session',
            beforeSend: function() {
            },
            complete: function() {

            },
            success: function (data) {

            }
        });

        var badge=$(this).parent().find('.badge_id').val()
        window.badge=badge;
        console.log('window.badge=>',window.badge)
        var form_origin = $('#badge_form_'+badge)
        var form = form_origin.clone()
        var photo_form =$('#photoForm')

        form.attr('id','clone_'+form.attr('id'))
        console.log('form=>',form);
        $(this).parent().parent().find('.sending_group').empty()

        form.find('.summerBlock').empty();






        //$(this).parent().parent().find('.sending_group').find('.badges_form').find('.summerBlock').empty();
        //$(this).parent().parent().find('.sending_group').find('.badges_form').find('.summerBlock').append('<div class="js-summernote" ></div>')

        window.slide_allow=0
        //var badge_name_h=$(this).parent().parent().find('.sending_group').find('.badge_name')
        // var badge_title=$(this).parent().parent().find('.sending_group').find('.sending_badge_title')
        var badge_title=form.find('.sending_badge_title')
        var badge_name_h=form.find('.badge_name')
        console.log('badge_title=>',badge_title);
        //var badge_submit=$(this).parent().parent().find('.sending_group').find('.sending_badge_submit')
        var badge_submit=form.find('.sending_badge_submit')
        var sending_badges_group=$(this).parent().parent().find('.sending_group').find('.sending_badges_group').val()
        var sending_badges_customer=$(this).parent().parent().find('.sending_group').find('.sending_badges_customer').val()
        console.log('group_id',sending_badges_group)
        var current_badge_name=$(this).parent().find('.badge_name').val()
        console.log('current_badge_name',current_badge_name)
        console.log('main_cat=>',badge)

        console.log('form=>',form)

        var sending_group=$(this).parent().parent().find('.sending_group')
        badge_name_h.html('<div class="to_root" style="cursor:pointer">< К корневым категориям</div>')
        $('.Cat_name').append(' <  '+ current_badge_name)
        badge_title.val(current_badge_name)
        form.find('.photo_form_place').append(photo_form)
        $(this).parent().parent().find('.sending_group').append(form)
        photo_form.css('display','block');

        form.css('display','block');

        var inputs = [form.find('.email_input'),form.find('.phone_input')];
        console.log('inputS=>',inputs)
        form.find('.email_input').change(function(){
            console.log('Onchange',this)
            form.find('.phone_input').prop('required', !$(this).val().length);
        })
        form.find('.phone_input').change(function(){
            console.log('Onchange',this)
            form.find('.email_input').prop('required', !$(this).val().length);
        })
        $.each( inputs, function( key, value ) {
            console.log('VALUE',value)
            value.change(function(){

            })

            // Set the required property of the other input to false if this input is not empty.
            //

        });
        var autocomplete_form_group = form.find('.auto_complete_form_group')

        $('.location_input').detach().appendTo(autocomplete_form_group).css('display','block').show()
        var pacContainerInitialized = false;
        $('#inputField').keypress(function() {
            if (!pacContainerInitialized) {
                $('.pac-container').css('z-index','9999');
                pacContainerInitialized = true;
            }
        });

        $('#viewMode3').parent().find('span').trigger('click')

        /* $(this).parent().parent().find('.sending_group').find('.badges_form').each(function (index, value){*/
        console.log('here')
        var form_id=form.attr('id')
        console.log('form_id=>',form_id);
        var dropdown=form.find('.js-select2-icons')
        console.log('dropdown',dropdown);


        dropdown.select2(
            {
                dropdownParent: $("#"+form_id),
                minimumResultsForSearch: 1 / 0,
                templateResult: icon,
                templateSelection: icon,
                escapeMarkup: function (elm) {
                    return elm
                }
            });

        function icon(elm)
        {
            elm.element;
            return elm.id ? "<i class='" + $(elm.element).data("icon") + " mr-2'></i>" + elm.text : elm.text
        }


        /*});*/





$('.to_root').click(function(){
    console.log(444)

    $('.sending_group').slideUp({
        duration: 'slow',
        easing: 'linear'
    })
    $('.badge_border').show()
    $('.Cat_name').empty()
})



        $('.sending_group').slideUp({
            duration: 'slow',
            easing: 'linear'
        })
        $('.badge_border').hide()

        //Проверить сколько золотых бэйджей отправлено в текущем месяце

        /*        $.ajax({
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
         });*/


        sending_group.slideDown({
            duration: 'slow',
            easing: 'linear'
        })





        console.log('first step')
        $('.badges_form').submit(function(){
            console.log('TRY')

            event.preventDefault();
            event.stopPropagation();




            if ($(this)[0].checkValidity() === false) {
                console.log('FALSE')
                event.preventDefault();
                event.stopPropagation();
            }
            else{


                $('#getCroppedCanvasBtn').trigger('click');
                console.log('second step')

                var customer=$(this).find('.sending_badge_user').val()
                var visibility=$(this).find('.form-group').find('.sending_badge_visibility').val()
                var message=$(this).find('.form-group').find('.sending_badge_textarea').val()
                var title=$(this).find('.form-group').find('.title_input').val()
                var price=$(this).find('.form-group').find('.price_input').val()
                var email=$(this).find('.form-group').find('.email_input').val()
                var phone=$(this).find('.form-group').find('.phone_input').val()
                console.log('Therd step',message)
                message=localStorage.getItem("summernoteData")
                console.log('Therd step',message)
                var title=$(this).find('.form-group').find('.sending_badge_title').val()
                console.log('visibility=>',visibility)
                console.log('customer=>',customer)
                console.log(message)
                console.log(badge)

                /*$('#go').click(function(){*/
                var location = window.autocomplete.getPlace();
                //location=JSON.stringify(location);
                geocoder = new google.maps.Geocoder();
                console.log(location)

                lat = location['geometry']['location'].lat();
                lng = location['geometry']['location'].lng();
                var latlng = new google.maps.LatLng(lat,lng);

                // http://stackoverflow.com/a/5341468
                var category = $(this).find('.category_select option:selected').val()
                window.location_place_id=location.place_id
                window.customer=customer;window.message=message;window.category=category;window.title=title;window.visibility=visibility
                window.phone=phone;window.price=price;window.email=email;
                codeLatLng(latlng,true);


                /* });*/




            }






        })

        console.log('here',$(this).parent().parent())






















    });


    /*
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

     })*/

    function initContinued(addr,ajax) {
        console.log('123')
        console.log('aJax=>',ajax)


        if(!addr.city){
            city=addr.postal_town
        }
        else{
            city=addr.city
        }
window.message=$('.quill').text()
        console.log(window.location_place_id,city,addr.administrative,window.customer,window.message,
            window.category,window.title,window.visibility,window.price,window.phone,window.email)
        if(ajax){
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/customer/badge/send',
                data: {location:window.location_place_id,city:city,administrative:addr.administrative,customer: window.customer,message:window.message,
                    category:window.category,title:window.title,visibility:window.visibility,price:window.price,phone:window.phone,email:window.email
                },
                beforeSend: function() {
                },
                complete: function() {
                    $('.company_create_close').trigger('click')
                },
                success: function (data) {

                    $('#badges_modal').modal("hide");
                    $(".modal-backdrop").remove();
                    $('.categoryModalClose').trigger('click')
                    $('.company_create_close').trigger('click')
                    $('.modal-backdrop').removeClass('show').addClass('hide')



                    console.log('success')

                }
            });
        }
        else{

            window.location.replace("/search?search_string="+window.search_field+"&city="+addr.city+"&administrative="+addr.administrative+"");
        }

    }

    function codeLatLng(latlng,ajax) {
        geocoder.geocode({'latLng': latlng}, function (results) {
            var result = [];
            for (i = 0; i < results.length; i++) {
                console.log(results[i].address_components)
                if (results[i].address_components[0].types[0] == "locality") {
                    console.log(i + ": locality:" + results[i].address_components[0].long_name);
                    result.city = results[i].address_components[0].long_name;
                    console.log(result.city)
                }
                if (results[i].address_components[0].types[0] == "administrative_area_level_1") {
                    console.log(i + ": administrative_area_level_1:" + results[i].address_components[0].long_name);
                    result.administrative = results[i].address_components[0].long_name;
                }
                if (results[i].address_components[0].types[0] == "administrative_area_level_2") {
                    console.log(i + ": administrative_area_level_2:" + results[i].address_components[0].long_name);
                    result.administrative_2 = results[i].address_components[0].long_name;
                }
                if (results[i].address_components[0].types[0] == "postal_town") {
                    console.log(i + ": postal_town:" + results[i].address_components[0].long_name);
                    result.postal_town = results[i].address_components[0].long_name;
                }
                if (results[i].address_components[0].types[0] == "political") {
                    console.log(i + ": political:" + results[i].address_components[0].long_name);
                }
                for (var j = 0; j < results[i].address_components.length; j++) {
                    for (var k = 0; k < results[i].address_components[j].types.length; k++) {
                        if (results[i].address_components[j].types[k] == "postal_code") {
                            zipcode = results[i].address_components[j].short_name;
                            //$('span.zip').html(zipcode);

                        }
                    }
                }
            }

            console.log('result=>', result)

            initContinued(result,ajax);

        });
    }

</script>


<script>


    var modal_lv = 0;
    $('.modal').on('shown.bs.modal', function (e) {
        $('.modal-backdrop:last').css('zIndex',1051+modal_lv);
        $(e.currentTarget).css('zIndex',1052+modal_lv);
        modal_lv++
    });

    $('.modal').on('hidden.bs.modal', function (e) {
        modal_lv--
    });




    $(document).ready(function() {
        $('#logo_create').submit(function(evt){
            evt.preventDefault();// to stop form submitting
        });

        localStorage.setItem("personalBadegeCustomerId",0)

        reloadPage();

        var auth='{{$auth}}'

        if(localStorage.getItem("openAddMessageModal")==1 && auth!=0){
            console.log('openModal')
            $('#badges_modal').modal('show')

        }
        console.log('auth',auth)


        /* if(localStorage.getItem("openAddMessageModalWithProduct")!=0 ){
         console.log('openModalWithProduct')
         var badges=$('.single_badge');
         $.each( badges, function( key, value ) {
         console.log('VALUE_SINGLE_BADGE',$(this).parent('div').find('.badge_id').val())
         console.log('VALUE_SINGLE_STORAGE',localStorage.getItem("openAddMessageModalWithCategory"))
         if($(this).parent('div').find('.badge_id').val()==localStorage.getItem("openAddMessageModalWithCategory")){
         console.log('VALUE_SINGLE_BADGE_WIN!!1')
         $('#badges_modal').modal('show')
         $(this).trigger('click')
         }


         });


         }*/



    });


    function theSubmitFunction (){
        console.log(222)
        var form=$('#logo_create')
        if (form[0].checkValidity() === false) {

        }
        else{

            var logo_name=$('#logo_name').val()
            var logo_id=$('.sending_logo_id').val()
            var company_id=$('#company_id').val()

            console.log(logo_name)

            window.logo_name=logo_name
            window.logo_id=logo_id
            $('.formLogo').trigger('click')

        }
    }




</script>









<script>

    function logoCreation(){

        var logo_name=$('#logo_name').val()
        var id=$('#logo_id').val()
        //var company_id=$('#company_id').val()
        console.log(222,window.company_id)
        console.log(223,window.logo_id)
        console.log(logo_name)

        /*   $.ajax({
         method: 'POST',
         dataType: 'json',
         async: false,
         url: '/company/logo/create',
         data: {
         company_id: company_id, logo_name: logo_name,id:window.logo_id
         },
         beforeSend: function () {
         },
         complete: function () {
         $('.logo_create_close').click();
         reloadData();
         },
         success: function (data) {

         console.log('success')

         }
         });*/
    }



   /* $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })*/





    function refreshImg(){
        $("#image").removeAttr("src");
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
                        console.log('FALSE')
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    else{


                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();






</script>




<script>

    $(function(){



        window.autocomplete;
        window.geocoder;
        window.input = document.getElementById('location');//

        console.log('LOCATION',window.input)
        window.options = {
            componentRestrictions: {'country':'uk'},
            types: ['(regions)'] // (cities)
        };

        window.autocomplete = new google.maps.places.Autocomplete(window.input,window.options);
console.log('AUTOCOMPLETE',window.autocomplete)
        var autocompleteSearch;
        var geocoderSearch;
        var inputSearch = document.getElementById('location_search');//
        var optionsSearch = {
            componentRestrictions: {'country':'uk'},
            types: ['(regions)'] // (cities)
        };

        autocompleteSearch = new google.maps.places.Autocomplete(inputSearch,optionsSearch);
        $('#go').click(function(){
            var location = autocompleteSearch.getPlace();
            var search_field = $('#search-field').val()
            window.search_field=search_field;
            //location=JSON.stringify(location);
            //geocoder = new google.maps.Geocoder();
            console.log(location.place_id)
            //location=JSON.stringify(location);
            geocoder = new google.maps.Geocoder();
            console.log(location)
            lat = location['geometry']['location'].lat();
            lng = location['geometry']['location'].lng();
            var latlng = new google.maps.LatLng(lat,lng);
            location=location.place_id
            codeLatLng(latlng,false);









        });

    });




    function switchToRegister(){

        $('#loginForm').hide();
        $('#registrationForm').show();
    }

    function switchToLogin(){

        $('#loginForm').show();
        $('#registrationForm').hide();
    }



</script>


</body>
</html>

