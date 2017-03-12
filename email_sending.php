<script type="text/javascript">
    function fun()
    {
        alert("email send successfully");
        window.location="index.php";
    }
    function fun2()
    {
        alert("your email adddress is already register with us so please try with different one");
        window.location="index.php";
    }
</script>

<?php
include 'includes/functions.php';
$dbServer = 'localhost'; //Define database server host
$dbUsername = 'root'; //Define database username
$dbPassword = ''; //Define database password
$dbName = 'users'; //Define database name

//connect databse
$con = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
} else {

    $email_id = $_REQUEST["uid1"];
    echo $email_id;

    $to = "$email_id";
    $subject = "subscribed";
    $frm = "info@epictechnolabs.com";
    $txt = "10x fro subscribed\r\n";
    $txt .= "click here on activation link\r\n";
    $txt .= "http://epictechnolabs.com/activate.php?email='$to'";
    $headers = "From: $frm" . "\r\n" .
        "CC: somebodyelse@example.com";

    $query_showid = "select email from users where email='$email_id'";
    $res = mysqli_query($con,$query_showid);
    $count = 0;
    while ($row = mysqli_fetch_row($res)) {
        $count++;
    }
    if ($count >= 1) {
        echo "<script type='text/javascript'>fun2();</script>";
    } else {
        mail($to, $subject, $txt, $headers);
        echo "<script type='text/javascript'>fun();</script>";
    }
}
?>