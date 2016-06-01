<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/3/2016
 * Time: 08:03 PM
 */

require_once "../authorize.php";
?>

<html>
<head>
    <title>Job Search</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
<h1> Search for Jobs!</h1>

<form  method="POST" action="<?php echo $PATH; ?>/job/job_search_results.php">
    Company: <input type="text" name="company" maxlength="50"><br>
    <input type="submit" value="Search Jobs">
</form>

<form  method="POST" action=<?php echo $PATH; ?>/homepage.php>
    <button>
        Go Back to Homepage
    </button>
</form>

</body>

</html>