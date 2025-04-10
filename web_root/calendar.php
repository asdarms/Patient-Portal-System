<script>
    document.addEventListener('DOMContentLoaded', function () {
        var formattedAppointments = <?php echo json_encode($formattedAppointments);?>;
        console.log("Formatted Appointments:", formattedAppointments);
        var calendarEl = document.getElementById('calendar');
        const formattedDate = new Date().toISOString().slice(0, 10);
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialDate: formattedDate,
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            select: function (arg) {
                var title = prompt('Event Title:');
                if (title) {
                    calendar.addEvent({
                        title: title,
                        start: arg.start,
                        end: arg.end,
                        allDay: arg.allDay
                    })
                }
                calendar.unselect()
            },
            eventClick: function (arg) {
                if (confirm('Are you sure you want to delete this event?')) {
                    arg.event.remove()
                }
            },
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: formattedAppointments
            
            //     events: [ 
            //     {
            //         title: 'All Day Event',
            //         start: '2025-04-01'
            //     },
            //     {
            //         title: 'Long Event',
            //         start: '2025-04-07',
            //         end: '2025-04-10'
            //     },
            //     {
            //         groupId: 999,
            //         title: 'Repeating Event',
            //         start: '2025-04-09T16:00:00'
            //     },
            //     {
            //         groupId: 999,
            //         title: 'Repeating Event',
            //         start: '2025-04-16T16:00:00'
            //     },
            //     {
            //         title: 'Conference',
            //         start: '2025-04-11',
            //         end: '2025-04-13'
            //     },
            //     {
            //         title: 'Meeting',
            //         start: '2025-04-12T10:30:00',
            //         end: '2025-04-12T12:30:00'
            //     },
            //     {
            //         title: 'Lunch',
            //         start: '2025-04-12T12:00:00'
            //     },
            //     {
            //         title: 'Meeting',
            //         start: '2025-04-12T14:30:00'
            //     },
            //     {
            //         title: 'Happy Hour',
            //         start: '2025-04-12T17:30:00'
            //     },
            //     {
            //         title: 'Dinner',
            //         start: '2025-04-12T20:00:00'
            //     },
            //     {
            //         title: 'Birthday Party',
            //         start: '2025-04-13T07:00:00'
            //     },
            // ]
        });
        calendar.render();
    });
</script>
<cust id="landing" style="padding-left: 1rem; "></cust>
<main>
    <div class="container py-4">
        <div id='calendar-container'>
            <div id='calendar'></div>
        </div>
    </div>
</main>