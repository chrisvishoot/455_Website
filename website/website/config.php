<?php
session_start();
//location of database, user, password, table
$HOST = "vergil11.u.washington.edu";
$user = "root";
$pass = "Wilde01$";
$db_name = "TCSS445_PROJECT";
$link = mysqli_connect($HOST, $user, $pass, $db_name, 64333);
if($link->connect_error) {
    die("Connection failed");
}
$SALT = "a;dskjfa;dsklfja;dskjf;askdjf;aruah;r4354";
$PATH = "http://students.washington.edu/glynng/resume_tracker";