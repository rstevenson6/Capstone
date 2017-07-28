//Data is stored in key-value pairs with the same naming as the database.
//Only difference is that the days are stored in their own object as booleans
var course_data = [];

function parseDays(day_string) {
    var arr = day_string.split(", ");
    var days = {"mon": false, "tue": false, "wed": false, "thu": false, "fri": false, "sat": false, "sun": false};
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
    var hueR = Math.random();
    Math.seedrandom(subj + courseNo);
    var satR = Math.random();
    Math.seedrandom(subj + courseNo + section);
    var valR = Math.random();

    var hue = parseInt(hueR*360);

    var sat = parseInt(40+satR*30);

    var val = parseInt(70+valR*30);

    var col = "hsv(" + hue + "," + sat + "%," + val + "%)";
    return colorcolor(col, "hex");
}

// Takes an array of course objects
// Overwrite course data and refresh timetable
function newTimetable(data) {

    course_data = data;

    clearTimetable();
    displayTimetable();
}

// Takes an array of course objects
// Adds array of course to current course array and refresh timetable
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

        //Iterate through the days
        for(var day in datum.days) {

            //If the day is not set, or false, skip.
            if(!datum.days[day]) {
                continue;
            }

            //Style each half-hour "block"
            for (var block = 0; block < blocks; block++) {

                var cell = $('#timetable tr.hour_' + (datum.startTime + block*50) + ' td.' + day);

                //Set seeded color
                cell.css("background-color", colorize(datum.subj, datum.courseNo, datum.section));
                //Store index to course data for future reference
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

//Clear timetable but retain course data
function clearTimetable() {
    $('#timetable td').removeData('index').text('').css({'background-color': ''}).removeClass('block block-single block-top block-bot');
}

//Clear timetable and delete course data
function deleteTimetable() {
    course_data = [];
    clearTimetable();
}

// Change to jquery serializeArray to return all checkboxes as true/false
(function ( $ ) {
    var originalSerializeArray = $.fn.serializeArray;
    $.fn.extend({
        serializeArray: function () {
            var brokenSerialization = originalSerializeArray.apply(this);
            var checkboxValues = $(this).find('input[type=checkbox]').map(function () {
                return { 'name': this.name, 'value': this.checked };
            }).get();
            var checkboxKeys = $.map(checkboxValues, function (element) { return element.name; });
            var withoutCheckboxes = $.grep(brokenSerialization, function (element) {
                return $.inArray(element.name, checkboxKeys) == -1;
            });

            return $.merge(withoutCheckboxes, checkboxValues);
        }
    });
}( jQuery ));

// Custom jQuery function
// Returns key-value pairs of a form's input element's names and values
(function ( $ ) {

    $.fn.serializeObject = function() {
        var result = { };
        $.each(this.serializeArray(), function () {
            result[this.name] = this.value;
        });
        console.log('fn');
        console.log(this.serializeArray());
        return result;
    };

}( jQuery ));

//Wait for document load
$(document).ready(function(){

    //Load example courses on click
    $('#load-courses').click(function(){
        $.ajax({
            type: "POST",
            url: "/ajax/getTermOneClasses",
            dataType: 'json',
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

    //Manual entry form submission
    $('#course-entry').submit(function(event){
        event.preventDefault();

        //Get form fields as key(name attribute)-value pairs
        var obj = $(this).serializeObject();

        var day_array = ['mon','tue','wed','thu','fri','sat','sun'];
        var days = {};

        //Populate a "day" object to follow the structure of the course objects
        for(var day_idx in day_array) {
            var day = day_array[day_idx];
            days[day] = obj[day];
            delete obj[day];
        }
        obj['days'] = days;
        obj["startTime"] = timeToInt(obj["startTime"]);
        obj["endTime"] = timeToInt(obj["endTime"]);

        appendTimetable([obj]);
    });

    //Edit course on click
    $('#timetable td').click(function() {
        var datum_idx = $(this).data("index");
        console.log(datum_idx);
        if(datum_idx === undefined) { console.log("datum_idx undefined!"); return; }
        populateCourseForm($('#course-edit'), datum_idx);
        $('#edit-menu').slideDown();
        $('#course-menu').slideUp();
    });

    //Populates a form with course data
    //Form must have fields named the same as the db
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
        $('#edit-menu').slideUp();
        $('#course-menu').slideDown();
        clearCourseForm($("#course-edit"));
    });

    //Course edit form submission
    $("#course-edit").submit(function(event){
        event.preventDefault();

        //Close form
        $('#edit-menu').slideUp();
        $('#course-menu').slideDown();

        //Check to see if the index to the course data is defined on form
        var datum_idx = $(this).data('edit-index');
        if(datum_idx === undefined) { console.log("datum_idx undefined!"); return; }

        //Get form inputs as key-value pairs
        var obj = $(this).serializeObject();
        console.log("OBJ");
        console.log(obj);

        var day_array = ['mon','tue','wed','thu','fri','sat','sun'];
        var days = {};

        for(var day_idx in day_array) {
            var day = day_array[day_idx];
            days[day] = obj[day];
            delete obj[day];
        }
        obj['days'] = days;
        obj["startTime"] = timeToInt(obj["startTime"]);
        obj["endTime"] = timeToInt(obj["endTime"]);


        //Remove the course from the course data
        course_data.splice(datum_idx, 1);
        clearCourseForm($("#course-edit"));
        //Add the new "edited" course to the course data and refresh timetable
        appendTimetable([obj]);
    });

    // Populate select with profs
    $.ajax({
        type: "POST",
        url: "/ajax/getProfs",
        dataType: 'json',
        success: function(result) {
            var prof_select = $('#instructor-list');
            for(var obj_idx in result) {
                var prof = result[obj_idx]["name"];
                prof_select.append($('<option>', {
                    value: prof,
                    text: prof
                }));
            }
        }
    });

    // Populate select with TAs
    $.ajax({
        type: "POST",
        url: "/ajax/getTAs",
        dataType: 'json',
        success: function(result) {
            var TA_select = $('#TA-list');
            for(var obj_idx in result) {
                var TA = result[obj_idx]["name"];
                TA_select.append($('<option>', {
                    value: TA,
                    text: TA
                }));
            }
        }
    });

    //Load instructor courses on click
    $('#load-instructor').click(function(){
        $.ajax({
            type: "POST",
            url: "/ajax/getProfClasses",
            dataType: 'json',
            data: {name: $('#instructor-list').val()},
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

    //Load TA courses on click
    $('#load-TA').click(function(){
        $.ajax({
            type: "POST",
            url: "/ajax/getTAClasses",
            dataType: 'json',
            data: {name: $('#TA-list').val()},
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
});
