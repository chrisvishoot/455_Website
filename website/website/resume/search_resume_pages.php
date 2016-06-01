<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/3/2016
 * Time: 08:03 PM
 */

require_once "../config.php";
?>

<html>
<head>
    <title>Job Search</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
<h1> Search for Resume Pages by the user email!</h1>

<form  method="POST" action="<?php echo $PATH; ?>/resume/search_resume_pages_process.php">
    Email: <input type="text" name="email" maxlength="50"><br>
    <input type="submit" value="Search Resume Pages">
</form>

<form  method="POST" action=<?php echo $PATH; ?>/homepage.php>
    <button>
        Go Back to Homepage
    </button>
</form>

</body>

</html>