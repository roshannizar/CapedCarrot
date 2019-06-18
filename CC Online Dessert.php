<?php
require 'db_connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TCC - Dessert</title>
    <link rel="icon" href="CSS/Icons/carrot.ico" type="image/x-icon">
    <style type="text/css">
        body
        {
            background-color: whitesmoke;
        }
        .sidenav
        {
            height:100%;
            width:60px;
            position:fixed;
            z-index:99;
            background-attachment: fixed;
            top:0;
            left:0;
            background-color: whitesmoke;
            overflow-x: hidden;
            border:none;
            box-shadow: 1px 3px 1px 1px dimgray;
            transition-duration: 1.0s;
        }
        .heading
        {
            background-color: whitesmoke;
            padding-left:80px;
            background-image:url(CSS/Icons/menu.png);
            background-size:40px;
            background-repeat: no-repeat;
            background-position-x:5px;
            font-family: Calibri;
        }
        .btn,.btn1,.btn2
        {
            border:none;
            width:100%;
            font-family: Calibri;
            font-size:17px;
            text-align:left;
            padding-left:55px;
            background-color:whitesmoke;
            cursor:pointer;
            transition-duration: 0.5s;
            padding:18px;
            outline:none;
            color:black;
        }
        .btn2:hover
        {
            border-left: 4px solid teal;
        }
        .btn:hover
        {
            border-left: 4px solid teal;
            color: black;
        }
        .btn1:hover
        {
            border-left: 4px solid teal;
            color:black;
        }
        .btn:after
        {
            color:black;
            padding:10px;
        }
        .btn.active:after
        {
            content:"-";
            outline:none;
        }
        .btndrop button
        {
            background-color:floralwhite;
            color:black;
            text-align:left;
            padding-left:70px;
            font-family: Calibri;
            border:none;
            width:100%;
            padding:18px;
            outline:none;
            border:none;
            cursor: pointer;
            transition-duration: 0.5s;
        }
        .btndrop button:hover
        {
            border-left:4px solid teal;
        }
        .btndrop
        {
            max-height:0;
            background-color:floralwhite;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }
        .navitop
        {
            padding:15px;
            float:right;
            width:96%;
            top:0;
            right:0;
            z-index:98;
            background-color:whitesmoke;
            position:fixed;
            text-align:right;
            box-shadow: 1px 1px 3px 1px dimgrey;
            background-image:url(CSS/Icons/carrot.ico);
            background-size: 4%;
            background-repeat: no-repeat;
            background-position: left;
            background-position-x: 20px;
            transition-duration: 2.0s;
        }
        .navitop a
        {
            text-decoration:none;
            color:black;
            font-family: Calibri;
            font-size:20px;
            padding:18px 20px;
            transition-duration: 4.0s;
        }
        .navitop a:hover
        {
            border-left:1px solid black;
            border-right:1px solid black;
        }
        .search
        {
            border:1px solid black;
            padding:10px;
            text-align:center;
            border-radius:5px;
            width:20%;
            font-family: Calibri;
            outline:none;
            transition-duration: 2.0s;
        }
        .footer
        {
            position:absolute;
            width:96%;
            right:0;
            margin-top:2400px;
            z-index:-1;
            float:right;
            background-color: whitesmoke;
            height:auto;
            overflow: hidden;
            padding:10px;
            border-top:1px solid black;
        }
        .footer label
        {
            margin-left:20px;
            color:black;
            font-size:20px;
            font-family: calibri;
        }
        .footer a
        {
            padding:18px 20px;
            text-decoration: none;
            padding-left:40px;
            color:black;
        }
        .igniter
        {
            width:25%;
            float:left;
        }
        .igniter a
        {
            font-size:13px;
        }
        .igniter1
        {
            width:20%;
            float:left;
            margin-top:40px;
        }
        .igniter2
        {
            float:right;
            width:30%;
        }
        .igniter2 button
        {
            font-size:20px;
            font-family: calibri;
            width:40%;
            background-color: teal;
            color:white;
            border:2px solid teal;
            outline:none;
        }
        * {box-sizing:border-box}
        body {font-family: Verdana,sans-serif;}
        .mySlides {display:none}

        .slideshow-container
        {
            width:100%;
            position: absolute;
            z-index:-1;
            left:0;
            margin: auto;
        }
        .text
        {
            color: #f2f2f2;
            font-size: 24px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            background-color: dimgrey;
            opacity: 0.8;
            text-align: center;
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
        .detail
        {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            padding-top:30px;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            box-shadow: 0 1px 1px 0 black;
            animation-name: animatetop;
            animation-duration: 0.5s
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

        .close
        {
            color: black;
            float: right;
            font-size: 15px;
            font-weight: bold;
            margin-right:15px;
            margin-top:10px;
            font-family: calibri;
        }
        .close:hover,
        .close:focus
        {
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
        .container
        {
            margin-left:80px;
            width:90%;
            background-color: white;
            height:500px;
            border-bottom-right-radius:10px;
            border-top-right-radius:10px;
            border-bottom-left-radius:10px;
            border-top-left-radius: 10px;
        }
        .addcart
        {
            border:1px solid teal;
            background-color: teal;
            color:white;
            font-size:20px;
            font-family: Calibri;
            margin-right:30px;
            width:20%;
            padding:10px;
            outline:none;
            cursor: pointer;
            margin-top:20px;
            border-radius:50px;
            transition-duration: 0.5s;
        }
        .addcart:hover
        {
            background-color: transparent;
            color:teal;
        }
        .main
        {
            width:95.5%;
            margin-left:25px;
            background-color: whitesmoke;
            margin-top:500px;
            position:absolute;
            right:0;
            z-index:-2;
            border-top:30px solid teal;
        }
        .maincontainer p
        {
            cursor: pointer;
            margin-left:10px;
            margin-bottom:10px;
            width:23%;
            transition-duration: 1.0s;
        }
        .Slides1 p
        {
            box-shadow: 1px 1px 3px 1px dimgray;
            margin-left:10px;
        }
        #backislide
        {
            margin-top:30px;
            height:500px;
            background-attachment: fixed;
            background-image: url(CSS/Images/test/slide1.jpg);
            background-size:100%;
            background-repeat: no-repeat;
        }
        #backislide1
        {
            margin-top:30px;
            height:500px;
            background-attachment: fixed;
            background-image: url(CSS/Images/test/slide2.jpeg);
            background-size:100%;
            background-repeat: no-repeat;
        }
        #backislide2
        {
            margin-top:30px;
            height:500px;
            background-attachment: fixed;
            background-image: url(CSS/Images/test/slide3.jpeg);
            background-size:100%;
            background-repeat: no-repeat;
        }
        #backislide3
        {
            margin-top:30px;
            height:500px;
            background-attachment: fixed;
            background-image: url(CSS/Images/test/slide4.jpeg);
            background-size:100%;
            background-repeat: no-repeat;
        }
        #backislide4
        {
            margin-top:30px;
            height:500px;
            background-attachment: fixed;
            background-image: url(CSS/Images/test/slide5.jpeg);
            background-size:100%;
            background-repeat: no-repeat;
        }
        .search
        {
            border:1px solid black;
            padding:10px;
            text-align:center;
            border-radius:5px;
            width:70%;
            font-family: Calibri;
            outline:none;
            transition-duration: 2.0s;
        }
        .searchtable th
        {
            background-color: teal;
            color:white;
            font-family: calibri;
            font-size:25px;
        }
        .searchtable td
        {
            color:black;
            font-family: calibri;
            font-size:22px;
            padding-left:10px;
        }
        .searchtable
        {
            width:90%;
            margin-left:40px;
        }
        .btnSearch
        {
            border:1px solid teal;
            background-color: teal;
            color:white;
            padding-left:10px;
            padding-right:10px;
            border-radius:5px;
            font-size:20px;
            cursor: pointer;
        }
        input[type=text]
        {
            border:none;
            border-bottom:2px solid teal;
            background-color:transparent;
            padding:5px;
        }
    </style>
    <script language="JavaScript" type="text/javascript">
        function openNav()
        {
            document.getElementById("sidenavi").style.width="230px";
            document.getElementById("heading2").style.marginLeft="230px";
        }
        function closeNav()
        {
            document.getElementById("sidenavi").style.width="60px";
            document.getElementById("heading2").style.marginLeft="0px";
            document.body.style.backgroundColor="white";
        }
    </script>
</head>
<body>
<div class="sidenav" id="sidenavi" onmouseover="openNav()" onmouseout="closeNav()">
    <h1 class="heading">Menu</h1>
    <button class="btn2" style="padding-left:100px;background-image:url(CSS/Icons/person.png);background-size: 50px;background-repeat: no-repeat"><?php
        session_start();
        echo "Active Profile: ".$_SESSION['loginuser'];?></button>
    <p></p>
    <a href="CC Online Package.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/package.png);background-size: 50px;background-repeat: no-repeat">Packages</button></a>
    <a href="CC Online Rice.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/food.png);background-size: 50px;background-repeat: no-repeat">Rice</button></a>
    <a href="CC Online Curry.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/curry.png);background-size: 50px;background-repeat: no-repeat">Curry</button></a>
    <a href="CC%20Online%20Dessert.php"><button class="btn1" style="border-left: 4px solid teal;padding-left:100px;background-image:url(CSS/Icons/dessert.png);background-size: 50px;background-repeat: no-repeat">Dessert</button></a>
    <a href="CC%20Online%20Beverages.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/beverages.png);background-size: 50px;background-repeat: no-repeat">Beverages</button></a>
    <button class="btn" style="padding-left:100px;background-image:url(CSS/Icons/settings.png);background-size: 50px;background-repeat: no-repeat">Settings</button>
    <div class="btndrop">
        <a href="CC%20Profile%20Setting.php"><button>Profile Settings</button></a>
        <a href="CC Reset Password.html"><button>Reset Password</button></a>
    </div>
</div>
<nav class="navitop" id="topnavi">
    <div id="heading2" style="width:20%;float:left;text-align:left;transition-duration: 1.0s">
        <label style="padding-left:70px;padding-top:20px;font-size:25px;font-family: Calibri;font-weight:bold">The Caped Carrot</label>
    </div>
    <a href="CC Online Home.php" class="linker"><b>Home</b></a>
    <a href="#search" class="linker" id="myBtn"><b>Search</b></a>
    <a href="CCOrderSummary.php" class="linker"><b>Cart</b></a>
    <a href="CCWishlist.php" class="linker"><b>Wishlist</b></a>
    <a href="CCSignin.php" class="linker"><b>
            <?php
            session_start();
            $check=$_SESSION["loginuser"];
            if($check=="" || $check==null)
            {
                echo "Sign In";
            }
            else
            {
                echo "";
            }
            ?>
        </b></a>
    <a href="CC%20Signup.php" class="linker"><b>
            <?php
            session_start();
            $check=$_SESSION["loginuser"];
            if($check=="" || $check==null)
            {
                echo "Sign Up";
            }
            else
            {
                echo "";
            }
            ?>
        </b></a>
    <a href="dessertDestroy.php" class="linker"><b>
            <?php
            session_start();
            $check=$_SESSION["loginuser"];
            if($check=="" || $check==null)
            {
                echo "";
            }
            else
            {
                echo "Sign Out";
            }
            ?>
        </b></a>
</nav>

<div class="slideshow-container">
    <div class="mySlides fade" id="backislide">
        <div class="text">The Caped Carrot<br/> Best Catering Service in Sri Lanka</div>
    </div>
    <div class="mySlides fade" id="backislide1">
        <div class="text">We use best product brands</div>
    </div>
    <div class="mySlides fade" id="backislide2">
        <div class="text">Best Chefs are here</div>
    </div>
    <div class="mySlides fade" id="backislide3">
        <div class="text">Customer Satisfaction</div>
    </div>
    <div class="mySlides fade" id="backislide4">
        <div class="text">Visit Now</div>
    </div>
</div>
<br/>
<div class="main" id="main" onmouseover="closebtn()">
    <br>
    <br/><br/>
    <div>
        <label style="font-size:28px;font-family:calibri;margin-left:60px">Dessert</label>
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
                                <form method="POST" action="CC%20Online%20Dessert.php">
                                    <?php echo '<img style="margin-top:10px;;margin-bottom:10px;margin-right:20px;width:20%;float:left;" src="data:image/jpeg;base64,'.base64_encode($row['image']).'">';?>
                                    <h4>Product ID: <?php echo $row["stockid"];?></h4>
                                    <label>Category Name: <?php echo $row["categoryname"];?></label><br/><br/>
                                    <label>Description: <?php echo $row["description"]; ?></label><br/><br/>
                                    <label>Price: <?php echo $row["price"]; ?></label><br/><br/>
                                    <input type="text" hidden name="stockid" value="<?php echo $row["stockid"]; ?>">
                                    <input type="text" placeholder="Enter Number of Heads" name="noheads">
                                    <input type="date" placeholder="Pick a Date" name="orderdate"><br/>
                                    <input type="text" hidden name="ordertype" value="Pending">
                                    <input type="text" hidden name="orderid">
                                    <input type="text" hidden name="cartid">
                                    <input type="text" hidden name="user" value="<?php session_start(); echo $_SESSION["loginuser"]; ?>">
                                    <input type="submit" value="Add To Cart" name="btnCart" class="addcart">
                                </form>
                            </td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST["cartid"]) && isset($_POST["stockid"]) && isset($_POST["noheads"]) && isset($_POST["orderdate"]) && isset($_POST["ordertype"]) && isset($_POST["orderid"]) && isset($_POST["user"]))
    {
        $sid=$_POST["stockid"];
        $oid=$_POST["orderid"];
        $username=$_POST["user"];
        $ot=$_POST["ordertype"];
        $od=$_POST["orderdate"];
        $quan=$_POST["noheads"];
        $cid=$_POST["cartid"];
    }

    if(isset($_POST["btnCart"]))
    {
        $insertOrder="INSERT INTO order_detail VALUES('$oid','$sid','$username','$ot','$od','$quan')";
        $insertCart="INSERT INTO cart VALUES('$cid','$sid','$username','$quan')";

        if(!mysql_query($insertOrder))
        {
            echo mysql_error();
        }
        else
        {
            if(mysql_query($insertCart))
            {
                echo '<script type="text/javascript">';
                echo 'alert("Added to your Cart")';
                echo '</script>';
            }
            else
            {
                echo mysql_error();
            }
        }
    }
    ?>
    <br/><br/><br/>
    <center>
        <br/>
        <label>Sign In Recommended</label>
        <button style="outline:none;background-color:teal;color:white;font-size:18px;border:1px solid teal;margin-left:10px;border-radius:5px;padding:5px;padding-left:10px;padding-right:10px;cursor:pointer">Sign In</button>
    </center>
    <br/><br/>
</div>
<footer>
    <div class="footer">
        <div class="igniter">
            <label>Get To Know Us</label>
            <label>Let Us Help You</label>
            <br/><br/>
            <a href="CC About Us.html">About Us</a>
            <a href="#youraccount" style="margin-left:18px;">Your Account</a>
            <br/><br/>
            <a href="#investors">Investors</a>
            <a href="#yourcart" style="margin-left:20px;">Your Cart</a><br/>
        </div>
        <div class="igniter1" style="text-align:center">
            <label>THE CAPED CARROT</label>
        </div>
        <div class="igniter" style="text-align:center">
            <label style="margin-top:10px">Trusted Brand</label><br/><br/>
            <img src="CSS/Icons/facebook.png" width="40px" style="margin-left:20px">
            <img src="CSS/Icons/instagram.png" width="40px">
            <img src="CSS/Icons/linkedin.png" width="40px">
            <img src="CSS/Icons/google.png" width="40px">
        </div>
        <div class="igniter2" style="text-align:center">
            <button style="margin-top:10px;border-radius:5px;margin-left:10px">Sri Lanka</button><br/><br/>
            <label>Copyright 2017 The Caped Carrot</label>
        </div>
    </div>
    <div id="myModal" class="detail">
        <div class="container">
            <div style="border-top-left-radius: 10px;background-color:teal;width:100%;float:right;padding-bottom:10px;border-bottom:1px solid black;border-top-right-radius:10px">
                <label style="padding-left:20px;margin-top:10px;color:white;float:left">Search</label>
                <label class="close">X</label>
            </div>
            <div style="margin-right:10px;margin-left:10px;margin-top:10px;padding-top:20px">
                <div style="margin-top:80px">
                    <div style="width:100%;">
                        <center>
                            <form method="post" action="CC%20Online%20Dessert.php">
                                <input type="text" class="search" name="search" placeholder="Search any package">
                                <input type="submit" value="Search" name="btnSearch" class="btnSearch" onclick="opentable()">
                                <a href="#close" class="close4" style="color:black;text-decoration: none;color:black;padding-left:30px;outline:none" onclick="closetable()">X</a>
                            </form>
                        </center>
                        <br/>
                        <div align="center" id="searchi">
                            <table class="searchtable">
                                <tr>
                                    <th id="searchi">Product ID</th>
                                    <th id="searchi">Product Name</th>
                                    <th id="searchi" colspan="3">Description</th>
                                    <th id="searchi">Price</th>
                                </tr>
                                <?php
                                $searchpack=$_POST['search'];
                                $selectString="SELECT * FROM stock WHERE categoryname='Dessert' AND stockname like '%$searchpack%'";

                                $detail=mysql_query($selectString);

                                while($row=mysql_fetch_array($detail))
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['stockid'];?></td>
                                        <td><?php echo$row['stockname'];?></td>
                                        <td colspan="3"><?php echo $row['description'];?></td>
                                        <td><?php echo $row['price'];?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script language="JavaScript" type="text/javascript">

    var drop=document.getElementsByClassName("btn");
    var i;
    for(i=0;i<drop.length;i++)
    {
        drop[i].onclick=function()
        {
            this.classList.toggle("active");
            var panel=this.nextElementSibling;
            if(panel.style.maxHeight)
            {
                panel.style.maxHeight=null;
            }
            else
            {
                panel.style.maxHeight=panel.scrollHeight+"px";
            }
        }
    }

    var slideIndex = 0;
    showSlides();

    function showSlides()
    {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++)
        {
            slides[i].style.display = "none";
        }
        slideIndex++;

        if (slideIndex > slides.length)
        {
            slideIndex = 1
        }
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 5000);
    }

    var modal = document.getElementById('myModal');
    var btn1 = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];

    btn1.onclick = function()
    {
        modal.style.display = "block";
    }

    span.onclick = function()
    {
        modal.style.display = "none";
    }
</script>
</body>
</html>