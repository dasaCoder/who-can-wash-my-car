<input type="checkbox" class="form-status-switchery"
       data-url="{{route($route.'.change_status')}}"
       data-id="{{$data->id}}"
    {{ ($data->status == "Active") ? "checked" : "" }}>
