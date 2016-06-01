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
    <title>Upload the Code for Your Resume Page</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
    <br>
    <h1>Step 2: Upload the Code for Your Resume Page!</h1>

    <form method="POST" action="<?php echo $PATH; ?>/resume/add_internal_page_process.php">
        Focus: <input type="text" name="focus" maxlength="50"><br>
        Append to URL: <input type="text" name="URL" maxlength="50"><br>
        Description: <textarea rows="5" cols="30" name="description" maxlength="2000"></textarea><br>
        HTML file: <textarea rows="5" cols="30" name="html_code" maxlength="5000"></textarea><br>
        CSS file: <textarea rows="5" cols="30" name="css_code" maxlength="5000"></textarea><br>
        <input type="submit" class='input_NI' value="Create Webpage">
    </form>

    <form>
        <a class='a_B' href="<?php echo $PATH; ?>/homepage.php"">
        Go Back to Homepage
        </a>
    </form>
</body>
</html>