<?php
session_start();
?>
<style>
    .navbar-nav li a:hover{
        color: black;
        background-color: transparent;
    }
    .navbar-nav li a{
        color:#2e6da4;
    }
    .nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
        background-color: #292c2f;
    }
</style>
<nav class="navbar navbar-fixed-top" style="z-index:5; font-weight: 700;letter-spacing: 2px;margin: 0; padding: 0;  background-color: white;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar" style="background-color: black"></span>
                <span class="icon-bar"  style="background-color: black"></span>
                <span class="icon-bar"  style="background-color: black"></span>
            </button>
            <a class="navbar-brand wow pulse" data-wow-iteration="infinite" data-wow-duration="2000ms" href="index.php" ><img src="logo.png" height="40px"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="Health_Check.php">Health Checker</a> </li>
                <li><a href="threshold.php">threshold</a></li>
                <li><a href="history.php">History</a>
                <li><a href="about_us.php">About Us</a>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown"   aria-haspopup="true" aria-expanded="false"><?php echo '<span class="glyphicon glyphicon-user"></span><button type="button" style="background-color: white; border-color: transparent">' . $_SESSION["username"] . ' </button>'; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" >
                        <?php
                        $output1 = '<a href="logout.php?logout">LogOut</a>';
                        echo '<li>' . $output1 . '</li>';
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>