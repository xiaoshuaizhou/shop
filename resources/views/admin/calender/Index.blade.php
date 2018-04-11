@include('./../../layouts/sidebar');


<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper">
            <div class="row-fluid calendar-wrapper">
                <div class="span12">

                    <!-- div that fullcalendar plugin uses  -->
                    <div id='calendar'></div>

                    <!-- edit image pop up -->
                    <div class="new-event popup">
                        <div class="pointer">
                            <div class="arrow"></div>
                            <div class="arrow_border"></div>
                        </div>
                        <i class="close-pop table-delete"></i>
                        <h5>New event popup example</h5>
                        <div class="field">
                            Date:
                            <span class="date">Thu, 18 April</span>
                        </div>
                        <div class="field">
                            Event:
                            <input type="text" class="event-input" />
                        </div>
                        <input type="submit" value="Create" class="btn-glow primary" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->


<!-- scripts for this page -->
<script src="js/jquery-latest.js"></script>
<script src="js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src='js/fullcalendar.min.js'></script>
<script src="js/theme.js"></script>

<!-- builds fullcalendar example -->
<script>
    $(document).ready(function() {

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
            header: {
                left: 'month,agendaWeek,agendaDay',
                center: 'title',
                right: 'today prev,next'
            },
            selectable: true,
            selectHelper: true,
            editable: true,
            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1)
                },
                {
                    title: 'Long Event',
                    start: new Date(y, m, d-5),
                    end: new Date(y, m, d-2)
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d-3, 16, 0),
                    allDay: false
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d+4, 16, 0),
                    allDay: false
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d+1, 19, 0),
                    end: new Date(y, m, d+1, 22, 30),
                    allDay: false
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/'
                }
            ],
            eventBackgroundColor: '#278ccf'
        });

        // handler to close the new event popup just for displaying purposes
        // more documentation for fullcalendar on http://arshaw.com/fullcalendar/
        $(".popup .close-pop").click(function () {
            $(".new-event").fadeOut("fast");
        });
    });
</script>

</body>
</html>