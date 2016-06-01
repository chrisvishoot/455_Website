<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 3/7/2016
 * Time: 12:08 PM
 */
    require_once "../authorize.php";
        $input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $company = trim(mysqli_real_escape_string($link,$input['company']));

        $sql_1 = "SELECT * FROM job WHERE company_name='" . $company . "'";
        $ret = mysqli_query($link, $sql_1);




?>
<head>
    <title>Job Search Result</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css"/>
</head>

<body>
<form method="POST" action="<?php echo $PATH; ?>/add_application.php">
<h1> Job Results, Select one if interested</h1>
<select id='url_link' name='url_link'>"
    <?php
    //$ddsql="SELECT focus, url FROM resume_website WHERE user_id=".$user_id;
    //$link_result=$link->query($ddsql);
    while ($row = mysqli_fetch_array($ret)) {
        $company_name=$row['company_name'];
        $company_id = $row['company_id'];
        $location = $row['location'];
        $date_added = $row['date_added'];
        $job_name = $row['job_name'];
        $closing_date = $row['closing_date'];
        echo "<option value=\"$company_id\">
                                    Company Name:$company_name  Location:$location Date Added:$date_added
                                    Job Name: $job_name Closing Date: $closing_date
                                </option>";

    }
    ?>
</select>
</form>
<form method="POST" name= "Apply">
<button class="a_NI">
    Click Here to Apply!
    <?php
    echo $_POST['url_link'];?>
</button>
    <?php
    if($_POST['Apply']) {
        echo $_POST['url_link'];
    }
    ?>
</form>


<form>
    <a class='a_B' href='<?php echo $PATH;?>/job/search_jobs.php'>
        Return to Job Search
    </a>
</form>


<form  method="POST" action=<?php echo $PATH; ?>/homepage.php>
    <button>
        Go Back to Homepage
    </button>
</form>

</body>

</html>
