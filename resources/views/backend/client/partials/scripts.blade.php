 <!-- javascript -->

 <script src="{{ asset('backend/client/js/jquery-3.7.1.min.js') }}"></script>
 <script src="{{ asset('backend/client/js/plugins.js') }}"></script>
 <script src="{{ asset('backend/client/js/main.js') }}"></script>
 <!-- javascript -->
 <script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.0/dist/index.umd.min.js"></script>

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
 <!-- javascript -->
 <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
 <script src="{{ asset('backend/client/assets/js/plugins.js') }}"></script>
 <script src="{{ asset('backend/client/assets/js/main.js') }}"></script>
 <script src="{{ asset('backend/client/assets/js/full-calender.js') }}"></script>

 {{-- toaster js --}}
 <script src="{{ asset('backend/admin/js/toastr.min.js') }}"></script>



 <!-- Include jQuery and Toastr JS -->
 <!-- Toster -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


 <script>
     toastr.options = {
         "closeButton": true,
         "positionClass": "toast-top-right",
         "timeOut": "5000"
     };
 </script>

 <script>
     document.addEventListener("DOMContentLoaded", function() {
         $(".order-slider").slick({
             dots: false,
             infinite: true,
             speed: 500,
             slidesToShow: 3,
             slidesToScroll: 2,
             arrows: false,
             responsive: [{
                     breakpoint: 1024,
                     settings: {
                         slidesToShow: 2,
                         slidesToScroll: 2,
                     },
                 },
                 {
                     breakpoint: 768,
                     settings: {
                         slidesToShow: 1,
                         slidesToScroll: 1,
                     },
                 },
             ],
         });
     });
 </script>

 <script>
     const bookedDates = [
         "2024-11-19",
         "2024-11-21",
         "2024-11-27",
         "2024-11-30",
     ];

     const calendarTitle = document.getElementById("calendar-title");
     const today = new Date();
     const formattedToday = today.toLocaleDateString('en-US', {
         weekday: 'short',
         day: 'numeric',
         month: 'short',
         year: 'numeric'
     });
     // calendarTitle.textContent = formattedToday;

     // Initialize the easepick picker
     const picker = new easepick.create({
         element: document.getElementById("calendar-container"),
         css: ["{{ asset('backend/client/assets/css/plugins/easepick.css') }}"],
         inline: true, // Display the calendar inline (always visible)
         calendars: 1,
         lang: "en-US",
         zIndex: 10,
         plugins: ["LockPlugin"],
         LockPlugin: {
             //   minDate: new Date(),
             minDate: formattedToday,
             filter: function(date) {
                 return bookedDates.includes(date.format("YYYY-MM-DD"));
             },
         },
         singleDate: true,
     });

     document.getElementById("calendar-container").textContent = "";

     document.getElementById("calendar-container").style.display = "block";
     document.getElementById("calendar-container").style.padding = "0";

     picker.on("select", (e) => {
         picker.clear();
     });
 </script>




 @stack('scripts')
