@extends('backend.client.app')

@section('title', 'Doctors')

@push('styles')
    <style>
        #datatable_wrapper{
            margin-top:20px !important;
        }
        #datatable_length{
            margin-bottom: 20px !important;
        }
    </style>
@endpush

@section('content')
    <div class="main-content">
        <div class="main-content-container">
            @include('backend.client.partials.header')
            <div class="section-title mt-4">Doctors List</div>

            <div class="data-table-container mt-4">
                <div class="data-table table-responsive mt-4">
                    <table class="table data-table" id="datatable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Transaction ID</th>
                            <th>Appointment ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Data will be populated here by DataTable -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(function () {
            var table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('client.payment.history.index') }}",
                    error: function (xhr, error, code) {
                        console.log('Error: ' + error + ' ' + code);
                    }
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'transaction_id', name: 'transaction_id' },
                    { data: 'appointment_id', name: 'appointment_id' },
                    { data: 'amount', name: 'amount' },
                    { data: 'status', name: 'status' }
                ]
            });
        });
    </script>
@endpush
