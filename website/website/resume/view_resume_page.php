<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/3/2016
 * Time: 7:30 PM
 */

    require_once "../config.php";
    echo $_SESSION['message'];
    $_SESSION['message'] = "";

    if($_SESSION['is_logged'] == True) {
        $user_id=$_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE id=" . $user_id;
        $result = $link->query($sql);
        if($result) {
            $row = $result->fetch_array(MYSQLI_ASSOC);

            $input = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            if ($input) {
                $web_id = $input['web_id'];
                $_SESSION['web_id'] = $web_id;
            } else {
                $web_id=$_SESSION['web_id'];
                header('Location: ' . $PATH . '/homepage.php');
                exit();
            }
            $rp_sql = "SELECT * FROM resume_website WHERE web_id=" . $web_id;
            $rp_result = $link->query($rp_sql);
            $rp_row = $rp_result->fetch_array(MYSQLI_ASSOC);
        } else {
            echo "nothing returned";
        }
    }
?>

<html>
<head>
    <title>View Resume Page Information</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
    <br>
    <form class='form_wider'>
        <h2 align="center">Resume Page Information</h2>
        <table>
            <tr>
                <th colspan="2"></th>
            </tr>
            <tr>
                <td><b>Focus:</b></td>
                <td><?php echo $rp_row['focus'];?></td>
                <td></td>
            </tr>
            <tr>
                <td><b>URL:</b></td>
                <td><a href="<?php echo $rp_row['url'];?>"><?php echo $rp_row['url'];?></a></td>
            </tr>
            <tr>
                <td><b>Description:</b></td>
                <td><?php echo $rp_row['description'];?></td>
            </tr>
            <tr>
                <td><b>Notes:</b></td>
                <td><?php echo $rp_row['notes'];?></td>
            </tr>
        </table>
        <br>
    </form>
    <br>

    <form method="GET" action="<?php echo $PATH;?>/feedback/view_feedback.php">
        <h3 align="center">Choose Which Comment to View</h3>
        <select id="comment_time" name="comment_time">
            <?php
            $sql="SELECT * FROM feedback WHERE web_id=".$web_id;
            $result=$link->query($sql);
            while ($row=mysqli_fetch_array($result)) {
                $comment=$row['comment'];
                $time=$row['timestamp'];
                echo "<option value=\"$time\">
                        $comment
                    </option>";
            }
            ?>
        </select>
        <button>
            View Full Comment
        </button>
    </form>

    <form method="POST" action="<?php echo $PATH;?>/resume/edit_resume_page_process.php">

        <h2 align="center">Edit Resume Page Information</h2>

        <label>Focus:
            <input type="text" name="focus"/>
        </label>

        <?php
        if ($rp_row['ex_or_in']=='I') {
            echo "<label>Append to URL:
                <input type='text' name='url'/>
            </label>";
        } else {
            echo "<label>New URL:
                <input type='text' name='url'/>
            </label>";
        }
        ?>

        <label>Description:
            <textarea rows="5" cols="30" name="description" maxlength="2000"></textarea><br>
        </label>

        <label>Notes:
            <textarea rows="5" cols="30" name="notes" maxlength="2000"></textarea><br>
        </label>

        <?php
        if ($rp_row['ex_or_in']=='I') {
            echo "<label>HTML Code:
                <textarea rows=\"5\" cols=\"30\" name=\"html_code\" maxlength=\"5000\"></textarea><br>
            </label>";
        }
        ?>

        <?php
        if ($rp_row['ex_or_in']=='I') {
            echo "<label>CSS Code:
                <textarea rows=\"5\" cols=\"30\" name=\"css_code\" maxlength=\"5000\"></textarea><br>
            </label>";
        }
        ?>
        <br>

        <input name="add" type="submit" id="add"
               value="Update Information"/>
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