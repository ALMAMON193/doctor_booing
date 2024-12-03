<!-- Plugins CSS -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.css" rel="stylesheet">



<link rel="stylesheet" href="{{ asset('backend/client/assets/css/plugins/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/client/assets/css/plugins/aos.css') }}" />

<!-- custom css -->
<link rel="stylesheet" href="{{ asset('backend/client/assets/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/client/assets/css/notification.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/client/assets/css/form.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/client/assets/css/responsive.css') }}" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
<link rel="stylesheet" href="{{ asset('backend/client/assets/css/slider.css') }}" />


<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<!-- Toster -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
{{-- toaster css --}}
<link href="{{ asset('backend/admin/css/toastr.css') }}" rel="stylesheet" />

@stack('styles')
