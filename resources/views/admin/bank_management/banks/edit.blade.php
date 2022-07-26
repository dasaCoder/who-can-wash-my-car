{!! Form::open(['url' => route('admin.bank_management.banks.update', $bank->id), 'method' => 'put', 'id' => 'submitForm']) !!}
<div class="modal-header bg-primary">
    <h6 class="modal-title">Edit Bank</h6>
    <button type="button" class="close" data-dismiss="modal">×</button>
</div>

<div class="modal-body">
    <div class='col-lg-8 offset-lg-2'>
        <div class="form-group">
            <label>Bank <span class="text-danger">*</span></label>
            <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Bank"
                   value="{{$bank->bank_name ?? ''}}">
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
    <button type="submit" class="btn bg-primary submit">Update</button>
</div>
{!! Form::close() !!}
