<?php
    require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TCC-Main Menu</title>
    <link rel="stylesheet" type="text/css" href="customerDesign.css"/>
</head>
<body>
<div>

    <nav class="topnav">
        <b style="float:left;color:white;padding-left: 20px">The Caped Carrot</b>
        <a href="CCAdminPage.php">Home</a>
        <a href="#FoodMenu" onclick="window.open('CCFoodMenu.php')">Food Menu</a>
        <a href="#gmail" onclick="window.open('http://www.gmail.com')">E-mail</a>
        <a href="CCAdminCustomer.php" style="color:#38daae">Customers</a>
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
        <a href="CCAdminStock.php"><button class="btn" style="background-image:url(CSS/Icons/stock.png);background-repeat: no-repeat;background-size: 55px;background-position: top left">Stock</button></a>
        <div class="btnorderdrop">
            <button>Available Stocks</button>
            <button>Least Stocks</button>
            <button>Out of Stocks</button>
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
    <?php

    if(isset($_POST["username"]) && isset($_POST["cardno"]) && isset($_POST["paymenttype"]) && isset($_POST["amount"]) && isset($_POST["customername"]) && isset($_POST["address"]) && isset($_POST["contactno"]) && isset($_POST["password"]) && isset($_POST["email"]))
    {
        $cusname=$_POST["customername"];
        $add=$_POST["address"];
        $contno=$_POST["contactno"];
        $user=$_POST["username"];
        $pass=$_POST["password"];
        $ema=$_POST["email"];
        $cardnum=$_POST["cardno"];
        $payment=$_POST["paymenttype"];
        $amount=$_POST["amount"];
    }
    else{}


    if(isset($_POST["btnAdd"]))
    {
        $insertCustomer="INSERT INTO signup VALUES('$cusname','$user','$ema','$add','$pass','$contno','$payment','$cardnum','$amount')";

        if(!mysql_query($insertCustomer))
        {
            $error=die('Error'.mysql_error());
            echo $error;
            echo '<script type="text/javascript">';
            echo 'alert($error)';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Customer Details Added Successfully...")';
            echo '</script>';
        }
    }
    elseif (isset($_POST["btnUpdate"]))
    {
        $updateCustomer="UPDATE signup SET fullname='$cusname',email='$ema',address='$add',password='$pass',contactno='$contno',paymenttype='$payment',cardno='$cardnum',amount='$amount' WHERE username='$user'";

        if(!mysql_query($updateCustomer))
        {
            $error=die('Error'.mysql_error());
            echo $error;
            echo '<script type="text/javascript">';
            echo 'alert($error)';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Customer Details Updated Successfully...")';
            echo '</script>';
        }
    }
    else if(isset($_POST["btnDelete"]))
    {
        $deleteCustomer="DELETE FROM signup WHERE username='$user'";

        if(!mysql_query($deleteCustomer))
        {
            $error=die('Error'.mysql_error());
            echo $error;
            echo '<script type="text/javascript">';
            echo 'alert($error)';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Customer Details Deleted Successfully...")';
            echo '</script>';
        }
    }
    else
    {
    }
    ?>
    <?php

    $searchproduct=$_POST["searchp"];

    $search="SELECT * FROM signup WHERE username='$searchproduct'";

    $stock1=mysql_query($search);

    $row1=mysql_fetch_array($stock1);
    ?>
    <div class="container">
        <p style="color:black;font-size:18px;padding-left:10px">Customer</p><hr/>
        <form name="customerform" method="POST" action="CCAdminCustomer.php" onsubmit="">
            <table style="margin-right: 150px;float:left" cellspacing="10">
                <tr>
                    <td><label>User Name: </label></td>
                    <td><input type="text" placeholder="User Name" name="username" value="<?php echo $row1["username"]; ?>"></td>
                </tr>
                <tr>
                    <td><label>Customer Name: </label></td>
                    <td><input type="text" placeholder="Customer Name" name="customername" value="<?php echo $row1["fullname"]; ?>"></td>
                </tr>
                <tr>
                    <td><label>E-mail: </label></td>
                    <td><input type="email" placeholder="E-Mail" name="email" class="email" style="width:150%;border-radius: 4px;border:1px solid #008080;padding:10px;outline:none;color:black" value="<?php echo $row1["email"]; ?>"></td>
                </tr>
                <tr>
                    <td><label>Customer Address:</label></td>
                    <td><textarea type="textarea2" placeholder="Customer Address" name="address"><?php echo $row1["address"]; ?></textarea></td>
                </tr>
                <tr>
                    <td><label>Contact No:</label></td>
                    <td><input type="text" placeholder="Contact No" name="contactno" value="<?php echo $row1["contactno"]; ?>"></td>
                </tr>
                <div width="0">
                    <input hidden type="password" name="password" value="<?php echo $row1["password"]; ?>">
                    <input type="text" hidden name="cardno" value="<?php echo $row1["cardno"]; ?>">
                    <input type="text" hidden name="amount" value="<?php echo $row1["amount"]; ?>">
                    <input type="text" hidden name="paymenttype" value="<?php echo $row1["paymenttype"]; ?>">
                </div>
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

            <form method="POST" action="CCAdminCustomer.php">
                <input type="search" placeholder="Search user" name="searchp" style="width:80%;padding:10px;border:1px solid teal;border-bottom:3px solid teal;border-radius:5px">
                <input type="submit" value="Search">
            </form>

            <table cellspacing="10" class="datagridview" width="90%">
                <tr>
                    <th>Customer Name</th>
                    <th>E-Mail</th>
                    <th colspan="3">Address</th>
                    <th>Contact No</th>
                </tr>
                <?php
                $DataGridView="SELECT * FROM signup";

                $customer=mysql_query($DataGridView);

                while($row=mysql_fetch_array($customer))
                {
                    ?>
                    <tr>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td colspan="3"><?php echo $row['address']; ?></td>
                        <td><?php echo $row['contactno']; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<script language="JavaScript" type="text/javascript">
    var btn=document.getElementsByClassName("btn");
    var i;
    for(i=0;i<btn.length;i++)
    {
        btn[i].onclick=function()
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