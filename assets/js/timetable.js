var ex_data;

ex_data = [{
    subj: "COSC",
    courseNo: "419J",
    section: "L01",
    term: 1,
    actType: null,
    days: {"mon": false, "tue": true, "wed": false, "thu": true, "fri": false},
    startTime: 1200,
    endTime: 1450,
    instructor: "Scott Fazackerley",
    TAName: "Dilbert"
}];

function parseDays(day_string) {
    var arr = day_string.split(", ");
    var days = {"mon": false, "tue": false, "wed": false, "thu": false, "fri": false}
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
                throw "Invalid day string! (M, Tu, W, Th, F) " + arr;
        }
    }
    return days;
}

function timeToInt(time_string) {

    var match = /(\d{1,2}):(\d{2})/.exec(time_string);
    var first = match[1];
    var second = match[2];

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
            throw "Unusual Time";
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

function loadTimetable(data) {

    for(var datum_idx in data) {

        var datum = data[datum_idx];
        var duration = datum.endTime - datum.startTime;
        var blocks = duration / 50;

        console.log(datum.subj, datum.courseNo);
        console.log(datum);


        for(var day in datum.days) {

            if(!datum.days[day]) {
                continue;
            }

            for (var block = 0; block < blocks; block++) {

                var target = 'tr.hour_' + (datum.startTime + block*50) + ' td.' + day;
                if(blocks === 1) {
                    $(target).addClass('block block-single');
                }
                else if(block === 0) {
                    $(target).addClass('block block-top');
                }
                else if(block === blocks-1) {
                    $(target).addClass('block block-bot');
                }
                else {
                    $(target).addClass('block');
                }
                $(target).css("background-color", colorize(datum.subj, datum.courseNo, datum.section));
            }

            $('tr.hour_' + datum.startTime + ' td.' + day).text(datum.subj + ' ' + datum.courseNo + ' ' + datum.section);
        }
    }
}

$(document).ready(function(){
    $('#load-classes').click(function(){
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
                ex_data = result;
                loadTimetable(result);
            }
        });
    });
});