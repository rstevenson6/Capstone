<!DOCTYPE html>
<?php
$this->load->database();
$query = LoadClasses();


foreach ($query->result() as $row) {

    $subj = $row->subj;
    $subj = strtoupper($subj);
    $courseNo = $row->courseNo;
    $section= $row->section;

    $ANTH = array();
    $BIOL = array();
    $CHEM = array();
    $PSYC = array();
    $COSC = array();
    $MATH = array();
    $PHYS = array();
    $STAT = array();
    $HIST = array();
    $SOCI = array();
    $EESC = array();
    $ECON = array();
    $PHIL = array();
    $POLI = array();

    if (strcmp($subj, "ANTH")) {
        $ANTH [] = $courseNo;
    } elseif (strcmp($subj, "INDG")) {
        $INDG [] = $courseNo;
    } elseif (strcmp($subj, "BIOL")) {
        $CHEM  [] = $courseNo;
    } elseif (strcmp($subj, "CHEM")) {
        $CHEM [] = $courseNo;
    } elseif (strcmp($subj, "PSYC")) {
        $PSYC [] = $courseNo;
    } elseif (strcmp($subj, "COSC")) {
        $COSC [] = $courseNo;
    } elseif (strcmp($subj, "MATH")) {
        $MATH [] = $courseNo;
    } elseif (strcmp($subj, "PHYS")) {
        $PHYS [] = $courseNo;
    } elseif (strcmp($subj, "STAT")) {
        $STAT [] = $courseNo;
    } elseif (strcmp($subj, "HIST")) {
        $HIST [] = $courseNo;
    } elseif (strcmp($subj, "SOCI")) {
        $SOCI [] = $courseNo;
    } elseif (strcmp($subj, "EESC")) {
        $EESC [] = $courseNo;
    } elseif (strcmp($subj, "ECON")) {
        $ECON [] = $courseNo;
    } elseif (strcmp($subj, "PHIL")) {
        $PHIL [] = $courseNo;
    } elseif (strcmp($subj, "POLI")) {
        $POLI [] = $courseNo;
    }

}

?>

<html>
<head>
    <style>

    </style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<ul class="accordion">
    <li>
        <div>
            <input type="checkbox"/><a href="#">UNIT 1</a>
        </div>
        <ul class="accordion">
            <li>
                <div>
                    <input type="checkbox"/><a href="#">ANTH</a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>
            <li>
                <div>
                    <input type="checkbox"/><a href="#">GWST</a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>
            <li>
                <div>
                    <input type="checkbox"/><a href="#">GEOG </a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>
                </ul>
            <li>
                <div>
                    <input type="checkbox"/><a href="#">INDG </a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>
            </li>
            </li>

        </ul>
    <li>
        <div>
            <input type="checkbox"/><a href="#">UNIT 2</a>
        </div>
        <ul class="accordion">
            <li>
                <div>
                    <input type="checkbox"/><a href="#">BIOL </a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>

            </li>
            </li>
            </li>


        </ul>
    <li>
        <div>
            <input type="checkbox"/><a href="#">UNIT 3</a>
        </div>
        <ul class="accordion">
            <li>
                <div>
                    <input type="checkbox"/><a href="#">CHEM </a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>

            </li>
            </li>

        </ul>
    <li>
        <div>
            <input type="checkbox"/><a href="#">UNIT 4</a>
        </div>
        <ul class="accordion">
            <li>
                <div>
                    <input type="checkbox"/><a href="#">PSYC </a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>

            </li>
            </li>

        </ul>
    <li>
        <div>
            <input type="checkbox"/><a href="#">UNIT 5</a>
        </div>
        <ul class="accordion">
            <li>
                <div>
                    <input type="checkbox"/><a href="#">COSC</a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>
            <li>
                <div>
                    <input type="checkbox"/><a href="#">MATH </a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>
            <li>
                <div>
                    <input type="checkbox"/><a href="#">PHYS </a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>
                </ul>
            <li>
                <div>
                    <input type="checkbox"/><a href="#">STAT </a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>
            </li>
            </li>

        </ul>
    <li>
        <div>
            <input type="checkbox"/><a href="#">UNIT 6</a>
        </div>
        <ul class="accordion">
            <li>
                <div>
                    <input type="checkbox"/><a href="#">HIST </a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>
            <li>
                <div>
                    <input type="checkbox"/><a href="#">SOCI </a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>

            </li>
            </li>

        </ul>
    <li>
        <div>
            <input type="checkbox"/><a href="#">UNIT 7</a>
        </div>
        <ul class="accordion">
            <li>
                <div>
                    <input type="checkbox"/><a href="#">EESC </a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>

            </li>
            </li>

        </ul>
    <li>
        <div>
            <input type="checkbox"/><a href="#">UNIT 8</a>
        </div>
        <ul class="accordion">
            <li>
                <div>
                    <input type="checkbox"/><a href="#">ECON </a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>
            <li>
                <div>
                    <input type="checkbox"/><a href="#">PHIL </a>
                </div>
                <ul class="accordion">
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">100</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">100 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">200</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">200 level course</a>
                                </div>
                            </li>
                        </ul>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">300</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">300 level course</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div>
                            <input type="checkbox"/><a href="#">400</a>
                        </div>
                        <ul class="accordion">
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <input type="checkbox"/><a href="#">400 level course</a>
                                </div>
                            </li>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>

            <div>
                <input type="checkbox"/><a href="#">POLI </a>
            </div>
            <ul class="accordion">
                <li>
                    <div>
                        <input type="checkbox"/><a href="#">100</a>
                    </div>
                    <ul class="accordion">
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">100 level course</a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">100 level course</a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">100 level course</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <div>
                        <input type="checkbox"/><a href="#">200</a>
                    </div>
                    <ul class="accordion">
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">200 level course</a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">200 level course</a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">200 level course</a>
                            </div>
                        </li>
                    </ul>
                <li>
                    <div>
                        <input type="checkbox"/><a href="#">300</a>
                    </div>
                    <ul class="accordion">
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">300 level course</a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">300 level course</a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">300 level course</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <div>
                        <input type="checkbox"/><a href="#">400</a>
                    </div>
                    <ul class="accordion">
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">400 level course</a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">400 level course</a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">400 level course</a>
                            </div>
                        </li>
                        </li>

                    </ul>
                </li>

            </ul>
            </li>
            </li>
            </li>

        </ul>


</ul>


</li>
</li>
</li>
</li>


<script type="text/javascript">
    $(".accordion > li > div").click(function (e) {
        if ($(e.target).is('input')) {
            return
        }
        $('.active').not(this).removeClass('active').next().slideUp(300);
        $(this).toggleClass('active');
        if (false == $(this).next().is(':visible')) {
            $('.accordion > ul').slideUp(300);
        }
        $(this).next().slideToggle(300);
    });
    $('li :checkbox').on('click', function () {
        var $chk = $(this),
            $li = $chk.closest('li'),
            $ul, $parent;
        if ($li.has('ul')) {
            $li.find(':checkbox').not(this).prop('checked', this.checked);


        }
        do {
            $ul = $li.parent();
            $parent = $ul.siblings(':checkbox');
            if ($chk.is(':checked')) {
                $parent.prop('checked', $ul.has(':checkbox:not(:checked)').length == 0)
            } else {
                $parent.prop('checked', false)
            }
            $chk = $parent;
            $li = $chk.closest('li');
        } while ($ul.is(':not(.someclass)'));
    });
</script>
</body>
</html>