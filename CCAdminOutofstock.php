<?php
    require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TCC-Main Menu</title>
    <link rel="icon" href="CSS/Icons/carrot.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="customerDesign.css"/>
</head>
<body>
<div>

    <nav class="topnav">
        <b style="float:left;color:white;padding-left: 20px">The Caped Carrot</b>
        <a href="CCAdminPage.php">Home</a>
        <a href="#FoodMenu" onclick="window.open('CCFoodMenu.php')">Food Menu</a>
        <a href="#gmail" onclick="window.open('http://www.gmail.com')">E-mail</a>
        <a href="CCAdminCustomer.php">Customers</a>
        <a href="CCAdminSupplier.php" style="color:#38daae">Suppliers</a>
        <a href="CCSigninAdmin.php" onclick="">Logout</a>
    </nav>
    <nav class="sidenav">
        <img src="CSS/Icons/user.png"><br/>
        <b style="color:white">
            <?php
            session_start();
            echo "AP: ".$_SESSION['login_user'];?></b><br/><br/>
        <a href="CCAdminPage.php"><button class="btn1" style="background-image:url(CSS/Icons/dashboard.png);background-repeat: no-repeat;background-size: 55px;background-position: top left">Dashboard</button></a>
        <a href="CCAdminStock.php"><button class="btn" style="background-image:url(CSS/Icons/stock.png);background-repeat: no-repeat;background-size: 55px;background-position: top left">Stock</button></a>
        <div class="btnorderdrop">
            <a href="CCAdminStockAvailable.php"><button>Available Stocks</button></a>
            <a href="CCAdminLowStock.php"><button>Least Stocks</button></a>
            <a href="CCAdminOutofstock.php"><button>Out of Stocks</button></a>
        </div>
        <a href="CCAdminOrder.php"><button class="btn" style="background-image:url(CSS/Icons/orders.png);background-repeat: no-repeat;background-size: 55px;background-position: top left">Orders</button></a>
        <div class="btnorderdrop">
            <button>All Orders</button>
            <button>Pending Orders</button>
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
        <p style="color:black;font-size:18px;padding-left:10px">Stock Available</p>
        <hr style="border:1px solid teal"/>
        <br/>
        <div align="center">
            <table cellspacing="10" class="datagridview" width="90%">
                <tr>
                    <th>Stock ID</th>
                    <th>Stock Name</th>
                    <th>Category Name</th>
                    <th colspan="3">Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
                <?php
                $DataGridView="SELECT * FROM stock where quantity<=5";

                $stock=mysql_query($DataGridView);

                while($row=mysql_fetch_array($stock))
                {
                    ?>
                    <tr style="background-color:red;color:white">
                        <td><?php echo $row['stockid']; ?></td>
                        <td><?php echo $row['stockname']; ?></td>
                        <td><?php echo $row['categoryname']; ?></td>
                        <td colspan="3"><?php echo $row['description']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
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
