<?php
require_once "config.php";
//echo md5("password" . $SALT);
?>
<html>
<head>
    <br>
    <h1>Welcome to Resume Tracker!</h1>
    <link type="text/css" rel="stylesheet" href="css/normalize.css" />
</head>

<body>

    <form method="POST" action="<?php echo $PATH; ?>/login.php">

        <label>email
            <input type="email" name="email"/>
        </label>
        <label> password
            <input type="password" name="password"/>
        </label>
            <button>
                Submit
            </button>
    </form>

    <form method="POST" action="<?php echo $PATH; ?>/register/register_new_user.php">
        <button>
            New? Click Here to Register!
        </button>
    </form>

</body>
</html>

