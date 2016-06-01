<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/10/2016
 * Time: 4:13 PM
 */

    require_once "../config.php";
    echo $_SESSION['message'];
    $_SESSION['message'] = "";
?>

<html>
<head>
    <title>Link to Your Resume Page</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
<h1>Step 2: Link to Your Resume Page!</h1>

<form  method="POST" action="<?php echo $PATH; ?>/resume/add_external_page_process.php">
    Focus: <input type="text" name="focus" maxlength="50"><br>
    URL, Fully Paste URL including "HTTPS://": <input type="text" name="URL" maxlength="250"><br>
    Description: <textarea rows="5" cols="30" name="description" maxlength="2000"></textarea><br>
    <input type="submit" value="Create Webpage Link">
</form>

<form>
    <a class='a_B' href="<?php echo $PATH; ?>/homepage.php"">
    Go Back to Homepage
    </a>
</form>
</body>
</html>