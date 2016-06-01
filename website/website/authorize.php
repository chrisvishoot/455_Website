<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 2/8/2016
 * Time: 10:42 PM
 */
require_once "config.php";
if($_SESSION['is_logged'] == True) {

} else {
    header("Location:index.php");
}