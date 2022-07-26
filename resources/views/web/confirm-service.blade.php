@extends('web.layouts.app')

@section('content')

<section class="page-header py-3">
    <div class="container">
        <h2>Confirm Booking</h2>
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><span>Confirm Booking</span></li>
        </ul><!-- /.list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.page-header -->

<section class="confirm-service-section custom-thm-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="row">
                    <div class="col-12 mb-4">
                        <h4 class="f-22 text-base-100 fw-400 m-0"><u>Booking Summary</u></h4>
                    </div>

                    <div class="col-12 mb-3">
                        <h4 class="f-14 text-black-100 fw-400 mt-0 mb-1">location</h4>
                        <h4 class="f-18 text-base-100 fw-600 mt-0 mb-1">Uckfield TN22, UK</h4>
                    </div>

                    <div class="col-12 mb-3">
                        <h4 class="f-14 text-black-100 fw-400 mt-0 mb-1">Vehicle</h4>
                        <h4 class="f-18 text-base-100 fw-600 mt-0 mb-1">Tesla T010, Roadstar</h4>
                    </div>

                    <div class="col-12 mb-3">
                        <h4 class="f-14 text-black-100 fw-400 mt-0 mb-1">Date & Time</h4>
                        <h4 class="f-18 text-base-100 fw-600 mt-0 mb-1">10-08-2021, 2:00 pm</h4>
                    </div>

                    <div class="col-12 mb-3">
                        <h4 class="f-14 text-black-100 fw-400 mt-0 mb-1">Package</h4>
                        <h4 class="f-18 text-base-100 fw-600 mt-0 mb-1">Gold</h4>
                    </div>

                    <div class="col-12 mb-3">
                        <h4 class="f-14 text-black-100 fw-400 mt-0 mb-1">Selected Pro-Partners</h4>
                        <div class="d-flex flex-wrap">
                            <h4 class="f-18 text-base-100 fw-600 mt-0 mb-1">Pro-Partner 1 <span>,</span></h4>
                            <h4 class="f-18 text-base-100 fw-600 mt-0 mb-1 ml-3">Pro-Partner 2 <span>,</span></h4>
                            <h4 class="f-18 text-base-100 fw-600 mt-0 mb-1 ml-3">Pro-Partner 3</h4>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <h4 class="f-14 text-black-100 fw-400 mt-0 mb-1">Services</h4>
                        <div class="d-flex flex-wrap">
                            <h4 class="f-18 text-base-100 fw-600 mt-0 mb-1">Service 1 <span>,</span></h4>
                            <h4 class="f-18 text-base-100 fw-600 mt-0 mb-1 ml-3">Service 2 <span>,</span></h4>
                            <h4 class="f-18 text-base-100 fw-600 mt-0 mb-1 ml-3">Service 3 <span>,</span></h4>
                            <h4 class="f-18 text-base-100 fw-600 mt-0 mb-1 ml-3">Service 4 </h4>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <h4 class="f-14 text-black-100 fw-400 mt-0 mb-1">Extra Items</h4>
                        <div class="d-flex flex-wrap">
                            <h4 class="f-18 text-base-100 fw-600 mt-0 mb-1">Item 1 <span>,</span></h4>
                            <h4 class="f-18 text-base-100 fw-600 mt-0 mb-1 ml-3">Item 2 <span>,</span></h4>
                            <h4 class="f-18 text-base-100 fw-600 mt-0 mb-1 ml-3">Item 3 <span>,</span></h4>
                            <h4 class="f-18 text-base-100 fw-600 mt-0 mb-1 ml-3">Item 4 </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <div class="row">
                    <div class="col-12 mb-4">
                        <h4 class="f-22 text-base-100 fw-400 m-0"><u>Price Breakdown</u></h4>
                    </div>

                    <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                        <h4 class="f-16 text-black-100 fw-400 mt-0 mb-1 txt-overflow txt-overflow-2">Gold Package</h4>
                        <h4 class="f-16 text-base-100 fw-600 mt-0 mb-1 w-75px"><span class="mr-1">:</span> 50$</h4>
                    </div>

                    <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                        <h4 class="f-16 text-black-100 fw-400 mt-0 mb-1 txt-overflow txt-overflow-2">Service 1</h4>
                        <h4 class="f-16 text-base-100 fw-600 mt-0 mb-1 w-75px"><span class="mr-1">:</span> 15$</h4>
                    </div>

                    <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                        <h4 class="f-16 text-black-100 fw-400 mt-0 mb-1 txt-overflow txt-overflow-2">Service 2</h4>
                        <h4 class="f-16 text-base-100 fw-600 mt-0 mb-1 w-75px"><span class="mr-1">:</span> 15$</h4>
                    </div>

                    <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                        <h4 class="f-16 text-black-100 fw-400 mt-0 mb-1 txt-overflow txt-overflow-2">Service 3</h4>
                        <h4 class="f-16 text-base-100 fw-600 mt-0 mb-1 w-75px"><span class="mr-1">:</span> 15$</h4>
                    </div>

                    <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                        <h4 class="f-16 text-black-100 fw-400 mt-0 mb-1 txt-overflow txt-overflow-2">Service 4</h4>
                        <h4 class="f-16 text-base-100 fw-600 mt-0 mb-1 w-75px"><span class="mr-1">:</span> 15$</h4>
                    </div>

                    <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                        <h4 class="f-16 text-black-100 fw-400 mt-0 mb-1 txt-overflow txt-overflow-2">Items 1</h4>
                        <h4 class="f-16 text-base-100 fw-600 mt-0 mb-1 w-75px"><span class="mr-1">:</span> 15$</h4>
                    </div>

                    <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                        <h4 class="f-16 text-black-100 fw-400 mt-0 mb-1 txt-overflow txt-overflow-2">Items 2</h4>
                        <h4 class="f-16 text-base-100 fw-600 mt-0 mb-1 w-75px"><span class="mr-1">:</span> 15$</h4>
                    </div>

                    <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                        <h4 class="f-16 text-black-100 fw-400 mt-0 mb-1 txt-overflow txt-overflow-2">Items 3</h4>
                        <h4 class="f-16 text-base-100 fw-600 mt-0 mb-1 w-75px"><span class="mr-1">:</span> 15$</h4>
                    </div>

                    <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                        <h4 class="f-16 text-black-100 fw-400 mt-0 mb-1 txt-overflow txt-overflow-2">Items 4</h4>
                        <h4 class="f-16 text-base-100 fw-600 mt-0 mb-1 w-75px"><span class="mr-1">:</span> 15$</h4>
                    </div>

                    <div class="col-12 border-top-2 mb-3"></div>

                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <h4 class="f-18 text-black-100 fw-600 mt-0 mb-1 txt-overflow txt-overflow-2">Total</h4>
                        <h4 class="f-20 text-base-100 fw-600 mt-0 mb-1 w-100px"><span class="mr-1">:</span> 150$</h4>
                    </div>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-between align-items-center mt-5">
                <a href="book-service.html" type="button" class="thm-default-btn">back</a>
                <button type="submit" class="thm-btn text-white">Confirm and Pay</button>
            </div>
        </div>
    </div>
</section>


@endsection
