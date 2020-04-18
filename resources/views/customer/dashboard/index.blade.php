@extends('layouts.app')

<link rel="stylesheet" href="/css/demo.css">
<link rel="stylesheet" href="/css/font-awesome.css">
<link rel="stylesheet" href="/css/sky-mega-menu.css">

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://md-aqil.github.io/images/swiper.min.css">


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


</style>




@section('content')



                <!--ol class="breadcrumb page-breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">SmartAdmin</a></li>
                    <li class="breadcrumb-item">Application Intel</li>
                    <li class="breadcrumb-item active">Analytics Dashboard</li>
                    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                </ol-->
@include('layouts.slider_portfolio')


                <div class="row" id="js-contacts">

                    @foreach($rubrics as $rubric)
                    <? $childs=\App\Domain\Customer\Models\ProductCategory::where('parent_id',$rubric->id)->get();
                    $childs_count=count($childs);
                    ?>
                    @if($rubric->parent_id==0)
                    <div class="col-xl-4">
                        <div id="c_1" class="card border shadow-0 mb-g shadow-sm-hover" data-filter-tags="oliver kopyov">
                            <div class="card-body border-faded border-top-0 border-left-0 border-right-0 rounded-top">
                                <div class="d-flex flex-row align-items-center">
                                            <span class="status status-success mr-3">
                                                <span class="rounded-circle profile-image d-block " style="background-image:url('{{$rubric->photo}}'); background-size: cover;"></span>
                                            </span>
                                    <div class="info-card-text flex-1">
                                        <a href="javascript:void(0);" class="fs-xl text-truncate text-truncate-lg text-info" data-toggle="dropdown" aria-expanded="false">
                                            {{$rubric->name}}
                                            <i class="fal fa-angle-down d-inline-block ml-1 fs-md"></i>
                                        </a>
                                        <span class="text-truncate text-truncate-xl">10 объявлений размещены</span>
                                    </div>
                                    <button class="js-expand-btn btn btn-sm btn-default d-none" data-toggle="collapse" data-target="#c_1 > .card-body + .card-body" aria-expanded="false">
                                        <span class="collapsed-hidden">+</span>
                                        <span class="collapsed-reveal">-</span>
                                    </button>
                                </div>
                            </div>
                            <?$i=0;?>
                            <div class="row">
                            @foreach($childs as $child)
                              @if($i==0 || $i==($childs_count/2)+1)
                                <div class="col-xl-5">
                                    @endif
                            <div class="card-body p-0 collapse show">
                                <div class="p-3">
                                    <a href="/category/{{$child->id}}" class="mt-1 d-block fs-sm fw-400 text-dark">
                                        <i class="fas {{$child->icon}} text-muted mr-2"></i> {{$child->name}}</a>

                                </div>
                            </div>
                             @if($i==($childs_count/2) || $i==$childs_count-1)
                                </div>
                             @endif
                            <?$i++;?>
                            @endforeach
                            </div>

                        </div>
                    </div>
                    @endif
                    @endforeach
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


    <script>
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: '2',
            // coverflowEffect: {
            //   rotate: 50,
            //   stretch: 0,
            //   depth: 100,
            //   modifier: 1,
            //   slideShadows : true,
            // },

            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 50,
                modifier: 6,
                slideShadows : false,
            },

        });


        var galleryTop = new Swiper('.swiper-container.testimonial', {
            speed: 400,
            spaceBetween: 50,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            direction: 'vertical',
            pagination: {
                clickable: true,
                el: '.swiper-pagination',
                type: 'bullets',
            },
            thumbs: {
                swiper: galleryThumbs
            }
        });

    </script>

    @endsection