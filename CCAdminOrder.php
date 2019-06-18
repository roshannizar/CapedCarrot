<?php
require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TCC-Main Menu</title>
    <link rel="icon" href="CSS/Icons/carrot.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="stockDesign.css"/>
</head>
<body>
<div>

    <nav class="topnav">
        <b style="float:left;color:white;padding-left: 20px">The Caped Carrot</b>
        <a href="CCAdminPage.php">Home</a>
        <a href="#FoodMenu" onclick="window.open('CCFoodMenu.php')">Food Menu</a>
        <a href="#gmail" onclick="window.open('http://www.gmail.com')">E-mail</a>
        <a href="CCAdminCustomer.php">Customers</a>
        <a href="CCAdminSupplier.php">Suppliers</a>
        <a href="CCSigninAdmin.php" onclick="">Logout</a>
    </nav>
    <nav class="sidenav">
        <img src="CSS/Icons/user.png"><br/>
        <b style="color:white">
            <?php
            session_start();
            echo "AP: ".$_SESSION['login_user'];?></b><br/><br/>
        <a href="CCAdminPage.php"><button class="btn1" style="background-image:url(CSS/Icons/dashboard.png);background-repeat: no-repeat;background-size: 55px;background-position: top left">Dashboard</button></a>
        <button class="btn" style="border-left:4px solid white;background-image:url(CSS/Icons/stock.png);background-repeat: no-repeat;background-size: 55px;background-position: top left">Stock</button>
        <div class="btnorderdrop">
            <a href="CCAdminStockAvailable.php"><button>Available Stocks</button></a>
            <a href="CCAdminLowStock.php"><button>Least Stocks</button></a>
            <a href="CCAdminOutofstock.php"><button>Out of Stocks</button></a>
        </div>
        <button class="btn" style="background-image:url(CSS/Icons/orders.png);background-repeat: no-repeat;background-size: 55px;background-position: top left"><a href="#order" style="text-decoration:none;color:white">Order</a></button>
        <div class="btnorderdrop">
            <a href="CCAdminOrderProccessing.php"><button>Processing</button></a>
            <a href="CCAdminOrderPending.php"><button>Pending</button></a>
            <a href="CCAdminOrderInvoiced.php"><button>Invoiced</button></a>
            <a href="CCAdminOrderCancelled.php"><button>Cancelled</button></a>
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

    if(isset($_POST["orderid"]) && isset($_POST["stockid"]) && isset($_POST["username"]) && isset($_POST["orderd"]) && isset($_POST["txtdate"]) && isset($_POST["quantity"]))
    {
        $oid=$_POST["orderid"];
        $sid=$_POST["stockid"];
        $user=$_POST["username"];
        $otype=$_POST["orderd"];
        $odate=$_POST["txtdate"];
        $quan=$_POST["quantity"];
    }
    else{
    }

    if(isset($_POST["btnAdd"]))
    {
        $insertStock="INSERT INTO order_detail VALUES('$oid','$sid','$user','$otype','$odate','$quan')";

        if(!mysql_query($insertStock))
        {
            $error=die('Error'.mysql_error());
            echo '<script type="text/javascript">';
            echo 'alert($error)';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Order Details Added Successfully...")';
            echo 'location.reload()';
            echo '</script>';
        }
    }
    else if(isset($_POST["btnUpdate"]))
    {
        $updateStock="UPDATE order_detail SET stockid='$sid',username='$user',ordertype='$otype',date='$odate',quantity='$quan' WHERE orderid='$oid'";

        if(!mysql_query($updateStock))
        {
            $error=die('Error'.mysql_error());
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Order Details Update Successfully...")';
            echo '</script>';
        }
    }
    else if(isset($_POST["btnDelete"]))
    {
        $deleteStock="DELETE from order_detail WHERE orderid='$oid'";

        if(!mysql_query($deleteStock))
        {
            $error=die('Error'.mysql_error());
            echo '<script type="text/javascript">';
            echo 'alert($error)';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Order Details Deleted Successfully...")';
            echo '</script>';
        }
    }
    else
    {
    }

    ?>
    <div class="container">
        <?php

        $searchproduct=$_POST["searchp"];

        $search="SELECT * FROM order_detail WHERE orderid='$searchproduct'";

        $stock1=mysql_query($search);

        $row1=mysql_fetch_array($stock1);
        ?>

        <p style="color:black;font-size:18px;padding-left:10px">Order</p><hr/>
        <form name="supplierform" method="POST" action="CCAdminOrder.php" onsubmit="">
            <table style="margin-right: 150px;float:left">
                <tr>
                    <td><label>Order ID: </label></td>
                    <td><input type="text" placeholder="Order ID" name="orderid" value="<?php echo $row1["orderid"];?>"></td>
                </tr>
                <tr>
                    <td><label>Stock ID: </label></td>
                    <td><input type="text" placeholder="Stock ID" name="stockid" value="<?php echo $row1["stockid"];?>"></td>
                </tr>
                <tr>
                    <td><label>Customer Name:</label></td>
                    <td><input type="text" placeholder="User Name" name="username" value="<?php echo $row1["username"];?>"></td>
                </tr>
            </table>
            <table style="float:left">
                <tr>
                    <td><label>Order Type</label></td>
                    <td>
                        <input list="category" name="orderd" value="<?php echo $row1["ordertype"];?>">
                        <datalist id="category">
                            <option>Pending</option>
                            <option>Processing</option>
                            <option>Cancelled</option>
                            <option>Invoiced</option>
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td><label>Deliver Date:</label></td>
                    <td><input type="date" placeholder="mm/dd/yyyy" name="txtdate" value="<?php echo $row1["date"] ?>"></td>
                </tr>
                <tr>
                    <td><label>Quantity:</label></td>
                    <td><input type="text" placeholder="Quantity" name="quantity" value="<?php echo $row1["quantity"];?>"></td>
                </tr>
            </table>
            <p><br/></p>
            <table style="width:100%;text-align:center">
                <tr>
                    <td class="btntable">
                        <input type="submit" value="Add" name="btnAdd">
                        <input type="submit" value="Update" name="btnUpdate">
                        <input type="submit" value="Delete" name="btnDelete">
                        <input type="reset" value="Refresh" onclick="location.reload()">
                    </td>
                </tr>
            </table>
        </form>
        <hr style="border:1px solid teal"/>
        <br/>
        <div align="center">
            <form action="CCAdminOrder.php" method="POST">
                <input type="search" placeholder="Search Stock" name="searchp" style="width:80%;padding:10px;border:1px solid teal;border-bottom:3px solid teal;border-radius:5px">
                <input type="submit" value="Search">
            </form>
            <br/>
            <table cellspacing="10" class="datagridview" width="100%">
                <tr>
                    <th>Order ID</th>
                    <th>Stock ID</th>
                    <th>Customer Name</th>
                    <th>Order Type</th>
                    <th>Date</th>
                    <th>Quantity</th>
                </tr>
                <?php
                $DataGridView="SELECT * FROM order_detail";

                $stock=mysql_query($DataGridView);

                while($row=mysql_fetch_array($stock))
                {
                    ?>
                    <tr>
                        <td><?php echo $row['orderid']; ?></td>
                        <td><?php echo $row['stockid']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['ordertype']; ?></td>
                        <td><?php echo $row['date']; ?></td>
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