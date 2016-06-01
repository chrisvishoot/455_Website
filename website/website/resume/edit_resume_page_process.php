<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/12/2016
 * Time: 3:34 AM
 */

require_once "../config.php";

if($_SESSION['is_logged'] == True) {
    $sql = "SELECT * FROM users WHERE id=" . $_SESSION['user_id'];
    $result = $link->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $username = $row['username'];
    $retval = False;
    if($result) {
        $web_id=$_SESSION['web_id'];
        $webid_sql = "SELECT ex_or_in, url FROM resume_website WHERE web_id=" . $web_id;
        $webid_result = $link->query($webid_sql);
        $webid_row = $webid_result->fetch_array(MYSQLI_ASSOC);
        $url_type = $webid_row['ex_or_in'];

        $input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $focus = mysqli_real_escape_string($link, $input['focus']);
        $URL = mysqli_real_escape_string($link, $input['url']);
        $description = mysqli_real_escape_string($link, $input['description']);
        $notes = mysqli_real_escape_string($link, $input['notes']);
        $html_code = mysqli_real_escape_string($link, $input['html_code']);
        $css_code = mysqli_real_escape_string($link, $input['css_code']);

        //$sqlUpdate = "UPDATE resume_website ". "SET first_name=".'$firstname'. "WHERE first_name=".'$db_firstName';
        if($focus) {
            $sqlUpdate = "UPDATE resume_website SET focus='$focus' WHERE web_id='$web_id'";
            $retval = mysqli_query($link, $sqlUpdate);
        }
        //NEED TO PREVENT DUPLICATES
        if($URL) {
            if ($url_type == 'I') {
                $db_url = $webid_row['url'];
                $url_html = str_replace($PATH."/resume/".$username."/","", $db_url);
                $url_append = str_replace(".html","", $url_html);
                rename($username."/".$url_append.".html", $username."/".$input['url'].".html");
                rename($username."/".$url_append.".css", $username."/".$input['url'].".css");
                $URL = mysqli_real_escape_string($link, $PATH . "/resume/" . $username . "/" .$input['url'].".html");
            }
            $sqlUpdate = "UPDATE resume_website SET url='$URL' WHERE web_id='$web_id'";
            $retval = mysqli_query($link, $sqlUpdate);
        }
        if($description) {
            $sqlUpdate = "UPDATE resume_website SET description='$description' WHERE web_id='$web_id'";
            $retval = mysqli_query($link, $sqlUpdate);
        }
        if($notes) {
            $sqlUpdate = "UPDATE resume_website SET notes='$notes' WHERE web_id='$web_id'";
            $retval = mysqli_query($link, $sqlUpdate);
        }
        if($html_code) {
            $sqlUpdate = "UPDATE resume_website SET html_code='$html_code' WHERE web_id='$web_id'";
            $retval = mysqli_query($link, $sqlUpdate);
            if ($retval) {
                if (!file_exists($username)) {
                    mkdir($username);
                }
                $db_url = $webid_row['url'];
                $url_html = str_replace($PATH."/resume/".$username."/","", $db_url);
                $url_append = str_replace(".html","", $url_html);
                $f_name = $username . "/" .$url_append.".html";
                $my_html_file = fopen($f_name, "w+") or die("Unable to open file.");
                fwrite($my_html_file, $html_code);
                fclose($my_html_file);
            }
        }
        if($css_code) {
            $sqlUpdate = "UPDATE resume_website SET css_code='$css_code' WHERE web_id='$web_id'";
            $retval = mysqli_query($link, $sqlUpdate);
            if ($retval) {
                if (!file_exists($username)) {
                    mkdir($username);
                }
                $db_url = $webid_row['url'];
                $url_html = str_replace($PATH."/resume/".$username."/","", $db_url);
                $url_append = str_replace(".html","", $url_html);
                $f_name = $username . "/" .$url_append.".css";
                $my_css_file = fopen($f_name, "w+") or die("Unable to open file.");
                fwrite($my_css_file, $css_code);
                fclose($my_css_file);
            }
        }
        if($retval) {
            $_SESSION['message']="Update sucessful.";
            header("Location: ".$PATH."/resume/view_resume_page.php");
        } else {
            $_SESSION['message']="Unable to update information.";
            header("Location: ".$PATH."/resume/view_resume_page.php");
        }
    } else {
        $_SESSION['message']="You are not logged in.";
        header("Location: ".$PATH."/logout.php");
    }
}
?>