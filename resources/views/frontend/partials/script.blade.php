<script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>

{{-- toaster js --}}
<script src="{{ asset('backend/admin/js/toastr.min.js') }}"></script>

<!-- loader -->
<script src="{{ asset('default') }}/nprogress/nprogress.js"></script>
<!-- Toster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-right",
        "timeOut": "5000"
    };
</script>

@stack('scripts')
