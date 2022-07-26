{!! Form::open(['url' => route('admin.subscription_management.subscription_packages.store'), 'method' => 'post', 'id' => 'submitForm']) !!}
<div class="modal-header bg-primary">
    <h6 class="modal-title">Add New Subscription Package</h6>
    <button type="button" class="close" data-dismiss="modal">×</button>
</div>

<div class="modal-body">
    <div class='col-lg-12'>
        <div class="form-group">
            <label>Subscription Package Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Subscription Package Name">
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

        <legend class="text-uppercase font-size-sm font-weight-bold">Pro Partners</legend>

        <div class="form-group">
            <select name="users[]" id="users" class="form-control form-control-select2"
                    multiple="multiple" data-placeholder="Select Pro Partners">
                <option></option>
                @foreach($proPartners as $proPartner)
                    <option value="{{ $proPartner->id }}">{{ $proPartner->personalProfile->full_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
    <button type="submit" class="btn bg-primary submit">Create</button>
</div>
{!! Form::close() !!}
