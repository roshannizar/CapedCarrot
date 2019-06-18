<?php
    require 'db_connect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart Testing</title>
</head>
<body>
<form method="post" action="test.php">
    <table>
        <tr>
            <label>Cart ID</label><br/>
            <input type="text" name="cartid"><br/>
            <label>Order ID</label><br/>
            <input type="text" name="orderid"><br/>
            <label>Username</label><br/>
            <input type="text" name="username"><br/>
            <label>Stock ID</label><br/>
            <input type="text" name="stockid"><br/>
            <label>Quantity</label><br/>
            <input type="text" name="quantity"><br/>
            <label>Order Type</label><br/>
            <input type="text" name="ordertype"><br/>
            <label>Date</label><br/>
            <input type="date" name="orderdate"><br/>
            <input type="submit" value="Add to Cart" name="btnCart">
            <input type="submit" value="Add to Wishlist" name="btnWish">
        </tr>
    </table>
</form>
</body>
</html>
<?php
    if(isset($_POST["cartid"]) && isset($_POST["orderid"]) && isset($_POST["username"]) && isset($_POST["stockid"]) && isset($_POST["quantity"]) && isset($_POST["ordertype"]) && isset($_POST["orderdate"]))
    {
        $cid=$_POST["cartid"];
        $oid=$_POST["orderid"];
        $user=$_POST["username"];
        $sid=$_POST["stockid"];
        $quan=$_POST["quantity"];
        $otype=$_POST["ordertype"];
        $od=$_POST["orderdate"];
    }

    if(isset($_POST["btnCart"]))
    {
        $insertOrder="INSERT INTO order_detail VALUES('$oid','$sid','$user','$otype','$od','$quan')";
        $insertCart="INSERT INTO cart VALUES('$cid','$sid','$user','$quan')";

        if(!mysql_query($insertOrder))
        {
            echo "Error Occured...";
        }
        else
        {
            echo "Add to Order...";
            if(mysql_query($insertCart))
            {
                echo "All Done";
            }
            else
            {
                echo "Oh shit";
            }
        }
    }
?>

<br/><br/>

<div align="center">
    <br/>
    <table cellspacing="10" class="datagridview" width="90%">
        <tr>
            <th>Cart ID</th>
            <th>Order ID</th>
            <th>Stock ID</th>
            <th>Username</th>
            <th>Quantity</th>
        </tr>
        <?php
        $DataGridView="SELECT * FROM cart";

        $stock=mysql_query($DataGridView);

        while($row=mysql_fetch_array($stock))
        {
            ?>
            <tr>
                <td><?php echo $row['cartid']; ?></td>
                <td><?php echo $row['orderid']; ?></td>
                <td><?php echo $row['stockid']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
<br/><br/>
<div align="center">
    <br/>
    <table cellspacing="10" class="datagridview" width="90%">
        <tr>
            <th>Order ID</th>
            <th>Stock ID</th>
            <th>Username</th>
            <th>Order type</th>
            <th>date</th>
            <th>quantity</th>
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
