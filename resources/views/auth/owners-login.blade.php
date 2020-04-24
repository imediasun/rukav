@extends('site.layouts.app')
@section('content')
    <div class="container full-width">
        <div class="row">

            <article id="post-246" class="col-md-12 post-246 page type-page status-publish hentry">

                <div class="row">
                    <div class="col-md-4 col-md-offset-4">

                        <!--Tab -->
                        <div class="my-account style-1 margin-top-5 margin-bottom-40">
                            <style type="text/css">
                                .wp-social-login-connect-with {
                                }

                                .wp-social-login-provider-list {
                                }

                                .wp-social-login-provider-list a {
                                }

                                .wp-social-login-provider-list img {
                                }

                                .wsl_connect_with_provider {
                                }</style>

                            <div class="wp-social-login-widget">

                                <div class="wp-social-login-connect-with">{{trans('main.connect_with')}}</div><!--Connect with:-->

                                <div class="wp-social-login-provider-list">
                                    <a
                                            rel="nofollow"
                                            href="https://findeo.realty/wp-login.php?wpe-login=true&#038;action=wordpress_social_authenticate&#038;mode=login&#038;provider=Facebook&#038;redirect_to=https%3A%2F%2Ffindeo.realty%2Fmy-profile%2F"
                                            data-provider="Facebook"
                                            class="wp-social-login-provider wp-social-login-provider-facebook"
                                    >
      <span>
         <i class="fa fa-facebook"></i>
         Sign in with Facebook      </span>
                                    </a>
                                    <a
                                            rel="nofollow"
                                            href="https://findeo.realty/wp-login.php?wpe-login=true&#038;action=wordpress_social_authenticate&#038;mode=login&#038;provider=Google&#038;redirect_to=https%3A%2F%2Ffindeo.realty%2Fmy-profile%2F"
                                            data-provider="Google"
                                            class="wp-social-login-provider wp-social-login-provider-google"
                                    >
      <span>
         <i class="fa fa-google"></i>
         Sign in with Google      </span>
                                    </a>
                                    <a
                                            rel="nofollow"
                                            href="https://findeo.realty/wp-login.php?wpe-login=true&#038;action=wordpress_social_authenticate&#038;mode=login&#038;provider=Twitter&#038;redirect_to=https%3A%2F%2Ffindeo.realty%2Fmy-profile%2F"
                                            data-provider="Twitter"
                                            class="wp-social-login-provider wp-social-login-provider-twitter"
                                    >
      <span>
         <i class="fa fa-twitter"></i>
         Sign in with Twitter      </span>
                                    </a>

                                </div>

                                <div class="wp-social-login-widget-clearing"></div>

                            </div>

                            <!-- wsl_render_auth_widget -->

                            <ul class="tabs-nav">
                                <li class=""><a href="#tab1">{{trans('main.log_in')}}</a></li><!--Log In-->
                                <li><a href="#tab2">{{trans('main.register')}}</a></li><!--Register-->
                            </ul>

                            <div class="tabs-container alt">

                                <!-- Login -->
                                <div class="tab-content" id="tab1" style="display: none;">
                                    <!--Tab -->

                                    <div id="login_error" style="color:red"></div>
                                    <form id="loginForm" method="post" class="login" action="/login">
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                        <p class="form-row form-row-wide">
                                            <label for="username">{{trans('main.username')}}<!--Username:--> <i class="im im-icon-Male"></i>
                                                <input type="email" class="input-text" name="email" id="user_login"
                                                       value=""/>
                                            </label>
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="password">{{trans('main.password')}}<!--Password:--> <i class="im im-icon-Lock-2"></i>
                                                <input class="input-text" type="password" name="password"
                                                       id="user_pass"/>
                                            </label>
                                        </p>
                                        <p class="form-row">
                                            <input type="submit" class="button border margin-top-10" name="login"
                                                   value="{{trans('main.sign_in')}}"/><!--Sign In-->

                                            <label for="rememberme" class="rememberme">
                                                <input name="rememberme" type="checkbox" id="rememberme"
                                                       value="forever"/>{{trans('main.remind_me')}}<!--Remember Me--></label>
                                        </p>
                                        <p class="lost_password">
                                            <a href="/lostpassword"> {{trans('main.lost_password')}}<!--Lost Your
                                                Password?--></a>
                                        </p>
                                    </form>

                                </div>

                                <!-- Register -->
                                <div class="tab-content" id="tab2" style="display: none;">
                                    <div id="register_error" style="color:red"></div>
                                    <form id="signupform">
									 <!--input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"-->
                                        <p class="form-row">
                                            <label for="email">{{trans('main.email')}}<!--Email --><strong>*</strong></label>
                                            <input type="text" name="email" id="email">
                                        </p>

                                        <p class="form-row">
                                            <label for="first_name">{{trans('main.name')}}<!--Name--></label>
                                            <input type="text" name="name" id="first-name">
                                        </p>

                                        <p class="form-row">
                                            <label for="phone">{{trans('main.phone')}}<!--Phone--></label>
                                            <input type="text" name="phone" id="phone">
                                        </p>

                                        <p class="form-row">
                                            <label for="first_name">{{trans('main.password')}}<!--Password--></label>
                                            <input type="password" name="password" id="first-name">
                                        </p>
                                        <p class="form-row">
                                            <label for="password_confirmation">{{trans('main.confirm_password')}}<!--Confirm Password--></label>
                                            <input type="password" name="password_confirmation" id="password_confirmation">
                                        </p>

                                        <p class="signup-submit">
                                            <input type="submit" name="submit" class="register-button"
                                                   value="{{trans('main.register')}}"/><!--Register-->
                                        </p>
                                    </form>

                                </div>

                            </div>
                        </div>


            </article>


        </div>

    </div>
    <div class="clearfix"></div>
    <div class="margin-top-55"></div>

@endsection

