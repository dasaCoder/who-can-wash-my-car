@extends('admin.layouts.app')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['url' => route('admin.web_content_management.update_links'), 'method' => 'post']) !!}
                        <div class="col-md-12">

                            <legend class="text-uppercase font-size-sm font-weight-bold">App Links</legend>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span class="mr-2"><i class="icon-apple2"></i></span>Appstore App Link</label>
                                        <input type="text" name="appstore_app" class="form-control" value="{!! old('appstore_app', ($data->content->appstore_app ?? '')) !!}">
                                        @error('appstore_app')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span class="mr-2"><i class="icon-android"></i></span>Playstore App Link</label>
                                        <input type="text" name="playstore_app" class="form-control" value="{!! old('playstore_app', ($data->content->playstore_app ?? '')) !!}">
                                        @error('playstore_app')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <legend class="text-uppercase font-size-sm font-weight-bold">Social Media Links</legend>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span class="mr-2"><i class="icon-facebook2"></i></span>Facebook</label>
                                        <input type="text" name="facebook" class="form-control" value="{!! old('facebook', ($data->content->facebook ?? '')) !!}">
                                        @error('facebook')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span class="mr-2"><i class="icon-twitter2"></i></span>Twitter</label>
                                        <input type="text" name="twitter" class="form-control" value="{!! old('twitter', ($data->content->twitter ?? '')) !!}">
                                        @error('twitter')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span class="mr-2"><i class="icon-instagram"></i></span>Instagram</label>
                                        <input type="text" name="instagram" class="form-control" value="{!! old('instagram', ($data->content->instagram ?? '')) !!}">
                                        @error('instagram')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span class="mr-2"><i class="icon-pinterest2"></i></span>Pinterest</label>
                                        <input type="text" name="pinterest" class="form-control" value="{!! old('pinterest', ($data->content->pinterest ?? '')) !!}">
                                        @error('pinterest')
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
