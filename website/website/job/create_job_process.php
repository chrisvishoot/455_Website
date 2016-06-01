<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 3/9/2016
 * Time: 5:57 PM
 */
require_once "../authorize.php";
if($_SESSION['is_logged'] == True) {
    $sql = "SELECT * FROM users WHERE id=" . $_SESSION['user_id'];
    $result = $link->query($sql);
    $retval = False;
    $success;
    if ($result) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $job_name = mysqli_real_escape_string($link, $input['job_name']);
        //$company_name = trim(mysqli_real_escape_string($link, $input['company_name']));
        $description = mysqli_real_escape_string($link, $input['description']);
        $closing_date = mysqli_real_escape_string($link, $input['closing_date']);
        $is_open = 1;
        $date_now = date('Y-m-d');
        $location = mysqli_real_escape_string($link, $input['location']);
        $how_to_apply = mysqli_real_escape_string($link, $input['how_to_apply']);
        $created_by = $_SESSION['user_id'];

        $company_id = $row['company_id'];
        $company_sql = "SELECT * FROM company WHERE company_id='" . $row['company_id'] . "'";
        $company_result = $link->query($company_sql);
        $company_row = $company_result->fetch_array(MYSQLI_ASSOC);
        $company_name = $company_row['company_name'];
        if($company_name and $job_name and $description and $closing_date and $date_now and $location and $how_to_apply){
            $sql = "INSERT INTO job " . "(job_name, company_name, description, created_by, closing_date, location, how_to_apply, is_open, date_added, company_id )" .
                      "VALUES ('$job_name', '$company_name', '$description', '$created_by', '$closing_date', '$location', '$how_to_apply', '$is_open', '$date_now', '$company_id')";
                   $retvalJob = mysqli_query($link, $sql);
            if($retvalJob) {
                $success = "job was added";
            } else {
                $success = "fail";
            }
        }






        //$sql_company = "INSERT INTO company (company_name) VALUES ('$company_name')";
        //$retCompany = mysqli_query($link, $sql_company);

//            $sql_1 = "SELECT company_id FROM company WHERE company_name='" .$company_name."'";
//            $retCompanyID = mysqli_query($link, $sql_1);
//            $row = mysqli_fetch_array($retCompanyID);
//            $company_id = $row['company_id'];
//            if ($retCompanyID) {
//                if ($job_name and $company_name and $description and $created_by and $closing_date and $location
//                    and $how_to_apply and $is_open and $date_now
//                ) {
//
//                    $sql = "INSERT INTO job " . "(job_name, company_name, description, created_by, closing_date, location, how_to_apply, is_open, date_added, company_id )" .
//                        "VALUES ('$job_name', '$company_name', '$description', '$created_by', '$closing_date', '$location', '$how_to_apply', '$is_open', '$date_now', '$company_id')";
//                    $retvalJob = mysqli_query($link, $sql);
//                    if ($retvalJob) {
//                        $success = "Job was added";
//                    } else {
//                        echo $success = "Job was not added";
//                    }
//                }
//            }



    }

}
?>

<html>
<head>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>

</head>
<body>
<h1><?php echo $success ?></h1>
</body>
<form method = "POST" action ="<?php echo $PATH; ?>/homepage.php"</form>
<button>
    Return Home
</button>
</html>
