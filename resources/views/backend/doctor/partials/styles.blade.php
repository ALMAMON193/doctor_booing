<!-- Plugins CSS -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="{{ asset('backend/doctor/css/plugins/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/doctor/css/plugins/aos.css') }}" />



<!-- custom css -->
<link rel="stylesheet" href="{{ asset('backend/doctor/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/doctor/css/responsive.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/doctor/css/notification.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/doctor/css/inbox.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/doctor/css/form.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/doctor/css/plugins/nice-select.min.css') }}">

<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<!-- Toster -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
{{-- toaster css --}}
<link href="{{ asset('backend/admin/css/toastr.css') }}" rel="stylesheet" />

@stack('styles')
