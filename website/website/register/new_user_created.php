<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/4/2016
 * Time: 2:23 PM
 */
require_once "../authorize.php";
?>

<html>
<head>
    <title>User Added</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
    <h1>Account Successfully Created!</h1>

    <form method="POST" action="<?php echo $PATH; ?>/login.php">
        <button>
            Login
        </button>
    </form>

</body>

</html>