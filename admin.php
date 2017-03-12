<?php


session_start();
if(isset($_SESSION["admin"]))
{
    header("Location:http://localhost/health1/admin_home.php");

}
?>

<html>


<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="src/css/main.css">

</head>
<script type="text/javascript">
    function fun2() {


        var username = document.getElementById("user");
        alert(username.value);
    }
</script>
<body>
<form action="adminlogin_process.php" method="get" class="form-horizontal" role="form">
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">

        <legend>Admin Login</legend>
</div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <input type="text" id="user" name="username" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <input type="password" name="password" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <input type="submit" name="submit" value="submit">
        </div>
    </div>
</form>
</body>
</html>