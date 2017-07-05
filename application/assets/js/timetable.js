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

function loadTimetable(timetable, data) {
    console.log("load");
    for(var datum_idx in data) {
        console.log("datum");
        var datum = data[datum_idx];
        var startHour = parseInt(datum.startTime / 100);
        var halfHour = datum.startTime % 100 !== 0;
        var duration = datum.endTime - datum.startTime;
        var blocks = duration / 50;

        for(var day in datum.days) {

            console.log(day);
            if(!datum.days[day]) {
                continue;
            }

            console.log("blocks: " + blocks);
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
                $('tr.hour_' + datum.startTime + ' td.' + day).text("ATTT");
            }
        }
    }
}