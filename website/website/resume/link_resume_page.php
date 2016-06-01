<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/11/2016
 * Time: 2:35 PM
 */

require_once "../config.php";

if($_SESSION['is_logged'] == True) {
    $user_id=$_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE id=" . $user_id;
    $result = $link->query($sql);
    if($result) {
        $input = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        if($input) {
            $url_link = mysqli_real_escape_string($link, $input['url_link']);
            header('Location: ' . $url_link);
            exit();
        } else {
            header('Location: ' . $PATH . '/homepage.php');
            exit();
        }
    } else {
        $_SESSION['message']="Unable to go to link.";
        header("Location: ".$PATH."/homepage.php");
    }
} else {
    $_SESSION['message']="You are not logged in.";
    header("Location: ".$PATH."/logout.php");
}
?>