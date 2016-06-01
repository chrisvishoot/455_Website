<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 3/1/2016
 * Time: 8:38 AM
 * Creates a new job
 */
require_once "../authorize.php";
//echo "hello there";
?>

<html>
<head>
    <title>Add Job</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
<h1> Add a New Job</h1>

<form  method="POST" action="<?php echo $PATH; ?>/job/create_job_process.php">
    Name: <input type="text" name="job_name" maxlength="50"><br>
    Description: <textarea rows="5" cols="30" name="description" maxlength="2000"></textarea><br>
    Closing Date (YYYY-MM-DD): <input type="datetime" name="closing_date"><br>
    Location: <input type="text" name="location" maxlength="100"><br>
    How to Apply: <input type="text" name="how_to_apply" maxlength="100"><br>
    <input type="submit" value="Create Job">
</form>
<form method="POST" action="<?php echo $PATH; ?>/homepage.php">
    <button>
        Go Back to Homepage
    </button>
</form>

</body>

</html>