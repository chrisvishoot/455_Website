<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 3/1/2016
 * Time: 2:22 PM
 */
require_once "../authorize.php";
$user_id = $_SESSION['user_id'];
if($_SESSION['is_logged'] == True) {
    $sql = "SELECT * FROM favorite WHERE user_id=". $user_id;
    $result = $link->query($sql);
    if($result) {

    } else {
        echo "nothing returned";
    }

}
?>
<html>
<head>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
<h1> View Favorite WebPages</h1>

<form  method="POST" action="<?php echo $PATH; ?>/homepage.php">

    Favorite URL: <textarea rows="5" cols="30" name="description" maxlength="2000" readonly>
    <?php
    while($row = $result->fetch_array()) {
        echo $row['web_url'] . "\r\n ";
    }

    ?>
    </textarea><br>

</form>

<form>
    <a class='a_B' href='<?php echo $PATH;?>/homepage.php'>
        Go Back To Homepage
    </a>
</form>

<form>
    <a class='a_B' href='<?php echo $PATH;?>/logout.php'>
        Logout
    </a>
</form>

</body>

</html>