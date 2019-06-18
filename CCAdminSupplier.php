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

    if(isset($_POST["supplierid"]) && isset($_POST["companyname"]) && isset($_POST["caddress"]) && isset($_POST["contactno"]))
    {
        $supid=$_POST["supplierid"];
        $comname=$_POST["companyname"];
        $add=$_POST["caddress"];
        $contno=$_POST["contactno"];
    }
    else
    {
    }

    if(isset($_POST["btnAdd"]))
    {
        $insertSupplier="INSERT INTO supplier VALUES('$supid','$comname','$add','$contno')";

        if(!mysql_query($insertSupplier))
        {
            $error=die('Error'.mysql_error());
            echo '<script type="text/javascript">';
            echo 'alert($error)';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Supplier Details Added Successfully...")';
            echo '</script>';
        }
    }
    else if(isset($_POST["btnUpdate"]))
    {
        $updateSupplier="UPDATE supplier SET companyname='$comname',address='$add',contactno='$contno' WHERE supplierid='$supid'";

        if(!mysql_query($insertSupplier))
        {
            $error=die('Error'.mysql_error());
            echo '<script type="text/javascript">';
            echo 'alert($error)';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Supplier Details Updated Successfully...")';
            echo '</script>';
        }
    }
    else if(isset($_POST["btnDelete"]))
    {
        $deleteSupplier="DELETE FROM supplier WHERE supplierid='$supid'";

        if(!mysql_query($insertSupplier))
        {
            $error=die('Error'.mysql_error());
            echo '<script type="text/javascript">';
            echo 'alert($error)';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Supplier Details Deleted Successfully...")';
            echo '</script>';
        }
    }
    else
    {
    }

    ?>

    <?php

    $searchproduct=$_POST["searchp"];

    $search="SELECT * FROM supplier WHERE supplierid='$searchproduct'";

    $stock1=mysql_query($search);

    $row1=mysql_fetch_array($stock1);
    ?>

    <div class="container">
        <p style="color:black;font-size:18px;padding-left:10px">Supplier</p><hr/>
        <form name="supplierform" method="POST" action="CCAdminSupplier.php" onsubmit="">
            <table style="margin-right: 150px;float:left" cellspacing="10">
                <tr>
                    <td><label>Supplier ID:</label></td>
                    <td><input type="text" placeholder="Supplier ID" name="supplierid" value="<?php echo $row1["supplierid"]; ?>"></td>
                </tr>
                <tr>
                    <td><label>Company Name:</label></td>
                    <td><input type="text" placeholder="Company Name" name="companyname" value="<?php echo $row1["companyname"]; ?>"></td>
                </tr>
                <tr>
                    <td><label>Company Address:</label></td>
                    <td><textarea type="textarea2" placeholder="Company Address" name="caddress"><?php echo $row1["address"]; ?></textarea></td>
                </tr>
                <tr>
                    <td><label>Contact No:</label></td>
                    <td><input type="text" placeholder="Contact No" name="contactno" value="<?php echo $row1["contactno"]; ?>"></td>
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
            <form method="POST" action="CCAdminSupplier.php">
                <input type="search" placeholder="Search user" name="searchp" style="width:80%;padding:10px;border:1px solid teal;border-bottom:3px solid teal;border-radius:5px">
                <input type="submit" value="Search">
            </form>
            <br/>
            <table cellspacing="10" class="datagridview" width="90%">
                <tr>
                    <th>Supplier ID</th>
                    <th>Company Name</th>
                    <th colspan="3">Address</th>
                    <th>Contact No</th>
                </tr>
                <?php
                $DataGridView="SELECT * FROM supplier";

                $supplier=mysql_query($DataGridView);

                while($row=mysql_fetch_array($supplier))
                {
                    ?>
                    <tr>
                        <td><?php echo $row['supplierid']; ?></td>
                        <td><?php echo $row['companyname']; ?></td>
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
