@extends('admin.layouts.app')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['url' => route('admin.web_content_management.update_about_us'), 'method' => 'post', 'files' => 'true']) !!}
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">

                                    <legend class="text-uppercase font-size-sm font-weight-bold">First Content</legend>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input name="first_image" type="file" id="file-input-first"
                                                       data-show-upload="false" data-overwrite-initial="true"
                                                       data-file-action-settings='{"showRemove":false}'
                                                       @isset($data->content->first_image)
                                                       data-images='{!! asset('storage/'.$data->content->first_image) !!}'
                                                       @endisset
                                                >
                                                <span
                                                    class="form-text text-muted">Accepted formats: jpg, png. Max file size 1MB</span>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>First Title</label>
                                                <input type="text" name="first_title" class="form-control" value="{!! old('first_title', ($data->content->first_title ?? '')) !!}">
                                                @error('first_title')
                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>First Description</label>
                                                <textarea name="first_description" class="form-control">{!! old('first_description', ($data->content->first_description ?? '')) !!}</textarea>
                                                @error('first_description')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <legend class="text-uppercase font-size-sm font-weight-bold">Second Content</legend>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input name="second_image" type="file" id="file-input-second"
                                                       data-show-upload="false" data-overwrite-initial="true"
                                                       data-file-action-settings='{"showRemove":false}'
                                                       @isset($data->content->second_image)
                                                       data-images='{!! asset('storage/'.$data->content->second_image) !!}'
                                                    @endisset
                                                >
                                                <span
                                                    class="form-text text-muted">Accepted formats: jpg, png. Max file size 1MB</span>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Second Title</label>
                                                <input type="text" name="second_title" class="form-control" value="{!! old('second_title', ($data->content->second_title ?? '')) !!}">
                                                @error('second_title')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Second Description</label>
                                                <textarea name="second_description" class="form-control">{!! old('second_description', ($data->content->second_description ?? '')) !!}</textarea>
                                                @error('second_description')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
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

    <script>
        // Initialize Fileinput

        // Modal template
        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';
        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };
        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: '<i class="icon-arrow-left32"></i>',
            next: '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };
        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };

        @foreach(['first', 'second'] as $name)

        // Uploaded Files
        var images = $('#file-input-{{$name}}').data("images");

        $('#file-input-{{$name}}').fileinput({
            browseLabel: 'Browse',
            browseIcon: '<i class="icon-file-plus mr-2"></i>',
            uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
            removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },
            initialPreview: images,
            initialPreviewAsData: true,
            overwriteInitial: false,
            allowedFileExtensions: ["jpeg", "jpg", "png"],
            maxFileSize: 10240,
            initialCaption: "No file selected",
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        });

        @endforeach
    </script>

    @if(session('success'))
        <script>
            popups('success', '{{session('success')}}', 'notification');
        </script>
    @endif

@endpush
