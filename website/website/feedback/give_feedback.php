<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/3/2016
 * Time: 08:06 PM
 */
require_once "../authorize.php";
if($_SESSION['is_logged'] == True) {
    $sql = "SELECT * FROM resume_website";
    $result = $link->query($sql);
    if($result) {

    } else {
        echo "nothing returned";
    }

}
?>
<html>
<head>
    <title>Give Feedback</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
    <form method="POST" action="<?php echo $PATH; ?>/feedback/give_feedback_process.php">
        <h3>Here are the available sites</h3>
        Websites Available: <textarea rows="5" cols="30" name="comment" maxlength="2000" readonly>
             <?php

             while($row = $result->fetch_array()) {
                 echo $row['url'] . "\n ";
             }
             ?>

        </textarea><br>

        <h3>Paste the URL to give feedback</h3>
        Exact URL: <input type="text" name="web_url" maxlength="250">
        Comment: <textarea rows="5" cols="30" name="comment" maxlength="2000"></textarea><br>

        <button>
           Add Comment
        </button>
    </form>

    <form method="POST" action="<?php echo $PATH; ?>/homepage.php">
        <button>
            Back to Homepage
        </button>
    </form>

</body>

</html>

