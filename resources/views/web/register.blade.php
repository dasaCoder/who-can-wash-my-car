@extends('web.layouts.app')

@section('content')
<div class="page-wrapper">

    <section class="login-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-6 login-card">
                    <div class="form-group">
                        <h2 class="m-0 f-24 text-base-100 fw-900">Sign Up</h2>
                    </div>

                    <div class="form-group">
                        <ul class="nav nav-tabs sign-up-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item text-center" role="presentation">
                                <a class="nav-link active w-140px f-16 fw-600" id="clientTab" data-toggle="tab" href="#client" role="tab" aria-controls="client" aria-selected="true">as a Customer</a>
                            </li>
                            <li class="nav-item text-center" role="presentation">
                                <a class="nav-link w-140px f-16 fw-600" id="proPartnerTab" data-toggle="tab" href="#proPartner" role="tab" aria-controls="proPartner" aria-selected="false">as a Pro-Partner</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <!-- As Client -->
                        <div class="tab-pane fade show active" id="client" role="tabpanel" aria-labelledby="clientTab">
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputFirstName" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+94</span>
                                </div>
                                <input type="number" class="form-control" id="inputNumber" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="inputClientEmail" placeholder="Email">
                            </div>
                            <div class="form-group position-relative">
                                <input type="password" class="form-control login-password-input" id="loginPasswordInput" placeholder="Password">
                                <i class="toggle-password password-visible-icon fa fa-eye"></i>
                            </div>

                            <div class="form-group">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" id="rememberMe" type="checkbox" value="">
                                    <label for="rememberMe" class="mt-0 mb-0 ml-2 f-14 fw-400 text-black-100">
                                        By Creating An Account You Agree To Our
                                        <a href="#" class="f-14 fw-600 text-base-100 ml-1">Terms & Conditions</a>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" class="thm-btn w-75 f-18">Generate OTP x</button>
                            </div>

                            <div class="form-group mt-4">
                                <h4 class="m-0 f-16 text-black-100 fw-400 text-center">
                                    Already have an Account?
                                    <a href="login.html" class="ml-1 f-16 text-base-100 fw-600">Sign In</a>
                                </h4>
                            </div>
                        </div>

                        <!-- As Pro-Partner -->


                        <div class="tab-pane fade" id="proPartner" role="tabpanel" aria-labelledby="proPartnerTab">
                            <form id="formRegAsProCustomer" method="POST" action="{{ url('/register/pro-customer') }}">
                                @csrf

                                {{ Form::hidden('customer_role', 'PRO_PARTNER') }}

                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Last Name">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+94</span>
                                    </div>
                                    <input type="number" class="form-control" id="inputNumber" name="phone" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="inputClientEmail" name="email" placeholder="Email">
                                </div>
                                <div class="form-group position-relative">
                                    <input type="password" class="form-control login-password-input" id="loginPasswordInput" name="password" placeholder="Password">
                                    <i class="toggle-password password-visible-icon fa fa-eye"></i>
                                </div>

                                <div class="form-group">
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" id="rememberMe" type="checkbox" value="">
                                        <label for="rememberMe" class="mt-0 mb-0 ml-2 f-14 fw-400 text-black-100">
                                            By Creating An Account You Agree To Our
                                            <a href="#" class="f-14 fw-600 text-base-100 ml-1">Terms & Conditions</a>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group d-flex justify-content-center">
                                    <a href="otp-verification.html" type="submit" class="thm-btn w-75 f-18 text-center text-white" id="btnRegAsProCustomer">Generate OTP</a>
                                </div>

                                <div class=" form-group mt-4">
                                    <h4 class="m-0 f-16 text-black-100 fw-400 text-center">
                                        Already have an Account?
                                        <a href="login.html" class="ml-1 f-16 text-base-100 fw-600">Sign In</a>
                                    </h4>
                                </div>
                            </form>
                        </div>

                    </div>
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

            <a href="#" class="side-menu__toggler side-menu__close-btn"><img src="assets/images/shapes/close-1-1.png" alt=""></a>
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