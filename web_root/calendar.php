<script>
    document.addEventListener('DOMContentLoaded', function () {
        var formattedEvents = <?php echo json_encode($formattedAppointments);?>;
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
      <?php if(isset($staff)){ ?>
                select: function (arg) {
                    var title = prompt('Event Title:');
                    if (title) {
                                <?php mysqli_query($conn, "INSERT INTO "); ?>
                                calendar.addEvent({
                                    title: title,
                                    start: arg.start,
                                    end: arg.end,
                                    allDay: arg.allDay
                                })
                        
                    }
                    calendar.unselect()
                },
      <?php } ?>
      <?php if(isset($staff)){ ?>
            eventClick: function (arg) {
                if (confirm('Are you sure you want to delete this event?')) {
                    arg.event.remove()
                }
            },
      <?php } ?>
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: formattedEvents
        
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