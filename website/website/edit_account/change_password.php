<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/9/2016
 * Time: 4:07 PM
 */

require_once "../authorize.php";
echo $_SESSION['message'];
$_SESSION['message'] = "";

    if($_SESSION['is_logged'] == True) {
        $sql = "SELECT * FROM users WHERE id=" . $_SESSION['user_id'];
        $result = $link->query($sql);
        if($result) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if ($row['user_type'] == 'S') {
                $account_type = "Job Seeker";
            } else {
                $account_type = "Recruiter";
            }
        } else {
            echo "nothing returned";
        }
    }
?>

<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
    <br>

    <form method="POST" action="<?php echo $PATH;?>/edit_account/change_password_process.php">

        <h2 align="center">Change Password</h2>

        <label>Current Password
            <input type="password" name="c_password"/>
        </label>

        <label>New Password
            <input type="password" name="new_pass1"/>
        </label>

        <label>Confirm New Password
            <input type="password" name="new_pass2"/>
        </label>

        <br />
        <input name="add" type="submit" id="add"
               value="Submit New Password"/>
    </form>

    <form>
        <a class='a_B' href="<?php echo $PATH;?>/homepage.php">
            Back to Homepage
        </a>
    </form>

    <form>
        <a class='a_B' href="<?php echo $PATH;?>/logout.php">
            Logout
        </a>
    </form>

</body>

</html>