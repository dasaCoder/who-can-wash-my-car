{!! Form::open(['url' => '#', 'method' => 'post', 'id' => 'filter-form']) !!}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Bank</label>
            <select name="bank_id" class="form-control form-control-select2" data-placeholder="Filter by bank">
                <option></option>
                @foreach($banks as $bank)
                    <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control form-control-select2" data-placeholder="Filter by status">
                <option></option>
                <option value="Active">Active</option>
                <option value="Disable">Disable</option>
            </select>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end align-items-center">
    <button type="button" class="btn btn-light" name="reset" id="reset">Reset</button>
    <button type="button" class="btn bg-blue ml-3" name="filter" id="filter">Filter <i class="icon-filter3 ml-2"></i>
    </button>
</div>
{!! Form::close() !!}
