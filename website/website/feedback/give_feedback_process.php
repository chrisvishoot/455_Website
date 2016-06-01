<?php
    require_once "../authorize.php";

    $input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $comment = mysqli_real_escape_string($link,$input['comment']);
    $web_url = trim(mysqli_real_escape_string($link,$input['web_url']));
    $user_id = $_SESSION['user_id'];

    $sql_1 = "SELECT web_id FROM resume_website WHERE url='" .$web_url."'";
        $result = mysqli_query($link, $sql_1);
        if ($result) {
            $row = mysqli_fetch_array($result);
            $web_id = $row['web_id'];
        if ($comment and $user_id and $web_url and $web_id) {
            $sql =  "INSERT INTO feedback ". "(comment,user_id, web_url, web_id)".
                    " VALUES ('$comment', '$user_id', '$web_url', '$web_id')";
            $retval = mysqli_query($link, $sql);
            if ($retval) {
                $_SESSION['message'] = "";
                header("Location: " . $PATH . "/homepage.php");
            } else {
                $_SESSION['message'] = "Update failed. Try again.";
            }
        } else {
            $_SESSION['message'] = "Must enter all information. Try again.";
        }
    } else {
        $_SESSION['message'] = "No site matching the entered URL found. Try again.";
    }
    header("Location: " . $PATH . "/feedback/give_feedback.php");
?>