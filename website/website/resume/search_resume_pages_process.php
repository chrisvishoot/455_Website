<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 3/13/2016
 * Time: 12:44 PM
 */
require_once "../config.php";
$input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$email = trim(mysqli_real_escape_string($link,$input['email']));
$sql = "SELECT * FROM users WHERE email='" . $email . "'";
$ret = mysqli_query($link, $sql);
$row = mysqli_fetch_array($ret);
$user_id = $row['id'];
echo $user_id;

$sql_webpages = "SELECT * FROM resume_website WHERE user_id='" . $user_id. "'";
$ret_web = mysqli_query($link, $sql_webpages);

?>

<html>
<head>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
<form>
<h1> Search Results:</h1>
<select id='url_link' name='url_link'>"
    <?php
    //$ddsql="SELECT focus, url FROM resume_website WHERE user_id=".$user_id;
    //$link_result=$link->query($ddsql);
    while ($row_web = mysqli_fetch_array($ret_web)) {
//        $company_name=$row['company_name'];
//        $location = $row['location'];
//        $date_added = $row['date_added'];
//        $job_name = $row['job_name'];
//        $closing_date = $row['closing_date'];
        $url = $row_web['url'];
        echo "<option value=\"$url\">
                                    $url
                                </option>";

    }
    ?>
</select>
</form>
<form  method="POST" action=<?php echo $PATH; ?>/homepage.php>
    <button>
        Go Back to Homepage
    </button>
</form>

</body>

</html>
