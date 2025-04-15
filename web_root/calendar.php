<script>
    document.addEventListener('DOMContentLoaded', function () {
        var formattedEvents = <?php echo json_encode($formattedAppointments); ?>;
        var calendarEl = document.getElementById('calendar');
        const formattedDate = new Date().toISOString().replace('T', ' ').replace(/\..+/, '').slice(0, 10);
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
            <?php if (isset($staff)) { ?>
                select: function (arg) {
                    var title = prompt('Event Title:');
                    if (!title) {
                        calendar.unselect();
                        return;
                    }
                    var patientId = prompt('Patient (ID required): ')
                    if (!patientId) {
                        calendar.unselect();
                        return;
                    }

                    if (title) {
                        // Create a JavaScript object with the event data
                        var eventData = {
                            title: title,
                            start: arg.start.toISOString().replace('T', ' ').replace(/\..+/, ''),
                            staff_id: <?php echo isset($staff) ? $staff['staff_id'] : null; ?>,
                            patient_id: patientId
                        };

                        // Make an AJAX call to save the event
                        fetch('calendar-add.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(eventData)
                        })
                            .then(response => response.json()) // Use .text() instead of .json() first
                            .then(data => {
                                if (data.success) {
                                    // Only add to calendar if database insertion was successful
                                    calendar.addEvent({
                                        id: data.id,
                                        title: title,
                                        start: arg.start,
                                        end: arg.end,
                                        allDay: arg.allDay
                                    });
                                } else {
                                    alert('Error saving appointment: ' + data.message);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Error saving appointment');
                            });
                    }
                    calendar.unselect();
                },
            <?php } ?>
      <?php if (isset($staff)) { ?>
                    eventClick: function (arg) {
                    if (confirm('Are you sure you want to delete this event? (not functional)')) {
                        arg.event.remove()
                    }
                },
            <?php } ?>
            editable: false,
            dayMaxEvents: true, // allow "more" link when too many events
            events: formattedEvents,

        });
        calendar.render();
    });
</script>
<main>
    <div class="container py-4">
        <div id='calendar-container'>
            <div id='calendar'></div>
        </div>
    </div>
</main>