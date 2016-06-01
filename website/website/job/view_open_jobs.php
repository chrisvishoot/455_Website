<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 3/1/2016
 * Time: 8:38 AM
 * Creates a new job
 */
require_once "../authorize.php";
$result;
if($_SESSION['is_logged'] == True) {
    $sql = "SELECT * FROM job WHERE is_open=" . 1;
    $result = $link->query($sql);


    if($result) {
        // $row = $result->fetch_array(MYSQLI_ASSOC);

    } else {
        echo "nothing returned";
    }
}
?>

<html>
<head>
    <title>View Open Jobs</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
<h1> View Open Jobs</h1>

<form  method="POST" action="<?php echo $PATH; ?>/job/create_job_process.php">

    Description: <textarea rows="5" cols="30" name="description" maxlength="2000" readonly>
    <?php
    while($row = $result->fetch_array()) {
        echo "Company = " . $row['company_name'] . " Location= " .  $row['location'] . " Description = ". $row['description'] .
        "\r\n\n";
    }

    ?>
    </textarea><br>

</form>
<form method="POST" action="<?php echo $PATH; ?>/homepage.php">
    <button>
        Go Back to Homepage
    </button>
</form>

</body>

</html>