{!! Form::open(['url' => route('admin.subscription_management.subscription_plans.update', $subscriptionPlan->id), 'method' => 'put', 'id' => 'submitForm']) !!}
<div class="modal-header bg-primary">
    <h6 class="modal-title">Edit Branch</h6>
    <button type="button" class="close" data-dismiss="modal">×</button>
</div>

<div class="modal-body">
    <div class='col-lg-8 offset-lg-2'>
        <div class="form-group">
            <label>Subscription Package <span class="text-danger">*</span></label>
            <select name="subscription_package_id" id="subscription_package_id" class="form-control form-control-select2" data-placeholder="Subscription Package">
                <option></option>
                @foreach($subscriptionPackages as $subscriptionPackage)
                    <option value="{{ $subscriptionPackage->id }}" {{($subscriptionPlan->subscription_package_id && $subscriptionPlan->subscription_package_id == $subscriptionPackage->id) ? 'Selected' : ''}}>{{ $subscriptionPackage->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Subscription Duration <span class="text-danger">*</span></label>
            <select name="subscription_duration_id" id="subscription_duration_id" class="form-control form-control-select2" data-placeholder="Subscription Duration">
                <option></option>
                @foreach($subscriptionDurations as $subscriptionDuration)
                    <option value="{{ $subscriptionDuration->id }}" {{($subscriptionPlan->subscription_duration_id && $subscriptionPlan->subscription_duration_id == $subscriptionDuration->id) ? 'Selected' : ''}}>{{ $subscriptionDuration->months }} Months</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Subscription Payment Term <span class="text-danger">*</span></label>
            <select name="subscription_payment_term_id" id="subscription_payment_term_id" class="form-control form-control-select2" data-placeholder="Subscription Payment Term">
                <option></option>
                @foreach($subscriptionPaymentTerms as $subscriptionPaymentTerm)
                    <option value="{{ $subscriptionPaymentTerm->id }}" {{($subscriptionPlan->subscription_payment_term_id && $subscriptionPlan->subscription_payment_term_id == $subscriptionPaymentTerm->id) ? 'Selected' : ''}}>{{ $subscriptionPaymentTerm->term }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Price <span class="text-danger">*</span></label>
            <input type="text" name="price" id="price" class="form-control" placeholder="Price" value="{{$subscriptionPlan->price ?? ''}}">
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
    <button type="submit" class="btn bg-primary submit">Update</button>
</div>
{!! Form::close() !!}
