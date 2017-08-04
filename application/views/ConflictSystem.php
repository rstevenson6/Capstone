<?php

$this->load->database();
$query = LoadClasses();

$MDSTsubj = array();
$MDSTcNo = array();
$MDSTsNo = array();
$MDSTterm = array();
$MDSTdays = array();
$MDSTsTime = array();
$MDSTeTime = array();

$INDGsubj [] = array();
$INDGcNo [] = array();
$INDGsNo [] = array();
$INDGterm[] = array();
$INDGdays [] = array();
$INDGsTime [] = array();
$INDGeTime [] = array();

$BIOCHEMsubj [] = array();
$BIOCHEMcNo [] = array();
$BIOCHEMsNo [] = array();
$BIOCHEMterm[] = array();
$BIOCHEMdays [] = array();
$BIOCHEMsTime [] = array();
$BIOCHEMeTime [] = array();

$MATHCOSCsubj [] = array();
$MATHCOSCcNo [] = array();
$MATHCOSCsNo [] = array();
$MATHCOSCterm[] = array();
$MATHCOSCdays [] = array();
$MATHCOSCsTime [] = array();
$MATHCOSCeTime [] = array();

$PHYSsubj [] = array();
$PHYScNo [] = array();
$PHYSsNo [] = array();
$PHYSterm[] = array();
$PHYSdays [] = array();
$PHYSsTime [] = array();
$PHYSeTime [] = array();

$HISTsubj [] = array();
$HISTcNo [] = array();
$HISTsNo [] = array();
$HISTterm[] = array();
$HISTdays [] = array();
$HISTsTime [] = array();
$HISTeTime [] = array();

$SOCIsubj [] = array();
$SOCIcNo [] = array();
$SOCIsNo [] = array();
$SOCIterm[] = array();
$SOCIdays [] = array();
$SOCIsTime [] = array();
$SOCIeTime [] = array();

$EESCsubj [] = array();
$EESCcNo [] = array();
$EESCsNo [] = array();
$EESCterm[] = array();
$EESCdays [] = array();
$EESCsTime [] = array();
$EESCeTime [] = array();

$ECONsubj [] = array();
$ECONcNo [] = array();
$ECONsNo [] = array();
$ECONterm[] = array();
$ECONdays [] = array();
$ECONsTime [] = array();
$ECONeTime [] = array();

$PSYCPHILPOLIsubj [] = array();
$PSYCPHILPOLIcNo [] = array();
$PSYCPHILPOLIsNo [] = array();
$PSYCPHILPOLIterm[] = array();
$PSYCPHILPOLIdays [] = array();
$PSYCPHILPOLIsTime [] = array();
$PSYCPHILPOLIeTime [] = array();

$FIRSTsubj [] = array();
$FIRSTcNo [] =array();
$FIRSTsNo [] = array();
$FIRSTterm[] = array();
$FIRSTdays [] = array();
$FIRSTsTime [] = array();
$FIRSTeTime [] = array();

foreach ($query->result() as $row) {

    $subj = $row->subj;
    $subj = strtoupper($subj);
    $courseNo = $row->courseNo;
    $section = $row->section;
    $term = $row->term;
    $days = $row->days;
    $sTime = $row->startTime;
    $eTime = $row->endTime;

    $e = substr($eTime, 0, 2);
    $s = substr($sTime, 0, 2);
    $e *= $e;
    $s *= $s;


    if(abs($e-$s) > 3){
        echo "There may be a scheduling issue with: ".$subj. " ".$courseNo. " ". $section;
    }

    if (strcmp($subj, "MDST") ) {
        $MDSTsubj [] = $subj;
        $MDSTcNo [] = $courseNo;
        $MDSTsNo [] = $section;
        $MDSTterm[] = $term;
        $MDSTdays [] = $days;
        $MDSTsTime [] = $sTime;
        $MDSTeTime [] = $eTime;
    } elseif (strcmp($subj, "INDG")) {
        $INDGsubj [] = $subj;
        $INDGcNo [] = $courseNo;
        $INDGsNo [] = $section;
        $INDGterm[] = $term;
        $INDGdays [] = $days;
        $INDGsTime [] = $sTime;
        $INDGeTime [] = $eTime;
    } elseif (strcmp($subj, "BIOL") || strcmp($subj, "CHEM") || strcmp($subj, "BIOC")) {
        $BIOCHEMsubj [] = $subj;
        $BIOCHEMcNo [] = $courseNo;
        $BIOCHEMsNo [] = $section;
        $BIOCHEMterm[] = $term;
        $BIOCHEMdays [] = $days;
        $BIOCHEMsTime [] = $sTime;
        $BIOCHEMeTime [] = $eTime;
    } elseif (strcmp($subj, "COSC") || strcmp($subj, "MATH") || strcmp($subj, "STAT" || strcmp($subj, "DATA"))) {
        $MATHCOSCsubj [] = $subj;
        $MATHCOSCcNo [] = $courseNo;
        $MATHCOSCsNo [] = $section;
        $MATHCOSCterm[] = $term;
        $MATHCOSCdays [] = $days;
        $MATHCOSCsTime [] = $sTime;
        $MATHCOSCeTime [] = $eTime;
    } elseif (strcmp($subj, "PHYS") || strcmp($subj, "ASTR")) {
        $PHYSsubj [] = $subj;
        $PHYScNo [] = $courseNo;
        $PHYSsNo [] = $section;
        $PHYSterm[] = $term;
        $PHYSdays [] = $days;
        $PHYSsTime [] = $sTime;
        $PHYSeTime [] = $eTime;
    } elseif (strcmp($subj, "HIST")) {
        $HISTsubj [] = $subj;
        $HISTcNo [] = $courseNo;
        $HISTsNo [] = $section;
        $HISTterm[] = $term;
        $HISTdays [] = $days;
        $HISTsTime [] = $sTime;
        $HISTeTime [] = $eTime;
    } elseif (strcmp($subj, "SOCI")) {
        $SOCIsubj [] = $subj;
        $SOCIcNo [] = $courseNo;
        $SOCIsNo [] = $section;
        $SOCIterm[] = $term;
        $SOCIdays [] = $days;
        $SOCIsTime [] = $sTime;
        $SOCIeTime [] = $eTime;
    } elseif (strcmp($subj, "EESC") || strcmp($subj, "GEOG")) {
        $EESCsubj [] = $subj;
        $EESCcNo [] = $courseNo;
        $EESCsNo [] = $section;
        $EESCterm[] = $term;
        $EESCdays [] = $days;
        $EESCsTime [] = $sTime;
        $EESCeTime [] = $eTime;
    } elseif (strcmp($subj, "ECON")) {
        $ECONsubj [] = $subj;
        $ECONcNo [] = $courseNo;
        $ECONsNo [] = $section;
        $ECONterm[] = $term;
        $ECONdays [] = $days;
        $ECONsTime [] = $sTime;
        $ECONeTime [] = $eTime;
    } elseif (strcmp($subj, "PHIL") || strcmp($subj, "POLI") || strcmp($subj, "PSYC") || strcmp($subj, "GWST") || strcmp($subj, "ANTH") || strcmp($subj, "SUST") ) {
        $PSYCPHILPOLIsubj [] = $subj;
        $PSYCPHILPOLIcNo [] = $courseNo;
        $PSYCPHILPOLIsNo [] = $section;
        $PSYCPHILPOLIterm[] = $term;
        $PSYCPHILPOLIdays [] = $days;
        $PSYCPHILPOLIsTime [] = $sTime;
        $PSYCPHILPOLIeTime [] = $eTime;
    }

    if ((strcmp($subj, "MATH") || strcmp($subj, "CHEM") || strcmp($subj, "PHYS") || strcmp($subj, "BIOL")) && strcmp($courseNo[0], "1")) {
        $FIRSTsubj [] = $subj;
        $FIRSTcNo [] = $courseNo;
        $FIRSTsNo [] = $section;
        $FIRSTterm[] = $term;
        $FIRSTdays [] = $days;
        $FIRSTsTime [] = $sTime;
        $FIRSTeTime [] = $eTime;
    }


}

$i = 0;
$j = 0;
while ($i < count($MDSTsubj)) {
    $j = $i + 1;
    while ($j < count($MDSTsubj)) {
        if (strcmp($MDSTcNo[$i][0], $MDSTcNo[$j][0]) && $MDSTdays[$i] == $MDSTdays[$j] && $MDSTterm [$i] == $MDSTterm[$j] && (($MDSTsTime [$i] < $MDSTeTime [$j] && $MDSTeTime[$i] > $MDSTsTime[$j]) || ($MDSTsTime [$j] < $MDSTeTime [$i] && $MDSTeTime[$j] > $MDSTsTime[$i]))) {
            echo "There is a possible conflict between" . $MDSTsubj[$i] . " " . $MDSTcNo[$i] . " " . $MDSTsNo[$i] . " and " . $MDSTsubj[$j] . " " . $MDSTcNo[$j] . " " . $MDSTsNo[$j];
        }
        $j++;
    }
    $i++;
}
while ($i < count($INDGsubj)) {
    $j = $i + 1;
    while ($j < count($INDGsubj)) {
        if (strcmp($INDGcNo[$i][0], $INDGcNo[$j][0]) && $INDGdays[$i] == $INDGdays[$j] && $INDGterm [$i] == $INDGterm[$j] && (($INDGsTime [$i] < $INDGeTime [$j] && $INDGeTime[$i] > $INDGsTime[$j]) || ($INDGsTime [$j] < $INDGeTime [$i] && $INDGeTime[$j] > $INDGsTime[$i]))) {
            echo "There is a possible conflict between" . $INDGsubj[$i] . " " . $INDGcNo[$i] . " " . $INDGsNo[$i] . " and " . $INDGsubj[$j] . " " . $INDGcNo[$j] . " " . $INDGsNo[$j];
        }
        $j++;
    }
    $i++;
}
while ($i < count($BIOCHEMsubj)) {
    $j = $i + 1;
    while ($j < count($BIOCHEMsubj)) {
        if (strcmp($BIOCHEMcNo[$i][0], $BIOCHEMcNo[$j][0]) && $BIOCHEMdays[$i] == $BIOCHEMdays[$j] && $BIOCHEMterm [$i] == $BIOCHEMterm[$j] && (($BIOCHEMsTime [$i] < $BIOCHEMeTime [$j] && $BIOCHEMeTime[$i] > $BIOCHEMsTime[$j]) || ($BIOCHEMsTime [$j] < $BIOCHEMeTime [$i] && $BIOCHEMeTime[$j] > $BIOCHEMsTime[$i]))) {
            echo "There is a possible conflict between" . $BIOCHEMsubj[$i] . " " . $BIOCHEMcNo[$i] . " " . $BIOCHEMsNo[$i] . " and " . $BIOCHEMsubj[$j] . " " . $BIOCHEMcNo[$j] . " " . $BIOCHEMsNo[$j];
        }
        $j++;
    }
    $i++;
}
while ($i < count($MATHCOSCsubj)) {
    $j = $i + 1;
    while ($j < count($MATHCOSCsubj)) {
        if (strcmp($MATHCOSCcNo[$i][0], $MATHCOSCcNo[$j][0]) && $MATHCOSCdays[$i] == $MATHCOSCdays[$j] && $MATHCOSCterm [$i] == $MATHCOSCterm[$j] && (($MATHCOSCsTime [$i] < $MATHCOSCeTime [$j] && $MATHCOSCeTime[$i] > $MATHCOSCsTime[$j]) || ($MATHCOSCsTime [$j] < $MATHCOSCeTime [$i] && $MATHCOSCeTime[$j] > $MATHCOSCsTime[$i]))) {
            echo "There is a possible conflict between" . $MATHCOSCsubj[$i] . " " . $MATHCOSCcNo[$i] . " " . $MATHCOSCsNo[$i] . " and " . $MATHCOSCsubj[$j] . " " . $MATHCOSCcNo[$j] . " " . $MATHCOSCsNo[$j];
        }
        $j++;
    }
    $i++;
}
while ($i < count($PHYSsubj)) {
    $j = $i + 1;
    while ($j < count($PHYSsubj)) {
        if (strcmp($PHYScNo[$i][0], $PHYScNo[$j][0]) && $PHYSdays[$i] == $PHYSdays[$j] && $PHYSterm [$i] == $PHYSterm[$j] && (($PHYSsTime [$i] < $PHYSeTime [$j] && $PHYSeTime[$i] > $PHYSsTime[$j]) || ($PHYSsTime [$j] < $PHYSeTime [$i] && $PHYSeTime[$j] > $PHYSsTime[$i]))) {
            echo "There is a possible conflict between" . $PHYSsubj[$i] . " " . $PHYScNo[$i] . " " . $PHYSsNo[$i] . " and " . $PHYSsubj[$j] . " " . $PHYScNo[$j] . " " . $PHYSsNo[$j];
        }
        $j++;
    }
    $i++;
}
while ($i < count($HISTsubj)) {
    $j = $i + 1;
    while ($j < count($HISTsubj)) {
        if (strcmp($HISTcNo[$i][0], $HISTcNo[$j][0]) && $HISTdays[$i] == $HISTdays[$j] && $HISTterm [$i] == $HISTterm[$j] && (($HISTsTime [$i] < $HISTeTime [$j] && $HISTeTime[$i] > $HISTsTime[$j]) || ($HISTsTime [$j] < $HISTeTime [$i] && $HISTeTime[$j] > $HISTsTime[$i]))) {
            echo "There is a possible conflict between" . $HISTsubj[$i] . " " . $HISTcNo[$i] . " " . $HISTsNo[$i] . " and " . $HISTsubj[$j] . " " . $HISTcNo[$j] . " " . $HISTsNo[$j];
        }
        $j++;
    }
    $i++;
}
while ($i < count($SOCIsubj)) {
    $j = $i + 1;
    while ($j < count($SOCIsubj)) {
        if (strcmp($SOCIcNo[$i][0], $SOCIcNo[$j][0]) && $SOCIdays[$i] == $SOCIdays[$j] && $SOCIterm [$i] == $SOCIterm[$j] && (($SOCIsTime [$i] < $SOCIeTime [$j] && $SOCIeTime[$i] > $SOCIsTime[$j]) || ($SOCIsTime [$j] < $SOCIeTime [$i] && $SOCIeTime[$j] > $SOCIsTime[$i]))) {
            echo "There is a possible conflict between" . $SOCIsubj[$i] . " " . $SOCIcNo[$i] . " " . $SOCIsNo[$i] . " and " . $SOCIsubj[$j] . " " . $SOCIcNo[$j] . " " . $SOCIsNo[$j];
        }
        $j++;
    }
    $i++;
}
while ($i < count($SOCIsubj)) {
    $j = $i + 1;
    while ($j < count($SOCIsubj)) {
        if (strcmp($SOCIcNo[$i][0], $SOCIcNo[$j][0]) && $SOCIdays[$i] == $SOCIdays[$j] && $SOCIterm [$i] == $SOCIterm[$j] && (($SOCIsTime [$i] < $SOCIeTime [$j] && $SOCIeTime[$i] > $SOCIsTime[$j]) || ($SOCIsTime [$j] < $SOCIeTime [$i] && $SOCIeTime[$j] > $SOCIsTime[$i]))) {
            echo "There is a possible conflict between" . $SOCIsubj[$i] . " " . $SOCIcNo[$i] . " " . $SOCIsNo[$i] . " and " . $SOCIsubj[$j] . " " . $SOCIcNo[$j] . " " . $SOCIsNo[$j];
        }
        $j++;
    }
    $i++;
}
while ($i < count($EESCsubj)) {
    $j = $i + 1;
    while ($j < count($EESCsubj)) {
        if (strcmp($EESCcNo[$i][0], $EESCcNo[$j][0]) && $EESCdays[$i] == $EESCdays[$j] && $EESCterm [$i] == $EESCterm[$j] && (($EESCsTime [$i] < $EESCeTime [$j] && $EESCeTime[$i] > $EESCsTime[$j]) || ($EESCsTime [$j] < $EESCeTime [$i] && $EESCeTime[$j] > $EESCsTime[$i]))) {
            echo "There is a possible conflict between" . $EESCsubj[$i] . " " . $EESCcNo[$i] . " " . $EESCsNo[$i] . " and " . $EESCsubj[$j] . " " . $EESCcNo[$j] . " " . $EESCsNo[$j];
        }
        $j++;
    }
    $i++;
}
while ($i < count($ECONsubj)) {
    $j = $i + 1;
    while ($j < count($ECONsubj)) {
        if (strcmp($ECONcNo[$i][0], $ECONcNo[$j][0]) && $ECONdays[$i] == $ECONdays[$j] && $ECONterm [$i] == $ECONterm[$j] && (($ECONsTime [$i] < $ECONeTime [$j] && $ECONeTime[$i] > $ECONsTime[$j]) || ($ECONsTime [$j] < $ECONeTime [$i] && $ECONeTime[$j] > $ECONsTime[$i]))) {
            echo "There is a possible conflict between" . $ECONsubj[$i] . " " . $ECONcNo[$i] . " " . $ECONsNo[$i] . " and " . $ECONsubj[$j] . " " . $ECONcNo[$j] . " " . $ECONsNo[$j];
        }
        $j++;
    }
    $i++;
}
while ($i < count($PSYCPHILPOLIsubj)) {
    $j = $i + 1;
    while ($j < count($PSYCPHILPOLIsubj)) {
        if (strcmp($PSYCPHILPOLIcNo[$i][0], $PSYCPHILPOLIcNo[$j][0]) && $PSYCPHILPOLIdays[$i] == $PSYCPHILPOLIdays[$j] && $PSYCPHILPOLIterm [$i] == $PSYCPHILPOLIterm[$j] && (($PSYCPHILPOLIsTime [$i] < $PSYCPHILPOLIeTime [$j] && $PSYCPHILPOLIeTime[$i] > $PSYCPHILPOLIsTime[$j]) || ($PSYCPHILPOLIsTime [$j] < $PSYCPHILPOLIeTime [$i] && $PSYCPHILPOLIeTime[$j] > $PSYCPHILPOLIsTime[$i]))) {
            echo "There is a possible conflict between" . $PSYCPHILPOLIsubj[$i] . " " . $PSYCPHILPOLIcNo[$i] . " " . $PSYCPHILPOLIsNo[$i] . " and " . $PSYCPHILPOLIsubj[$j] . " " . $PSYCPHILPOLIcNo[$j] . " " . $PSYCPHILPOLIsNo[$j];
        }
        $j++;
    }
    $i++;
}
while ($i < count($FIRSTsubj)) {
    $j = $i + 1;
    while ($j < count($FIRSTsubj)) {
        if ($FIRSTdays[$i] == $FIRSTdays[$j] && $FIRSTterm [$i] == $FIRSTterm[$j] && (($FIRSTsTime [$i] < $FIRSTeTime [$j] && $FIRSTeTime[$i] > $FIRSTsTime[$j]) || ($FIRSTsTime [$j] < $FIRSTeTime [$i] && $FIRSTeTime[$j] > $FIRSTsTime[$i]))) {
            echo "There is a possible conflict between" . $FIRSTsubj[$i] . " " . $FIRSTcNo[$i] . " " . $FIRSTsNo[$i] . " and " . $FIRSTsubj[$j] . " " . $FIRSTcNo[$j] . " " . $FIRSTsNo[$j];
        }
        $j++;
    }
    $i++;
}
?>