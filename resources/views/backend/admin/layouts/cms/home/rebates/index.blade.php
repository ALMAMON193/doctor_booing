@extends('backend.admin.app', ['title' => 'Home Rebates'])

@section('content')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <div class="page-header">
                    <div>
                        <h1 class="page-title">Rebates</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Rebates</a></li>
                            <li class="breadcrumb-item active" aria-current="page">index</li>
                        </ol>
                    </div>
                </div>

                <div class="row" id="user-profile">
                    <div class="col-lg-5">

                        <div class="tab-content">
                            <div class="tab-pane active show" id="editProfile">
                                <div class="card">
                                    <div class="card-body border-0">
                                        <form class="form-horizontal" method="post"
                                            action="{{ route('admin.cms.home.rebates.content') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')

                                            <div class="row mb-4">

                                                <div class="form-group">
                                                    <label for="title" class="form-label">Title:</label>
                                                    <input type="text"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        name="title" placeholder="Title" id="title"
                                                        value="{{ $data->title ?? (old('title') ?? '') }}">
                                                    @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="content" class="form-label">Content:</label>
                                                    <textarea class="description form-control @error('content') is-invalid @enderror" name="content" placeholder="Content"
                                                        id="content">{{ $data->content ?? (old('content') ?? '') }}</textarea>
                                                    @error('content')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="image" class="form-label">Image:</label>
                                                    <input type="file"
                                                        data-default-file="{{ !empty($data->image) && file_exists(public_path($data->image)) ? url($data->image) : url('default/logo.png') }}"
                                                        class="dropify form-control @error('image') is-invalid @enderror"
                                                        name="image" id="image">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-7">

                        <div class="tab-content">
                            <div class="tab-pane active show" id="editProfile">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h3 class="card-title mb-0">Rebates List</h3>
                                        <div class="card-options ms-auto">
                                            <a href="{{ route('admin.cms.home.rebates.create') }}"
                                                class="btn btn-primary btn-sm">Add Task</a>
                                        </div>
                                    </div>
                                    <div class="card-body border-0">
                                        <table class="table table-bordered text-nowrap border-bottom" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th class="bg-transparent border-bottom-0 wp-15">ID</th>
                                                    <th class="bg-transparent border-bottom-0 wp-15">Title</th>
                                                    <th class="bg-transparent border-bottom-0 wp-15">Content</th>
                                                    <th class="bg-transparent border-bottom-0">Status</th>
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
                        url: "{{ route('admin.cms.home.rebates.index') }}",
                        type: "GET",
                    },

                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'title',
                            name: 'ttile',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'content',
                            name: 'content',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                return data.length > 50 ? data.substr(0, 50) + '...' : data;
                            }
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: false,
                            searchable: false
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

        // Status Change Confirm Alert
        function showStatusChangeAlert(id) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to update the status?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    statusChange(id);
                }
            });
        }

        // Status Change
        function statusChange(id) {
            NProgress.start();
            let url = "{{ route('admin.cms.home.rebates.status', ':id') }}";
            $.ajax({
                type: "POST",
                url: url.replace(':id', id),
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
            let url = "{{ route('admin.cms.home.rebates.destroy', ':id') }}";
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
        function goToEdit(id) {
            let url = "{{ route('admin.cms.home.rebates.edit', ':id') }}";
            window.location.href = url.replace(':id', id);
        }
    </script>
@endpush
