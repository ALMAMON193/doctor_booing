@extends('backend.admin.app', ['title' => 'Setting Social Links'])

@section('content')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <div class="page-header">
                    <div>
                        <h1 class="page-title">Social Links</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Social</a></li>
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
                                        <form method="post" action="{{ route('admin.setting.social.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <!-- Social Name -->
                                                <div class="col-md-12 mb-3">
                                                    <label for="social_name" class="form-label">Social Name:</label>
                                                    <input type="text" class="form-control @error('social_name') is-invalid @enderror" name="social_name"
                                                        placeholder="Enter social name" id="social_name" value="{{ old('social_name') }}">
                                                    @error('social_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- Social Links -->
                                                <div class="col-md-12 mb-3">
                                                    <label for="social_link" class="form-label">Social Links:</label>
                                                    <input type="url" class="form-control @error('social_link') is-invalid @enderror" name="social_link"
                                                        placeholder="Enter social link (e.g., https://example.com)" id="social_link"
                                                        value="{{ old('social_link') }}">
                                                    @error('social_link')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- Social Icons -->
                                                <div class="col-md-12 mb-3">
                                                    <label for="social_icon" class="form-label">Social Icon:</label>
                                                    <input type="file" class="dropify form-control @error('social_icon') is-invalid @enderror" name="social_icon"
                                                        id="social_icon">
                                                    @error('social_icon')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
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
                                           
                                        </div>
                                    </div>
                                    <div class="card-body border-0">
                                        <table class="table table-bordered text-nowrap border-bottom" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Social Name</th>
                                                    <th>Social Links</th>
                                                    <th>Icon</th>
                                                    <th>Action</th>
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
                        url: "{{ route('admin.setting.social.index') }}",
                        type: "GET",
                    },

                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'social_name',
                            name: 'social_name',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'social_link',
                            name: 'social_link',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                return data.length > 50 ? data.substr(0, 50) + '...' : data;
                            }
                        },
                        {
                            data: 'social_icon',
                            name: 'social_icon',
                            orderable: false,
                            searchable: false,
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
            let url = "{{ route('admin.setting.social.delete', ':id') }}";
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


    </script>
@endpush
