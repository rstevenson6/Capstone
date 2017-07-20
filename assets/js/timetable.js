var course_data = [];

function parseDays(day_string) {
    var arr = day_string.split(", ");
    var days = {"mon": false, "tue": false, "wed": false, "thu": false, "fri": false};
    for(var day in arr) {
        day = arr[day];

        switch (day.toUpperCase()) {
            case "M":
                days["mon"] = true;
                break;
            case "TU":
                days["tue"] = true;
                break;
            case "W":
                days["wed"] = true;
                break;
            case "TH":
                days["thu"] = true;
                break;
            case "F":
                days["fri"] = true;
                break;
            default:
                throw "Invalid day string! (M, Tu, W, Th, F) " + day;
        }
    }
    return days;
}

function timeToInt(time_string) {

    if(parseInt(time_string) % 50 === 0) {
        return parseInt(time_string);
    }

    var match = /(\d{1,2}):(\d{2})/.exec(time_string);
    var first = match[1];
    var second = match[2];

    // Just some weird conversion so I can easily use integers to match times
    // Can change later
    switch (second) {
        case "20":
        case "30":
            second = "50";
            break;
        case "50":
        case "00":
            second = "00";
            break;
        default:
            throw "Unusual Time: " + second;
    }

    return parseInt(first+second);
}

function colorize(subj, courseNo, section) {
    Math.seedrandom(subj);
    var hue = parseInt(Math.random()*360);

    Math.seedrandom(courseNo);
    var sat = parseInt(40+Math.random()*30);

    Math.seedrandom(section);
    var val = parseInt(70+Math.random()*30);

    var col = "hsv(" + hue + "," + sat + "%," + val + "%)";
    return colorcolor(col, "hex");
}

// Takes an array of course objects
function newTimetable(data) {

    course_data = data;

    clearTimetable();
    displayTimetable();
}

// Takes an array of course objects
function appendTimetable(data) {

    course_data = course_data.concat(data);

    clearTimetable();
    displayTimetable();
}

function displayTimetable() {
    for(var datum_idx in course_data) {

        var datum = course_data[datum_idx];
        var duration = datum.endTime - datum.startTime;
        var blocks = duration / 50;

        console.log(datum.subj, datum.courseNo);
        console.log(datum);


        for(var day in datum.days) {

            if(!datum.days[day]) {
                continue;
            }

            for (var block = 0; block < blocks; block++) {

                var cell = $('#timetable tr.hour_' + (datum.startTime + block*50) + ' td.' + day);

                cell.css("background-color", colorize(datum.subj, datum.courseNo, datum.section));
                cell.data('index', datum_idx);

                if(blocks === 1) {
                    cell.addClass('block block-single').text(datum.subj + ' ' + datum.courseNo + ' ' + datum.section);
                }
                else if(block === 0) {
                    cell.addClass('block block-top').text(datum.subj + ' ' + datum.courseNo + ' ' + datum.section);
                }
                else if(block === blocks-1) {
                    cell.addClass('block block-bot');
                }
                else {
                    cell.addClass('block');
                }
            }
        }
    }
}

function clearTimetable() {
    $('#timetable td').removeData('index').text('').css({'background-color': ''}).removeClass('block block-single block-top block-bot');
}

function deleteTimetable() {
    course_data = [];
    clearTimetable();
}

// Custom jQuery function
// Returns key-value pairs of input element's names and values
(function ( $ ) {

    $.fn.serializeObject = function() {
        var result = { };
        $.each(this.serializeArray(), function () {
            result[this.name] = this.value;
        });
        return result;
    };

}( jQuery ));


$(document).ready(function(){
    console.log("Ready");

    $('#load-courses').click(function(){
        $.ajax({
            type: "POST",
            url: "/ajax/getTermOneClasses",
            dataType: 'json',
            data: {name: "Fazackerley, Scott"},
            success: function(result){
                result = result.map(function(val) {
                    val["days"] = parseDays(val["days"]);
                    val["startTime"] = timeToInt(val["startTime"]);;
                    val["endTime"] = timeToInt(val["endTime"]);
                    return val;
                });
                newTimetable(result);
            }
        });
    });

    $('#wipe-courses').click(function () {
        deleteTimetable();
    });

    $('#course-entry').submit(function(event){
        event.preventDefault();

        var obj = $(this).serializeObject();

        var day_array = ['mon','tue','wed','thu','fri','sat','sun'];
        var days = {};

        for(var day_idx in day_array) {
            var day = day_array[day_idx];
            days[day] = (obj[day] === "true");

        }
        obj['days'] = days;
        obj["startTime"] = timeToInt(obj["startTime"]);
        obj["endTime"] = timeToInt(obj["endTime"]);

        appendTimetable([obj]);
    });

    $('#timetable td').click(function() {
        var datum_idx = $(this).data("index");
        if(datum_idx === undefined) { console.log("datum_idx undefined!"); return; }
        populateCourseForm($('#course-edit'), datum_idx);
    });

    function populateCourseForm(form, datum_idx) {
        var datum = course_data[datum_idx];
        for(var key in datum) {
            if(key === "days") {
                for(var dayKey in datum["days"]) {
                    $("input[name='" + dayKey + "']", form).prop("checked", datum["days"][dayKey]);
                }
                continue;
            }
            $("input[name='" + key + "']", form).val(datum[key]);
        }
        form.data('edit-index', datum_idx);
    }

    function clearCourseForm(form) {
        $("input[type='text']", form).val('');
        $("input[type='time']", form).val('');
        $("input[type='checkbox']").prop("checked", false);
        form.removeData('edit-index');
    }

    $("#course-edit input[name='cancel']").click(function() {
        clearCourseForm($("#course-edit"));
    });

    $("#course-edit").submit(function(event){
        event.preventDefault();
        console.log("Course-edit");
        var datum_idx = $(this).data('edit-index');
        console.log(datum_idx);
        if(datum_idx === undefined) { console.log("datum_idx undefined!"); return; }
        course_data.splice(datum_idx, 1);

        var obj = $(this).serializeObject();

        var day_array = ['mon','tue','wed','thu','fri','sat','sun'];
        var days = {};

        for(var day_idx in day_array) {
            var day = day_array[day_idx];
            days[day] = (obj[day] === "true");

        }
        obj['days'] = days;
        obj["startTime"] = timeToInt(obj["startTime"]);
        obj["endTime"] = timeToInt(obj["endTime"]);

        clearCourseForm($("#course-edit"));
        appendTimetable([obj]);
    });
});
