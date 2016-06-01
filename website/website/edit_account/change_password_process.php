<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/12/2016
 * Time: 2:14 AM
 */

require_once "../authorize.php";

if($_SESSION['is_logged'] == True) {
    $sql = "SELECT * FROM users WHERE id=" . $_SESSION['user_id'];
    $result = $link->query($sql);
    $retval = False;
    if($result) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $user_id = $_SESSION['user_id'];
        $db_password = $row['password'];
        $input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $c_input_password = mysqli_real_escape_string($link, $input['c_password']);
        $c_password = md5($c_input_password . $SALT);
        $new_pass1 = mysqli_real_escape_string($link, $input['new_pass1']);
        $new_pass2 = mysqli_real_escape_string($link, $input['new_pass2']);

        //$sqlUpdate = "UPDATE users ". "SET first_name=".'$firstname'. "WHERE first_name=".'$db_firstName';
        if($c_password == $db_password) {
            if($new_pass1 == $new_pass2) {
                $new_password = md5($new_pass1 . $SALT);
                $sqlUpdate = "UPDATE users SET password='$new_password' WHERE id='$user_id'";
                //echo $sqlUpdate;
                $retval = mysqli_query($link, $sqlUpdate);
                if($retval) {
                    $_SESSION['message'] = "Password sucessfully changed!";
                    header("Location: " . $PATH . "/homepage.php");
                } else {
                    $_SESSION['message'] = "Unable to update password.";
                    header("Location: " . $PATH . "/edit_account/change_password.php");
                }
            } else {
                $_SESSION['message'] = "New passwords do not match. Try again.";
                header("Location: " . $PATH . "/edit_account/change_password.php");
            }
        } else {
            $_SESSION['message'] = "Current password does not match our records. Try again.";
            header("Location: " . $PATH . "/edit_account/change_password.php");
        }
    } else {
        $_SESSION['message'] = "Unable to confirm your account id. Please login again.";
        header("Location: " . $PATH . "/logout.php");
    }
} else {
    $_SESSION['message'] = "Unable to confirm your login.";
    header("Location: " . $PATH . "/logout.php");
}
?>