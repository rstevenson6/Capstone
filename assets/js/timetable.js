//Data is stored in key-value pairs with the same naming as the database.
//Only difference is that the days are stored in their own object as booleans
var view_courses = [];
var new_courses = [];
var edit_courses = [];

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
            case "SA":
                days["sat"] = true;
                break;
            case "SU":
                days["sun"] = true;
                break;
            default:
                throw "Invalid day string! (M, Tu, W, Th, F, Sa, Su): " + day;
        }
    }
    return days;
}

function formatDays(day_obj) {
    day_string = "";

    if(day_obj["mon"]) {
        day_string += 'M, '
    }
    if(day_obj["tue"]) {
        day_string += 'TU, '
    }
    if(day_obj["wed"]) {
        day_string += 'W, '
    }
    if(day_obj["thu"]) {
        day_string += 'TH, '
    }
    if(day_obj["fri"]) {
        day_string += 'F, '
    }
    if(day_obj["sat"]) {
        day_string += 'SA, '
    }
    if(day_obj["sun"]) {
        day_string += 'SU, '
    }
    day_string = day_string.substring(0, day_string.length-2);
    return day_string
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

function intToTime(time) {

    if(time % 50 !== 0) {
        throw "Unusual Time: " + time;
    }

    var hours = Math.floor(time / 100);
    var minutes = (time - Math.floor(time / 100)*100) === 0 ? 0 : 30;

    return ('0'+hours).slice(-2) + ':' + ('0'+minutes).slice(-2) + ':00';
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

    view_courses = data;

    clearTimetable();
    displayTimetable();
}

// Takes an array of course objects
// Adds array of course to current course array and refresh timetable
function appendTimetable(data) {

    view_courses = view_courses.concat(data);

    clearTimetable();
    displayTimetable();
}

function displayTimetable() {
    for(var datum_idx in view_courses) {

        var datum = view_courses[datum_idx];
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
    view_courses = [];
    clearTimetable();
}

function courseInList(course, course_list) {
    for(var course_idx in course_list) {
        cur_course = course_list[course_idx];
        if(cur_course["subj"] === course["subj"] && cur_course["courseNo"] === course["courseNo"] && cur_course["section"] === course["section"]) {
            return course_idx;
        }
    }
    return -1;
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

        var cobj = jQuery.extend(true, {}, obj);
        cobj['days'] = formatDays(days);

        obj['days'] = days;
        obj["startTime"] = timeToInt(obj["startTime"]);
        obj["endTime"] = timeToInt(obj["endTime"]);

        course_idx = courseInList(cobj, new_courses);
        if(course_idx !== -1) {
            new_courses.splice(course_idx, 1);
        }
        new_courses.push(cobj);
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
        var datum = view_courses[datum_idx];
        for(var key in datum) {
            if(key === "days") {
                for(var dayKey in datum["days"]) {
                    $("input[name='" + dayKey + "']", form).prop("checked", datum["days"][dayKey]);
                }
                continue;
            }
            else if(key === "startTime" || key === "endTime") {
                $("input[name='" + key + "']", form).val(intToTime(datum[key]));
            }
            else {
                $("input[name='" + key + "']", form).val(datum[key]);
            }
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

        var cobj = jQuery.extend(true, {}, obj);
        cobj['days'] = formatDays(days);

        obj['days'] = days;
        obj["startTime"] = timeToInt(obj["startTime"]);
        obj["endTime"] = timeToInt(obj["endTime"]);

        var course_idx = courseInList(cobj, edit_courses);
        if(course_idx !== -1) {
            edit_courses.splice(course_idx, 1);
        }
        edit_courses.push(cobj);

        //Remove the course from the course data
        view_courses.splice(datum_idx, 1);
        clearCourseForm($("#course-edit"));
        //Add the new "edited" course to the course data and refresh timetable
        appendTimetable([obj]);
    });

    $('#save').click(function(){
        $.ajax({
            type: "POST",
            url: "/ajax/insertClasses",
            data: {classes: new_courses},
            success: function (result) {
                console.log(result);
                $.ajax({
                    type: "POST",
                    url: "/ajax/updateClasses",
                    data: {classes: edit_courses},
                    success: function (result) {
                        console.log(result);
                    }
                });
            }
        });
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
