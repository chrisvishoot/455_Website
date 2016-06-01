<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 3/1/2016
 * Time: 8:47 AM
 *
 */
require_once "../authorize.php";
if($_SESSION['is_logged'] == True) {
    $sql = "SELECT * FROM resume_website";
    $result = $link->query($sql);
    if($result) {

    } else {
        echo "nothing returned";
    }

}
?>

<html>
<head>
    <title>Job Added!</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
<form method="POST" action="<?php echo $PATH; ?>/favorite/add_favorite_process.php"
      <h1>Below are the websites that are available and relevant to this site!</h1>
Available: <textarea rows="5" cols="30" name="reason" maxlength="2000" readonly>
 <?php
 while($row = $result->fetch_array()) {
     echo $row['url'] . "\r\n ";
 }

 ?>
</textarea><br>
<h1>Paste in your favorite resume website!</h1>
<input type="text" name="favorite_url"/>
Description: <textarea rows="5" cols="30" name="reason" maxlength="2000"></textarea><br>

<button>
    Add Favorite URL
</button>
</form>
<form method="POST" action="<?php echo $PATH; ?>/homepage.php">
    <button>
        Back to Homepage
    </button>
</form>

</body>

</html>