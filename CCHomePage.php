<?php
    require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TCC - Homepage</title>
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
            background-color: white;
            background-image: url(CSS/Icons/carrot.ico);
            background-position: left;
            background-size: 3%;
            background-repeat: no-repeat;
            background-position-x: 50px;
            box-shadow: 1px 1px 4px 1px dimgray;
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
            margin-top:350px;
        }
        .heading
        {
            font-size:80px;
            color:white;
            font-family: cinzel;
        }
        .subhead
        {
            font-size:40px;
            color:white;
            font-family: calibri;
        }
        .content button
        {
            background-color: transparent;
            border:2px solid white;
            font-size:25px;
            color:white;
            border-radius:10px;
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
            background-color: white;
            height:auto;
            border-top:30px solid teal;
            padding-top: 20px;
            margin-top:700px;
            text-align:center;
        }
        .bottomcontent label
        {
            font-size: 40px;
            font-family: calibri;
            border-bottom:2px solid teal;
        }
        .services
        {
            width:30%;
            height:300px;
            float:left;
            margin-left:30px;
            margin-top:20px;
        }
        .footer
        {
            background-color: white;
            width:100%;
            height:120px;
            position: absolute;
            left:0;
            top:0;
            margin-top:3000px;
            padding-top:20px;
        }
        .footer label
        {
            color:black;
            font-size:20px;
            margin:20px;
            font-family: calibri;
        }
        .coming
        {
            margin-top:50px;
            background-image:url(CSS/Images/backi.png);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            padding-top:400px;
            padding-bottom:400px;
        }
        .coming p
        {
            color:white;
            font-size:34px;
            font-family: cinzel;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="main">
    <nav class="navitop">
        <a style="color:teal;border-left:2px solid teal;border-right:2px solid teal" href="CC Homepage.html">HOME</a>
        <a href="CC About Us.html">ABOUT US</a>
        <a href="CCFoodMenu.php">FOOD MENU</a>
        <a href="CC Contact Us.php">CONTACT US</a>
        <a href="CC FAQ.html">FAQ</a>
    </nav>
    <div class="content">
        <center>
            <label class="heading">THE CAPED CARROT</label><br/>
            <label class="subhead">Best Catering Service</label><br/>
            <a href="CC Online Home.php"><button>Shop Now</button></a>
        </center>
    </div>

    <?php

    ?>
    <div class="bottomcontent">
        <div style="margin-bottom:10px;width:100%">
            <label>Services We Provide</label>
        </div>
        <div class="services" style="background-image:url(CSS/Images/function.jpg);background-repeat:no-repeat;background-size:100%">
        </div>
        <div class="services" style="background-image:url(CSS/Images/wedding.jpg);background-repeat:no-repeat;background-size:100%">
        </div>
        <div class="services" style="background-image:url(CSS/Images/event.jpg);background-repeat:no-repeat;background-size:100%">
        </div>
        <div class="services">
            <label style="color:black">Function</label>
        </div>
        <div class="services">
            <label style="color:black">Wedding</label>
        </div>
        <div class="services">
            <label style="color:black">Events</label>
        </div>
        <video autoplay loop muted>
            <source src="E:\Tutorials\Ai\Blender for Packaging - Basic Box.mp4" >
        </video>
        <div class="coming">
            <?php
                $selectAll="SELECT * FROM page";
                $data=mysql_query($selectAll);
                $row=mysql_fetch_array($data);
            ?>
            <div style="float:left;width:50%">
                <p>THE CAPED CARROT</p>
                <p><?php echo $row["editdetail"]; ?></p>
                <a href="http://www.facebook.lk"><img src="CSS/Icons/facebook.png" width="60px" style="margin-left:15px"></a>
                <a href="http://www.instagram.lk"><img src="CSS/Icons/instagram.png" width="60px"></a>
                <a href="http://www.googleplus.lk"><img src="CSS/Icons/google.png" width="60px"></a>
                <a href="http://www.linkedin.lk"><img src="CSS/Icons/linkedin.png" width="60px"><br/></a>
            </div>
            <div style="float:right;width:50%;">
                <img src="CSS/Images/mobile2.png" style="float:right">
            </div>
            <br/><br/><br/><br/><br/>
        </div>
    </div>
    <div class="footer">
        <label style="padding-left:50px">Support</label><br/>
        <a href="http://www.facebook.lk"><img src="CSS/Icons/facebook.png" width="40px" style="margin-left:15px"></a>
        <a href="http://www.instagram.lk"><img src="CSS/Icons/instagram.png" width="40px"></a>
        <a href="http://www.googleplus.lk"><img src="CSS/Icons/google.png" width="40px"></a>
        <a href="http://www.linkedin.lk"><img src="CSS/Icons/linkedin.png" width="40px"><br/></a>
        <hr/>
        <label>Copyright 2017 The Caped Carrot</label>
    </div>
</div>
</body>
</html>