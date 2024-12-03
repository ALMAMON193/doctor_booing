<!-- javascript -->
<script src="{{ asset('backend/doctor/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('backend/doctor/js/plugins.js') }}"></script>
<script src="{{ asset('backend/doctor/js/main.js') }}"></script>
<script src="{{ asset('backend/doctor/js/calender.js') }}"></script>
<script src="{{ asset('backend/doctor/js/full-calender.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js"></script>

<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    var options = {
        series: [50, 20,30], // Values for Excellent, Good, and Poor
        chart: {
            type: "donut",
        },
        labels: ["Excellent", "Good", "Poor"], // Labels for each segment
        colors: ["#187586", "#36B37E", "#FFAB00"],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200,
                },
                legend: {
                    position: "bottom",
                },
            },
        }, ],
    };

    var chart = new ApexCharts(
        document.querySelector("#donut-chart"),
        options
    );
    chart.render();
</script>

<script>
    // Sample data for Visitors per Month
    var visitorData = {
        months: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ],
        visitors: [120, 210, 180, 300, 250, 320, 400, 380, 450, 430, 500, 520],
    };

    var options = {
        series: [{
            name: "Visitors",
            data: visitorData.visitors,
        }, ],
        chart: {
            type: "area",
            height: "320px",
            zoom: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: "smooth",
            colors: ["rgb(24, 117, 134)"],
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "light",
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ["#187586"],
                opacityFrom: 0.8,
                opacityTo: 0.2,
                stops: [0, 100],
            },
        },
        xaxis: {
            categories: visitorData.months, // Set the x-axis categories to month abbreviations
        },
        yaxis: {
            opposite: false, // Set to false to move Y-axis to the left side
            title: {
                text: "",
            },
        },
        legend: {
            horizontalAlign: "left",
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('inputGroupFile01');
        const previewImage = document.getElementById('previewImage');

        if (fileInput && previewImage) {
            fileInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Flatpickr on the input element
        const dateInput = document.getElementById('date-input');
        const flatpickrInstance = flatpickr(dateInput, {
            dateFormat: "d/m/y",
            minDate: "today" // Disable past dates
        });

        // Add event listener to open Flatpickr on container click
        document.querySelector('.date-picker-container').addEventListener('click', function() {
            flatpickrInstance.open();
        });
    });
</script>

@stack('scripts')
