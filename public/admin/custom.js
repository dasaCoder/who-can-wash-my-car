/*!
  * Created by : Charith Gamage
  * Date : 2022/04/01
  */


/******************
 Preloader
 *******************/
window.onload = function(){
    // Hide the preloader
    document.querySelector("#preloader").style.display = "none";
}

/******************
 Initialize Component
 *******************/
$(document).ready(function () {
    initializeComponent();
});

$(document).ajaxComplete(function () {
    // Initialize Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.form-status-switchery'));
    elems.forEach(function(el) {
        if ($(el).data('switchery') != true) {

            new Switchery(el);
            el.onchange = function(e) {
                let status = $(this).is(':checked') == true ? 'Active' : 'Disable';
                let url = $(this).data("url");
                let id = $(this).data("id");

                changeStatus(status, url, id);
            }
        }
    });

    // Initialize Select2
    $('.form-control-select2').select2({
        width: '100%'
    });
});

function initializeComponent() {
    // Initialize Wizard
    $('.wizard-form').steps({
        headerTag: 'h6',
        bodyTag: 'fieldset',
        transitionEffect: 'fade',
        titleTemplate: '<span class="number">#index#</span> #title#',
        labels: {
            previous: 'Previous',
            next: 'Next',
            finish: 'Submit Form'
        },
        onFinished: function (event, currentIndex) {

            var block = $(this).closest('.modal-content');

            $(block).block({
                message: '<span class="font-weight-semibold"><i class="icon-spinner4 spinner mr-2"></i>&nbsp; Saving data</span>',
                overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: '10px 15px',
                    color: '#fff',
                    width: 'auto',
                    '-webkit-border-radius': 3,
                    '-moz-border-radius': 3,
                    backgroundColor: '#333'
                }
            });

            var url = $(this).attr('action');
            var form = $(this)[0];
            var data = new FormData(form);

            let ajaxResponse = ajaxRequest(url, 'POST', data, true);

            ajaxResponse.done(function (response) {
                $(block).unblock();
                if (response.status === 'success'){
                    $('.modal').modal('hide');
                    popups(response.status, response.data, response.popupType);
                    $('#dataTable').DataTable().ajax.reload();
                }
                else {
                    popups(response.status, response.data, response.popupType);
                }
            });
        }
    });

    // Initialize Select2
    $('.form-control-select2').select2({
        width: '100%'
    });

    // Initialize Uniform Check
    $('.form-check-input-styled').uniform();

    // Initialize Uniform Upload
    $('.form-input-styled').uniform({
        fileButtonClass: 'action btn bg-blue'
    });

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
    // Uploaded Files
    var images = $('.file-input').data("images");
    console.log(images);
    var details = $('.file-input').data("details");

    $('.file-input').fileinput({
        browseLabel: 'Browse',
        browseIcon: '<i class="icon-file-plus mr-2"></i>',
        uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
        removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
        layoutTemplates: {
            icon: '<i class="icon-file-check"></i>',
            modal: modalTemplate
        },
        initialPreview: images,
        initialPreviewConfig: details,
        initialPreviewAsData: true,
        overwriteInitial: false,
        allowedFileExtensions: ["jpeg", "jpg", "png"],
        maxFileSize: 10240,
        initialCaption: "No file selected",
        previewZoomButtonClasses: previewZoomButtonClasses,
        previewZoomButtonIcons: previewZoomButtonIcons,
        fileActionSettings: fileActionSettings
    });
}

/********************
  Data Table Filters
*********************/

$(document).ready(function () {
    $('#filter').on('click', function (e) {
        window.LaravelDataTables["dataTable"].draw();
    });

    $('#reset').on('click', function (e) {
        $('#filter-form :input').each(function () {
            $(this).val('');
        });
        window.LaravelDataTables["dataTable"].draw();
    });

    $('#dataTable').on('preXhr.dt', function ( e, settings, data ) {
        $('#filter-form :input').each(function () {
            data[$(this).prop('name')] = $(this).val();
        });
    });
});

/******************
 Load Model
 *******************/

function getModel(url) {
    var block = $('body');
    $(block).block({
        message: '<span class="font-weight-semibold"><i class="icon-spinner4 spinner mr-2"></i>&nbsp; Loading</span>',
        overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: '10px 15px',
            color: '#fff',
            width: 'auto',
            '-webkit-border-radius': 3,
            '-moz-border-radius': 3,
            backgroundColor: '#333'
        }
    });

    let ajaxResponse = ajaxRequest(url, 'GET');

    ajaxResponse.done(function (response) {
        $(block).unblock();
        if (response.modalSize === 'md') {
            holder = 'modal-holder-md';
        } else if (response.modalSize === 'lg') {
            holder = 'modal-holder-lg';
        } else {
            holder = 'modal-holder-xl';
        }

        popups(response.status, response.data, response.popupType, holder);
    });
}

/******************
 Form Submit
 *******************/

$(document).on('submit', '#submitForm', function(e) {
    e.preventDefault();

    var url = $(this).prop('action');
    var data = new FormData( this );
    var block = $(this).closest('.modal-content');

    $(block).block({
        message: '<span class="font-weight-semibold"><i class="icon-spinner4 spinner mr-2"></i>&nbsp; Saving data</span>',
        overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: '10px 15px',
            color: '#fff',
            width: 'auto',
            '-webkit-border-radius': 3,
            '-moz-border-radius': 3,
            backgroundColor: '#333'
        }
    });

    let ajaxResponse = ajaxRequest(url, 'POST', data, true);

    ajaxResponse.done(function (response) {
        $(block).unblock();
        if (response.status === 'success'){
            $('.modal').modal('hide');
            popups(response.status, response.data, response.popupType);
            $('#dataTable').DataTable().ajax.reload();
        }
        else {
            popups(response.status, response.data, response.popupType);
        }
    });
});

/******************
 Delete Record
 *******************/

function deleteRecord(url) {
    swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to delete this record!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, please!',
        confirmButtonClass: 'btn btn-warning',
        cancelButtonClass: 'btn btn-light'
    }).then(function(result) {
        if(result.value) {
            var block = $('body');
            $(block).block({
                message: '<span class="font-weight-semibold"><i class="icon-spinner4 spinner mr-2"></i>&nbsp; Deleting</span>',
                overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: '10px 15px',
                    color: '#fff',
                    width: 'auto',
                    '-webkit-border-radius': 3,
                    '-moz-border-radius': 3,
                    backgroundColor: '#333'
                }
            });

            let ajaxResponse = ajaxRequest(url, 'DELETE');

            ajaxResponse.done(function (response) {
                $(block).unblock();
                popups(response.status, response.data, response.popupType);
                $('#dataTable').DataTable().ajax.reload();
            });
        }
        else if(result.dismiss === swal.DismissReason.cancel) {
            $('#dataTable').DataTable().ajax.reload();
        }
    });
}

/******************
 Load Select
 *******************/

$(document).on('change', '.loadSelect', function(e) {
    const select = $(this);
    const id = select.val();
    const urls = select.data("url");
    const targetSelects = select.data("target");

    for (let index = 0; index < urls.length; ++index) {
        const url = urls[index];
        const targetSelect = targetSelects[index];

        const data = {id: id}
        const ajaxResponse = ajaxRequest(url, 'GET', data);

        ajaxResponse.done(function (response) {
            $(targetSelect).empty();
            $(targetSelect).append(new Option('', ''));
            $.each( response, function( key, value ) {
                $(targetSelect).append(new Option(value, key));
            });
        });
    }
});

$(document).on('change', '.loadModels', function(e) {
    const type = $('#category_type_id').val();
    const make = $('#category_make_id').val();
    const model = $('#category_model_id');
    const url = $('#category_type_id').data("url");

    if((type !== null) && (make !== null)) {
        const data = {type:type, make:make};
        const ajaxResponse = ajaxRequest(url, 'GET', data);

        ajaxResponse.done(function (response) {
            $(model).empty();
            $(model).append(new Option('', ''));
            $.each( response, function( key, value ) {
                $(model).append(new Option(value, key));
            });
        });
    }
});

/******************
 Change Status
 *******************/

function changeStatus(status, url, id) {
    swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to change the status of this record!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, please!',
        confirmButtonClass: 'btn btn-warning',
        cancelButtonClass: 'btn btn-light'
    }).then(function(result) {
        if(result.value) {
            let data = {id: id, status: status}
            let ajaxResponse = ajaxRequest(url, 'POST', data);

            ajaxResponse.done(function (response) {
                popups(response.status, response.data, response.popupType);
                $('#dataTable').DataTable().ajax.reload();
            });
        }
        else if(result.dismiss === swal.DismissReason.cancel) {
            $('#dataTable').DataTable().ajax.reload();
        }
    });
}

/******************
 AJAX Request
 *******************/

function ajaxRequest(url, method, data, hasFileUpload) {
    var processData = true;
    var contentType = "application/x-www-form-urlencoded; charset=UTF-8";
    if (hasFileUpload !== undefined) {
        processData = false;
        contentType = false;
    }

    return $.ajax({
        'url': url,
        'type': method,
        'data': data,
        'processData': processData,
        'contentType': contentType,
        beforeSend: function(xhr, type) {
            if (!type.crossDomain) {
                xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            }
        }
    });
}

/******************
 Popups
 *******************/

function popups(status, data, popupType, holder) {
    if (status === 'success') {
        if (popupType === 'modal') {
            $('.' + holder + ' .modal-content').html(data);
            initializeComponent();
            $('.' + holder).modal({
                backdrop: 'static',
                keyboard: false
            });
        } else if (popupType === 'notification') {
            if (data !== undefined && data !== '') {
                new Noty({
                    type: 'success',
                    theme: ' alert alert-success alert-styled-left p-0',
                    timeout: 5000,
                    text: "<b style='text-transform: capitalize'>Success!</b><br>" + data,
                }).show();
            }
        }
    } else if (status === 'warning') {
        if (popupType === 'notification') {
            if (data !== undefined && data !== '') {
                new Noty({
                    type: 'warning',
                    theme: ' alert alert-warning alert-styled-left p-0',
                    text: "<b style='text-transform: capitalize'>Warning!</b><br>" + data,
                    closeWith: ['button']
                }).show();
            }
        }
    } else {
        if (popupType === 'notification') {
            if (data !== undefined && data !== '') {
                new Noty({
                    type: 'error',
                    theme: ' alert alert-danger alert-styled-left p-0',
                    text: "<b style='text-transform: capitalize'>Error!</b><br>" + data,
                    closeWith: ['button']
                }).show();
            }
        }

        if (popupType === 'validation') {
            $('.modal').find('input.border-danger').removeClass('border-danger');
            $('.modal').find('span.form-text.text-danger').remove();

            $.each(data, function (index, value) {
                var selector = '#' + index;

                if (Array.isArray(value) && value[0] != '') {
                    errorText = "";
                    $.each(value, function (index, value) {
                        if(index != 0) { errorText += "<br>" }
                        errorText += value;
                    });

                    var input = $('.modal').find(selector), nextElement = input.next();

                    input.addClass('border-danger');
                    if($(nextElement).is('.input-group-append')) {
                        input.closest('div').after('<span class="form-text text-danger">'+ errorText +'</span>');
                    } else {
                        input.after('<span class="form-text text-danger">'+ errorText +'</span>');
                    }
                }
            });
        }
    }
}
