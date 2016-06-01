<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 3/1/2016
 * Time: 8:47 AM
 *
 */
require_once "../authorize.php";
?>

<html>
<head>
    <title>Job Added!</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
<h1>Job Successfully Created!</h1>

<form method="POST" action="<?php echo $PATH; ?>/homepage.php">
    <button>
        Back to Homepage
    </button>
</form>

</body>

</html>