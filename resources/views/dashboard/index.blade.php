@extends('layouts.default')

@section('title', 'Dashboard')

@section('conteudo')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/images/layout/icon_arpa.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/template.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <style>
        .bold-font {
            font-weight: bold;
        }
        .card-icon {
            font-size: 2rem;
            float: right;
            margin-right: 10px;
            margin-top: -5px;
        }
        .fade-in {
            animation: fadeIn 1s;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <h1 class="mb-3">Dashboard<i class="bi bi-house bi-2x card-icon text-white"></i></h1>
    <div class="row">
        <!-- Cards Superiores -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary text-white shadow h-100 py-2 fade-in bg-primary">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1 bold-font">
                        Alunos
                        <i class="bi bi-person bi-2x card-icon text-white"></i>
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-white">#</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success text-white shadow h-100 py-2 fade-in bg-success">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1 bold-font">
                        Professores
                        <i class="bi bi-people bi-2x card-icon text-white"></i>
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-white">#</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning text-white shadow h-100 py-2 fade-in bg-warning">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1 bold-font">
                        Funcionários
                        <i class="bi bi-people bi-2x card-icon text-white"></i>
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-white">#</div>
                </div>
            </div>
        </div>
    </div>

    <div id='wrap' >
        <div id='calendar' class="container"></div>
        <div style='clear:both'></div>
    </div>

    <!-- Inclua os arquivos JS da biblioteca FullCalendar e seu próprio código JavaScript para inicializar o calendário. -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="js/calendar.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>

    <script>
        $(document).ready(function() {
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            /*  className colors
            className: default(transparent), important(red), chill(pink), success(green), info(blue)
            */

            /* initialize the external events
            -----------------------------------------------------------------*/
            $('#external-events div.external-event').each(function() {
                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                };
                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject);
                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });
            });

            /* initialize the calendar
            -----------------------------------------------------------------*/
            var calendar = $('#calendar').fullCalendar({
                header: {
                    left: 'title',
                    center: 'agendaDay,agendaWeek,month',
                    right: 'prev,next today'
                },
                editable: true,
                firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
                selectable: true,
                defaultView: 'month',
                axisFormat: 'h:mm',
                columnFormat: {
                    month: 'ddd',    // Mon
                    week: 'ddd d', // Mon 7
                    day: 'dddd M/d',  // Monday 9/7
                    agendaDay: 'dddd d'
                },
                titleFormat: {
                    month: 'MMMM yyyy', // September 2009
                    week: "MMMM yyyy", // September 2009
                    day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
                },
                allDaySlot: false,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var title = prompt('Event Title:');
                    if (title) {
                        calendar.fullCalendar('renderEvent', {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        }, true);
                    }
                    calendar.fullCalendar('unselect');
                },
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function(date, allDay) { // this function is called when something is dropped
                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');
                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);
                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
                events: [
                    {
                        title: 'All Day Event',
                        start: new Date(y, m, 1)
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d - 3, 16, 0),
                        allDay: false,
                        className: 'info'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d + 4, 16, 0),
                        allDay: false,
                        className: 'info'
                    },
                    {
                        title: 'Meeting',
                        start: new Date(y, m, d, 10, 30),
                        allDay: false,
                        className: 'important'
                    },
                    {
                        title: 'Lunch',
                        start: new Date(y, m, d, 12, 0),
                        end: new Date(y, m, d, 14, 0),
                        allDay: false,
                        className: 'important'
                    },
                    {
                        title: 'Birthday Party',
                        start: new Date(y, m, d + 1, 19, 0),
                        end: new Date(y, m, d + 1, 22, 30),
                        allDay: false,
                    },
                    {
                        title: 'Click for Google',
                        start: new Date(y, m, 28),
                        end: new Date(y, m, 29),
                        url: 'https://ccp.cloudaccess.net/aff.php?aff=5188',
                        className: 'success'
                    }
                ],
            });
        });
    </script>
</body>
</html>
@endsection
