@extends('web.layouts.app')

@section('content')

<section class="page-header py-3">
    <div class="container">
        <h2>Registration</h2>
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><span>Registration</span></li>
        </ul><!-- /.list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.page-header -->

<section class="pro-partner-registration-section custom-thm-section">
    <div class="container">
        <!-- Company Details -->
        <form action="#" class="p-0">
            <div class="row mb-3">
                <div class="col-12">
                    <h4 class="m-0 f-24 fw-600 text-base-100">Company Details</h4>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center company-logo-uploader">
                    <div class="company-logo">
                    <div class="form-group">
                    <input name="image" type="file" class="file-input"
                           data-show-upload="false" data-overwrite-initial="true">
                    <span
                        class="form-text text-muted">Accepted formats: jpg, png. Max file size 1MB</span>
                </div>
                    </div>
                    <input type="file"  name="" id="companyLogoUploader" style="display: none;">
                    <h4 class="m-0 f-14 text-base-100 fw-400 upload-logo-text">Upload Company Logo</h4>
                </div>

                <div class="col-12 col-md-6 col-lg-8 d-flex justify-content-center justify-content-md-start mt-2 mt-md-0">
                    <div class="company-logo-upload-btn thm-btn" id="companyLogoUploadBtn">Upload</div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputCompanyName" placeholder="Company Name">
                    </div>
                </div>
                <div class="col-12">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h4 class="m-0 f-20 fw-600 text-base-100">Select Provide Services</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <select multiple class="selectpicker custom-multiple-selector w-100">
                                <option>Wash</option>
                                <option>Hybrid Ceramic Wax</option>
                                <option>Wheel Protect</option>
                                <option>Buff</option>
                                <option>Tyre Shine</option>
                            </select><!-- End -->
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h4 class="m-0 f-20 fw-600 text-base-100">Upload Documents</h4>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="form-group col-12 col-md-6">
                            <div class="custom-file custom-file-uploader">
                                <input type="file" class="custom-file-input" id="inputGroupFile02">
                                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <button type="button" class="thm-btn w-200px"><i class="fa fa-upload mr-1"></i> Upload</button>
                        </div>
                    </div>
                </div>

                <div class='col-12 col-lg-6'>
                    <div class="row mb-3">
                        <div class="col-12">
                            <h4 class="m-0 f-20 fw-600 text-base-100">Select Availability</h4>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="form-group col-12 col-md-6 custom-datetimepicker">
                            <input type="text" id="dateTimePicker"/>
                            <i class="fa fa-calendar"></i>
                        </div>
                        <div class="form-group d-flex align-items-center col-12 col-md-6">
                            <button type="button" class="custom-delete-btn mr-2"><i class="fa fa-trash"></i></button>
                            <button type="button" class="custom-add-btn"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h4 class="m-0 f-20 fw-600 text-base-100">Select Location</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 custom-search">
                            <input type="text" class="form-control" placeholder="Location">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-end mt-3">
                    <button type="submit" class="thm-btn">Send Request</button>
                </div>
            </div>
        </form>

        <!-- Bank Details -->
        <form action="#" class="p-0 mt-5">
            <div class="row mb-3">
                <div class="col-12">
                    <h4 class="m-0 f-24 fw-600 text-base-100">Bank Details</h4>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputBankName" placeholder="Bank Name">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputAccountHoldersName" placeholder="Account Holder's Name">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputAccountNumber" placeholder="Account Number">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-end mt-3">
                    <a href="pro-partner-profile.html" type="submit" class="thm-btn text-center text-white">Complete Registration</a>
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
    $('#companyLogoUploadBtn').on('click', function() {
        $('#companyLogoUploader').trigger('click');
    });

    $("#companyLogoUploader").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
    function imageIsLoaded(e) {
        // $('.abc').attr("src", event.target.result);
        $('.company-logo').css('background', 'url("' + event.target.result + '")');
    };
</script>

<script>
    $('#dateTimePicker').datetimepicker({
        inline:false,
    });
</script>

<script>
    $(function () {
        $('.selectpicker').selectpicker();
    });
</script>


@endsection
