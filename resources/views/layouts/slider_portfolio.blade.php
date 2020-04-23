@section('styles')
    <!-- Bootstrap Style Sheet -->
    <link href="/paradise/css/bootstrap.css" rel="stylesheet" media="all">

    <!-- Paradise Slider Main Style Sheet -->
    <link href="/paradise/css/portfolio_076.css" rel="stylesheet" media="all">
@endsection
<!-- Paradise Slider -->
<?

$activeCount=count(\App\Domain\Company\Models\Slider::where('active',1)->get());
$oddOrEven=$activeCount % 2;
$activeCountM=$activeCount-1;
if($activeCount>=6){$activeCount=6;}
?>
<div id="portfolio_076_mov_1_col_6" class="carousel slide portfolio_076 portfolio_076_control_button swipe_x ps_easeOutCirc" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000" data-column="{{$activeCount}}" data-m576="1" data-m768="1" data-m992="3" data-m1200="{{$activeCountM}}">

    <!-- Header of Slider -->
    <div class="portfolio_076_header">
        <h1>Популярные категории</h1>
        <!--p>Lorem ipsum dolor sit amet consectetuer adipiscing elit nam nibh nunc varius facilisis eros sed erat.</p-->
    </div>
    <!-- /Header of Slider -->

    <!-- Wrapper For Slides -->
    <div class="carousel-inner" role="listbox">


        @foreach($sliders as $key=>$slider)
        <!-- 1st Box -->
        @if($slider->active==1)

        <div class="carousel-item @if($key==0) active @endif">
            <div class="row"> <!-- Row -->

                <div class="col portfolio_076_grid"> <!-- Grid -->
                    <a href="{{$slider->link}}">
                    <div class="portfolio_076_wrapper"> <!-- Wrapper -->

                        <!-- Image -->
                        <img style="height:150px" src="/storage/sliders/{{$slider->photo}}" alt="portfolio_076_01">

                        <!-- Text Content -->
                        <div class="portfolio_076_content">

                            <h5><a href="{{$slider->link}}">{{$slider->name}}</a></h5>
                            <ul>
                                <li><a href="{{$slider->link}}">{{$slider->description}}</a></li>

                            </ul><!-- Icons -->
                            <!--div class="portfolio_076_link">
                                <a href="#"><span class="fal fa-link"></span></a>
                                <a href="#"><span class="fal fa-search"></span></a>
                            </div--> <!-- /Icons -->


                        </div> <!-- /Text Content -->

                    </div> <!-- /.portfolio_076_wrapper --></a>
                </div> <!-- /.portfolio_076_grid -->


            </div> <!-- /.row -->
        </div> <!-- /item -->

        <!-- End of 1st Box -->
@endif
        @endforeach
    </div> <!-- End of Wrapper For Slides -->

    <!-- Left Control -->
    <a class="carousel-control-prev" href="#portfolio_076_mov_1_col_6" data-slide="prev">
        <span class="fal fa-long-arrow-alt-left"></span>
    </a>

    <!-- Right Control -->
    <a class="carousel-control-next" href="#portfolio_076_mov_1_col_6" data-slide="next">
        <span class="fal fa-long-arrow-alt-right"></span>
    </a>

</div> <!-- End Paradise Slider -->

@section('scripts')
    <!-- jQuery -->
    <!--script src="/paradise/js/jquery.js"></script>

    <!-- Bootstrap JS -->
    <!--script src="/paradise/js/bootstrap.js"></script-->

    <!-- Touch Swipe -->
    <script src="/paradise/js/touchSwipe.js"></script>

    <!-- Paradise Slider Main JS File -->
    <script src="/paradise/js/paradise_slider_min.js"></script>
    @endsection