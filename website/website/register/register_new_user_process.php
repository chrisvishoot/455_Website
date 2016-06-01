<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/4/2016
 * Time: 6:40 PM
 */

require_once "../config.php";

//set session variable?

// create variables
$input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$firstname = mysqli_real_escape_string($link, $input['first_name']);
$lastname = mysqli_real_escape_string($link, $input['last_name']);
$email = mysqli_real_escape_string($link, $input['email']);
$work_title = mysqli_real_escape_string($link, $input['work_title']);
$username = mysqli_real_escape_string($link, $input['user_name']);
$input_password = mysqli_real_escape_string($link, $input['password']);
$password = md5($input_password . $SALT);
$company_name = mysqli_real_escape_string($link, $input['company_name']);

$company_query = "INSERT INTO company" . "(company_name)" . "VALUES ('$company_name')";
$company_return_value = mysqli_query($link, $company_query);

$company_select = "SELECT * FROM company WHERE company_name ='".$company_name."'";
$select_return_value = mysqli_query($link, $company_select);
$row = $select_return_value->fetch_array(MYSQLI_ASSOC);
$company_id = $row['company_id'];


$account_type = mysqli_real_escape_string($link, $input['account_type']);
if($firstname and $lastname and $email and $work_title and $username and $input_password and $company_name and $account_type) {
    $sql = "INSERT INTO users " . "(first_name, last_name, email, work_title, username, password, user_type, company_id)" .
        "VALUES ('$firstname', '$lastname', '$email', '$work_title', '$username', '$password','$account_type', '$company_id')";
    $retval = mysqli_query($link, $sql);

    if ($retval) {
        if (!file_exists('../resume/' .$username)) {
            mkdir('../resume/' . $username);
        }
        header("Location: " . $PATH);
        exit();
    } else {
        header("Location: " . $PATH . "/register/register_new_user.php");
        exit();
    }
} else {
    header("Location: " . $PATH . "/register/register_new_user.php");
    exit();
}
?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             