<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/9/2016
 * Time: 7:21 PM
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
$ex_or_in = "I";
//trigger on change of username?
$url = mysqli_real_escape_string($link, $PATH . "/resume/" .$username . "/" . $input['URL']).".html";
$html_code = mysqli_real_escape_string($link, $input['html_code']);
$css_code = mysqli_real_escape_string($link, $input['css_code']);
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO resume_website ". "(focus, description, url, user_id, html_code, css_code, ex_or_in)".
    "VALUES ('$focus', '$description', '$url', '$user_id', '$html_code', '$css_code', '$ex_or_in')";
$retval = mysqli_query($link, $sql);

if ($retval) {
    if (!file_exists($username)) {
        mkdir($username);
    }
    $my_html_file = fopen($username."/".$input['URL'].".html", "w") or die("Unable to open file.");
    fwrite($my_html_file, $html_code);
    fclose($my_html_file);

    $my_css_file = fopen($username."/".$input['URL'].".css", "w") or die("Unable to open file.");
    fwrite($my_css_file, $css_code);
    fclose($my_css_file);
} else {

}

header("Location: ". $PATH . "/resume/choose_type.php");
exit();
?>