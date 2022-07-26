@extends('web.layouts.app')

@section('content')

<section class="page-header py-3">
    <div class="container">
        <h2>My Profile</h2>
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><span>My Profile</span></li>
        </ul><!-- /.list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.page-header -->

<section class="my-profile-section custom-thm-section">
    <div class="container">
        <!-- User Details -->
        <form action="#" class="p-0">
            <div class="row mb-3">
                <div class="col-12">
                    <h4 class="m-0 f-24 fw-600 text-base-100">Pro-Partner Details</h4>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                    <div class="profile-img">

                    </div>
                    <input type="file"  name="" id="profileUploader" style="display: none;">
                </div>

                <div class="col-12 col-md-6 col-lg-8 d-flex justify-content-center justify-content-md-start mt-2 mt-md-0">
                    <div class="profile-upload-btn thm-btn" id="profileUploadBtn">Upload </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputFirstName" placeholder="First Name">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">+94</span>
                        </div>
                        <input type="number" class="form-control" id="inputNumber" placeholder="Phone Number">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="email" class="form-control" id="inputProPartnerEmail" placeholder="Email">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <textarea type="text" rows="3" class="form-control max-w-unset" id="inputProPartnerLocation" placeholder="Location"></textarea>
                    </div>
                </div>
            </div>

            <div class="row mb-3 mt-4">
                <div class="col-12">
                    <h4 class="m-0 f-20 fw-600 text-base-100">Change Password</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group position-relative">
                        <input type="password" class="form-control login-password-input" placeholder="Old Password">
                        <i class="toggle-password password-visible-icon fa fa-eye"></i>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group position-relative">
                        <input type="password" class="form-control login-password-input" placeholder="Create New Password">
                        <i class="toggle-password password-visible-icon fa fa-eye"></i>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group position-relative">
                        <input type="password" class="form-control login-password-input" placeholder="Confirm New Password">
                        <i class="toggle-password password-visible-icon fa fa-eye"></i>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-end mt-3">
                    <button type="submit" class="thm-btn">Update & Save</button>
                </div>
            </div>
        </form>
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
                                <h4 class="mt-0 mb-1 fw-400 text-base-100 f-14">Vehicle Modal</h4>
                                <h4 class="mt-0 mb-1 fw-600 text-black-100 f-18">Roadstar</h4>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <h4 class="mt-0 mb-1 fw-400 text-base-100 f-14">Vehicle Size</h4>
                                <h4 class="mt-0 mb-1 fw-600 text-black-100 f-18">Medium</h4>
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

<script>
    //Toggle Password
    $(".toggle-password").click(function() {
        $(".toggle-password").toggleClass("fa-eye-slash");
        input = $(".login-password-input");
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>

<script>
    $('#profileUploadBtn').on('click', function() {
        $('#profileUploader').trigger('click');
    });

    $("#profileUploader").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
    function imageIsLoaded(e) {
        // $('.abc').attr("src", event.target.result);
        $('.profile-img').css('background', 'url("' + event.target.result + '")');
    };
</script>


@endsection
