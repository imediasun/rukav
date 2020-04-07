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
                    <h1>{{$message->title}}</h1>
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
                <!-- Poduct Gallery-->
                <div class="col-md-6">
                    <div class="product-gallery"><span class="product-badge text-danger">30% Off</span>
                        <div class="gallery-wrapper">
                            <div class="gallery-item active"><a href="/storage/pictures/{{$message->pictures->photo}}" data-hash="one" data-size="1000x667"></a></div>

                        </div>
                        <div class="product-carousel owl-carousel">
                            <div data-hash="one"><img src="/storage/pictures/{{$message->pictures->photo}}" alt="Product"></div>

                        </div>
                        <ul class="product-thumbnails">
                            <li class="active"><a href="#one"><img src="/storage/pictures/{{$message->pictures->photo}}" alt="Product"></a></li>

                        </ul>
                    </div>
                </div>
                <!-- Product Info-->
                <div class="col-md-6">
                    <div class="padding-top-2x mt-2 hidden-md-up"></div>
                    <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
                    </div><span class="text-muted align-middle">&nbsp;&nbsp;4.2 | 3 customer reviews</span>
                    <h2 class="padding-top-1x text-normal">Reebok Royal CL Jogger 2</h2><span class="h2 d-block">
              <del class="text-muted text-normal">$68.00</del>&nbsp; $47.60</span>
                    {{$message->message}}
                    <div class="pt-1 mb-2"><span class="text-medium">SKU:</span> #21457832</div>
                    <div class="padding-bottom-1x mb-2"><span class="text-medium">Categories:&nbsp;</span><a class="navi-link" href="#">Men’s shoes,</a><a class="navi-link" href="#"> Snickers,</a><a class="navi-link" href="#"> Sport shoes</a></div>
                    <hr class="mb-3">
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="entry-share mt-2 mb-2"><span class="text-muted">Share:</span>
                            <div class="share-links"><a class="social-button shape-circle sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a></div>
                        </div>
                        <div class="sp-buttons mt-2 mb-2">
                            <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                            <button class="btn btn-primary" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-bag"></i> Связаться с автором</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Tabs-->
            <div class="row padding-top-3x mb-3">
                <div class="col-lg-10 offset-lg-1">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" href="#description" data-toggle="tab" role="tab">Description</a></li>
                        <li class="nav-item"><a class="nav-link" href="#reviews" data-toggle="tab" role="tab">Reviews (3)</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error blanditiis a, deserunt magnam pariatur quam suscipit quae. Veniam, deserunt reprehenderit quasi hic recusandae itaque omnis fugiat animi architecto facilis repellendus. Commodi dolorem, eius consectetur. Amet maiores nemo at nobi s aspernatur velit, sequi odio, a veritatis inventore autem esse provident in? Placeat, sunt!</p>
                            <p class="mb-30">Iste assumenda, vitae, aliquam excepturi libero quia ullam quisquam tenetur id sint labore. Pariatur praesentium velit, fugit facere maxime voluptates optio qui? Quidem obcaecati necessitatibus rem aspernatur, mollitia, assumenda explicabo numquam minus eos sapiente totam dicta, laborum dolorum! Vitae distinctio quos non ut fugiat.</p>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="//www.youtube.com/embed/B81qd2v6alw?rel=0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <!-- Review-->
                            <div class="comment">
                                <div class="comment-author-ava"><img src="img/reviews/01.jpg" alt="Review author"></div>
                                <div class="comment-body">
                                    <div class="comment-header d-flex flex-wrap justify-content-between">
                                        <h4 class="comment-title">Average quality for the price</h4>
                                        <div class="mb-2">
                                            <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i><i class="icon-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="comment-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                                    <div class="comment-footer"><span class="comment-meta">Francis Burton</span></div>
                                </div>
                            </div>
                            <!-- Review-->
                            <div class="comment">
                                <div class="comment-author-ava"><img src="img/reviews/02.jpg" alt="Review author"></div>
                                <div class="comment-body">
                                    <div class="comment-header d-flex flex-wrap justify-content-between">
                                        <h4 class="comment-title">My husband love his new...</h4>
                                        <div class="mb-2">
                                            <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <div class="comment-footer"><span class="comment-meta">Maggie Scott</span></div>
                                </div>
                            </div>
                            <!-- Review-->
                            <div class="comment">
                                <div class="comment-author-ava"><img src="img/reviews/03.jpg" alt="Review author"></div>
                                <div class="comment-body">
                                    <div class="comment-header d-flex flex-wrap justify-content-between">
                                        <h4 class="comment-title">Soft, comfortable, quite durable...</h4>
                                        <div class="mb-2">
                                            <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="comment-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                    <div class="comment-footer"><span class="comment-meta">Jacob Hammond</span></div>
                                </div>
                            </div>
                            <!-- Review Form-->
                            <h5 class="mb-30 padding-top-1x">Leave Review</h5>
                            <form class="row" method="post">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="review_name">Your Name</label>
                                        <input class="form-control form-control-rounded" type="text" id="review_name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="review_email">Your Email</label>
                                        <input class="form-control form-control-rounded" type="email" id="review_email" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="review_subject">Subject</label>
                                        <input class="form-control form-control-rounded" type="text" id="review_subject" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="review_rating">Rating</label>
                                        <select class="form-control form-control-rounded" id="review_rating">
                                            <option>5 Stars</option>
                                            <option>4 Stars</option>
                                            <option>3 Stars</option>
                                            <option>2 Stars</option>
                                            <option>1 Star</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="review_text">Review </label>
                                        <textarea class="form-control form-control-rounded" id="review_text" rows="8" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-right">
                                    <button class="btn btn-outline-primary" type="submit">Submit Review</button>
                                </div>
                            </form>
                        </div>
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