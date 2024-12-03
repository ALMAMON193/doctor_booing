<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>


<!-- JQUERY JS -->
<script src="{{ asset('backend/admin/plugins/jquery/jquery.min.js') }}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ asset('backend/admin/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- SIDE-MENU JS -->
<script src="{{ asset('backend/admin/plugins/sidemenu/sidemenu.js') }}"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{ asset('backend/admin/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
<!-- <script src="{{ asset('backend/admin/plugins/p-scroll/pscroll.js') }}"></script> -->

<!-- STICKY JS -->
<script src="{{ asset('backend/admin/js/sticky.js') }}"></script>


<!-- APEXCHART JS -->
<script src="{{ asset('backend/admin/js/apexcharts.js') }}"></script>

<!-- INTERNAL SELECT2 JS -->
<script src="{{ asset('backend/admin/plugins/select2/select2.full.min.js') }}"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{ asset('backend/admin/plugins/circle-progress/circle-progress.min.js') }}"></script>

{{-- DATA TABLE JS --}}
<script src="{{ asset('backend/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/admin/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('backend/admin/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
{{-- <script src="{{ asset('backend/admin/plugins/datatable/js/butsns.bootstrap5.min.js') }}"></script> --}}
<script src="{{ asset('backend/admin/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('backend/admin/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/admin/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
{{-- <script src="{{ asset('backend/admin/plugins/datatable/js/butsns.html5.min.js') }}"></script> --}}
<script src="{{ asset('backend/admin/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/admin/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('backend/admin/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/admin/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('backend/admin/js/table-data.js') }}"></script>

<!-- INDEX JS -->
<script src="{{ asset('backend/admin/js/index1.js') }}"></script>
<script src="{{ asset('backend/admin/js/index.js') }}"></script>

<!-- Reply JS-->
<script src="{{ asset('backend/admin/js/reply.js') }}"></script>


<!-- COLOR THEME JS -->
<script src="{{ asset('backend/admin/js/themeColors.js') }}"></script>

<!-- CUSTOM JS -->
<script src="{{ asset('backend/admin/js/custom.js') }}"></script>

<!-- SWITCHER JS -->
<script src="{{ asset('backend/switcher/js/switcher.js') }}"></script>

<!-- INTERNAL Summernote Editor js -->
<script src="{{ asset('backend/admin/plugins/summernote-editor/summernote1.js') }}"></script>
<script src="{{ asset('backend/admin/js/summernote.js') }}"></script>

{{-- toaster js --}}
<script src="{{ asset('backend/admin/js/toastr.min.js') }}"></script>


{{-- SweetAlert2 JS --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- dropify --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.dropify').dropify();
</script>

<!-- include summernote css/js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: 'Write your content here...',
            tabsize: 2,
            height: 200
        });
    });
</script>

{{-- Ckeditor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
<script>
    var elements = document.querySelectorAll('.description');

    for (var i = 0; i < elements.length; i++) {
        ClassicEditor
            .create(elements[i], {
                height: '500px'
            })
            .catch(error => {
                console.error(error);
            });
    }
</script>


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

@include('backend.admin.partials.toster')

@stack('scripts')
