{!! Form::open(['url' => route('admin.package_management.packages.update', $package->id), 'method' => 'put', 'id' => 'submitForm']) !!}
<div class="modal-header bg-primary">
    <h6 class="modal-title">Edit Package</h6>
    <button type="button" class="close" data-dismiss="modal">×</button>
</div>

<div class="modal-body">
    <div class='col-lg-12'>
        <div class="form-group">
            <label>Package Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Package Name"
                   value="{{$package->name ?? ''}}">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" id="description"
                      class="form-control">{{$package->description ?? ''}}</textarea>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input name="image" type="file" class="file-input"
                           data-show-upload="false" data-overwrite-initial="true"
                           data-file-action-settings='{"showRemove":false}'
                           data-images='{!! $package->image_url !!}'>
                    <span
                        class="form-text text-muted">Accepted formats: jpg, png. Max file size 1MB</span>
                </div>
            </div>
        </div>

        <legend class="text-uppercase font-size-sm font-weight-bold">Services</legend>

        <div class="form-group">
            <select name="services[]" id="services" class="form-control form-control-select2"
                    multiple="multiple" data-placeholder="Select Services">
                <option></option>
                @foreach($services as $service)
                    <option
                        value="{{ $service->id }}" {{(in_array($service->id, $package->services->pluck('id')->toArray())) ? 'Selected' : ''}}>{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
            @foreach($vehicleCategories as $vehicleCategory)
                <div class="col-md-6">
                    <legend class="text-uppercase font-size-sm font-weight-bold">{{ $vehicleCategory->name }} Vehicle
                    </legend>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="vehicleCategories[{{ $vehicleCategory->id }}][price]" id="price"
                               class="form-control" placeholder="Price"
                               value="{{$package->vehicleCategories->find($vehicleCategory->id)->pivot->price ?? ''}}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
    <button type="submit" class="btn bg-primary submit">Update</button>
</div>
{!! Form::close() !!}
