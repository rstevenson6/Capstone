<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset = "utf-8">
    <title>Timetable</title>
    <link rel="stylesheet" href="<?php echo asset_url(); ?>/css/timetable.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo asset_url(); ?>/js/seedrandom.min.js"></script>
    <script src="<?php echo asset_url(); ?>/js/colorcolor.min.js"></script>
    <script src="<?php echo asset_url(); ?>/js/timetable.js"></script>
</head>

<body>
<div id="modal">
    Bring to front:
    <table>
        <tbody>

        </tbody>
    </table>
</div>
<div id="main-container" class="container">
    <div id="left-container" class="container">
        <div id="timetable-menu">
            Timetable Menu
        </div>
        <div id="timetable-container" class="container">
            Timetable
            <table id="timetable">
                <tr>
                    <th class="hour">Hour</th>
                    <th class="mon weekday">Monday</th>
                    <th class="tue weekday">Tuesday</th>
                    <th class="wed weekday">Wednesday</th>
                    <th class="thu weekday">Thursday</th>
                    <th class="fri weekday">Friday</th>
                    <th class="sat weekend">Saturday</th>
                    <th class="sun weekend">Sunday</th>
                </tr>
                <tr class="hour hour_0 whole">
                    <th class="hour">0:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_50 half">
                    <th class="hour">0:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_100 whole">
                    <th class="hour">1:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_150 half">
                    <th class="hour">1:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_200 whole">
                    <th class="hour">2:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_250 half">
                    <th class="hour">2:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_300 whole">
                    <th class="hour">3:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_350 half">
                    <th class="hour">3:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_400 whole">
                    <th class="hour">4:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_450 half">
                    <th class="hour">4:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_500 whole">
                    <th class="hour">5:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_550 half">
                    <th class="hour">5:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_600 whole">
                    <th class="hour">6:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_650 half">
                    <th class="hour">6:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_700 whole">
                    <th class="hour">7:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_750 half">
                    <th class="hour">7:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_800 whole">
                    <th class="hour">8:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_850 half">
                    <th class="hour">8:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_900 whole">
                    <th class="hour">9:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_950 half">
                    <th class="hour">9:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1000 whole">
                    <th class="hour">10:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1050 half">
                    <th class="hour">10:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1100 whole">
                    <th class="hour">11:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1150 half">
                    <th class="hour">11:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1200 whole">
                    <th class="hour">12:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1250 half">
                    <th class="hour">12:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1300 whole">
                    <th class="hour">13:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1350 half">
                    <th class="hour">13:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1400 whole">
                    <th class="hour">14:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1450 half">
                    <th class="hour">14:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1500 whole">
                    <th class="hour">15:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1550 half">
                    <th class="hour">15:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1600 whole">
                    <th class="hour">16:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1650 half">
                    <th class="hour">16:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1700 whole">
                    <th class="hour">17:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1750 half">
                    <th class="hour">17:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1800 whole">
                    <th class="hour">18:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1850 half">
                    <th class="hour">18:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1900 whole">
                    <th class="hour">19:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_1950 half">
                    <th class="hour">19:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_2000 whole">
                    <th class="hour">20:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_2050 half">
                    <th class="hour">20:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_2100 whole">
                    <th class="hour">21:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_2150 half">
                    <th class="hour">21:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_2200 whole">
                    <th class="hour">22:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_2250 half">
                    <th class="hour">22:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_2300 whole">
                    <th class="hour">23:00</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
                <tr class="hour hour_2350 half">
                    <th class="hour">23:30</th>
                    <td class="mon weekday"></td>
                    <td class="tue weekday"></td>
                    <td class="wed weekday"></td>
                    <td class="thu weekday"></td>
                    <td class="fri weekday"></td>
                    <td class="sat weekend"></td>
                    <td class="sun weekend"></td>
                </tr>
            </table>
        </div>
    </div>
    <div id="right-container" class="container">
        Course Menu
        <br>
        <button onclick="location.href='<?= base_url().'upload' ?>'">
            Import Excel
        </button>
        <button onclick="location.href='<?= base_url().'excel/export' ?>'">
            Export Excel
        </button>
        <br><br>
        <button id="load-courses">
            Load Example Courses
        </button>
        <button id="wipe-courses">
            Wipe Timetable
        </button>
        <br><br>
        <select id="instructor-list">
            <option value="">None</option>
        </select>
        <br>
        <button id="load-instructor">
            Load Instructor
        </button>
        <br><br>
        <select id="TA-list">
            <option value="">None</option>
        </select>
        <br>
        <button id="load-TA">
            Load TA
        </button>
        <br><br>
        <div id="course-menu">
            <h2>
                Manual Entry
            </h2>
            <form id="course-entry">

                <input id="subj1" placeholder="COSC" type="text" name="subj">
                <label for="subj1">Subject</label><br>

                <input id="courseNo1" placeholder="419J" type="text" name="courseNo">
                <label for="courseNo1">Course Number</label><br>

                <input id="section1" placeholder="L01" type="text" name="section">
                <label for="section1">Section</label><br>

                <input id="actType1" placeholder="LAB" type="text" name="actType">
                <label for="actType1">Activity Type</label><br>

                <input id="instructor1" placeholder="Fazackerley, Scott" type="text" name="instructor">
                <label for="instructor1">Instructor</label><br>

                <input id="TAName1" placeholder="Teacher, Assistant" type="text" name="TAName">
                <label for="TAName1">TA Name</label><br>

                <input id="term1" placeholder="2" type="number" min="1" max="3" name="term">
                <label for="term1">Term</label><br>

                <input id="startTime1" placeholder="14:00" type="time" name="startTime">
                <label for="startTime1">Start</label><br>

                <input id="endTime1" placeholder="15:30" type="time" name="endTime">
                <label for="endTime1">End</label><br>

                <input id="mon1" type="checkbox" name="mon" >
                <label for="mon1">mon</label><br>

                <input id="tue1" type="checkbox" name="tue" >
                <label for="tue1">tue</label><br>

                <input id="wed1" type="checkbox" name="wed" >
                <label for="wed1">wed</label><br>

                <input id="thu1" type="checkbox" name="thu" >
                <label for="thu1">thu</label><br>

                <input id="fri1" type="checkbox" name="fri" >
                <label for="fri1">fri</label><br>

                <input id="sat1" type="checkbox" name="sat" >
                <label for="sat1">sat</label><br>

                <input id="sun1" type="checkbox" name="sun" >
                <label for="sun1">sun</label><br>

                <input type="submit" name="submit"><br>
            </form>
        </div>
        <br>
        <div id="edit-menu">
            <h2>
                Edit Selected Course
            </h2>
            <form id="course-edit">

                <input id="subj2" placeholder="COSC" type="text" name="subj">
                <label for="subj2">Subject</label><br>

                <input id="courseNo2" placeholder="419J" type="text" name="courseNo">
                <label for="courseNo2">Course Number</label><br>

                <input id="section2" placeholder="L01" type="text" name="section">
                <label for="section2">Section</label><br>

                <input id="actType2" placeholder="LAB" type="text" name="actType">
                <label for="actType2">Activity Type</label><br>

                <input id="instructor2" placeholder="Fazackerley, Scott" type="text" name="instructor">
                <label for="instructor2">Instructor</label><br>

                <input id="TAName2" placeholder="Teacher, Assistant" type="text" name="TAName">
                <label for="TAName2">TA Name</label><br>

                <input id="term2" placeholder="2" type="number" min="1" max="3" name="term">
                <label for="term2">Term</label><br>

                <input id="startTime2" placeholder="14:00" type="time" name="startTime">
                <label for="startTime2">Start</label><br>

                <input id="endTime2" placeholder="15:30" type="time" name="endTime">
                <label for="endTime2">End</label><br>

                <input id="mon2" type="checkbox" name="mon" >
                <label for="mon2">mon</label><br>

                <input id="tue2" type="checkbox" name="tue" >
                <label for="tue2">tue</label><br>

                <input id="wed2" type="checkbox" name="wed" >
                <label for="wed2">wed</label><br>

                <input id="thu2" type="checkbox" name="thu" >
                <label for="thu2">thu</label><br>

                <input id="fri2" type="checkbox" name="fri" >
                <label for="fri2">fri</label><br>

                <input id="sat2" type="checkbox" name="sat" >
                <label for="sat2">sat</label><br>

                <input id="sun2" type="checkbox" name="sun" >
                <label for="sun2">sun</label><br>

                <input id="delete" type="checkbox" name="delete" >
                <label for="delete">Delete?</label><br>

                <input type="hidden" name="index" value="">
                <input type="submit" name="submit"><input type="button" name="cancel" value="Cancel"><br>
            </form>
        </div>
        <button id="save">
            Save to DB
        </button>
    </div>
</div>
</body>

</html>
