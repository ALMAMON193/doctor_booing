  document.addEventListener("DOMContentLoaded", function () {
        var calendarEl = document.getElementById("calendar");

        // Fetch the events JSON file
        fetch("/backend/client/schedule.json")
            .then((response) => response.json())
            .then((data) => {
                // Map data to FullCalendar event format
                var events = data.map(function (booking) {
                    return {
                        title: booking.title,
                        start: booking.appointmentDate, // ISO 8601 format
                    };
                });

                // Initialize FullCalendar
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: "dayGridMonth",
                    editable: false,
                    selectable: false,
                    headerToolbar: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek,timeGridDay",
                    },
                    events: events,
                    eventTimeFormat: {
                        hour: "numeric",
                        minute: "2-digit",
                        meridiem: "short",
                    },
                });

                // Render the calendar
                calendar.render();
            })
            .catch((error) => {
                console.error("Failed to load schedule.json", error);
            });
    });
