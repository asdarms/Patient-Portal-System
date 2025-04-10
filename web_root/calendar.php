<script>
    document.addEventListener('DOMContentLoaded', function () {
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
            events: [
                <?php if (isset($appointments)): ?>
                        <?php foreach ($appointments as $appointment): ?>
                                                {
                            title: '<?= htmlspecialchars($appointment['appointment_type']) ?>',
                            start: '<?= htmlspecialchars($appointment['datetime']) ?>',
                        },
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if (isset($shifts)): ?>
                    <?php foreach ($shifts as $shift): ?>
                                            {
                            title: 'Shift <?= htmlspecialchars($shift['shift_id']) ?>',
                            start: '<?= htmlspecialchars($shift['start_time']) ?>',
                            end: '<?= htmlspecialchars($shift['end_time']) ?>',
                        },
                    <?php endforeach; ?>
                <?php endif; ?>
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