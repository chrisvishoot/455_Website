<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/4/2016
 * Time: 2:22 PM
 */

/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 3/2/2016
 * Time: 10:53 PM
 * http://dev.mysql.com/doc/refman/5.7/en/mysql-real-escape-string.html
 * Go there to see how they do an insert with the PHP
 */
    require_once "../config.php";
?>

<html>
    <head>
    <title>Register New User</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
    <form method="POST" action="<?php echo $PATH; ?>/register/register_new_user_process.php">

        <label>First Name</label>
            <input type="text" name="first_name"/>

        <label>Last Name</label>
            <input type="text" name="last_name"/>

        <label>Email</label>
            <input type="text" name="email"/>

        <label>Account Type</label>
            <select name="account_type">
                <option value="blank">Select Option</option>
                <option value="R">Recruiter</option>
                <option value="S">Job Seeker</option>
            </select>

        <label>Company/School</label>
            <input type="text" name="company_name"/>

        <label>Position</label>
            <input type="text" name="work_title"/>

        <label>Username</label>
            <input type="text" name="user_name"/>

        <label>Password</label>
            <input type="password" name="password"/>

        <br />
        <input name="add" type="submit" id="add"
            value="Create Account"/>
    </form>

    <form method="POST" action="<?php echo $PATH; ?>">
        <button>
            Back
        </button>
    </form>

</body>

</html>
