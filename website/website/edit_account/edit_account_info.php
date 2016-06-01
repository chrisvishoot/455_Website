<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/9/2016
 * Time: 12:04 PM
 */

require_once "../authorize.php";

    if($_SESSION['is_logged'] == True) {
        $sql = "SELECT * FROM users WHERE id=" . $_SESSION['user_id'];
        $result = $link->query($sql);
        if($result) {
            $row = $result->fetch_array(MYSQLI_ASSOC);

            $company_sql = "SELECT * FROM company WHERE company_id='" . $row['company_id'] . "'";
            $company_result = $link->query($company_sql);
            $company_row = $company_result->fetch_array(MYSQLI_ASSOC);
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
    <title>Edit Account</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
    <br>
    <form>
        <h2 align="center">Current Account Information</h2>
        <table>
            <tr>
                <th colspan="2"></th>
            </tr>
            <tr>
                <td><b>Your Name:</b></td>
                <td><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></td>
            </tr>
            <tr>
                <td><b>Your Username:</b></td>
                <td><?php echo $row['username'];?></td>
            </tr>
            <tr>
                <td><b>Your Email:</b></td>
                <td><?php echo $row['email'];?></td>
            </tr>
            <tr>
                <td><b>Account Type:</b></td>
                <td><?php echo $account_type;?></td>
            </tr>
            <tr>
                <td><b>Title:</b></td>
                <td><?php echo $row['work_title'];?></td>
            </tr>
            <tr>
                <td><b>Company/School:</b></td>
                <td><?php echo $company_row['company_name'];?></td>
            </tr>
        </table>
        <br>
    </form>
    <br>

    <form method="POST" action="<?php echo $PATH;?>/edit_account/edit_account_process.php">

        <h2 align="center">Add New Information</h2>

        <label>First Name
            <input type="text" name="first_name"/>
        </label>

        <label>Last Name
            <input type="text" name="last_name"/>
        </label>

<!--        <label>Email-->
<!--            <input type="text" name="email"/>-->
<!--        </label>-->

        

        <label>Position
            <input type="text" name="work_title"/>
        </label>

<!--        <label>Username-->
<!--            <input type="text" name="user_name"/>-->
<!--        </label>-->

        <br />
        <input name="add" type="submit" id="add"
               value="Submit New Information"/>
    </form>

    <form>
        <a class='a_B' href="<?php echo $PATH;?>/homepage.php">
            Go Back to Homepage
        </a>
    </form>

    <form>
        <a class='a_B' href="<?php echo $PATH;?>/logout.php">
            Logout
        </a>
    </form>

</body>

</html>