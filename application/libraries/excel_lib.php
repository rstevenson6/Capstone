<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."/third_party/PHPExcel.php";

class Excel_lib extends PHPExcel {
    public function __construct() {
        parent::__construct();
    }

    public function sayHello() {
      echo "<h1>HELLO!</h1>";
    }
}
