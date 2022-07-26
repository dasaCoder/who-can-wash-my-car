@extends('web.layouts.app')

@section('content')
    <div class="page-wrapper">

        <section class="login-section">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-6 login-card">
                        <form action="#">
                            <div class="form-group">
                                <h2 class="m-0 f-24 text-base-100 fw-900">Sign In</h2>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                            <div class="form-group position-relative">
                                <input type="password" class="form-control login-password-input" id="loginPasswordInput" placeholder="Password">
                                <i class="toggle-password password-visible-icon fa fa-eye"></i>
                            </div>

                            <div class="form-group d-flex justify-content-between align-items-center">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" id="rememberMe" type="checkbox" value="">
                                    <label for="rememberMe" class="mt-0 mb-0 ml-2 f-16 fw-400 text-black-100">Remember Me</label>
                                </div>

                                <a href="forget-password.html" class="m-0 f-16 fw-400 text-black-100">Forget Password?</a>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" class="thm-btn w-75 f-18">Login</button>
                            </div>

                            <div class="form-group text-center">
                                <h4 class="m-0 f-14 text-black-100 fw-400">
                                    or
                                    <br>
                                    Login With
                                </h4>
                            </div>

                            <div class="form-group social-login">
                                <a href="#" class="social-login-icon mr-3">
                                    <img src="assets/images/social-login/apple.png" alt="social-login-icon">
                                </a>
                                <a href="#" class="social-login-icon mr-3">
                                    <img src="assets/images/social-login/google.png" alt="social-login-icon">
                                </a>
                                <a href="#" class="social-login-icon">
                                    <img src="assets/images/social-login/facebook.png" alt="social-login-icon">
                                </a>
                            </div>

                            <div class="form-group mt-4">
                                <h4 class="m-0 f-16 text-black-100 fw-400 text-center">
                                    Don't have an Account?
                                    <a href="register.html" class="ml-1 f-16 text-base-100 fw-600">Sign Up</a>
                                </h4>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div><!-- /.page-wrapper -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <div class="side-menu__block">
        <div class="side-menu__block-overlay custom-cursor__overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div><!-- /.side-menu__block-overlay -->
        <div class="side-menu__block-inner ">
            <div class="side-menu__top justify-content-end">

                <a href="#" class="side-menu__toggler side-menu__close-btn"><img
                        src="assets/images/shapes/close-1-1.png" alt=""></a>
            </div><!-- /.side-menu__top -->


            <nav class="mobile-nav__container">
                <!-- content is loading via js -->
            </nav>
            <div class="side-menu__sep"></div><!-- /.side-menu__sep -->
            <div class="side-menu__content">
                <p>Lorem Ipsum is simply dummy text the printing and setting industry. Lorm Ipsum has been the
                    industry's stanard dummy text ever. </p>
                <p><a href="mailto:needhelp@apton.com">needhelp@apton.com</a> <br> <a href="tel:888-999-0000">888 999
                    0000</a></p>
                <div class="side-menu__social">
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div><!-- /.side-menu__content -->
        </div><!-- /.side-menu__block-inner -->
    </div><!-- /.side-menu__block -->

@endsection
