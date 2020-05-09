@extends('layouts.app')




<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Lato', sans-serif;

    }
    :root {
        --dark-green: #9cc675;
        --dark-yellow: #e89a3d;
        --extra-light-brown:#fdf0d7;
        --light-brown: #ecd5ab;
        --dark-brown:#915b40;
        --light-yellow:#f8e3a8;
        --light-red:#f3ac99;
        --light-teal:#a6c8cc;
        --light-gray:#ddd5d6;
        --theme-color2: #e89a3d;
    }


    .site-logo {
        width: 218.33px !important;
        margin-right: 50px;
    }
    .btn {
        border-radius: 5px;
        font-weight: normal;
        font-size: 15px;
        letter-spacing: 0.02em;
        line-height: 12px;
        text-align: center;
        font-weight: 600;
        font-size: 14px;
        padding: 14px 30px;
        cursor: pointer;
    }
    .btn-theme {
        background: var(--theme-color1);
        color: #212121;
    }

    .c-container {
        margin: auto;
        width: 93%;
        position: relative;
        z-index: 1;
    }

    .btn-outline-white {
        color: #fff;
        background-color: rgba(255, 255, 255, 0.1);
        background-image: none;
        border-width: 2px;
        border-color: #fff;
        font-weight: 500;
        -webkit-transition: all .2s;
        transition: all .2s;
    }
    .btn {
        border-radius: 5px;
        font-weight: normal;
        font-size: 15px;
        letter-spacing: 0.02em;
        line-height: 12px;
        text-align: center;
        font-weight: 600;
        font-size: 14px;
        padding: 14px 30px;
        cursor: pointer;
    }
    .btn-outline-white:hover {
        background-color: #fff;
        color: var(--text-dark);
    }
    /* common css up */

    .testimonial p {
        font-size: 28px;
        letter-spacing: 0.02em;
        line-height: 35px;
    }
    .testimonial .name {
        font-weight: bold;
        font-size: 18px;
        letter-spacing: 0.04em;
        line-height: 35px;
        text-align: left;
    }
    .testimonial .designation {
        font-size: 14px;
        letter-spacing: 0.04em;
        text-align: left;
        color: #fff;
        opacity: 0.65;
    }
    .unt {
        margin-bottom: 20px;
        margin-top: 60px;
    }
    .hero-text {
        font-size: 30px;
        letter-spacing: 0.02em;
        color: #fff;
    }
    .gallery-thumbs {
        height: 400px;
    }
    .gallery-thumbs .swiper-wrapper {
        align-items: center;
    }
    .gallery-thumbs .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 250px !important;
        height: 330px;
        position: relative;
    }
    .gallery-thumbs .swiper-slide img {
        filter: contrast(0.5) blur(1px);
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 10px;
    }
    .gallery-thumbs .swiper-slide-active img {
        filter: contrast(1) blur(0px) !important;
    }
    .flex-row {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }
    .flex-row .flex-col {
        -ms-flex-preferred-size: 0;
        flex-basis: 0;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%;
        position: relative;
        width: 100%;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }

    .gallery-thumbs .swiper-wrapper {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }


    .testimonial-section .quote {
        width: 75%;
        height: 400px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        padding-left: 100px;
        padding-right: 100px;
    }
    .swiper-container.testimonial {
        height: 100vh;
    }
    .testimonial-section .user-saying {
        background: var(--theme-color2);
        width: 60%;
        color: #fff;
        height: 400px;
    }
    .testi-user-img {
        width: 40%;
    }
    .testimonial-section {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        width: 100%;
        height: 400px;
    }
    .testimonial-section .quote p {
        font-size: 20px;
        font-weight: 300;
        line-height: 1.8;
        font-style: italic;
        margin: 0;
    }
    .quote-icon {
        width: 38px;
        display: block;
        margin-bottom: 30px;
    }
    .swiper-container-vertical>.swiper-pagination-bullets {
       top:200px;
    }


    form label {
        display: inline-block;
        width: 100px;
    }

    form div {
        margin-bottom: 10px;
    }

    .error {
        color: red;
        margin-left: 5px;
    }

    label.error {
        display: inline;
    }

</style>




@section('content')

<div class="row">

    <div class="col-xl-6">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Ваше сообщение для пользователя <span class="fw-300"><i>{{$message->getSender->name}} {{$message->getSender->sername}}</i></span>
                </h2>

            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="panel-tag">
                        Будте уверены что вы не нарушаете правила сервиса отправляя сообщение Нельзя отправлять информацию о контактах <code>email</code> <code>skype</code> <code>telegramm</code>
                    </div>
                    <form action="/send_message_to_client" method="get" id="contact" class="needs-validation" novalidate>
                        <input type="hidden" name="client_id" value="{{$message->sender}}">
                        <input type="hidden" name="message_id" value="{{$message->id}}">
                        <div class="form-group">
                            <label class="form-label" for="example-textarea">Text area</label>
                            <textarea class="form-control" id="example-textarea" name="text" required rows="5"></textarea>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <p>Replies will be sent to Andrey at {{\Auth::user()->email}} (Change on My Details) </p>

                        <input type="submit" style="width:100px;display:inline-flex" value="Отправить" id="contact_submit button">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<? $current=(!isset($current)) ? 'undefined' : $current;?>




@section('scripts')
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script>
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Get the forms we want to add validation styles to
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
    </script>

    @endsection