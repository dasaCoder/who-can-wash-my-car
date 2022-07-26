{!! Form::open(['url' => route('admin.service_management.services.store'), 'method' => 'post', 'id' => 'submitForm']) !!}
<div class="modal-header bg-primary">
    <h6 class="modal-title">Add New Service</h6>
    <button type="button" class="close" data-dismiss="modal">×</button>
</div>

<div class="modal-body">
    <div class='col-lg-12'>
        <div class="form-group">
            <label>Service Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Service Name">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input name="image" type="file" class="file-input"
                           data-show-upload="false" data-overwrite-initial="true">
                    <span
                        class="form-text text-muted">Accepted formats: jpg, png. Max file size 1MB</span>
                </div>
            </div>
        </div>

        <div class="row">
        @foreach($vehicleCategories as $vehicleCategory)
            <div class="col-md-6">
                <legend class="text-uppercase font-size-sm font-weight-bold">{{ $vehicleCategory->name }} Vehicle</legend>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="vehicleCategories[{{ $vehicleCategory->id }}][price]" id="price" class="form-control" placeholder="Price">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Estimated time (Minutes)</label>
                            <input type="number" name="vehicleCategories[{{ $vehicleCategory->id }}][estimated_time]" id="estimated_time" class="form-control" placeholder="Estimated time (Minutes)">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
    <button type="submit" class="btn bg-primary submit">Create</button>
</div>
{!! Form::close() !!}
