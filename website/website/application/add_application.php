<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/3/2016
 * Time: 08:03 PM
 */
require_once "../authorize.php";
$input = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$test = mysqli_real_escape_string($link,$input['url_link']);
echo $test;

?>