#SEE LINE 88
<!DOCTYPE html>
<html>
<head>
    <style>

    </style>
</head>
<body>

<?php
$this->load->database();
$query = LoadClasses();

$ANTH = array();
$ASTR = array();
$GWST = array();
$GEOG = array();
$BIOL = array();
$SUST = array();
$BIOC = array();
$CHEM = array();
$PSYC = array();
$COSC = array();
$MATH = array();
$MDST = array();
$PHYS = array();
$STAT = array();
$DATA = array();
$HIST = array();
$SOCI = array();
$EESC = array();
$ECON = array();
$PHIL = array();
$POLI = array();
$OTHER = array();

foreach ($query->result() as $row) {

    $subj = $row->subj;
    $subj = strtoupper($subj);
    $courseNo = $row->courseNo;
    $section = $row->section;


    if (strcmp($subj, "ANTH")) {
        $ANTH [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "ASTR")) {
        $ASTR [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "GWST")) {
        $GWST [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "GEOG")) {
        $GEOG [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "INDG")) {
        $INDG [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "BIOL")) {
        $BIOL  [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "BIOC")) {
        $BIOC [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "SUST")) {
        $SUST [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "CHEM")) {
        $CHEM [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "PSYC")) {
        $PSYC [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "COSC")) {
        $COSC [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "MATH")) {
        $MATH [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "MDST")) {
        $MDST [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "PHYS")) {
        $PHYS [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "STAT")) {
        $STAT [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "DATA")) {
        $DATA [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "HIST")) {
        $HIST [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "SOCI")) {
        $SOCI [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "EESC")) {
        $EESC [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "ECON")) {
        $ECON [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "PHIL")) {
        $PHIL [] = $courseNo . " " . $section;
    } elseif (strcmp($subj, "POLI")) {
        $POLI [] = $courseNo . " " . $section;
    } else {
        $OTHER [] = $courseNo . " " . $section;
    }
}
sort($ANTH);
sort($ASTR);
sort($GWST);
sort($GEOG);
sort($BIOC);
sort($BIOL);
sort($DATA);
sort($CHEM);
sort($PSYC);
sort($COSC);
sort($MATH);
sort($PHYS);
sort($MDST);
sort($STAT);
sort($HIST);
sort($SOCI);
sort($EESC);
sort($ECON);
sort($PHIL);
sort($POLI);
sort($OTHER);
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<ul class="accordion">
    <form> #NEEDS EDIT, NOT SURE HOW TO ORGANIZE FORM
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
                                <?php
                                $current = current($ANTH);
                                while ($current != end($ANTH)) {
                                    echo "<li><div>";
                                    echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                    echo $current;
                                    echo "</a>";
                                    echo "</div></li>";


                                    if ($current[0] != next($ANTH)[0] && $current[0] != 4) {
                                        echo "<li>";
                                        echo "<div>";
                                        echo "<input type='checkbox'/><a href='#'>";
                                        echo next($ANTH)[0];
                                        echo "00";
                                        echo "</a>";
                                        echo "</div>";
                                        echo "</li>";
                                    }
                                    $current = next($ANTH);
                                }
                                echo "<li><div>";
                                echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                echo $current;
                                echo "</a>";
                                echo "</li></div>"

                                ?>
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
                                <?php
                                $current = current($GWST);
                                while ($current != end($GWST)) {
                                    echo "<li><div>";
                                    echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                    echo $current;
                                    echo "</a>";
                                    echo "</div></li>";


                                    if ($current[0] != next($GWST)[0] && $current[0] != 4) {
                                        echo "<li>";
                                        echo "<div>";
                                        echo "<input type='checkbox'/><a href='#'>";
                                        echo next($GWST)[0];
                                        echo "00";
                                        echo "</a>";
                                        echo "</div>";
                                        echo "</li>";
                                    }
                                    $current = next($GWST);
                                }
                                echo "<li><div>";
                                echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                echo $current;
                                echo "</a>";
                                echo "</li></div>"

                                ?>
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
                                <?php
                                $current = current($GEOG);
                                while ($current != end($GEOG)) {
                                    echo "<li><div>";
                                    echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                    echo $current;
                                    echo "</a>";
                                    echo "</div></li>";


                                    if ($current[0] != next($GEOG)[0] && $current[0 != 4]) {
                                        echo "<li>";
                                        echo "<div>";
                                        echo "<input type='checkbox'/><a href='#'>";
                                        echo next($GEOG)[0];
                                        echo "00";
                                        echo "</a>";
                                        echo "</div>";
                                        echo "</li>";
                                    }
                                    $current = next($GEOG);
                                }
                                echo "<li><div>";
                                echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                echo $current;
                                echo "</a>";
                                echo "</li></div>"

                                ?>
                            </ul>
                        </li>
                    </ul>
                </li>
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
                                <?php
                                $current = current($INDG);
                                while ($current != end($INDG)) {
                                    echo "<li><div>";
                                    echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                    echo $current;
                                    echo "</a>";
                                    echo "</div></li>";


                                    if ($current[0] != next($INDG)[0] && $current[0 != 4]) {
                                        echo "<li>";
                                        echo "<div>";
                                        echo "<input type='checkbox'/><a href='#'>";
                                        echo next($INDG)[0];
                                        echo "00";
                                        echo "</a>";
                                        echo "</div>";
                                        echo "</li>";
                                    }
                                    $current = next($INDG);
                                }
                                echo "<li><div>";
                                echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                echo $current;
                                echo "</a>";
                                echo "</li></div>"

                                ?>
                            </ul>
                        </li>
                    </ul>
                </li>
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
                                        <?php
                                        $current = current($BIOL);
                                        while ($current != end($BIOL)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($BIOL)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($BIOL)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($BIOL);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">BIOC</a>
                            </div>
                            <ul class="accordion">
                                <li>
                                    <div>
                                        <input type="checkbox"/><a href="#">100</a>

                                    </div>
                                    <ul class="accordion">
                                        <?php
                                        $current = current($BIOC);
                                        while ($current != end($BIOC)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($BIOC)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($BIOC)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($BIOC);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">SUST </a>
                            </div>
                            <ul class="accordion">
                                <li>
                                    <div>
                                        <input type="checkbox"/><a href="#">100</a>

                                    </div>
                                    <ul class="accordion">
                                        <?php
                                        $current = current($SUST);
                                        while ($current != end($SUST)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($SUST)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($SUST)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($SUST);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
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
                                        <?php
                                        $current = current($CHEM);
                                        while ($current != end($CHEM)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($CHEM)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($CHEM)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($CHEM);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
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
                                        <?php
                                        $current = current($PSYC);
                                        while ($current != end($PSYC)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($PSYC)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($PSYC)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($PSYC);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <div>
                        <input type="checkbox"/><a href="#">UNIT 5</a>
                    </div>
                    <ul class="accordion">
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">ASTR </a>
                            </div>
                            <ul class="accordion">
                                <li>
                                    <div>
                                        <input type="checkbox"/><a href="#">100</a>

                                    </div>
                                    <ul class="accordion">
                                        <?php
                                        $current = current($ASTR);
                                        while ($current != end($ASTR)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($ASTR)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($ASTR)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($ASTR);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
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
                                        <?php
                                        $current = current($COSC);
                                        while ($current != end($COSC)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($COSC)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($COSC)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($COSC);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">DATA </a>
                            </div>
                            <ul class="accordion">
                                <li>
                                    <div>
                                        <input type="checkbox"/><a href="#">100</a>

                                    </div>
                                    <ul class="accordion">
                                        <?php
                                        $current = current($DATA);
                                        while ($current != end($DATA)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($DATA)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($DATA)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($DATA);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
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
                                        <?php
                                        $current = current($MATH);
                                        while ($current != end($MATH)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($MATH)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($MATH)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($MATH);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">MDST </a>
                            </div>
                            <ul class="accordion">
                                <li>
                                    <div>
                                        <input type="checkbox"/><a href="#">100</a>

                                    </div>
                                    <ul class="accordion">
                                        <?php
                                        $current = current($MDST);
                                        while ($current != end($MDST)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($MDST)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($MDST)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($MDST);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
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
                                        <?php
                                        $current = current($PHYS);
                                        while ($current != end($PHYS)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($PHYS)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($PHYS)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($PHYS);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">STAT</a>
                            </div>
                            <ul class="accordion">
                                <li>
                                    <div>
                                        <input type="checkbox"/><a href="#">100</a>
                                    </div>
                                    <ul class="accordion">
                                        <?php
                                        $current = current($STAT);
                                        while ($current != end($STAT)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($STAT)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($STAT)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($STAT);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <div>
                        <input type="checkbox"/><a href="#">UNIT 6</a>
                    </div>
                    <ul class="accordion">
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">100</a>

                            </div>
                            <ul class="accordion">
                                <li>
                                    <div>
                                        <input type="checkbox"/><a href="#">HIST </a>
                                    </div>
                                    <ul class="accordion">
                                        <?php
                                        $current = current($HIST);
                                        while ($current != end($HIST)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($HIST)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($HIST)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($HIST);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
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
                                        <?php
                                        $current = current($SOCI);
                                        while ($current != end($SOCI)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($SOCI)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($SOCI)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($SOCI);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
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
                                        <?php
                                        $current = current($EESC);
                                        while ($current != end($EESC)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($EESC)[0] && $current[0] != 4) {

                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($EESC)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($EESC);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <div>
                        <input type="checkbox"/><a href="#">UNIT 8</a>
                    </div>
                    <ul class="accordion">
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
                                        <?php
                                        $current = current($PHIL);
                                        while ($current != end($PHIL)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($PHIL)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($PHIL)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($PHIL);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">POLI </a>
                            </div>
                            <ul class="accordion">
                                <li>
                                    <div>
                                        <input type="checkbox"/><a href="#">100</a>
                                    </div>
                                    <ul class="accordion">
                                        <?php
                                        $current = current($POLI);
                                        while ($current != end($POLI)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";


                                            if ($current[0] != next($POLI)[0] && $current[0] != 4) {
                                                echo "<li>";
                                                echo "<div>";
                                                echo "<input type='checkbox'/><a href='#'>";
                                                echo next($POLI)[0];
                                                echo "00";
                                                echo "</a>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            $current = next($POLI);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div>
                                <input type="checkbox"/><a href="#">OTHER</a>
                            </div>
                            <ul class="accordion">
                                <li>
                                    <ul class="accordion">
                                        <?php
                                        $current = current($BIOC);
                                        while ($current != end($BIOC)) {
                                            echo "<li><div>";
                                            echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                            echo $current;
                                            echo "</a>";
                                            echo "</div></li>";
                                            $current = next($BIOC);
                                        }
                                        echo "<li><div>";
                                        echo "<input type='checkbox' id = '$current' value = '$current'/><a href='#'>";
                                        echo $current;
                                        echo "</a>";
                                        echo "</li></div>"

                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div><input type="submit" value="submit"/></div>
                </li>
            </ul>
        </li>
    </form>
</ul>


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