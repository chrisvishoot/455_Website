<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/10/2016
 * Time: 5:36 PM
 */

require_once "../config.php";

if($_SESSION['is_logged'] == True) {
    $sql = "SELECT * FROM users WHERE id=" . $_SESSION['user_id'];
    $result = $link->query($sql);
    if($result) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $username = $row['username'];
    } else {
        echo "nothing returned";
    }
}

// create variables
$input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$focus = mysqli_real_escape_string($link, $input['focus']);
$description = mysqli_real_escape_string($link, $input['description']);
$url = mysqli_real_escape_string($link, $input['URL']);
$user_id = $_SESSION['user_id'];
$ex_or_in = "E";

$sql = "INSERT INTO resume_website ". "(focus, description, url, user_id, ex_or_in)".
    "VALUES ('$focus', '$description', '$url', '$user_id', '$ex_or_in')";
$retval = mysqli_query($link, $sql);

if ($retval) {
    $_SESSION['message'] = "Link added successfully. Add another?";
} else {
    $_SESSION['message'] = "Unable to save link. Try again.";
}

header("Location: ". $PATH . "/resume/choose_type.php");
exit();
?>