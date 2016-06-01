<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/10/2016
 * Time: 5:20 PM
 */

    require_once "../config.php";
    $input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $url_type = mysqli_real_escape_string($link, $input['url_type']);

    if ($url_type == 'E') {
        header("Location:add_external_page.php");
    } elseif ($url_type  == 'I') {
        header("Location:add_internal_page.php");
    } else {
        $_SESSION['message'] = "Must choose either Internal or External to Proceed to Step 2";
        header("Location:choose_type.php");
    }
?>