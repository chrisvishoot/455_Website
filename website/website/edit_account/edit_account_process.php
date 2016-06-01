<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 3/9/2016
 * Time: 4:53 PM
 */
require_once "../authorize.php";

if($_SESSION['is_logged'] == True) {
    $sql = "SELECT * FROM users WHERE id=" . $_SESSION['user_id'];
    $result = $link->query($sql);
    $retval = False;
    if($result) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $db_email = $row['email'];
        $db_username = $row['username'];
        $input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $firstname = mysqli_real_escape_string($link, $input['first_name']);
        $lastname = mysqli_real_escape_string($link, $input['last_name']);
//        $email = mysqli_real_escape_string($link, $input['email']);
        $company_name = mysqli_real_escape_string($link, $input['company_name']);
        $position = mysqli_real_escape_string($link, $input['work_title']);
        $input_password = mysqli_real_escape_string($link, $input['password']);
//        $username = mysqli_real_escape_string($link, $input['user_name']);

        //$sqlUpdate = "UPDATE users ". "SET first_name=".'$firstname'. "WHERE first_name=".'$db_firstName';
        if($firstname) {
            $sqlUpdate = "UPDATE users SET first_name='$firstname' WHERE email='$db_email'";
            $retval = mysqli_query($link, $sqlUpdate);
        }
        if($lastname) {
            $sqlUpdate = "UPDATE users SET last_name='$lastname' WHERE email='$db_email'";
            $retval = mysqli_query($link, $sqlUpdate);

        }
//        if($email) {
//            $sqlUpdate = "UPDATE users SET email='$email' WHERE username='$db_username'";
//            $retval = mysqli_query($link, $sqlUpdate);
//        }
        if($position) {
            $sqlUpdate = "UPDATE users SET work_title='$position' WHERE username='$db_username'";
            $retval = mysqli_query($link, $sqlUpdate);
        }
//        if($username) {
//            $sqlUpdate = "UPDATE users SET username='$username' WHERE email='$email'";
//        }
        if($retval) {
            header("Location: " . $PATH . "/homepage.php");
        } else {
            echo "nope";
        }
    } else {
        echo "nothing returned";
    }
}
?>