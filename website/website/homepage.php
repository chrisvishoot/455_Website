<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/9/2016
 * Time: 2:07 PM
 */

    require_once "authorize.php";
    //$_SESSION['web_id']="";
    if($_SESSION['is_logged'] == True) {
        $user_id=$_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE id=" . $user_id;
        $result = $link->query($sql);
        if($result) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if ($row['user_type'] == 'S') {
                $_SESSION['message']="";
                header('Location: '.$PATH.'/homepage/S.php');
            } elseif ($row['user_type'] == 'R') {
                $_SESSION['message']="";
                header('Location: '.$PATH.'/homepage/R.php');
                exit();
            } else {
                $_SESSION['message']="You are not authorized to view page.";
                header('Location: '.$PATH.'/logout.php');
                exit();
            }
        } else {
            $_SESSION['message']="Unable to locate your account. Please sign in again.";
            header('Location: '.$PATH.'/logout.php');
            exit();
        }
    } else {
        $_SESSION['message'] = "You are not authorized to view page. Please login or create an account.";
        header('Location: '.$PATH.'/logout.php');
        exit();
    }
?>