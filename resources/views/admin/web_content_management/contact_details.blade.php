@extends('admin.layouts.app')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['url' => route('admin.web_content_management.update_contact_details'), 'method' => 'post']) !!}
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number 1</label>
                                        <input type="text" name="phone_number_1" class="form-control" value="{!! old('phone_number_1', ($data->content->phone_number_1 ?? '')) !!}">
                                        @error('phone_number_1')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number 2</label>
                                        <input type="text" name="phone_number_2" class="form-control" value="{!! old('phone_number_2', ($data->content->phone_number_2 ?? '')) !!}">
                                        @error('phone_number_2')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{!! old('email', ($data->content->email ?? '')) !!}">
                                        @error('email')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <textarea name="location" class="form-control">{!! old('location', ($data->content->location ?? '')) !!}</textarea>
                                        @error('location')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn bg-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

    @if(session('success'))
        <script>
            popups('success', '{{session('success')}}', 'notification');
        </script>
    @endif

@endpush
