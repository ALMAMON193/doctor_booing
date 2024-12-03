@extends('backend.admin.app', ['title' => 'psychology sessions'])

@push('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 150px;
        }
    </style>
@endpush

@section('content')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <div class="page-header">
                    <div>
                        <h1 class="page-title">Psychology Sessions</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Psychology Sessions</a></li>
                            <li class="breadcrumb-item active" aria-current="page">index</li>
                        </ol>
                    </div>
                </div>

                <div class="row" id="user-profile">
                    <div>

                        <div class="tab-content">
                            <div class="tab-pane active show" id="editProfile">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h3 class="card-title mb-0">Psychology Session List</h3>
                                        <div class="card-options ms-auto">
                                            <a href="{{ route('admin.psychology.session.create') }}" class="btn btn-primary btn-sm">Add</a>
                                        </div>
                                    </div>
                                    <div class="card-body border-0">
                                        <table class="table text-nowrap border-bottom" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th class="bg-transparent border-bottom-0 wp-15">ID</th>
                                                    <th class="bg-transparent border-bottom-0 wp-20">Image</th>
                                                    <th class="bg-transparent border-bottom-0 wp-15">Name</th>
                                                    <th class="bg-transparent border-bottom-0 wp-15">Description</th>
                                                    <th class="bg-transparent border-bottom-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                }
            });
            if (!$.fn.DataTable.isDataTable('#datatable')) {
                let dTable = $('#datatable').DataTable({
                    order: [],
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    processing: true,
                    responsive: true,
                    serverSide: true,

                    language: {
                        processing: `<div class="text-center">
                        <img src="{{ asset('default/loader.gif') }}" alt="Loader" style="width: 50px;">
                        </div>`
                    },

                    scroller: {
                        loadingIndicator: false
                    },
                    pagingType: "full_numbers",
                    dom: "<'row justify-content-between table-topbar'<'col-md-4 col-sm-3'l><'col-md-5 col-sm-5 px-0'f>>tipr",
                    ajax: {
                        url: "{{ route('admin.psychology.session.index') }}",
                        type: "GET",
                    },

                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'image',
                            name: 'image',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'name',
                            name: 'name',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'description',
                            name: 'description',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            className: 'dt-center text-center'
                        },
                    ],
                });
            }
        });

        // delete Confirm
        function showDeleteConfirm(id) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure you want to delete this record?',
                text: 'If you delete this, it will be gone forever.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteItem(id);
                }
            });
        }

        // Delete Button
        function deleteItem(id) {
            NProgress.start();
            let url = "{{ route('admin.psychology.session.destroy', ':id') }}";
            let csrfToken = '{{ csrf_token() }}';
            $.ajax({
                type: "DELETE",
                url: url.replace(':id', id),
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(resp) {
                    NProgress.done();
                    toastr.success(resp.message);
                    $('#datatable').DataTable().ajax.reload();
                },
                error: function(error) {
                    NProgress.done();
                    toastr.error(error.message);
                }
            });
        }

        //edit
        function goToView(id) {
            let url = "{{ route('admin.psychology.session.edit', ':id') }}";
            window.location.href = url.replace(':id', id);
        }
    </script>
@endpush
