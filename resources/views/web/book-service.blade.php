@extends('web.layouts.app')

@section('content')

<section class="page-header py-3">
    <div class="container">
        <h2>Book Online</h2>
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><span>Book Online</span></li>
        </ul><!-- /.list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.page-header -->

<section class="book-service-section custom-thm-section">
    <div class="container">
        <div class="row">
            <!--Form-->
            <div class="col-12 col-lg-6">
                <form class="p-0">
                    <div class="form-group custom-search">
                        <input type="text" class="form-control" id="search-location" placeholder="Enter Your Location">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 mb-2">
                            <h4 class="f-18 text-base-100 fw-400 m-0">Select Vehicle</h4>
                        </div>

                        <div class="form-group col-lg-6">
                            <select class="form-control" id="vehicleSelect">
                                <option>Select Vehicle</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-6 d-flex align-items-center">
                            <a type="button" class="thm-btn fw-400 text-white" data-toggle="modal" data-target="#addVehicleModal"> <i class="fa fa-plus mr-1"></i> Add New</a>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 mb-2">
                            <h4 class="f-18 text-base-100 fw-400 m-0">Select Vehicle Size</h4>
                        </div>

                        <div class="form-group col-lg-6">
                            <select class="form-control" id="vehicleSizeSelect">
                                <option>Select Size</option>
                                <option>Small</option>
                                <option>Medium</option>
                                <option>Large</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 mb-2">
                            <h4 class="f-18 text-base-100 fw-400 m-0">Select Package</h4>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <div class="book-package-card">
                                    <h4 class="f-16 fw-600 text-base-100 book-package-name mr-2">Package 1</h4>
                                    <h4 class="f-16 fw-900 text-black-100 book-package-price">20$</h4>
                                    <a href="#" type="button" class="package-details-btn">Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <div class="book-package-card">
                                    <h4 class="f-16 fw-600 text-base-100 book-package-name mr-2">Package 1</h4>
                                    <h4 class="f-16 fw-900 text-black-100 book-package-price">20$</h4>
                                    <a href="#" type="button" class="package-details-btn">Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <div class="book-package-card">
                                    <h4 class="f-16 fw-600 text-base-100 book-package-name mr-2">Package 1</h4>
                                    <h4 class="f-16 fw-900 text-black-100 book-package-price">20$</h4>
                                    <a href="#" type="button" class="package-details-btn">Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <div class="book-package-card">
                                    <h4 class="f-16 fw-600 text-base-100 book-package-name mr-2">Package 1</h4>
                                    <h4 class="f-16 fw-900 text-black-100 book-package-price">20$</h4>
                                    <a href="#" type="button" class="package-details-btn">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 mb-2">
                            <h4 class="f-18 text-base-100 fw-400 m-0">Select Service</h4>
                        </div>

                        <div class="form-group col-lg-6">
                            <select class="form-control" id="serviceSelect">
                                <option>Select Service</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 mb-2">
                            <h4 class="f-18 text-base-100 fw-400 m-0">Select Pro-Partners</h4>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <div class="pro-partner-card">
                                    <div class="pro-partner-img">
                                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80" alt="pro-partner-img">
                                    </div>
                                    <h4 class="m-0 f-16 text-base-100 fw-400 pro-partner-name">Pro Partner 1</h4>
                                    <h4 class="m-0 f-16 text-black-100 fw-400 pro-partner-ratings">
                                        <i class="fa fa-star"></i>
                                        <span>10/10</span>
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <div class="pro-partner-card">
                                    <div class="pro-partner-img">
                                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80" alt="pro-partner-img">
                                    </div>
                                    <h4 class="m-0 f-16 text-base-100 fw-400 pro-partner-name">Pro Partner 1</h4>
                                    <h4 class="m-0 f-16 text-black-100 fw-400 pro-partner-ratings">
                                        <i class="fa fa-star"></i>
                                        <span>10/10</span>
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <div class="pro-partner-card">
                                    <div class="pro-partner-img">
                                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80" alt="pro-partner-img">
                                    </div>
                                    <h4 class="m-0 f-16 text-base-100 fw-400 pro-partner-name">Pro Partner 1</h4>
                                    <h4 class="m-0 f-16 text-black-100 fw-400 pro-partner-ratings">
                                        <i class="fa fa-star"></i>
                                        <span>10/10</span>
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <div class="pro-partner-card">
                                    <div class="pro-partner-img">
                                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80" alt="pro-partner-img">
                                    </div>
                                    <h4 class="m-0 f-16 text-base-100 fw-400 pro-partner-name">Pro Partner 1</h4>
                                    <h4 class="m-0 f-16 text-black-100 fw-400 pro-partner-ratings">
                                        <i class="fa fa-star"></i>
                                        <span>10/10</span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 mb-2">
                            <h4 class="f-18 text-base-100 fw-400 m-0">Add Extra Items</h4>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <div class="extra-item-card">
                                    <div class="extra-item-img">
                                        <img src="https://images.theconversation.com/files/76578/original/image-20150331-1231-1ttwii6.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=675.0&fit=crop" alt="pro-partner-img">
                                    </div>
                                    <h4 class="m-0 f-16 text-base-100 fw-400 extra-item-name">Extra Item 1</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <div class="extra-item-card">
                                    <div class="extra-item-img">
                                        <img src="https://images.theconversation.com/files/76578/original/image-20150331-1231-1ttwii6.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=675.0&fit=crop" alt="pro-partner-img">
                                    </div>
                                    <h4 class="m-0 f-16 text-base-100 fw-400 extra-item-name">Extra Item 2</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <div class="extra-item-card">
                                    <div class="extra-item-img">
                                        <img src="https://images.theconversation.com/files/76578/original/image-20150331-1231-1ttwii6.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=675.0&fit=crop" alt="pro-partner-img">
                                    </div>
                                    <h4 class="m-0 f-16 text-base-100 fw-400 extra-item-name">Extra Item 3</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <div class="extra-item-card">
                                    <div class="extra-item-img">
                                        <img src="https://images.theconversation.com/files/76578/original/image-20150331-1231-1ttwii6.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=675.0&fit=crop" alt="pro-partner-img">
                                    </div>
                                    <h4 class="m-0 f-16 text-base-100 fw-400 extra-item-name">Extra Item 4</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!--Map-->
            <div class="col-12 col-lg-6">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=Zincat%20Technologies,%20Mount%20Lavinia&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://yt2.org">yt2</a><br><style>.mapouter{position:relative;text-align:right;height:400px;width:100%;border-radius: 6px;}</style><a href="https://www.embedgooglemap.net">google map html code</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:100%;border-radius: 6px;}</style></div></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 mb-2">
                        <h4 class="f-18 text-base-100 fw-400 m-0">Select Package</h4>
                    </div>

                    <div class="col-12 col-lg-6">
                        <!-- Date Picker Input -->
                        <div class="form-group mb-4">
                            <div class="custom-datepicker datepicker date input-group p-0">
                                <input type="text" placeholder="Select Date" class="form-control py-4 px-4" id="reservationDate">
                                <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-calendar"></i></span></div>
                            </div>
                        </div><!-- DEnd ate Picker Input -->
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-12 mb-2">
                        <h4 class="f-18 text-base-100 fw-400 m-0">Select Time Slot</h4>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div class="form-check time-slot-card">
                            <input class="form-check-input" type="checkbox" value="">
                            <h4 class="time-slot-text">
                                <span class="mr-2">Wednesday</span>
                                <span>12:00 pm</span>
                            </h4>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div class="form-check time-slot-card">
                            <input class="form-check-input" type="checkbox" value="">
                            <h4 class="time-slot-text">
                                <span class="mr-2">Wednesday</span>
                                <span>12:00 pm</span>
                            </h4>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div class="form-check time-slot-card">
                            <input class="form-check-input" type="checkbox" value="">
                            <h4 class="time-slot-text">
                                <span class="mr-2">Wednesday</span>
                                <span>12:00 pm</span>
                            </h4>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-check time-slot-card">
                            <input class="form-check-input" type="checkbox" value="">
                            <h4 class="time-slot-text">
                                <span class="mr-2">Wednesday</span>
                                <span>12:00 pm</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Next -->
            <div class="col-12 d-flex justify-content-end">
                <a href="confirm-service.html" type="button" class="thm-btn text-white">Next</a>
            </div>
        </div>
    </div>
</section>

<!-- Add Vehicle Modal -->
<div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVehicleModalLabel">Add New Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group custom-search">
                                <input type="text" class="form-control" placeholder="Enter Registration Number">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <h4 class="mt-0 mb-1 fw-400 text-base-100 f-14">Vehicle Make</h4>
                                <h4 class="mt-0 mb-1 fw-600 text-black-100 f-18">Tesla</h4>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <h4 class="mt-0 mb-1 fw-400 text-base-100 f-14">Vehicle Model</h4>
                                <h4 class="mt-0 mb-1 fw-600 text-black-100 f-18">Roadstar</h4>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="thm-btn text-white">Add Vehicle</button>
            </div>
        </div>
    </div>
</div>


@endsection
