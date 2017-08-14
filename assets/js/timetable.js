//Data is stored in key-value pairs with the same naming as the database.
//Only difference is that the days are stored in their own object as booleans
var view_courses = [];
var diff_courses = [];

function parseDays(day_string) {
    // Backwards compatibility stuff
    var arr = day_string.split(", ");
    if(arr.length === 1) {
        arr = day_string.split("");
    }
    var days = {"mon": false, "tue": false, "wed": false, "thu": false, "fri": false, "sat": false, "sun": false};
    for(var day in arr) {
        day = arr[day];

        switch (day.toUpperCase()) {
            case "M":
                days["mon"] = true;
                break;
            case "T":
            case "TU":
                days["tue"] = true;
                break;
            case "W":
                days["wed"] = true;
                break;
            case "R":
            case "TH":
                days["thu"] = true;
                break;
            case "F":
                days["fri"] = true;
                break;
            case "S":
            case "SA":
                days["sat"] = true;
                break;
            case "N":
            case "SU":
                days["sun"] = true;
                break;
            default:
                throw "Invalid day string! (M, T, W, R, F, S, N): " + day;
        }
    }
    return days;
}

function formatDays(day_obj) {
    var day_string = "";

    if(day_obj["mon"]) {
        day_string += 'M'
    }
    if(day_obj["tue"]) {
        day_string += 'T'
    }
    if(day_obj["wed"]) {
        day_string += 'W'
    }
    if(day_obj["thu"]) {
        day_string += 'R'
    }
    if(day_obj["fri"]) {
        day_string += 'F'
    }
    if(day_obj["sat"]) {
        day_string += 'S'
    }
    if(day_obj["sun"]) {
        day_string += 'N'
    }
    return day_string
}

function timeToInt(time_string) {

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
            window.alert('Times should be on half-hour intervals');
            throw "Unusual Time: " + first + ':' + second;
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

        datum["elements"] = [];

        //Iterate through the days
        for(var day in datum.days) {

            //If the day is not set, or false, skip.
            if(!datum.days[day]) {
                continue;
            }

            datum["elements"].push([]);

            //Style each half-hour "block"
            for (var block = 0; block < blocks; block++) {

                var cell = $('#timetable tr.hour_' + (datum.startTime + block*50) + ' td.' + day);

                //Add cell to data for future reference
                datum["elements"][datum["elements"].length-1].push(cell);

                if(cell.data('index') === undefined) {
                    cell.data('index', []);
                }
                cell.text('').css({'background-color': ''}).removeClass('block block-single block-top block-bot');

                //Set seeded color
                cell.css("background-color", colorize(datum.subj, datum.courseNo, datum.section));
                //Store index to course data for future reference
                cell.data('index').push(datum_idx);

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
                    val["startTime"] = timeToInt(val["startTime"]);
                    val["endTime"] = timeToInt(val["endTime"]);
                    val["elements"] = [];
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

        course_idx = courseInList(cobj, diff_courses);
        if(course_idx !== -1) {
            diff_courses.splice(course_idx, 1);
        }
        cobj["type"] = "insert"
        diff_courses.push(cobj);
        appendTimetable([obj]);
    });

    //Edit course on click
    $('#timetable td').click(function() {
        var data_idx_array = $(this).data("index");
        var datum_idx = data_idx_array[data_idx_array.length-1];
        if(datum_idx === undefined) { console.log("datum_idx undefined!"); return; }
        populateCourseForm($('#course-edit'), datum_idx);
        $('#edit-menu').slideDown();
        $('#course-menu').slideUp();
    });

    //Show border shadow on hover to indicate clickability
    $('#timetable td').hover(function(){
        var datum_idx_array = $(this).data('index');
        if(datum_idx_array === undefined) { return; }
        var datum_idx = datum_idx_array[datum_idx_array.length-1];
        var element_groups = view_courses[datum_idx]["elements"];

        // Go through each group of cells for each class time
        for(var element_group_idx in element_groups) {
            // Through the cell elements within in class/grouping
            for(var element_idx in element_groups[element_group_idx]) {
                var element = element_groups[element_group_idx][element_idx];

                if(element_groups[element_group_idx].length === 1) {
                    element.css('border-top-style', 'solid');
                    element.css('border-bottom-style', 'solid');
                }
                else if(element_idx == 0) {
                    element.css('border-top-style', 'solid');
                    element.css('border-bottom-style', 'none');
                }
                else if(element_idx == element_groups[element_group_idx].length-1) {
                    element.css('border-top-style', 'none');
                    element.css('border-bottom-style', 'solid');
                }

                element.css('border-width', '3px');
            }
        }
    }, function(){
        var datum_idx_array = $(this).data('index');
        if(datum_idx_array === undefined) { return; }
        var datum_idx = datum_idx_array[datum_idx_array.length-1];
        var element_groups = view_courses[datum_idx]["elements"];

        for(var element_group_idx in element_groups) {
            for(var element_idx in element_groups[element_group_idx]) {
                var element = element_groups[element_group_idx][element_idx];
                element.css('border-width', '1px');
                element.css('border-top-style', '');
                element.css('border-bottom-style', '');
            }
        }
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

    function closeEditForm() {
        $('#edit-menu').slideUp();
        $('#course-menu').slideDown();
        clearCourseForm($('#course-edit'));
    }

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
        obj["elements"] =[];

        clearCourseForm($("#course-edit"));

        if(!obj["delete"]) {
          cobj["type"] = "update";
          diff_courses.push(cobj);
          //Remove the old course from the view to avoid a duplicate
          view_courses.splice(datum_idx, 1);
          appendTimetable([obj]);
        }
        else {
          cobj["type"] = "delete";
          diff_courses.push(cobj);
          view_courses.splice(datum_idx, 1);
          newTimetable(view_courses);
        }
    });

    $('input[name=cancel]').click(function(){
        closeEditForm();
    });

    $('#save').click(function(){
        $.ajax({
            type: "POST",
            url: "/ajax/pushClasses",
            data: {classes: diff_courses},
            success: function (result) {
                console.log(result);
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
