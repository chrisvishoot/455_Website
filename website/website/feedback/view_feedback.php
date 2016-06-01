<?php
/**
 * Created by PhpStorm.
 * User: Gabe
 * Date: 3/3/2016
 * Time: 7:30 PM
 */

require_once "../authorize.php";
echo $_SESSION['message'];
$_SESSION['message'] = "";

if($_SESSION['is_logged'] == True) {
    $user_id=$_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE id=" . $user_id;
    $result = $link->query($sql);
    if($result) {
        $input = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $time = mysqli_real_escape_string($link,$input['comment_time']);
        $web_id=$_SESSION['web_id'];

        $fb_sql = "SELECT * FROM feedback WHERE timestamp='" . $time ."' AND web_id='" . $web_id . "'";
        $fb_result = $link->query($fb_sql);
        $fb_row = $fb_result->fetch_array(MYSQLI_ASSOC);

        $rs_sql = "SELECT * FROM resume_website WHERE web_id='" . $web_id . "'";
        $rs_result = $link->query($rs_sql);
        $rs_row = $rs_result->fetch_array(MYSQLI_ASSOC);

        $commentor_id = $fb_row['user_id'];
        $commentor_sql = "SELECT * FROM users WHERE id='".$commentor_id."'";
        $commentor_result = $link->query($commentor_sql);
        $commentor_row = $commentor_result->fetch_array(MYSQLI_ASSOC);


    } else {
        echo "nothing returned";
    }
}
?>

    <html>
    <head>
        <title>View Feedback</title>
        <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
    </head>

    <body>
    <br>
    <form class='form_wider'>
        <h2 align="center">View Feedback</h2>
        <table>
            <tr>
                <th colspan="2"></th>
            </tr>
            <tr>
                <td><b>Focus:</b></td>
                <td><?php echo $rs_row['focus'];?></td>
                <td></td>
            </tr>
            <tr>
                <td><b>URL:</b></td>
                <td><a href="<?php echo $rs_row['url'];?>"><?php echo $rs_row['url'];?></a></td>
            </tr>
            <tr>
                <td><b>Comment:</b></td>
                <td><?php echo $fb_row['comment'];?></td>
            </tr>
            <tr>
                <td><b>Commenter Username:</b></td>
                <td><?php echo $commentor_row['first_name'];?></td>
            </tr>
            <tr>
                <td><b>Comment Made @:</b></td>
                <td><?php echo $fb_row['timestamp'];?></td>
            </tr>
        </table>
        <br>
    </form>
    <br>

    <form>
        <a class='a_B' href="<?php echo $PATH;?>/resume/view_resume_page.php">
            Back to Resume Page Info
        </a>
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