<?php
    require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TCC - Food Menu</title>
    <link rel="icon" href="CSS/Icons/carrot.ico" type="image/x-icon">
    <style type="text/css">
        body
        {
            background-image: url(CSS/Images/wali3.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .navitop
        {
            width:100%;
            position: fixed;
            top:0;
            z-index: 99;
            left:0;
            text-align:center;
            padding-top:20px;
            padding-bottom:20px;
            background-image: url(CSS/Icons/carrot.ico);
            background-position: left;
            background-size: 3%;
            background-repeat: no-repeat;
            background-position-x: 50px;
            box-shadow: 1px 1px 3px 1px dimgray;
            background-color: white;
        }
        .navitop a
        {
            font-size:20px;
            padding:18px 20px;
            text-decoration:none;
            color:black;
            transition-duration: 1.0s;
        }
        .navitop a:hover
        {
            color:teal;
            border-left:2px solid teal;
            border-right:2px solid teal;
        }
        .content
        {
            width:100%;
            position:absolute;
            left:0;
            margin-top:100px;
        }
        .heading
        {
            font-size:80px;
            color:white;
            font-family:cinzel;
            padding-bottom:40px;
        }
        .content button
        {
            background-color: transparent;
            border:2px solid white;
            font-size:25px;
            color:white;
            border-radius:5px;
            margin:10px;
            padding:10px;
            cursor: pointer;
            padding-left:20px;
            padding-right:20px;
            transition-duration: 1.0s;
        }
        .content button:hover
        {
            border:2px solid teal;
            background-color: teal;
        }
        .bottomcontent
        {
            position:absolute;
            width:100%;
            left:0;
            z-index:-1;
            background-color: white;
            height:auto;
            padding-top: 20px;
            margin-top:50px;
            border-top:30px solid teal;
            padding-bottom:50px;
        }
        .bottomcontent p
        {
            padding-top:20px;
            padding-left:100px;
            padding-right:100px;
        }
        .footer
        {
            background-color: white;
            width:100%;
            height:120px;
            left:0;
            position: absolute;
            z-index:99;
            box-shadow: 3px 1px 1px 1px dimgray;
            margin-top:4000px;
            padding-top:20px;
        }
        .footer label
        {
            color:black;
            font-size:20px;
            margin:20px;
            font-family: calibri;
        }
        .bottomcontent img
        {
            margin:20px;
        }
        .fade
        {
            animation-name: fade;
            animation-duration: 1.5s;
        }
        @keyframes fade
        {
            from {opacity: .4}
            to {opacity: 1}
        }
        @keyframes animatetop
        {
            from
            {
                top:-150px; opacity:0
            }
            to
            {
                top:0; opacity:1
            }
        }
        .main
        {
            z-index:-2;
        }
        .maincontainer img
        {
            cursor: pointer;
            box-shadow: 1px 3px 3px 1px dimgray;
            transition-duration: 1.0s;
        }
    </style>
</head>
<body>
<div class="main">
    <nav class="navitop">
        <a href="CCHomePage.php">HOME</a>
        <a href="CC About Us.html">ABOUT US</a>
        <a style="color:teal;border-left:2px solid teal;border-right:2px solid teal" href="CCFoodMenu.php">FOOD MENU</a>
        <a href="CC Contact Us.php">CONTACT US</a>
        <a href="CC FAQ.html">FAQ</a>
    </nav>
    <div class="content">
        <center>
            <label class="heading">FOOD MENU</label>
        </center>
        <div class="bottomcontent">
            <label style="font-size:28px;font-family:calibri;margin-left:60px;margin-bottom:20px">Packages</label><br/>
            <div class="maincontainer">
                <div class="Slides fade" style="margin-left:50px;margin-top:30px">
                    <?php
                    $DataGridView="SELECT * FROM stock WHERE categoryname='Package'";
                    $stock=mysql_query($DataGridView);
                    while($row=mysql_fetch_array($stock))
                    {
                        $c++;
                        ?>
                        <table cellspacing="10"style="width:100%;">
                            <tr>
                                <th style="width:100%;text-align:left;padding:10px;background-color:teal;font-size:20px;border:1px solid teal;color:white">Product Name: <?php echo $row["stockname"]; ?></th>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo '<img style="margin-top:10px;;margin-bottom:10px;margin-right:20px;width:20%;float:left;" src="data:image/jpeg;base64,'.base64_encode($row['image']).'">';?>
                                    <h4>Product ID: <?php echo $row["stockid"];?></h4>
                                    <label>Category Name: <?php echo $row["categoryname"];?></label><br/><br/>
                                    <label>Description: <?php echo $row["description"]; ?></label><br/><br/>
                                    <label>Price: <?php echo $row["price"]; ?></label><br/><br/>
                                </td>
                            </tr>
                        </table>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <br/><br/>
            <div>
                <label style="font-size:28px;font-family:calibri;margin-left:60px">Rice</label><br/>
                <div class="maincontainer">
                    <div class=" fade" style="margin-left:50px;margin-top:30px">
                        <?php
                        $DataGridView="SELECT * FROM stock WHERE categoryname='Rice'";
                        $stock=mysql_query($DataGridView);
                        while($row=mysql_fetch_array($stock))
                        {
                            $c++;
                            ?>
                            <table cellspacing="10"style="width:100%;">
                                <tr>
                                    <th style="width:100%;text-align:left;padding:10px;background-color:teal;font-size:20px;border:1px solid teal;color:white">Product Name: <?php echo $row["stockname"]; ?></th>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo '<img style="margin-top:10px;;margin-bottom:10px;margin-right:20px;width:20%;float:left;" src="data:image/jpeg;base64,'.base64_encode($row['image']).'">';?>
                                        <h4>Product ID: <?php echo $row["stockid"];?></h4>
                                        <label>Category Name: <?php echo $row["categoryname"];?></label><br/><br/>
                                        <label>Description: <?php echo $row["description"]; ?></label><br/><br/>
                                        <label>Price: <?php echo $row["price"]; ?></label><br/><br/>
                                    </td>
                                </tr>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <br/><br/>
            <div>
                <label style="font-size:28px;font-family:calibri;margin-left:60px">Curry</label><br/>
                <div class="maincontainer">
                    <div class=" fade" style="margin-left:50px;margin-top:30px">
                        <?php
                        $DataGridView="SELECT * FROM stock WHERE categoryname='Curry'";
                        $stock=mysql_query($DataGridView);
                        while($row=mysql_fetch_array($stock))
                        {
                            $c++;
                            ?>
                            <table cellspacing="10"style="width:100%;">
                                <tr>
                                    <th style="width:100%;text-align:left;padding:10px;background-color:teal;font-size:20px;border:1px solid teal;color:white">Product Name: <?php echo $row["stockname"]; ?></th>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo '<img style="margin-top:10px;;margin-bottom:10px;margin-right:20px;width:20%;float:left;" src="data:image/jpeg;base64,'.base64_encode($row['image']).'">';?>
                                        <h4>Product ID: <?php echo $row["stockid"];?></h4>
                                        <label>Category Name: <?php echo $row["categoryname"];?></label><br/><br/>
                                        <label>Description: <?php echo $row["description"]; ?></label><br/><br/>
                                        <label>Price: <?php echo $row["price"]; ?></label><br/><br/>
                                    </td>
                                </tr>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <br/><br/>
            <div>
                <label style="font-size:28px;font-family:calibri;margin-left:60px">Dessert</label><br/>
                <div class="maincontainer">
                    <div class=" fade" style="margin-left:50px;margin-top:30px">
                        <?php
                        $DataGridView="SELECT * FROM stock WHERE categoryname='Dessert'";
                        $stock=mysql_query($DataGridView);
                        while($row=mysql_fetch_array($stock))
                        {
                            $c++;
                            ?>
                            <table cellspacing="10"style="width:100%;">
                                <tr>
                                    <th style="width:100%;text-align:left;padding:10px;background-color:teal;font-size:20px;border:1px solid teal;color:white">Product Name: <?php echo $row["stockname"]; ?></th>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo '<img style="margin-top:10px;;margin-bottom:10px;margin-right:20px;width:20%;float:left;" src="data:image/jpeg;base64,'.base64_encode($row['image']).'">';?>
                                        <h4>Product ID: <?php echo $row["stockid"];?></h4>
                                        <label>Category Name: <?php echo $row["categoryname"];?></label><br/><br/>
                                        <label>Description: <?php echo $row["description"]; ?></label><br/><br/>
                                        <label>Price: <?php echo $row["price"]; ?></label><br/><br/>
                                    </td>
                                </tr>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <br/><br/>
            <div>
                <label style="font-size:28px;font-family:calibri;margin-left:60px">Beverages</label><br/>
                <div class="maincontainer">
                    <div class=" fade" style="margin-left:50px;margin-top:30px">
                        <?php
                        $DataGridView="SELECT * FROM stock WHERE categoryname='Beverages'";
                        $stock=mysql_query($DataGridView);
                        while($row=mysql_fetch_array($stock))
                        {
                            $c++;
                            ?>
                            <table cellspacing="10"style="width:100%;">
                                <tr>
                                    <th style="width:100%;text-align:left;padding:10px;background-color:teal;font-size:20px;border:1px solid teal;color:white">Product Name: <?php echo $row["stockname"]; ?></th>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo '<img style="margin-top:10px;;margin-bottom:10px;margin-right:20px;width:20%;float:left;" src="data:image/jpeg;base64,'.base64_encode($row['image']).'">';?>
                                        <h4>Product ID: <?php echo $row["stockid"];?></h4>
                                        <label>Category Name: <?php echo $row["categoryname"];?></label><br/><br/>
                                        <label>Description: <?php echo $row["description"]; ?></label><br/><br/>
                                        <label>Price: <?php echo $row["price"]; ?></label><br/><br/>
                                    </td>
                                </tr>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <div class="footer">
        <label style="padding-left:50px">Support</label><br/>
        <img src="CSS/Icons/facebook.png" width="40px" style="margin-left:15px">
        <img src="CSS/Icons/instagram.png" width="40px">
        <img src="CSS/Icons/google.png" width="40px">
        <img src="CSS/Icons/linkedin.png" width="40px"><br/>
        <hr/>
        <label>Copyright 2017 The Caped Carrot</label>
    </div>
</body>
</html>