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
                <input type="text" name="subj">Subject<br>
                <input type="text" name="courseNo">Course Number<br>
                <input type="text" name="section">Section<br>
                <input type="text" name="actType">Activity Type<br>
                <input type="text" name="instructor">Instructor<br>
                <input type="text" name="TAName">TA Name<br>
                <input type="text" name="term">Term<br>
                <input type="time" name="startTime">Start<br>
                <input type="time" name="endTime">End<br>
                <input type="checkbox" name="mon" >mon<br>
                <input type="checkbox" name="tue" >tue<br>
                <input type="checkbox" name="wed" >wed<br>
                <input type="checkbox" name="thu" >thu<br>
                <input type="checkbox" name="fri" >fri<br>
                <input type="checkbox" name="sat" >sat<br>
                <input type="checkbox" name="sun" >sun<br>
                <input type="submit" name="submit"><br>
            </form>
        </div>
        <br>
        <div id="edit-menu">
            <h2>
                Edit Selected Course
            </h2>
            <form id="course-edit">
                <input type="text" name="subj">Subject<br>
                <input type="text" name="courseNo">Course Number<br>
                <input type="text" name="section">Section<br>
                <input type="text" name="actType">Activity Type<br>
                <input type="text" name="instructor">Instructor<br>
                <input type="text" name="TAName">TA Name<br>
                <input type="text" name="term">Term<br>
                <input type="time" name="startTime">Start<br>
                <input type="time" name="endTime">End<br>
                <input type="checkbox" name="mon" >mon<br>
                <input type="checkbox" name="tue" >tue<br>
                <input type="checkbox" name="wed" >wed<br>
                <input type="checkbox" name="thu" >thu<br>
                <input type="checkbox" name="fri" >fri<br>
                <input type="checkbox" name="sat" >sat<br>
                <input type="checkbox" name="sun" >sun<br>
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
