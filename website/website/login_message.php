<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/7/2016
 * Time: 1:28 PM
 */

require_once "config.php";
    if ($_SESSION['is_logged'] == True) {
        $next_path = "homepage.php";
        $message = 'Proceed to Your Homepage';
    } else {
        $next_path = "index.php";
        $message = 'Back to Login Page';
    }
?>

<html>
<head>
    <title>Login </title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
<h1 style="center"><?php echo $_SESSION['message'];?></h1>
<form method="POST" action="<?php echo $PATH . "/" . $next_path; ?>">
    <button>
        <?php echo $message;?>
    </button>
</form>

</body>

</html>