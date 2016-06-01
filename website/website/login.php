<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 2/8/2016
 * Time: 8:18 PM
 */

require_once "config.php";
$_SESSION['message']="";

$input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

$result = $link->query("SELECT * from users where email = '". $link->real_escape_string($input['email']) . "'");

$row = $result->fetch_array(MYSQLI_ASSOC);

if($row['password'] == md5($input['password'] . $SALT)) {

    $_SESSION['user_id'] = $row['id'];
    $_SESSION['message'] = "Login successful!";
    $_SESSION['is_logged'] = True;
//    $_SESSION['email'] = $_POST['email']; Whoever directed them to this get that email based on id!

} else {
    //header("Location:index.php");
    $_SESSION['message'] = "Failed to login...";
}

header("Location:login_message.php");

?>