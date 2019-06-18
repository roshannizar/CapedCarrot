<?php
require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TCC-Main Menu</title>
    <link rel="icon" href="CSS/Icons/carrot.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="EditPage.css"/>
    <style>
        input[type=text]
        {
            border:none;
            border-bottom:2px solid teal;
            background-color:transparent;
            padding:5px;
        }
        input[type=submit],.checkpage1
        {
            margin:5px;
            width:25%;
            padding:10px;
            background-color: teal;
            color:white;
            border-radius:10px;
            outline:none;
            font-size:15px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border:1px solid white;
            transition-duration: 1.0s;
        }
    </style>
</head>
<body>
<div>

    <nav class="topnav">
        <b style="float:left;color:white;padding-left: 20px">The Caped Carrot</b>
        <a href="CCAdminPage.php" style="color:#38daae">Home</a>
        <a href="#FoodMenu" onclick="window.open('CC Food Menu.html')">Food Menu</a>
        <a href="#gmail" onclick="window.open('http://www.gmail.com')">E-mail</a>
        <a href="CCAdminCustomer.php">Customers</a>
        <a href="CCAdminSupplier.php">Suppliers</a>
        <a href="#Search">Edit Page</a>
        <a href="AdminDestroy.php">Logout</a>
    </nav>
    <nav class="sidenav">
        <img src="CSS/Icons/user.png"><br/>
        <b style="color:white">
            <?php
            session_start();
            echo "AP: ".$_SESSION['login_user'];?></b><br/><br/>
        <a href="CCAdminPage.php"><button class="btn1" style="background-image:url(CSS/Icons/dashboard.png);background-repeat: no-repeat;background-size: 55px;background-position: top left;border-left:5px solid white;">Dashboard</button></a>
        <a href="CCAdminStock.php"><button class="btn" style="background-image:url(CSS/Icons/stock.png);background-repeat: no-repeat;background-size: 55px;background-position: top left">Stock</button></a>
        <div class="btnorderdrop">
            <button>Available Stocks</button>
            <button>Least Stocks</button>
            <button>Out of Stocks</button>
        </div>
        <a href="CCAdminOrder.php"><button class="btn" style="background-image:url(CSS/Icons/orders.png);background-repeat: no-repeat;background-size: 55px;background-position: top left">Orders</button></a>
        <div class="btnorderdrop">
            <button>Pending Orders</button>
            <button>Processing</button>
            <button>Invoiced</button>
            <button>Cancelled Order</button>
        </div>
        <button class="btn" style="background-image:url(CSS/Icons/setting.png);background-repeat: no-repeat;background-size: 55px;background-position: top left">Settings</button>
        <div class="btnorderdrop">
            <a href="CCAdminResetPassword.php"><button>Change Password</button></a>
        </div>
        <br/><br/>
        <div>
            <a href="http://www.facebook.com"><img src="CSS/Icons/facebook1.png" style="width:20%"></a>
            <a href="http://www.instagram.com"><img src="CSS/Icons/insta.png" style="width:20%"></a>
            <a href="http://www.linkedin.com"><img src="CSS/Icons/in.png" style="width:20%"></a>
            <a href="http://www.google+.com"><img src="CSS/Icons/gplus.png" style="width:20%"></a>
        </div>
    </nav>
    <div class="container">
        <p style="color:black;font-size:18px;padding-left:10px">Page Customization</p><hr/>
        <center>
        <div>
            <img src="CSS/Images/content.png" style="width:60%;margin-top:50px">
            <br/><br/>
            <form method="post" action="CCEditPage.php">
                <input type="text" placeholder="Enter Text Field to be filled" name="homedit">
                <input type="submit" value="Insert Page Detail" name="btnInsert">
                <input type="submit" value="Update Page" name="btnPage">
                <input type="submit" value="Remove Page Detail" name="btnRemove">
>            </form>
            <button onclick="window.open('CCHomePage.php')" class="checkpage1">Check Home Page</button></a>
            <?php
                if(isset($_POST["homedit"]))
                {
                    $edit=$_POST["homedit"];
                }
                if(isset($_POST["btnInsert"]))
                {
                    $insertpage="INSERT INTO page VALUES('$edit')";

                    if(mysql_query($insertpage))
                    {
                        echo '<script type="text/javascript">';
                        echo 'alert("All Done Inserted")';
                        echo '</script>';
                    }
                    else
                    {
                        echo '<script>';
                        echo 'alert("Error occured...")';
                        echo '<script>';
                    }
                }
                else if(isset($_POST["btnPage"]))
                {
                    $insertPage="UPDATE page SET editdetail='$edit'";

                    if(mysql_query($insertPage))
                    {
                        echo '<script type="text/javascript">';
                        echo 'alert("All Done Updated")';
                        echo '</script>';
                    }
                    else
                    {
                        echo '<script>';
                        echo 'alert("Error occured...")';
                        echo '<script>';
                    }
                }
                else if(isset($_POST["btnRemove"]))
                {
                    $updatePage="DELETE FROM page";

                    if(mysql_query($updatePage))
                    {
                        echo '<script type="text/javascript">';
                        echo 'alert("All Done Deleted")';
                        echo '</script>';
                    }
                    else
                    {
                        echo '<script>';
                        echo 'alert("Error occured...")';
                        echo '<script>';
                    }
                }
                else
                {}
            ?>
        </div>
        </center>
    </div>
</div>
<script language="JavaScript" type="text/javascript">
    var butt=document.getElementsByClassName("btn");
    var i;
    for(i=0;i<butt.length;i++)
    {
        butt[i].onclick=function()
        {
            this.classList.toggle("active");
            var secbut=this.nextElementSibling;
            if(secbut.style.maxHeight)
            {
                secbut.style.maxHeight=null;
            }
            else
            {
                secbut.style.maxHeight=secbut.scrollHeight+"px";
            }
        }
    }
</script>
</body>
</html>
