{!! Form::open(['url' => route('admin.bank_management.bank_branches.update', $bankBranch->id), 'method' => 'put', 'id' => 'submitForm']) !!}
<div class="modal-header bg-primary">
    <h6 class="modal-title">Edit Branch</h6>
    <button type="button" class="close" data-dismiss="modal">×</button>
</div>

<div class="modal-body">
    <div class='col-lg-8 offset-lg-2'>
        <div class="form-group">
            <label>Bank <span class="text-danger">*</span></label>
            <select name="bank_id" id="bank_id" class="form-control form-control-select2" data-placeholder="Select Bank">
                <option></option>
                @foreach($banks as $bank)
                    <option value="{{ $bank->id }}" {{($bankBranch->bank_id && $bankBranch->bank_id == $bank->id) ? 'Selected' : ''}}>{{ $bank->bank_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Branch Name <span class="text-danger">*</span></label>
            <input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Category Make"
                   value="{{$bankBranch->branch_name ?? ''}}">
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
    <button type="submit" class="btn bg-primary submit">Update</button>
</div>
{!! Form::close() !!}
