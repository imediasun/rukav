@extends('layouts.app')
<link rel="stylesheet" href="/css/demo.css">
<link rel="stylesheet" href="/css/font-awesome.css">
<link rel="stylesheet" href="/css/sky-mega-menu.css">

<!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
<link rel="stylesheet" media="screen" href="/main_site/css/vendor.min.css">
<!-- Main Template Styles-->
<link id="mainStyles" rel="stylesheet" media="screen" href="/main_site/css/styles.min.css">
<!-- Modernizr-->
<script src="/main_site/js/modernizr.min.js"></script>
@section('content')


    <div class="offcanvas-wrapper">
        <!-- Page Title-->
        <div class="page-title">
            <div class="container">
                <div class="column">
                    <h1>Детская одежда</h1>
                </div>
                <div class="column">
                    <ul class="breadcrumbs">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li class="separator">&nbsp;</li>
                        <li>Детская одежда</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Content-->
        <div class="container padding-bottom-3x mb-1">
            <div class="row">
                <!-- Products-->
                <div class="col-xl-9 col-lg-8 order-lg-2">
                    <!-- Shop Toolbar-->
                    <div class="shop-toolbar padding-bottom-1x mb-2">
                        <div class="column">
                            <div class="shop-sorting">
                                <label for="sorting">Сортировка:</label>
                                <select class="form-control" id="sorting">
                                    <option>Популярность</option>
                                    <option>Низкая - Высокая Цена</option>
                                    <option>Высокая - Низкая Цена</option>
                                    <option>Рейтинг</option>
                                    <option>A - Я Порядок</option>
                                    <option>Z - A Порядок</option>
                                </select><span class="text-muted">Показано:&nbsp;</span><span>1 - 12 объявлений</span>
                            </div>
                        </div>
                        <div class="column">
                            <div class="shop-view"><a class="grid-view active" href="{{url()->current()}}"><span></span><span></span><span></span></a><a class="list-view" href="{{url()->current()}}/list"><span></span><span></span><span></span></a></div>
                        </div>
                    </div>
                    <!-- Products Grid-->
                    <div class="isotope-grid cols-3 mb-2">
                        <div class="gutter-sizer"></div>
                        <div class="grid-sizer"></div>


                    @foreach($goods as $good)
                       <!-- Product-->
                            <div class="grid-item">
                                <div class="product-card">
                                   <h3 class="product-title"><a href="shop-single.html">{{$good->title}}</a></h3>
                                    <img src="/storage/messages/tshort.jpg">
                                    <div class="product-buttons">
                                        <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                                        <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">$49.99</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Product-->
                        @endforeach
                    </div>
                    <!-- Pagination-->
                    <nav class="pagination">
                        <div class="column">
                            <ul class="pages">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li>...</li>
                                <li><a href="#">12</a></li>
                            </ul>
                        </div>
                        <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-arrow-right"></i></a></div>
                    </nav>
                </div>
                <!-- Sidebar          -->
                <div class="col-xl-3 col-lg-4 order-lg-1">
                    <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters"><i class="icon-layout"></i></button>
                    <aside class="sidebar sidebar-offcanvas">
                        <!-- Widget Categories-->
                        <section class="widget widget-categories">
                            <h3 class="widget-title">Категории объявлений</h3>

                            <ul >

                                @php

                                    class RecursionCat
                                    {
                                        public $level;
                                        public $lang = 'en';

                                        public function get_cat($menu=null)
                                        {

                                            if (!$menu) {
                                                return NULL;
                                            }
                                            $arr_cat = array();
                                            if (count($menu) != 0) {

                                                //В цикле формируем массив

                                                foreach ($menu as $key => $row) {

                                                    //Формируем массив где ключами являются адишники на родительские категории
                                                    if (empty($arr_cat[$row->parent_id])) {
                                                        $arr_cat[$row->parent_id] = array();
                                                    }
                                                    $arr_cat[$row->parent_id][] = $row;
                                                }


                                                //возвращаем массив
                                                return $arr_cat;
                                            }
                                        }


                                        //вывод каталогa с помощью рекурсии
                                        public function view_cat($arr, $parent_id = 0, $level, $parents_approved=[] ) {

                                            //Условия выхода из рекурсии
                                            if (empty($arr[$parent_id])) {
                                                return;
                                            }
                                            if($parent_id !== 0) {
                                                echo '<ul >';
                                            }
                                            //перебираем в цикле массив и выводим на экран
                                            for ($i = 0; $i < count($arr[$parent_id]); $i++) {
                                            //Если пермишен присутствуют у текущего юзера выводить нулевой уровень
                                                 if($parent_id == 0){
                                                   echo '<li class="has-children expanded"><a href="#">';
                                                   echo $arr[$parent_id][$i]->name;
                                                   }
                                                   else{

                                                echo '
                                                      <li>
                                                    <a href="'.$arr[$parent_id][$i]->link.'  ">'.$arr[$parent_id][$i]->name;




                                                 }
                             if($parent_id == 0){
                                                echo '</a><span class="sub-menu-toggle"></span>';}
                                                //рекурсия - проверяем нет ли дочерних категорий
                                                $this->view_cat($arr, $arr[$parent_id][$i]->id, 1,$parents_approved);
                                                if($parent_id == 0){
                                                echo '</li> ';
                                                }
                                                else{
                                                echo '</a></li> ';}

                                            }
                                            if($parent_id !== 0) {
                                                echo '</ul>';
                                            }
                                        }
                                    }

                                    if(isset($menu)){
                                     $rec= new RecursionCat;
                                     $result = $rec->get_cat($rubrics);
                                    //Выводи каталог на экран с помощью рекурсивной функции

                                    $rec->view_cat($result,0,0);
                                    }



                                @endphp

                            </ul>



                        </section>
                        <!-- Widget Price Range-->
                        <section class="widget widget-categories">
                            <h3 class="widget-title">Фильтр цены</h3>
                            <form class="price-range-slider" method="post" data-start-min="250" data-start-max="650" data-min="0" data-max="1000" data-step="1">
                                <div class="ui-range-slider"></div>
                                <footer class="ui-range-slider-footer">
                                    <div class="column">
                                        <button class="btn btn-outline-primary btn-sm" type="submit">Фильтр</button>
                                    </div>
                                    <div class="column">
                                        <div class="ui-range-values">
                                            <div class="ui-range-value-min">$<span></span>
                                                <input type="hidden">
                                            </div>&nbsp;-&nbsp;
                                            <div class="ui-range-value-max">$<span></span>
                                                <input type="hidden">
                                            </div>
                                        </div>
                                    </div>
                                </footer>
                            </form>
                        </section>
                        <!-- Widget Brand Filter-->
                        <section class="widget">
                            <h3 class="widget-title">Фильтр по району</h3>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="adidas">
                                <label class="custom-control-label" for="adidas">Северная Ирландия&nbsp;<span class="text-muted">(254)</span></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="bilabong">
                                <label class="custom-control-label" for="bilabong">Англия&nbsp;<span class="text-muted">(39)</span></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="klein">
                                <label class="custom-control-label" for="klein">Уэльс&nbsp;<span class="text-muted">(128)</span></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="nike">
                                <label class="custom-control-label" for="nike">Шотландия&nbsp;<span class="text-muted">(310)</span></label>
                            </div>

                        </section>
                        <!-- Widget Size Filter-->
                        <section class="widget">
                            <h3 class="widget-title">Filter by Size</h3>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="xl">
                                <label class="custom-control-label" for="xl">XL&nbsp;<span class="text-muted">(208)</span></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="l">
                                <label class="custom-control-label" for="l">L&nbsp;<span class="text-muted">(311)</span></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="m">
                                <label class="custom-control-label" for="m">M&nbsp;<span class="text-muted">(485)</span></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="s">
                                <label class="custom-control-label" for="s">S&nbsp;<span class="text-muted">(213)</span></label>
                            </div>
                        </section>
                        <!-- Promo Banner-->
                        <section class="promo-box" style="background-image: url(img/banners/02.jpg);">
                            <!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .45;"></span>
                            <div class="promo-box-content text-center padding-top-3x padding-bottom-2x">
                                <h4 class="text-light text-thin text-shadow">New Collection of</h4>
                                <h3 class="text-bold text-light text-shadow">Sunglassess</h3><a class="btn btn-sm btn-primary" href="#">Shop Now</a>
                            </div>
                        </section>
                    </aside>
                </div>
            </div>
        </div>
        <!-- Site Footer-->
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <!-- Contact Info-->
                        <section class="widget widget-light-skin">
                            <h3 class="widget-title">Get In Touch With Us</h3>
                            <p class="text-white">Phone: 00 33 169 7720</p>
                            <ul class="list-unstyled text-sm text-white">
                                <li><span class="opacity-50">Monday-Friday:</span>9.00 am - 8.00 pm</li>
                                <li><span class="opacity-50">Saturday:</span>10.00 am - 6.00 pm</li>
                            </ul>
                            <p><a class="navi-link-light" href="#">support@unishop.com</a></p><a class="social-button shape-circle sb-facebook sb-light-skin" href="#"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter sb-light-skin" href="#"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram sb-light-skin" href="#"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus sb-light-skin" href="#"><i class="socicon-googleplus"></i></a>
                        </section>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <!-- Mobile App Buttons-->
                        <section class="widget widget-light-skin">
                            <h3 class="widget-title">Our Mobile App</h3><a class="market-button apple-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">App Store</span></a><a class="market-button google-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Google Play</span></a><a class="market-button windows-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Windows Store</span></a>
                        </section>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <!-- About Us-->
                        <section class="widget widget-links widget-light-skin">
                            <h3 class="widget-title">About Us</h3>
                            <ul>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">About Unishop</a></li>
                                <li><a href="#">Our Story</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Our Blog</a></li>
                            </ul>
                        </section>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <!-- Account / Shipping Info-->
                        <section class="widget widget-links widget-light-skin">
                            <h3 class="widget-title">Account &amp; Shipping Info</h3>
                            <ul>
                                <li><a href="#">Your Account</a></li>
                                <li><a href="#">Shipping Rates & Policies</a></li>
                                <li><a href="#">Refunds & Replacements</a></li>
                                <li><a href="#">Taxes</a></li>
                                <li><a href="#">Delivery Info</a></li>
                                <li><a href="#">Affiliate Program</a></li>
                            </ul>
                        </section>
                    </div>
                </div>
                <hr class="hr-light mt-2 margin-bottom-2x">
                <div class="row">
                    <div class="col-md-7 padding-bottom-1x">
                        <!-- Payment Methods-->
                        <div class="margin-bottom-1x" style="max-width: 615px;"><img src="img/payment_methods.png" alt="Payment Methods">
                        </div>
                    </div>
                    <div class="col-md-5 padding-bottom-1x">
                        <div class="margin-top-1x hidden-md-up"></div>
                        <!--Subscription-->
                        <form class="subscribe-form" action="//rokaux.us12.list-manage.com/subscribe/post?u=c7103e2c981361a6639545bd5&amp;amp;id=1194bb7544" method="post" target="_blank" novalidate>
                            <div class="clearfix">
                                <div class="input-group input-light">
                                    <input class="form-control" type="email" name="EMAIL" placeholder="Your e-mail"><span class="input-group-addon"><i class="icon-mail"></i></span>
                                </div>
                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                    <input type="text" name="b_c7103e2c981361a6639545bd5_1194bb7544" tabindex="-1">
                                </div>
                                <button class="btn btn-primary" type="submit"><i class="icon-check"></i></button>
                            </div><span class="form-text text-sm text-white opacity-50">Subscribe to our Newsletter to receive early discount offers, latest news, sales and promo information.</span>
                        </form>
                    </div>
                </div>
                <!-- Copyright-->
                <p class="footer-copyright">© All rights reserved. Made with &nbsp;<i class="icon-heart text-danger"></i><a href="http://rokaux.com/" target="_blank"> &nbsp;by rokaux</a></p>
            </div>
        </footer>
    </div>




@endsection

@section('scripts')
    <script src="/main_site/js/vendor.min.js"></script>
    <script src="/main_site/js/scripts.min.js"></script>
    @endsection