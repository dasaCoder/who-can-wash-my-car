@extends('web.layouts.app')

@section('content')
<div class="page-wrapper">
    <section class="login-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-6 login-card">
                    <form action="{{url('api/v1/pro-partner/otp-verify')}}" id="formOtpVerify">

                        @csrf
                        {{ Form::hidden('otp_code', '') }}
                        {{ Form::hidden('phone', $user->phone) }}

                        <div class="form-group">
                            <h2 class="m-0 f-24 text-base-100 fw-900">Enter OTP</h2>
                            <p class="mt-1 mb-0 text-black-100 fw-400 f-14">Please enter OTP number send your verified mobile number</p>
                        </div>
                        <div class="form-group d-flex otp-input-section">
                            <input type="number" id="txtOtp1" class="form-control mr-3 otp-input" placeholder="" maxlength="1">
                            <input type="number" id="txtOtp2" class="form-control mr-3 otp-input" placeholder="" maxlength="1">
                            <input type="number" id="txtOtp3" class="form-control mr-3 otp-input" placeholder="" maxlength="1">
                            <input type="number" id="txtOtp4" class="form-control otp-input" placeholder="" maxlength="1">
                        </div>

                        <div class="form-group d-flex justify-content-center mt-4">
                            <a href="pro-partner-registration.html" type="submit" id="btnOtpVerify" class="thm-btn w-75 f-18 text-center text-white">Register</a>
                        </div>

                        <div class="form-group mt-4">
                            <h4 class="m-0 f-16 text-black-100 fw-400 text-center">
                                Already have an Account?
                                <a href="login.html" class="ml-1 f-16 text-base-100 fw-600">Sign in</a>
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