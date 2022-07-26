@extends('admin.layouts.app')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['url' => route('admin.web_content_management.update_home'), 'method' => 'post', 'files' => 'true']) !!}
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Upload Light Logo Image</label>
                                    <div class="form-group">
                                        <input name="light_logo" type="file" id="file-input-light"
                                               data-show-upload="false" data-overwrite-initial="true"
                                               data-file-action-settings='{"showRemove":false}'
                                               @isset($data->content->light_logo)
                                               data-images='{!! asset('storage/'.$data->content->light_logo) !!}'
                                               @endisset
                                        >
                                        <span
                                            class="form-text text-muted">Accepted formats: jpg, png. Max file size 1MB</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Upload Dark Logo Image</label>
                                    <div class="form-group">
                                        <input name="dark_logo" type="file" id="file-input-dark"
                                               data-show-upload="false" data-overwrite-initial="true"
                                               data-file-action-settings='{"showRemove":false}'
                                               @isset($data->content->dark_logo)
                                               data-images='{!! asset('storage/'.$data->content->dark_logo) !!}'
                                               @endisset
                                        >
                                        <span
                                            class="form-text text-muted">Accepted formats: jpg, png. Max file size 1MB</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Header Title</label>
                                        <input type="text" name="header_title" class="form-control" value="{!! old('header_title', ($data->content->header_title ?? '')) !!}">
                                        @error('header_title')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Header Description</label>
                                        <textarea name="header_description" class="form-control">{!! old('header_description', ($data->content->header_description ?? '')) !!}</textarea>
                                        @error('header_description')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Footer Description</label>
                                        <textarea name="footer_description" class="form-control">{!! old('footer_description', ($data->content->footer_description ?? '')) !!}</textarea>
                                        @error('footer_description')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>How It Works Description</label>
                                        <textarea name="how_it_works_description" class="form-control">{!! old('how_it_works_description', ($data->content->how_it_works_description ?? '')) !!}</textarea>
                                        @error('how_it_works_description')
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

        @foreach(['light', 'dark'] as $name)

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
