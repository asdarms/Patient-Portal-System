<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialDate: '2025-04-01',
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
            <?php
            for ($i = 0; $i < sizeof($appointments); $i++) {
                ?>
                
                <?php
            }
            ?>
                    events: [
                {
                    title: 'All Day Event',
                    start: '2025-04-01'
                },
                {
                    title: 'Long Event',
                    start: '2025-04-07',
                    end: '2025-04-10'
                },
                {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2025-04-09T16:00:00'
                },
                {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2025-04-16T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2025-04-11',
                    end: '2025-04-13'
                },
                {
                    title: 'Meeting',
                    start: '2025-04-12T10:30:00',
                    end: '2025-04-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2025-04-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2025-04-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2025-04-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2025-04-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2025-04-13T07:00:00'
                },
            ]
        });

        calendar.render();
    });
</script>
<cust id="landing" style="padding-left: 1rem; "></cust>
<main>
    <div id='calendar-container'>
        <div id='calendar'></div>
    </div>
</main>