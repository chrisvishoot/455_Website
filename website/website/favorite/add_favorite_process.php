<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 3/9/2016
 * Time: 10:42 PM
 */
require_once "../authorize.php";
    if($_SESSION['is_logged'] == True) {
        $input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $web_url_whitespace = mysqli_real_escape_string($link,$input['favorite_url']);
        $reason = mysqli_real_escape_string($link,$input['reason']);
        $user_id = $_SESSION['user_id'];
        $web_url = trim($web_url_whitespace);
        $sql_1 = "SELECT web_id FROM resume_website WHERE url='" .$web_url."'";
        $result = mysqli_query($link, $sql_1);
        if($result) {
            $row = mysqli_fetch_array($result);
            $web_id = $row['web_id'];
            if($reason and $web_url and $web_id and $user_id) {
                $sql =  "INSERT INTO favorite ". "(reason, user_id, web_url, web_id)".
                    " VALUES ('$reason', '$user_id', '$web_url', '$web_id')";
                $retval = mysqli_query($link, $sql);
                if($retval) {
                    header("Location: " . $PATH . "/homepage.php");
                }

            }
        } else {
            echo "fail";
        }


    }

?>
<html>
<head>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>
<body>
<form method="POST" action="<?php echo $PATH; ?>/homepage.php">
    URL Successfully Added!

    <button>
        Go Back to the Homepage
    </button>
</body>
</html>
