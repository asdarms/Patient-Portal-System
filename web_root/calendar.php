<!DOCTYPE html>
<html lang="en">
<cust id="landing" style="padding-left: 1rem; "></cust>
<script>
    $(function (e) {
        var calendar = $("#landing").calendarGC({
            dayBegin: 0,
            prevIcon: '&#x3c;',
            nextIcon: '&#x3e;',
            onPrevMonth: function (e) {
                console.log("prev");
                console.log(e);
            },
            onNextMonth: function (e) {
                console.log("next");
                console.log(e);
            },
            events: getHoliday(),
            onclickDate: function (e, data) {
                console.log(e, data);
            }
        });
    });
    function getHoliday() {
        var d = new Date();
        var totalDay = new Date(d.getFullYear(), d.getMonth(), 0).getDate();
        var events = [];
        for (var i = 1; i <= totalDay; i++) {
            var newDate = new Date(d.getFullYear(), d.getMonth(), i);
            // See the below jquery for custom events

            // if (newDate.getDay() == 0) {   //if Sunday
            //     events.push({
            //     date: newDate,
            //     eventName: "Sunday free",
            //     className: "badge bg-danger",
            //     onclick(e, data) {
            //         console.log(data);
            //     },
            //     dateColor: "red"
            //     });
            // }
            // if (newDate.getDay() == 6) {   //if Saturday
            //     events.push({
            //     date: newDate,
            //     eventName: "Saturday free",
            //     className: "badge bg-danger",
            //     onclick(e, data) {
            //         console.log(data);
            //     },
            //     dateColor: "red"
            //     });
            // }
        }
        <?php
        if ($staff) {
            ?>
            var shifts = <?php echo json_encode($shiftData); ?>;
            for (i = 0; i < shifts.length; i++) {
                events.push({
                    date: new Date(shifts[i]['start_time']),
                    eventName: "Shift Start",
                    className: "badge bg-primary",
                    onclick(e, data) {
                        console.log(data);
                    },
                    dateColor: "blue"
                });
                events.push({


                    date: new Date(shifts[i]['end_time']),
                    eventName: "Shift End",
                    className: "badge bg-primary",
                    onclick(e, data) {
                        console.log(data);
                    },
                    dateColor: "blue"
                });
            }
            <?php
        }
        ?>
        return events;
    }
    getHoliday()
</script>

</html>