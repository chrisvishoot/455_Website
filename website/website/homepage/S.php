<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/9/2016
 * Time: 2:07 PM
 */

    require_once "../config.php";
    //$_SESSION['web_id']="";
    if($_SESSION['is_logged'] == True) {
        $user_id=$_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE id=" . $user_id;
        $result = $link->query($sql);
        if($result) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if ($row['user_type'] == 'S') {
                $_SESSION['message']="";
                $account_type = "Job seeker";
                $company_sql = "SELECT * FROM company WHERE company_id='" . $row['company_id'] . "'";
                $company_result = $link->query($company_sql);
                $company_row = $company_result->fetch_array(MYSQLI_ASSOC);
            } elseif ($row['user_type'] == 'R') {
                $_SESSION['message']="You are not authorized to view page. Redirecting to your homepage.";
                header('Location: '.$PATH.'/homepage/S.php');
                exit();
            } else {
                $_SESSION['message']="You are not authorized to view page.";
                header('Location: '.$PATH.'/logout.php');
                exit();
            }
        } else {
            $_SESSION['message']="Unable to locate your account. Please sign in again.";
            header('Location: '.$PATH.'/logout.php');
            exit();
        }
    } else {
        $_SESSION['message'] = "You are not authorized to view page. Please login or create an account.";
        header('Location: '.$PATH.'/logout.php');
        exit();
    }
?>

<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
    <br>
    <h1> Welcome <?php echo $row['first_name'];?>! </h1>

    <form class='form_wider'>
        <h2 align="center">Account Information</h2>
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
        <a class='a_B' href="<?php echo $PATH; ?>/edit_account/edit_account_info.php">
            Edit Account Information
        </a>
        <br>

        <a class='a_B' href="<?php echo $PATH; ?>/edit_account/change_password.php">
            Change Password
        </a>
    </form>

    <form method="GET" action="<?php echo $PATH; ?>/resume/link_resume_page.php">
        <h3 align="center">Choose a Resume Page to View</h3>
        <select id="url_link" name="url_link">
            <?php
            $ddsql="SELECT focus, url FROM resume_website WHERE user_id=".$user_id;
            $link_result=$link->query($ddsql);
            while ($ddrow=mysqli_fetch_array($link_result)) {
                $link_focus=$ddrow['focus'];
                $link_url=$ddrow['url'];
                echo "<option value=\"$link_url\">
                    $link_focus
                </option>";
            }
            ?>
        </select>

        <button>
            Go to Resume Page URL
        </button>
    </form>

    <form method="GET" action="<?php echo $PATH; ?>/resume/view_resume_page.php">
        <h3 align="center">View Resume Page Information</h3>
        <select id="web_id" name="web_id">
        <?php
            $ddsql="SELECT web_id, focus FROM resume_website WHERE user_id=".$user_id;
            $link_result=$link->query($ddsql);
            while ($ddrow=mysqli_fetch_array($link_result)) {
                $link_focus=$ddrow['focus'];
                $web_id=$ddrow['web_id'];
                echo "<option value=\"$web_id\">
                    $link_focus
                </option>";
            }
        ?>
        </select>

        <button>
            View Page Information
        </button>
    </form>

    <form>
    <a class='a_B' href='<?php echo $PATH; ?>/resume/choose_type.php'>
        Create New Resume Page
    </a>
    </form>

    <form>
        <a class='a_B' href='<?php echo $PATH;?>/resume/search_resume_pages.php'>
            Search Resume Pages
        </a>
    </form>

    <!--Need to add drop down!-->
    <form>
        <a class='a_NI' href='<?php echo $PATH; ?>/job/view_open_jobs.php'>
            View Jobs Applied For
        </a>
    </form>

    <form>
        <a class='a_B' href='<?php echo $PATH; ?>/job/search_jobs.php'>
            Search for Open Jobs
        </a>
    </form>

    <!--Need to add drop down!-->
    <form>
        <a class='a_B' href='<?php echo $PATH;?>/favorite/view_favorites.php'>
            View a Favorite URL
        </a>
    </form>

    <form>
        <a class='a_B' href='<?php echo $PATH;?>/favorite/add_favorite.php'>
            Add a Favorite URL
        </a>
    </form>

    <form>
        <a class='a_B' href='<?php echo $PATH;?>/feedback/give_feedback.php'>
            Give Feedback
        </a>
    </form>

    <form>
        <a class='a_B' href='<?php echo $PATH;?>/logout.php'>
            Logout
        </a>
    </form>

</body>

</html>