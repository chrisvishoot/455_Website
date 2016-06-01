<?php

require_once "../config.php";

?>


<html>
<head>
    <title>Register New User</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>

<h1>Failed To Register Account</h1>
<h1>Either the account already exists</h1>
<h1>Or not all of the fields are filled out</h1>
<form method="POST" action="<?php echo $PATH; ?>/register/register_new_user_process.php">
    <button>
        Return To Registration
    </button>
</form>


</body>
</html>
