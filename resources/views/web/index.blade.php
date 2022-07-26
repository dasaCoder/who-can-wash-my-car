@extends('web.layouts.app')

@section('content')

<section class="banner-one" id="home">
    <img src="web/images/banner/banner-shape-1-1.png" alt="Banner-Shape-1" class="banner-shape-1">
    <img src="web/images/banner/banner-shape-1-2.png" alt="Banner-Shape-2" class="banner-shape-2">
    <!--            <div class="banner-one__bg" style="background-image: url(assets/images/banner/banner-bg-1.png);"></div>-->
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="banner-one__content">
                    <h3 class="mb-3">{!!$homePageContent->header_title!!}</h3>
                    <p class="mt-0 mb-3">{{$homePageContent->header_description}}</p>

                    <div>
                        <form class="p-0">
                            <div class="input-group mb-3 search-field">
                                <input type="text" class="form-control" placeholder="Enter Your Full Address to Find Services" aria-describedby="searchBtn">
                                <div class="input-group-append">
                                    <button class="thm-btn" type="button" id="searchBtn">
                                        <i class="d-md-none fa fa-search"></i>
                                        <span class="d-none d-md-block">Search</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex">
                        <a href="{!!$links->content->playstore_app!!}" class="app-download-btn mr-2">
                            <img src="web/images/store-buttons/playstore-btn.png" alt="playstore-btn">
                        </a>
                        <a href="{!!$links->content->appstore_app!!}" class="app-download-btn">
                            <img src="web/images/store-buttons/appstore-btn.png" alt="appstore-btn">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="banner-img wow fadeInUp" data-wow-duration="1500ms">
                    <img src="web/images/shapes/banner-1-1.png" class="banner-image__curvs" alt="">
                    <div class="banner-bg"
                         style="background-image: url(web/images/banner/banner-shape-1-4.png)"></div>
                    <img src="web/images/app-views/app-mobile-view.png" alt="Banner-img">
                    <div class="banner-icon-1">
                        <i class="piloz-lamp"></i>
                    </div>
                    <div class="banner-icon-2">
                        <i class="piloz-linked"></i>
                    </div>
                    <div class="banner-icon-3">
                        <i class="piloz-human-resources"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="service-one">
    <div class="container">
        <div class="block-title text-center">
            <h3>Choose What You Want</h3>
            <p>Our Services</p>
        </div>

        <div class="owl-carousel thm__owl-carousel owl-theme" data-options='{"loop": true, "autoplay": true, "autoplayHoverPause": true, "autoplayTimeout": 5000, "items": 5, "dots": false, "nav": false, "margin": 20, "smartSpeed": 700, "responsive": { "0": {"items": 1, "margin": 20}, "480": {"items": 2, "margin": 20}, "991": {"items": 3, "margin": 20}, "1199": {"items": 4, "margin": 20}}}'>
            @foreach ($services as $service)
                <div class="wow fadeInLeft item mb-3" data-wow-duration="1500ms">
                    <div class="service-one__single">
                        <div class="service-icon">
                            <img src="storage/{{$service->image}}" alt="service-img">
                        </div>
                        <div class="text">
                            <h3 class="txt-overflow txt-overflow-1">{{$service->name}}</h3>
                            <p class="txt-overflow txt-overflow-2">{{$service->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="cta-two">
    <!--            <img src="assets/images/shapes/cta-2-shape-1.png" class="cta-two__bg-shape-1" alt="">-->
    <div class="container pb-4">
        <div class="row">
            <div class="col-xl-6">
                <div class="cta-two__content">
                    <div class="block-title cus-pb">
                        <p>Our App Feature Lists</p>
                        <h3>How It<br>Works</h3>
                    </div>
                    <div class="cta-two__text">
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum lorem ipsum is
                            simply free.</p>
                    </div>
                    <ul class="list-unstyled cta-two__list">
                        <li>
                            <i class="fa fa-check-circle"></i>
                            Download App
                        </li>
                        <li>
                            <i class="fa fa-check-circle"></i>
                            Share Your Location
                        </li>
                        <li>
                            <i class="fa fa-check-circle"></i>
                            Select Service, a Professional and Time
                        </li>
                        <li>
                            <i class="fa fa-check-circle"></i>
                            Let Us Give a Professional Touch
                        </li>
                        <li>
                            <i class="fa fa-check-circle"></i>
                            Make Your Car Sparkle
                        </li>
                    </ul>

                    <div class="mb-4 text-center text-sm-left">
                        <div class="mb-2">
                            <h4 class="m-0 f-12 text-white-100 heading-font">Download Our Mobile App</h4>
                        </div>
                        <div class="d-flex justify-content-center justify-content-sm-start">
                            <a href="#" class="app-download-btn mr-2">
                                <img src="web/images/store-buttons/playstore-btn.png" alt="playstore-btn">
                            </a>
                            <a href="#" class="app-download-btn">
                                <img src="web/images/store-buttons/appstore-btn.png" alt="appstore-btn">
                            </a>
                        </div>
                    </div>

                    <a href="#" class="thm-btn cta-two__btn"><span>Book Online</span></a>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="cta-two__moc wow fadeInLeft" data-wow-duration="1500ms">
                    <img src="web/images/app-views/app-mobile-view-2.png" class="cta-one__moc-img" alt="">
                </div>
            </div><!-- /.col-xl-6 -->

        </div>
    </div>
</section>

<section class="cta-one" id="aboutUs">
    <!--            <img src="assets/images/shapes/cta-1-shape-1.png" class="cta-one__bg-shape-1" alt="">-->
    <!--            <img src="assets/images/shapes/cta-1-shape-2.png" class="cta-one__bg-shape-2" alt="">-->
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 mt-4 mt-lg-0">
                <div class="block-title text-center">
                    <h3>Who We Are</h3>
                    <p>What We Do</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="cat_one_moc wow fadeInUp" data-wow-duration="1500ms">
                    <!--                            <div class="cat_one_moc-bg" style="background-image: url(assets/images/shapes/cta-1-shape-3.png)"></div>-->
                    <img src="storage/{{$aboutUsContent->first_image}}" alt="Cat-1-Moc-1 Image">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="cat_one_content">
                    <div class="block-title pb-4">
                        <h3 class="f-24">{{$aboutUsContent->first_title}}</h3>
                    </div>
                    <!--                            <div class="cat_one_icon-wrap">-->
                    <!--                                <div class="cta-one__icon-single">-->
                    <!--                                    <div class="cta-one__icon">-->
                    <!--                                        <i class="piloz-devices"></i>-->
                    <!--                                    </div>-->
                    <!--                                    <h3>Responsive <br> Design</h3>-->
                    <!--                                </div>-->
                    <!--                                <div class="cta-one__icon-single">-->
                    <!--                                    <div class="cta-one__icon">-->
                    <!--                                        <i class="piloz-networking color-2"></i>-->
                    <!--                                    </div>-->
                    <!--                                    <h3>Online <br>-->
                    <!--                                        Marketing</h3>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <div class="cta-one__text">
                        <p>{{$aboutUsContent->first_description}}</p>
                    </div>
                    <!--                            <a href="#" class="thm-btn cta-one__btn"><span>Discover More</span></a>-->
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-xl-6 col-lg-6">
                <div class="block-title pb-3">
                    <h3 class="f-24">{{$aboutUsContent->second_title}}</h3>
                </div>
                <!--                        <div class="cat_one_icon-wrap">-->
                <!--                            <div class="cta-one__icon-single">-->
                <!--                                <div class="cta-one__icon">-->
                <!--                                    <i class="piloz-devices"></i>-->
                <!--                                </div>-->
                <!--                                <h3>Responsive <br> Design</h3>-->
                <!--                            </div>-->
                <!--                            <div class="cta-one__icon-single">-->
                <!--                                <div class="cta-one__icon">-->
                <!--                                    <i class="piloz-networking color-2"></i>-->
                <!--                                </div>-->
                <!--                                <h3>Online <br>-->
                <!--                                    Marketing</h3>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <div class="cta-one__text">
                    <p>{{$aboutUsContent->second_description}}</p>
                </div>
                <!--                        <a href="#" class="thm-btn cta-one__btn"><span>Discover More</span></a>-->
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="cat_one_content">
                    <div class="cat_one_moc wow fadeInUp" data-wow-duration="1500ms">
                        <!--                                <div class="cat_one_moc-bg" style="background-image: url(assets/images/shapes/cta-1-shape-3.png)"></div>-->
                        <img src="storage/{{$aboutUsContent->second_image}}" alt="Cat-1-Moc-1 Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--        <section class="video-one">-->
<!--            <div class="container" style="background-image: url(assets/images/resources/video-bg-1-1.jpg);">-->
<!--                <a href="https://www.youtube.com/watch?v=Kl5B6MBAntI" class="video-one__btn video-popup"><i-->
<!--                        class="fa fa-play"></i></a>-->
<!--                <div class="video-title">-->
<!--                    <h2>Watch Our Video</h2>-->
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->

<section id="pricing" class="pricing-one">
    <div class="pricing-one-shape-1" style="background-image: url(assets/images/shapes/pricing-1-shape-1.png)">
    </div>
    <div class="container">
        <div class="block-title text-center">
            <h3>Value For Money</h3>
            <p>Our Packages</p>
        </div><!-- /.block-title text-center -->
        <!--                <ul class="list-inline text-center switch-toggler-list" role="tablist" id="switch-toggle-tab">-->
        <!--                    <li class="month active"><a href="#">Monthly</a></li>-->
        <!--                    <li>-->
        <!--                        &lt;!&ndash; Rounded switch &ndash;&gt;-->
        <!--                        <label class="switch on">-->
        <!--                            <span class="slider round"></span>-->
        <!--                        </label>-->
        <!--                    </li>-->
        <!--                    <li class="year"><a href="#">Annualy</a></li>-->
        <!--                </ul>&lt;!&ndash; /.list-inline &ndash;&gt;-->

        <div class="row">
            <div class="col-lg-6 col-xl-4 animated fadeInLeft mb-3">
                <div class="pricing-one__single">
                    <div class="price pt-0">
                        <p class="f-26 font-weight-bold mb-3">Silver</p>

                        <h2>$20.00</h2>
                    </div>
                    <ul class="list-unstyled pricing-one__list d-sm-flex flex-wrap pkg-crd-service-list">
                        <li><i class="fa fa-check"></i>Extra features</li>
                        <li><i class="fa fa-check"></i>Lifetime free support</li>
                        <li><i class="fa fa-check"></i>Upgrade options</li>
                        <li><i class="fa fa-check"></i>Full access</li>
                        <li><i class="fa fa-check"></i>Wash</li>
                        <li><i class="fa fa-check"></i>Hybrid Ceramic Wax</li>
                        <li><i class="fa fa-check"></i>Wheel Protect</li>
                        <li><i class="fa fa-check"></i>Buff</li>
                        <li><i class="fa fa-check"></i>Tyre Shine</li>
                        <li><i class="fa fa-check"></i>Windows in & out</li>
                    </ul>
                    <a href="#" class="thm-btn pricing-one__btn" data-toggle="modal" data-target="#servicePkgModalSilver"><span>View More</span></a>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 animated fadeInLeft mb-3">
                <div class="pricing-one__single">
                    <div class="price pt-0">
                        <p class="f-26 font-weight-bold mb-3">Gold</p>

                        <h2>$30.00</h2>
                    </div>
                    <ul class="list-unstyled pricing-one__list d-flex flex-wrap pkg-crd-service-list">
                        <li><i class="fa fa-check"></i>Extra features</li>
                        <li><i class="fa fa-check"></i>Lifetime free support</li>
                        <li><i class="fa fa-check"></i>Upgrade options</li>
                        <li><i class="fa fa-check"></i>Full access</li>
                        <li><i class="fa fa-check"></i>Wash</li>
                        <li><i class="fa fa-check"></i>Hybrid Ceramic Wax</li>
                        <li><i class="fa fa-check"></i>Wheel Protect</li>
                        <li><i class="fa fa-check"></i>Buff</li>
                        <li><i class="fa fa-check"></i>Tyre Shine</li>
                        <li><i class="fa fa-check"></i>Windows in & out</li>
                    </ul>
                    <a href="#" class="thm-btn pricing-one__btn" data-toggle="modal" data-target="#servicePkgModalGold"><span>View More</span></a>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 animated fadeInLeft mb-3">
                <div class="pricing-one__single">
                    <div class="price pt-0">
                        <p class="f-26 font-weight-bold mb-3">Platinum</p>

                        <h2>$60.00</h2>
                    </div>
                    <ul class="list-unstyled pricing-one__list d-sm-flex flex-wrap pkg-crd-service-list">
                        <li><i class="fa fa-check"></i>Extra features</li>
                        <li><i class="fa fa-check"></i>Lifetime free support</li>
                        <li><i class="fa fa-check"></i>Upgrade options</li>
                        <li><i class="fa fa-check"></i>Full access</li>
                        <li><i class="fa fa-check"></i>Wash</li>
                        <li><i class="fa fa-check"></i>Hybrid Ceramic Wax</li>
                        <li><i class="fa fa-check"></i>Wheel Protect</li>
                        <li><i class="fa fa-check"></i>Buff</li>
                        <li><i class="fa fa-check"></i>Tyre Shine</li>
                        <li><i class="fa fa-check"></i>Windows in & out</li>
                    </ul>
                    <a href="#" class="thm-btn pricing-one__btn" data-toggle="modal" data-target="#servicePkgModalPlatinum"><span>View More</span></a>
                </div>
            </div>
        </div>

        <!--                <div class="tabed-content">-->
        <!--                    <div id="month">-->
        <!--                        <div class="row">-->
        <!--                            <div class="col-xl-4 animated fadeInLeft">-->
        <!--                                <div class="pricing-one__single">-->
        <!--                                    <div class="circle">-->
        <!--                                        <div class="count">-->
        <!--                                            <h4>01</h4>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--                                    <div class="price">-->
        <!--                                        <h2>$20.00</h2>-->
        <!--                                        <p>Basic Pack</p>-->
        <!--                                    </div>-->
        <!--                                    <ul class="list-unstyled pricing-one__list">-->
        <!--                                        <li><i class="fa fa-check"></i>Extra features</li>-->
        <!--                                        <li><i class="fa fa-check"></i>Lifetime free support</li>-->
        <!--                                        <li><i class="fa fa-check"></i>Upgrade options</li>-->
        <!--                                        <li><i class="fa fa-check"></i>Full access</li>-->
        <!--                                    </ul>-->
        <!--                                    <a href="#" class="thm-btn pricing-one__btn"><span>Choose Plan</span></a>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="col-xl-4 animated fadeInLeft">-->
        <!--                                <div class="pricing-one__single">-->
        <!--                                    <div class="circle circle-color-2">-->
        <!--                                        <div class="count count-color-2">-->
        <!--                                            <h4>02</h4>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--                                    <div class="price">-->
        <!--                                        <h2>$30.00</h2>-->
        <!--                                        <p>Basic Pack</p>-->
        <!--                                    </div>-->
        <!--                                    <ul class="list-unstyled pricing-one__list">-->
        <!--                                        <li><i class="fa fa-check icon-color-2"></i>Extra features</li>-->
        <!--                                        <li><i class="fa fa-check icon-color-2"></i>Lifetime free support</li>-->
        <!--                                        <li><i class="fa fa-check icon-color-2"></i>Upgrade options</li>-->
        <!--                                        <li><i class="fa fa-check icon-color-2"></i>Full access</li>-->
        <!--                                    </ul>-->
        <!--                                    <a href="#" class="thm-btn pricing-one__btn"><span>Choose Plan</span></a>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="col-xl-4 animated fadeInLeft">-->
        <!--                                <div class="pricing-one__single">-->
        <!--                                    <div class="circle circle-color-3">-->
        <!--                                        <div class="count count-color-3">-->
        <!--                                            <h4>03</h4>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--                                    <div class="price">-->
        <!--                                        <h2>$60.00</h2>-->
        <!--                                        <p>Basic Pack</p>-->
        <!--                                    </div>-->
        <!--                                    <ul class="list-unstyled pricing-one__list">-->
        <!--                                        <li><i class="fa fa-check icon-color-3"></i>Extra features</li>-->
        <!--                                        <li><i class="fa fa-check icon-color-3"></i>Lifetime free support</li>-->
        <!--                                        <li><i class="fa fa-check icon-color-3"></i>Upgrade options</li>-->
        <!--                                        <li><i class="fa fa-check icon-color-3"></i>Full access</li>-->
        <!--                                    </ul>-->
        <!--                                    <a href="#" class="thm-btn pricing-one__btn"><span>Choose Plan</span></a>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div id="year">-->
        <!--                        <div class="row">-->
        <!--                            <div class="col-xl-4 animated fadeInLeft">-->
        <!--                                <div class="pricing-one__single">-->
        <!--                                    <div class="circle">-->
        <!--                                        <div class="count">-->
        <!--                                            <h4>01</h4>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--                                    <div class="price">-->
        <!--                                        <h2>$20.00</h2>-->
        <!--                                        <p>Basic Pack</p>-->
        <!--                                    </div>-->
        <!--                                    <ul class="list-unstyled pricing-one__list">-->
        <!--                                        <li><i class="fa fa-check"></i>Extra features</li>-->
        <!--                                        <li><i class="fa fa-check"></i>Lifetime free support</li>-->
        <!--                                        <li><i class="fa fa-check"></i>Upgrade options</li>-->
        <!--                                        <li><i class="fa fa-check"></i>Full access</li>-->
        <!--                                    </ul>-->
        <!--                                    <a href="#" class="thm-btn pricing-one__btn"><span>Choose Plan</span></a>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="col-xl-4 animated fadeInLeft">-->
        <!--                                <div class="pricing-one__single">-->
        <!--                                    <div class="circle circle-color-2">-->
        <!--                                        <div class="count count-color-2">-->
        <!--                                            <h4>02</h4>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--                                    <div class="price">-->
        <!--                                        <h2>$30.00</h2>-->
        <!--                                        <p>Basic Pack</p>-->
        <!--                                    </div>-->
        <!--                                    <ul class="list-unstyled pricing-one__list">-->
        <!--                                        <li><i class="fa fa-check icon-color-2"></i>Extra features</li>-->
        <!--                                        <li><i class="fa fa-check icon-color-2"></i>Lifetime free support</li>-->
        <!--                                        <li><i class="fa fa-check icon-color-2"></i>Upgrade options</li>-->
        <!--                                        <li><i class="fa fa-check icon-color-2"></i>Full access</li>-->
        <!--                                    </ul>-->
        <!--                                    <a href="#" class="thm-btn pricing-one__btn"><span>Choose Plan</span></a>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="col-xl-4 animated fadeInLeft">-->
        <!--                                <div class="pricing-one__single">-->
        <!--                                    <div class="circle circle-color-3">-->
        <!--                                        <div class="count count-color-3">-->
        <!--                                            <h4>03</h4>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--                                    <div class="price">-->
        <!--                                        <h2>$60.00</h2>-->
        <!--                                        <p>Basic Pack</p>-->
        <!--                                    </div>-->
        <!--                                    <ul class="list-unstyled pricing-one__list">-->
        <!--                                        <li><i class="fa fa-check icon-color-3"></i>Extra features</li>-->
        <!--                                        <li><i class="fa fa-check icon-color-3"></i>Lifetime free support</li>-->
        <!--                                        <li><i class="fa fa-check icon-color-3"></i>Upgrade options</li>-->
        <!--                                        <li><i class="fa fa-check icon-color-3"></i>Full access</li>-->
        <!--                                    </ul>-->
        <!--                                    <a href="#" class="thm-btn pricing-one__btn"><span>Choose Plan</span></a>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
    </div>
</section>

<section class="app-shot-one pt-0" id="screens">
    <div class="container-fluid">
        <div class="block-title text-center">
            <h3>Before Choosing</h3>
            <p>Our Mobile App Is Specifically Designed For Your Convenience</p>
        </div><!-- /.block-title -->

        <div class="app-shot-one__carousel owl-theme owl-carousel thm__owl-carousel owl-dot-type1" data-options='{ "loop": true, "margin": 30, "nav": false, "dots": true, "autoWidth": false, "autoplay": true, "smartSpeed": 700, "autoplayTimeout": 5000, "autoplayHoverPause": true, "slideBy": 5, "responsive": {
                    "0": { "items": 1 },
                    "480": { "items": 2 },
                    "600": { "items": 3 },
                    "991": { "items": 4 },
                    "1000": { "items": 5 },
                    "1200": { "items": 5 }
                }}'>

            <div class="item">
                <img src="web/images/app-shots/app-shot-n-1-1.png" alt="Awesome Image" />
            </div><!-- /.item -->
            <div class="item">
                <img src="web/images/app-shots/app-shot-n-1-2.png" alt="Awesome Image" />
            </div><!-- /.item -->
            <div class="item">
                <img src="web/images/app-shots/app-shot-n-1-3.png" alt="Awesome Image" />
            </div><!-- /.item -->
            <div class="item">
                <img src="web/images/app-shots/app-shot-n-1-4.png" alt="Awesome Image" />
            </div><!-- /.item -->
            <div class="item">
                <img src="web/images/app-shots/app-shot-n-1-5.png" alt="Awesome Image" />
            </div><!-- /.item -->
            <div class="item">
                <img src="web/images/app-shots/app-shot-n-1-6.png" alt="Awesome Image" />
            </div><!-- /.item -->
            <div class="item">
                <img src="web/images/app-shots/app-shot-n-1-1.png" alt="Awesome Image" />
            </div><!-- /.item -->
            <div class="item">
                <img src="web/images/app-shots/app-shot-n-1-2.png" alt="Awesome Image" />
            </div><!-- /.item -->
            <div class="item">
                <img src="web/images/app-shots/app-shot-n-1-3.png" alt="Awesome Image" />
            </div><!-- /.item -->
            <div class="item">
                <img src="web/images/app-shots/app-shot-n-1-4.png" alt="Awesome Image" />
            </div><!-- /.item -->
            <div class="item">
                <img src="web/images/app-shots/app-shot-n-1-5.png" alt="Awesome Image" />
            </div><!-- /.item -->
            <div class="item">
                <img src="web/images/app-shots/app-shot-n-1-6.png" alt="Awesome Image" />
            </div><!-- /.item -->
        </div><!-- /.app-shot-one__carousel owl-theme owl-carousel -->

        <div class="mt-5 text-center pt-5">
            <div class="mb-2">
                <h4 class="m-0 f-12 text-white-100 heading-font">Download Our Mobile App</h4>
            </div>
            <div class="d-flex justify-content-center">
                <a href="#" class="app-download-btn mr-2">
                    <img src="web/images/store-buttons/playstore-btn.png" alt="playstore-btn">
                </a>
                <a href="#" class="app-download-btn">
                    <img src="web/images/store-buttons/appstore-btn.png" alt="appstore-btn">
                </a>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section><!-- /.app-shot-one -->

<!--        <section id="testimonials" class="testimonials-one">-->
<!--            <div class="testimonials-1-shape-3"-->
<!--                style="background-image: url(assets/images/testimonials/testimonials-1-shape-3.png)"></div>-->
<!--            <div class="testimonials-1-shape-4"-->
<!--                style="background-image: url(assets/images/testimonials/testimonials-1-shape-4.png)"></div>-->
<!--            <div class="testimonials-1-shape-5"-->
<!--                style="background-image: url(assets/images/testimonials/testimonials-1-shape-5.png)"></div>-->
<!--            <div class="container">-->
<!--                <div class="block-title text-center">-->
<!--                    <p>Our Testimonials</p>-->
<!--                    <h3>What They Says</h3>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    <div class="col-xl-12">-->
<!--                        <div class="testmonials__carousel owl-theme owl-carousel owl-dot-type1">-->
<!--                            <div class="item">-->
<!--                                <div class="testimonials-one__single">-->
<!--                                    <p class="testimonials-one__text">This is due to their excellent service,-->
<!--                                        competitive pricing and customer support. It’s throughly refresing to get such a-->
<!--                                        personal touch.</p>-->
<!--                                    <div class="testimonials-one__icon">-->
<!--                                        <i class="fa fa-quote-left"></i>-->
<!--                                    </div>-->
<!--                                    <div class="testimonial-one-shape-1">-->
<!--                                        <img src="assets/images/testimonials/testimonials-1-shape-1.png"-->
<!--                                            alt="Testimonial Shape1 Image">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="testimonials-one-client-info">-->
<!--                                    <div class="testimonials-one__image">-->
<!--                                        <img src="assets/images/testimonials/testimonials-1-img-1.png"-->
<!--                                            alt="Testimonials Image">-->
<!--                                    </div>-->
<!--                                    <div class="text">-->
<!--                                        <h3>Christine Rose</h3>-->
<!--                                        <p>Customer</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="item">-->
<!--                                <div class="testimonials-one__single color-2">-->
<!--                                    <p class="testimonials-one__text">This is due to their excellent service,-->
<!--                                        competitive pricing and customer support. It’s throughly refresing to get such a-->
<!--                                        personal touch.</p>-->
<!--                                    <div class="testimonials-one__icon">-->
<!--                                        <i class="fa fa-quote-left"></i>-->
<!--                                    </div>-->
<!--                                    <div class="testimonial-one-shape-1">-->
<!--                                        <img src="assets/images/testimonials/testimonials-1-shape-2.png"-->
<!--                                            alt="Testimonial Shape1 Image">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="testimonials-one-client-info">-->
<!--                                    <div class="testimonials-one__image">-->
<!--                                        <img src="assets/images/testimonials/testimonials-1-img-2.png"-->
<!--                                            alt="Testimonials Image">-->
<!--                                    </div>-->
<!--                                    <div class="text">-->
<!--                                        <h3>David Cooper</h3>-->
<!--                                        <p>Customer</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="item">-->
<!--                                <div class="testimonials-one__single">-->
<!--                                    <p class="testimonials-one__text">This is due to their excellent service,-->
<!--                                        competitive pricing and customer support. It’s throughly refresing to get such a-->
<!--                                        personal touch.</p>-->
<!--                                    <div class="testimonials-one__icon">-->
<!--                                        <i class="fa fa-quote-left"></i>-->
<!--                                    </div>-->
<!--                                    <div class="testimonial-one-shape-1">-->
<!--                                        <img src="assets/images/testimonials/testimonials-1-shape-1.png"-->
<!--                                            alt="Testimonial Shape1 Image">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="testimonials-one-client-info">-->
<!--                                    <div class="testimonials-one__image">-->
<!--                                        <img src="assets/images/testimonials/testimonials-1-img-1.png"-->
<!--                                            alt="Testimonials Image">-->
<!--                                    </div>-->
<!--                                    <div class="text">-->
<!--                                        <h3>Christine Rose</h3>-->
<!--                                        <p>Customer</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="item">-->
<!--                                <div class="testimonials-one__single color-2">-->
<!--                                    <p class="testimonials-one__text">This is due to their excellent service,-->
<!--                                        competitive pricing and customer support. It’s throughly refresing to get such a-->
<!--                                        personal touch.</p>-->
<!--                                    <div class="testimonials-one__icon">-->
<!--                                        <i class="fa fa-quote-left"></i>-->
<!--                                    </div>-->
<!--                                    <div class="testimonial-one-shape-1">-->
<!--                                        <img src="assets/images/testimonials/testimonials-1-shape-2.png"-->
<!--                                            alt="Testimonial Shape1 Image">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="testimonials-one-client-info">-->
<!--                                    <div class="testimonials-one__image">-->
<!--                                        <img src="assets/images/testimonials/testimonials-1-img-2.png"-->
<!--                                            alt="Testimonials Image">-->
<!--                                    </div>-->
<!--                                    <div class="text">-->
<!--                                        <h3>David Cooper</h3>-->
<!--                                        <p>Customer</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->

<!--        <section class="faq-one">-->
<!--            <img src="assets/images/shapes/faq-1-shape-1.png" class="faq-one-shape-1" alt="">-->
<!--            <div class="container">-->
<!--                <div class="block-title text-center">-->
<!--                    <p>Frequently Asked Questions</p>-->
<!--                    <h3>Have Any Question?</h3>-->
<!--                </div>&lt;!&ndash; /.block-title &ndash;&gt;-->
<!--                <div class="accrodion-grp wow fadeIn" data-wow-duration="1500ms" data-grp-name="faq-accrodion">-->
<!--                    <div class="accrodion active ">-->
<!--                        <div class="accrodion-inner">-->
<!--                            <div class="accrodion-title">-->
<!--                                <h4>Pre and post launch mobile app marketing pitfalls to avoid</h4>-->
<!--                            </div>-->
<!--                            <div class="accrodion-content">-->
<!--                                <div class="inner">-->
<!--                                    <p>There are many variations of passages of available but majority have alteration in some by inject humour or random words. Lorem ipsum dolor sit amet, error insolens reprimique no quo, ea pri verterem phaedr vel ea iisque aliquam.</p>-->
<!--                                </div>&lt;!&ndash; /.inner &ndash;&gt;-->
<!--                            </div>-->
<!--                        </div>&lt;!&ndash; /.accrodion-inner &ndash;&gt;-->
<!--                    </div>-->
<!--                    <div class="accrodion  ">-->
<!--                        <div class="accrodion-inner">-->
<!--                            <div class="accrodion-title">-->
<!--                                <h4>Boostup your application traffic is just a step away</h4>-->
<!--                            </div>-->
<!--                            <div class="accrodion-content">-->
<!--                                <div class="inner">-->
<!--                                    <p>There are many variations of passages of available but majority have alteration in some by inject humour or random words. Lorem ipsum dolor sit amet, error insolens reprimique no quo, ea pri verterem phaedr vel ea iisque aliquam.</p>-->
<!--                                </div>&lt;!&ndash; /.inner &ndash;&gt;-->
<!--                            </div>-->
<!--                        </div>&lt;!&ndash; /.accrodion-inner &ndash;&gt;-->
<!--                    </div>-->
<!--                    <div class="accrodion ">-->
<!--                        <div class="accrodion-inner">-->
<!--                            <div class="accrodion-title">-->
<!--                                <h4>How to update application new features</h4>-->
<!--                            </div>-->
<!--                            <div class="accrodion-content">-->
<!--                                <div class="inner">-->
<!--                                    <p>There are many variations of passages of available but majority have alteration in some by inject humour or random words. Lorem ipsum dolor sit amet, error insolens reprimique no quo, ea pri verterem phaedr vel ea iisque aliquam.</p>-->
<!--                                </div>&lt;!&ndash; /.inner &ndash;&gt;-->
<!--                            </div>-->
<!--                        </div>&lt;!&ndash; /.accrodion-inner &ndash;&gt;-->
<!--                    </div>-->
<!--                    <div class="accrodion ">-->
<!--                        <div class="accrodion-inner">-->
<!--                            <div class="accrodion-title">-->
<!--                                <h4>How to connect with the support to improve app experience</h4>-->
<!--                            </div>-->
<!--                            <div class="accrodion-content">-->
<!--                                <div class="inner">-->
<!--                                    <p>There are many variations of passages of available but majority have alteration in some by inject humour or random words. Lorem ipsum dolor sit amet, error insolens reprimique no quo, ea pri verterem phaedr vel ea iisque aliquam.</p>-->
<!--                                </div>&lt;!&ndash; /.inner &ndash;&gt;-->
<!--                            </div>-->
<!--                        </div>&lt;!&ndash; /.accrodion-inner &ndash;&gt;-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>&lt;!&ndash; /.container &ndash;&gt;-->
<!--        </section>&lt;!&ndash; /.faq-one &ndash;&gt;-->

<section class="blog-one" id="blog">
    <!--            <div class="blog-1-shape-1" style="background-image: url(assets/images/blog/blog-1-shape-1.png)"></div>-->
    <div class="blog-1-shape-2" style="background-image: url(web/images/blog/blog-1-shape-2.png)"></div>
    <!--            <div class="blog-1-shape-3" style="background-image: url(assets/images/blog/blog-1-shape-3.png)"></div>-->
    <div class="container">
        <div class="block-title text-center">
            <h3>News & Articles</h3>
            <p>Blog</p>
        </div><!-- /.block-title text-center -->
        <div class="row">
            <div class="col-lg-4 ">
                <div class="blog-one__single">
                    <div class="blog-one__image">
                        <img src="http://layerdrops.com/piloz/assets/images/blog/blog-1-2.jpg" alt="">
                        <div class="blog-hover-box">
                            <div class="box">
                                <div class="icon-box">
                                    <a href="blog-details.html"><i class="far fa-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.blog-one__image -->
                    <div class="blog-one__content">
                        <div class="blog-one__meta">
                            <a href="#"><i class="far fa-calendar-alt"></i> 20 May, 2020</a>
                            <a href="#"><i class="far fa-comments"></i> 2 comments</a>
                        </div><!-- /.blog-one__meta -->
                        <h3><a href="blog-details.html">Leverage agile frame works to </a></h3>
                        <div class="blog-one__text">
                            <p>There are many people variation of passages of lorem Ipsum available in the
                                majority sed do eius.</p>
                        </div>
                        <a href="blog-details.html" class="thm-btn blog-one__btn"><span>Read More</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="blog-one__single">
                    <div class="blog-one__image">
                        <img src="http://layerdrops.com/piloz/assets/images/blog/blog-1-1.jpg" alt="">
                        <div class="blog-hover-box">
                            <div class="box">
                                <div class="icon-box">
                                    <a href="blog-details.html"><i class="far fa-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.blog-one__image -->
                    <div class="blog-one__content">
                        <div class="blog-one__meta">
                            <a href="#"><i class="far fa-calendar-alt"></i> 20 May, 2020</a>
                            <a href="#"><i class="far fa-comments"></i> 2 comments</a>
                        </div><!-- /.blog-one__meta -->
                        <h3><a href="blog-details.html">Launch New Mobile Marketing Pitfalls</a></h3>
                        <div class="blog-one__text">
                            <p>There are many people variation of passages of lorem Ipsum available in the
                                majority sed do eius.</p>
                        </div>
                        <a href="blog-details.html" class="thm-btn blog-one__btn"><span>Read More</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="blog-one__single">
                    <div class="blog-one__image">
                        <img src="http://layerdrops.com/piloz/assets/images/blog/blog-1-3.jpg" alt="">
                        <div class="blog-hover-box">
                            <div class="box">
                                <div class="icon-box">
                                    <a href="blog-details.html"><i class="far fa-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.blog-one__image -->
                    <div class="blog-one__content">
                        <div class="blog-one__meta">
                            <a href="#"><i class="far fa-calendar-alt"></i> 20 May, 2020</a>
                            <a href="#"><i class="far fa-comments"></i> 2 comments</a>
                        </div><!-- /.blog-one__meta -->
                        <h3><a href="blog-details.html">Bring to the table win-win survival</a></h3>
                        <div class="blog-one__text">
                            <p>There are many people variation of passages of lorem Ipsum available in the
                                majority sed do eius.</p>
                        </div>
                        <a href="blog-details.html" class="thm-btn blog-one__btn"><span>Read More</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="brand-one border-top-0" id="partners">
    <div class="container">
        <div class="block-title text-center">
            <h3>Our Partners</h3>
        </div><!-- /.block-title text-center -->
        <div class="brand-one__carousel owl-carousel thm__owl-carousel owl-theme"
             data-options='{"loop": true, "autoplay": true, "autoplayHoverPause": true, "autoplayTimeout": 5000, "items": 5, "dots": false, "nav": false, "margin": 100, "smartSpeed": 700, "responsive": { "0": {"items": 1, "margin": 30}, "480": {"items": 2, "margin": 30}, "991": {"items": 3, "margin": 50}, "1199": {"items": 4, "margin": 100}}}'>
            <div class="item pro-partner-item">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="pro-partner-img">
                        <img src="web/images/users/user.png" alt="pro-partner-img">
                    </div>

                    <div class="pro-partner-details">
                        <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 pro-partner-name">Pro Partner</h4>
                        <h4 class="mt-0 mb-1 f-14 text-red-100 fw-400">
                            <i class="fa fa-star"></i>
                            10/10
                        </h4>
                    </div>
                </div>

                <div class="pro-partner-provided-services mt-3">
                    <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 text-center">Services Provided</h4>
                    <ul class="list-unstyled text-center border-top-1">
                        <li class="f-14 line-height-2">Wash</li>
                        <li class="f-14 line-height-2">Hybrid Ceramic Wax</li>
                        <li class="f-14 line-height-2">Wheel Protect</li>
                        <li class="f-14 line-height-2">Buff</li>
                        <li class="f-14 line-height-2">Tyre Shine</li>
                        <li class="f-14 line-height-2">Windows in & out</li>
                    </ul>
                </div>

            </div><!-- /.item -->
            <div class="item pro-partner-item">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="pro-partner-img">
                        <img src="web/images/users/user.png" alt="pro-partner-img">
                    </div>

                    <div class="pro-partner-details">
                        <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 pro-partner-name">Pro Partner</h4>
                        <h4 class="mt-0 mb-1 f-14 text-red-100 fw-400">
                            <i class="fa fa-star"></i>
                            10/10
                        </h4>
                    </div>
                </div>

                <div class="pro-partner-provided-services mt-3">
                    <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 text-center">Services Provided</h4>
                    <ul class="list-unstyled text-center border-top-1">
                        <li class="f-14 line-height-2">Wash</li>
                        <li class="f-14 line-height-2">Hybrid Ceramic Wax</li>
                        <li class="f-14 line-height-2">Wheel Protect</li>
                        <li class="f-14 line-height-2">Buff</li>
                        <li class="f-14 line-height-2">Tyre Shine</li>
                        <li class="f-14 line-height-2">Windows in & out</li>
                    </ul>
                </div>

            </div><!-- /.item -->
            <div class="item pro-partner-item">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="pro-partner-img">
                        <img src="web/images/users/user.png" alt="pro-partner-img">
                    </div>

                    <div class="pro-partner-details">
                        <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 pro-partner-name">Pro Partner</h4>
                        <h4 class="mt-0 mb-1 f-14 text-red-100 fw-400">
                            <i class="fa fa-star"></i>
                            10/10
                        </h4>
                    </div>
                </div>

                <div class="pro-partner-provided-services mt-3">
                    <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 text-center">Services Provided</h4>
                    <ul class="list-unstyled text-center border-top-1">
                        <li class="f-14 line-height-2">Wash</li>
                        <li class="f-14 line-height-2">Hybrid Ceramic Wax</li>
                        <li class="f-14 line-height-2">Wheel Protect</li>
                        <li class="f-14 line-height-2">Buff</li>
                        <li class="f-14 line-height-2">Tyre Shine</li>
                        <li class="f-14 line-height-2">Windows in & out</li>
                    </ul>
                </div>

            </div><!-- /.item -->
            <div class="item pro-partner-item">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="pro-partner-img">
                        <img src="web/images/users/user.png" alt="pro-partner-img">
                    </div>

                    <div class="pro-partner-details">
                        <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 pro-partner-name">Pro Partner</h4>
                        <h4 class="mt-0 mb-1 f-14 text-red-100 fw-400">
                            <i class="fa fa-star"></i>
                            10/10
                        </h4>
                    </div>
                </div>

                <div class="pro-partner-provided-services mt-3">
                    <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 text-center">Services Provided</h4>
                    <ul class="list-unstyled text-center border-top-1">
                        <li class="f-14 line-height-2">Wash</li>
                        <li class="f-14 line-height-2">Hybrid Ceramic Wax</li>
                        <li class="f-14 line-height-2">Wheel Protect</li>
                        <li class="f-14 line-height-2">Buff</li>
                        <li class="f-14 line-height-2">Tyre Shine</li>
                        <li class="f-14 line-height-2">Windows in & out</li>
                    </ul>
                </div>

            </div><!-- /.item -->
            <div class="item pro-partner-item">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="pro-partner-img">
                        <img src="web/images/users/user.png" alt="pro-partner-img">
                    </div>

                    <div class="pro-partner-details">
                        <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 pro-partner-name">Pro Partner</h4>
                        <h4 class="mt-0 mb-1 f-14 text-red-100 fw-400">
                            <i class="fa fa-star"></i>
                            10/10
                        </h4>
                    </div>
                </div>

                <div class="pro-partner-provided-services mt-3">
                    <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 text-center">Services Provided</h4>
                    <ul class="list-unstyled text-center border-top-1">
                        <li class="f-14 line-height-2">Wash</li>
                        <li class="f-14 line-height-2">Hybrid Ceramic Wax</li>
                        <li class="f-14 line-height-2">Wheel Protect</li>
                        <li class="f-14 line-height-2">Buff</li>
                        <li class="f-14 line-height-2">Tyre Shine</li>
                        <li class="f-14 line-height-2">Windows in & out</li>
                    </ul>
                </div>

            </div><!-- /.item -->
            <div class="item pro-partner-item">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="pro-partner-img">
                        <img src="web/images/users/user.png" alt="pro-partner-img">
                    </div>

                    <div class="pro-partner-details">
                        <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 pro-partner-name">Pro Partner</h4>
                        <h4 class="mt-0 mb-1 f-14 text-red-100 fw-400">
                            <i class="fa fa-star"></i>
                            10/10
                        </h4>
                    </div>
                </div>

                <div class="pro-partner-provided-services mt-3">
                    <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 text-center">Services Provided</h4>
                    <ul class="list-unstyled text-center border-top-1">
                        <li class="f-14 line-height-2">Wash</li>
                        <li class="f-14 line-height-2">Hybrid Ceramic Wax</li>
                        <li class="f-14 line-height-2">Wheel Protect</li>
                        <li class="f-14 line-height-2">Buff</li>
                        <li class="f-14 line-height-2">Tyre Shine</li>
                        <li class="f-14 line-height-2">Windows in & out</li>
                    </ul>
                </div>

            </div><!-- /.item -->
            <div class="item pro-partner-item">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="pro-partner-img">
                        <img src="web/images/users/user.png" alt="pro-partner-img">
                    </div>

                    <div class="pro-partner-details">
                        <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 pro-partner-name">Pro Partner</h4>
                        <h4 class="mt-0 mb-1 f-14 text-red-100 fw-400">
                            <i class="fa fa-star"></i>
                            10/10
                        </h4>
                    </div>
                </div>

                <div class="pro-partner-provided-services mt-3">
                    <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 text-center">Services Provided</h4>
                    <ul class="list-unstyled text-center border-top-1">
                        <li class="f-14 line-height-2">Wash</li>
                        <li class="f-14 line-height-2">Hybrid Ceramic Wax</li>
                        <li class="f-14 line-height-2">Wheel Protect</li>
                        <li class="f-14 line-height-2">Buff</li>
                        <li class="f-14 line-height-2">Tyre Shine</li>
                        <li class="f-14 line-height-2">Windows in & out</li>
                    </ul>
                </div>

            </div><!-- /.item -->
            <div class="item pro-partner-item">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="pro-partner-img">
                        <img src="web/images/users/user.png" alt="pro-partner-img">
                    </div>

                    <div class="pro-partner-details">
                        <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 pro-partner-name">Pro Partner</h4>
                        <h4 class="mt-0 mb-1 f-14 text-red-100 fw-400">
                            <i class="fa fa-star"></i>
                            10/10
                        </h4>
                    </div>
                </div>

                <div class="pro-partner-provided-services mt-3">
                    <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 text-center">Services Provided</h4>
                    <ul class="list-unstyled text-center border-top-1">
                        <li class="f-14 line-height-2">Wash</li>
                        <li class="f-14 line-height-2">Hybrid Ceramic Wax</li>
                        <li class="f-14 line-height-2">Wheel Protect</li>
                        <li class="f-14 line-height-2">Buff</li>
                        <li class="f-14 line-height-2">Tyre Shine</li>
                        <li class="f-14 line-height-2">Windows in & out</li>
                    </ul>
                </div>

            </div><!-- /.item -->
            <div class="item pro-partner-item">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="pro-partner-img">
                        <img src="web/images/users/user.png" alt="pro-partner-img">
                    </div>

                    <div class="pro-partner-details">
                        <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 pro-partner-name">Pro Partner</h4>
                        <h4 class="mt-0 mb-1 f-14 text-red-100 fw-400">
                            <i class="fa fa-star"></i>
                            10/10
                        </h4>
                    </div>
                </div>

                <div class="pro-partner-provided-services mt-3">
                    <h4 class="mt-0 mb-1 f-16 text-base-100 fw-600 text-center">Services Provided</h4>
                    <ul class="list-unstyled text-center border-top-1">
                        <li class="f-14 line-height-2">Wash</li>
                        <li class="f-14 line-height-2">Hybrid Ceramic Wax</li>
                        <li class="f-14 line-height-2">Wheel Protect</li>
                        <li class="f-14 line-height-2">Buff</li>
                        <li class="f-14 line-height-2">Tyre Shine</li>
                        <li class="f-14 line-height-2">Windows in & out</li>
                    </ul>
                </div>

            </div><!-- /.item -->
        </div><!-- /.brand-one__carousel owl-carousel thm__owl-carousel owl-theme -->
    </div><!-- /.container -->
</section><!-- /.brand-one -->

<section class="contact-us pb-5" id="contactUs">
    <div class="container">
        <div class="block-title text-center">
            <h3>Get In Touch With Us</h3>
            <p>We Are Here For You, How Can We Help?</p>
        </div><!-- /.block-title text-center -->

        <div class="row mt-3">
            <div class="col-12 col-lg-4">
                <form class="p-0">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputName" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputReason" placeholder="Reason For Contact">
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" rows="3" id="inputMessage" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" class="thm-btn">Send Message</button>
                </form>
            </div>

            <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                <ul class="list-unstyled">
                    <li>
                        <h6>Location</h6>
                        <h5 class="text-base-100 f-16">Zincat Technologies, Mount Lavinia, <br> Sri-Lanka.</h5>
                    </li>
                    <li class="mt-3">
                        <h6>Phone</h6>
                        <h5 class="text-base-100 f-16">+94 71 234 5678</h5>
                        <h5 class="text-base-100 f-16">+94 76 789 1011</h5>
                    </li>
                    <li class="mt-3">
                        <h6>Email</h6>
                        <h5 class="text-base-100 f-16">zincattechnologies@gmail.com</h5>
                    </li>
                    <li class="mt-3">
                        <h6>Social Media</h6>
                        <div class="d-flex align-items-center">
                            <a href="#" class="mr-3 social-media-icon"><i class="fab fa-facebook-square"></i></a>
                            <a href="#" class="mr-3 social-media-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="mr-3 social-media-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="mr-3 social-media-icon"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=Zincat%20Technologies,%20Mount%20Lavinia&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://yt2.org">yt2</a><br><style>.mapouter{position:relative;text-align:right;height:400px;width:100%;border-radius: 6px;}</style><a href="https://www.embedgooglemap.net">google map html code</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:100%;border-radius: 6px;}</style></div></div>
            </div>
        </div>
    </div>
</section>

<!--        <section class="mailchimp-one">-->
<!--            <div class="container wow fadeInUp" data-wow-duration="1500ms">-->
<!--                <div class="inner-container">-->
<!--                    <div class="mailchimp-one-title">-->
<!--                        <h2>Subscribe Newsletter</h2>-->
<!--                    </div>-->
<!--                    <form action="#" class="mailchimp-one__form">-->
<!--                        <input type="text" placeholder="Enter your email address" name="email">-->
<!--                        <button class="thm-btn mailchimp-one__btn" type="submit"><span>Register Now</span></button>-->
<!--                        &lt;!&ndash; /.thm-btn &ndash;&gt;-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->

<!-- Modal -->
<div class="modal fade service-package-modal" id="servicePkgModalSilver" tabindex="-1" aria-labelledby="servicePkgModalLabelSilver" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-base-100 heading-font f-22" id="servicePkgModalLabelSilver">Silver Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-base-100" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <h4 class="m-0 text-primary-100 f-24 text-capitalize heading-font"><span class="f-18 text-primary-100 mr-2">Price - </span>20$</h4>
                    <p class="mt-1 mb-2 text-black-100 f-14 text-capitalize line-height-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aut commodi dolore fugit hic iure laboriosam laudantium necessitatibus nesciunt provident quod sit voluptas, voluptates.</p>
                </div>

                <div>
                    <h4 class="mt-0 mb-2 text-base-100 f-18 text-capitalize heading-font">Included Services</h4>
                </div>

                <div class="mt-3">
                    <ul class="list-unstyled pricing-one__list d-flex flex-wrap pkg-crd-service-list">
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Extra features</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Lifetime free support</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Upgrade options</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Full access</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Wash</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Hybrid Ceramic Wax</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Wheel Protect</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Buff</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Tyre Shine</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Windows in & out</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Dashboard</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Plastic Dressing</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Deep Vacuum</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Spare Tyre Area</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer d-block d-sm-flex justify-content-between align-items-center">
                <div class="text-center text-sm-left">
                    <a href="book-service.html" type="button" class="thm-btn text-center text-white">Book Online</a>
                </div>
                <div class="mt-3 mt-sm-0 text-center text-sm-left">
                    <div class="mb-2">
                        <h4 class="m-0 f-12 text-base-100 heading-font">Download Our Mobile App</h4>
                    </div>
                    <div class="d-flex justify-content-center justify-content-sm-start">
                        <a href="#" class="app-download-btn">
                            <img src="web/images/store-buttons/playstore-btn.png" alt="playstore-btn">
                        </a>
                        <a href="#" class="app-download-btn">
                            <img src="web/images/store-buttons/appstore-btn.png" alt="appstore-btn">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade service-package-modal" id="servicePkgModalGold" tabindex="-1" aria-labelledby="servicePkgModalLabelGold" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-base-100 heading-font f-22" id="servicePkgModalLabelGold">Gold Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-base-100" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div>
                    <h4 class="m-0 text-primary-100 f-24 text-capitalize heading-font"><span class="f-18 text-primary-100 mr-2">Price - </span>20$</h4>
                    <p class="mt-1 mb-2 text-black-100 f-14 text-capitalize line-height-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aut commodi dolore fugit hic iure laboriosam laudantium necessitatibus nesciunt provident quod sit voluptas, voluptates.</p>
                </div>

                <div>
                    <h4 class="mt-0 mb-2 text-base-100 f-18 text-capitalize heading-font">Included Services</h4>
                </div>

                <div class="mt-3">
                    <ul class="list-unstyled pricing-one__list d-flex flex-wrap pkg-crd-service-list">
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Extra features</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Lifetime free support</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Upgrade options</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Full access</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Wash</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Hybrid Ceramic Wax</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Wheel Protect</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Buff</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Tyre Shine</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Windows in & out</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Dashboard</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Plastic Dressing</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Deep Vacuum</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Spare Tyre Area</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer d-block d-sm-flex justify-content-between align-items-center">
                <div class="text-center text-sm-left">
                    <a href="book-service.html" type="button" class="thm-btn text-center text-white">Book Online</a>
                </div>
                <div class="mt-3 mt-sm-0 text-center text-sm-left">
                    <div class="mb-2">
                        <h4 class="m-0 f-12 text-base-100 heading-font">Download Our Mobile App</h4>
                    </div>
                    <div class="d-flex justify-content-center justify-content-sm-start">
                        <a href="#" class="app-download-btn">
                            <img src="web/images/store-buttons/playstore-btn.png" alt="playstore-btn">
                        </a>
                        <a href="#" class="app-download-btn">
                            <img src="web/images/store-buttons/appstore-btn.png" alt="appstore-btn">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade service-package-modal" id="servicePkgModalPlatinum" tabindex="-1" aria-labelledby="servicePkgModalLabelPlatinum" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-base-100 heading-font f-22" id="servicePkgModalLabelPlatinum">Platinum Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-base-100" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <h4 class="m-0 text-primary-100 f-24 text-capitalize heading-font"><span class="f-18 text-primary-100 mr-2">Price - </span>20$</h4>
                    <p class="mt-1 mb-2 text-black-100 f-14 text-capitalize line-height-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aut commodi dolore fugit hic iure laboriosam laudantium necessitatibus nesciunt provident quod sit voluptas, voluptates.</p>
                </div>

                <div>
                    <h4 class="mt-0 mb-2 text-base-100 f-18 text-capitalize heading-font">Included Services</h4>
                </div>

                <div class="mt-3">
                    <ul class="list-unstyled pricing-one__list d-flex flex-wrap pkg-crd-service-list">
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Extra features</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Lifetime free support</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Upgrade options</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Full access</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Wash</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Hybrid Ceramic Wax</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Wheel Protect</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Buff</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Tyre Shine</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Windows in & out</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Dashboard</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Plastic Dressing</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Deep Vacuum</li>
                        <li class="f-16 text-black-100"><i class="fa fa-check icon-color-2"></i>Spare Tyre Area</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer d-block d-sm-flex justify-content-between align-items-center">
                <div class="text-center text-sm-left">
                    <a href="book-service.html" type="button" class="thm-btn text-center text-white">Book Online</a>
                </div>
                <div class="mt-3 mt-sm-0 text-center text-sm-left">
                    <div class="mb-2">
                        <h4 class="m-0 f-12 text-base-100 heading-font">Download Our Mobile App</h4>
                    </div>
                    <div class="d-flex justify-content-center justify-content-sm-start">
                        <a href="#" class="app-download-btn">
                            <img src="web/images/store-buttons/playstore-btn.png" alt="playstore-btn">
                        </a>
                        <a href="#" class="app-download-btn">
                            <img src="web/images/store-buttons/appstore-btn.png" alt="appstore-btn">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
