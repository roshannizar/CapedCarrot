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
        <?php

            $searchproduct=$_POST["searchp"];

            $search="SELECT * FROM stock WHERE stockid='$searchproduct'";

            $stock1=mysql_query($search);

            $row1=mysql_fetch_array($stock1);
        ?>

        <p style="color:black;font-size:18px;padding-left:10px">Stock</p><hr/>
        <form name="supplierform" method="POST" action="CCAdminStock.php" enctype="multipart/form-data" onsubmit="">
            <table style="margin-right: 150px;float:left">
                <tr>
                    <td><label>Stock Image</label></td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td><label>Stock ID: </label></td>
                    <td><input type="text" placeholder="Stock ID" name="stockid" value="<?php echo $row1["stockid"];?>"></td>
                </tr>
                <tr>
                    <td><label>Stock Name: </label></td>
                    <td><input type="text" placeholder="Stock Name" name="stockname" value="<?php echo $row1["stockname"];?>"></td>
                </tr>
                <tr>
                    <td><label>Category Name</label></td>
                    <td>
                        <input list="category" name="categoryname" value="<?php echo $row1["categoryname"];?>">
                        <datalist id="category">
                            <option>Rice</option>
                            <option>Curry</option>
                            <option>Dessert</option>
                            <option>Beverages</option>
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td><label>Description:</label></td>
                    <td><textarea type="textarea2" placeholder="Description" name="description"><?php echo $row1["description"];?></textarea></td>
                </tr>
            </table>
            <table style="float:left">
                <tr>
                    <td><label>Supplier ID:</label></td>
                    <td><input type="text" placeholder="Supplier ID" name="supplierid" value="<?php echo $row1["supplierid"];?>"></td>
                </tr>
                <tr>
                    <td><label>Price</label></td>
                    <td><input type="text" placeholder="Price" name="price" value="<?php echo $row1["price"];?>"></td>
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
        <?php

        if(isset($_FILES["image"]["tmp_name"]) && isset($_POST["stockid"]) && isset($_POST["stockname"]) && isset($_POST["categoryname"]) && isset($_POST["description"]) && isset($_POST["supplierid"]) && isset($_POST["price"]) && isset($_POST["quantity"]))
        {
            $imagecontent=$file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
            $stoid=$_POST["stockid"];
            $stockname=$_POST["stockname"];
            $cate=$_POST["categoryname"];
            $descrip=$_POST["description"];
            $supid=$_POST["supplierid"];
            $sprice=$_POST["price"];
            $quan=$_POST["quantity"];
        }
        else{
        }

        if(isset($_POST["btnAdd"]))
        {
            $insertStock="INSERT INTO stock VALUES('$imagecontent','$stoid','$stockname','$cate','$descrip','$supid','$sprice','$quan')";

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
                echo 'alert("Stock Detail Added Successfully...")';
                echo 'location.reload()';
                echo '</script>';
            }
        }
        else if(isset($_POST["btnUpdate"]))
        {
            $updateStock="UPDATE stock SET stockname='$stockname',categoryname='$cate',description='$descrip',supplierid='$supid',price='$sprice',quantity='$quan' WHERE stockid='$stoid'";

            if(!mysql_query($updateStock))
            {
                $error=die('Error'.mysql_error());
            }
            else
            {
                echo '<script type="text/javascript">';
                echo 'alert("Stock Detail Update Successfully...")';
                echo '</script>';
            }
        }
        else if(isset($_POST["btnDelete"]))
        {
            $deleteStock="DELETE from stock WHERE stockid='$stoid'";

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
                echo 'alert("Stock Detail Deleted Successfully...")';
                echo '</script>';
            }
        }
        else
        {
        }

        ?>
        <hr style="border:1px solid teal"/>
        <br/>
        <div align="center">
            <form action="CCAdminStock.php" method="POST">
                <input type="search" placeholder="Search Stock" name="searchp" style="width:80%;padding:10px;border:1px solid teal;border-bottom:3px solid teal;border-radius:5px">
                <input type="submit" value="Search">
            </form>
            <br/>
            <table cellspacing="10" class="datagridview" width="90%">
                <tr>
                    <th>Stock ID</th>
                    <th>Stock Name</th>
                    <th>Category Name</th>
                    <th colspan="3">Description</th>
                    <th>Supplier ID</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
                <?php
                $DataGridView="SELECT * FROM stock";

                $stock=mysql_query($DataGridView);

                while($row=mysql_fetch_array($stock))
                {
                    ?>
                    <tr>
                        <td><?php echo $row['stockid']; ?></td>
                        <td><?php echo $row['stockname']; ?></td>
                        <td><?php echo $row['categoryname']; ?></td>
                        <td colspan="3"><?php echo $row['description']; ?></td>
                        <td><?php echo $row['supplierid']; ?></td>
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