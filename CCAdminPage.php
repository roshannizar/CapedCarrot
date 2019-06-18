<?php
    require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TCC-Main Menu</title>
    <link rel="icon" href="CSS/Icons/carrot.ico" type="image/x-icon">
    <link rel="stylesheet" href="adminDesign.css">
</head>
<body>
<div>

    <nav class="topnav">
        <b style="float:left;color:white;padding-left: 20px">The Caped Carrot</b>
        <a href="CCAdminPage.php" style="color:#38daae">Home</a>
        <a href="#FoodMenu" onclick="window.open('CCFoodMenu.php')">Food Menu</a>
        <a href="#gmail" onclick="window.open('http://www.gmail.com')">E-mail</a>
        <a href="CCEditPage.php">Edit Page</a>
        <a href="CCAdminCustomer.php">Customers</a>
        <a href="CCAdminSupplier.php">Suppliers</a>
        <a href="AdminDestroy.php">Logout</a>
    </nav>
    <nav class="sidenav">
        <img src="CSS/Icons/user.png"><br/>
        <b style="color:white">
            <?phpsession_start();echo "AP: ".$_SESSION['login_user']; ?></b><br/><br/>
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
    <?php
        //$selectOrder="SELECT COUNT(ordertype) FROM order_detail WHERE ordertype='Processing'";
        $selectOrder1="SELECT COUNT(ordertype) FROM order_detail WHERE ordertype='Pending'";
        //$selectOrder2="SELECT COUNT(ordertype) FROM order_detail WHERE ordertype='Cancelled'";
        //$selectOrder3="SELECT COUNT(ordertype) FROM order_detail WHERE ordertype='Invoiced'";

        //$pd=mysql_query($selectOrder);
        $pd1=mysql_query($selectOrder1);
        //$pd2=mysql_query($selectOrder2);
        //$pd3=mysql_query($selectOrder3);
    ?>
    <div class="container">
        <p style="color:black;font-size:18px;padding-left:10px">Dashboard</p><hr/>
        <div class="subcontainer" style="background-image:url(CSS/Icons/orders.png);background-size:100px;background-repeat: no-repeat">
            <p>Orders Processing<br/><?php //echo $pd; ?></p>
        </div>
        <div class="subcontainer" style="background-image:url(CSS/Icons/customer.png);background-size:100px;background-repeat: no-repeat">
            <p>Orders Pending<br/><?php echo $pd1; ?></p>
        </div>
        <div class="subcontainer" style="background-image:url(CSS/Icons/plus.png);background-size:100px;background-repeat: no-repeat;float:right">
            <p>Orders Cancelled<br/><?php //echo $pd2; ?></p>
        </div>
        <div class="subcontainer" style="background-image:url(CSS/Icons/suppliers.png);background-size:100px;background-repeat: no-repeat;float:right">
            <p>Orders Invoiced<br/><?php //echo $pd3; ?></p>
        </div>
        <h4 style="margin:10px">Recent Orders</h4>
        <div style="margin:10px;background-color:silver;width:48%;height:340px;float:left">
        </div>
        <div style="margin:10px;background-color:silver;width:48%;height:340px;float:right">
        </div>
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