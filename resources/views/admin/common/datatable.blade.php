@extends('admin.layouts.app')

@push('css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <style>
        .dt-buttons {
            float: left !important;
            margin: 0 !important;
        }
    </style>
@endpush

@section('content')

    <div class="content">

        <div class="row">
            <div class="col-md-12">

                @isset($filters)
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title">Filters Panel</h6>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            {!!$filters!!}
                        </div>
                    </div>
                @endisset

                <div class="card">
                    <div class="card-body table-responsive">
                        {{$dataTable->table()}}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade modal-holder-md" role="dialog" aria-labelledby="">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <div class="modal fade modal-holder-lg" role="dialog" aria-labelledby="">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <div class="modal fade modal-holder-xl" role="dialog" aria-labelledby="">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

    {{$dataTable->scripts()}}

@endpush
