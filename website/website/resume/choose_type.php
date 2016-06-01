<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/10/2016
 * Time: 4:37 PM
 */

    require_once "../config.php";
    echo $_SESSION['message'];
    $_SESSION['message'] = "";
?>

    <html>
    <head>
        <title>Create Resume Page</title>
        <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
    </head>

    <body>
    <h1> Step 1: Choose Resume Webpage Type</h1>

    <form method="POST" action="<?php echo $PATH; ?>/resume/choose_type_process.php">
        <br>
        Would you like us to host your html/css website?
        Or would you like to link to your own already built webpage?
        Choose <b>Internal</b> to upload your html, css, and images so we
        can host; choose <b>External</b> to link to your already constructed page.
        <br>
        <br>
        <label>Account Type</label>
        <select name="url_type">
            <option value="blank">Choose</option>
            <option value="E">External</option>
            <option value="I">Internal</option>
        </select>
        <input type="submit" value="Choose Page Type">
    </form>

    <form>
        <a class='a_B' href="<?php echo $PATH; ?>/homepage.php"">
        Go Back to Homepage
        </a>
    </form>
    </body>
    </html>