<?php
require 'db_connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TCC - Cart Summary</title>
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
            margin-top:20px;
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
        input[type=text],input[type=list]
        {
            border:none;
            border-bottom:2px solid teal;
            background-color:transparent;
            padding:5px;
        }
        .activator
        {
            border:1px solid black;
            background-color:silver;
            color:white;
            font-size:20px;
            padding:18px 20px;
            width:15%;
            margin-top:20px;
            float:left;
        }
        input[type=submit]
        {
            width:15%;
            padding:10px;
            background-color: transparent;
            color:black;
            border-radius:10px;
            outline:none;
            font-size:15px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border:1px solid black;
            transition-duration: 1.0s;
        }
        input[type=submit]:hover
        {
            background-color: #008080;
            border:1px solid #008080;
            color:white;
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
    <a href="CC Online Package.php"><button class="btn1" style="border-left: 4px solid teal;padding-left:100px;background-image:url(CSS/Icons/package.png);background-size: 50px;background-repeat: no-repeat">Packages</button></a>
    <a href="CC Online Rice.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/food.png);background-size: 50px;background-repeat: no-repeat">Rice</button></a>
    <a href="CC Online Curry.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/curry.png);background-size: 50px;background-repeat: no-repeat">Curry</button></a>
    <a href="CC%20Online%20Dessert.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/dessert.png);background-size: 50px;background-repeat: no-repeat">Dessert</button></a>
    <a href="CC%20Online%20Beverages.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/beverages.png);background-size: 50px;background-repeat: no-repeat">Beverages</button></a>
    <button class="btn" style="padding-left:100px;background-image:url(CSS/Icons/settings.png);background-size: 50px;background-repeat: no-repeat">Settings</button>
    <div class="btndrop">
        <a href="CC Profile Setting.html"><button>Profile Settings</button></a>
        <a href="CC Reset Password.html"><button>Reset Password</button></a>
    </div>
</div>
<nav class="navitop" id="topnavi">
    <div id="heading2" style="width:20%;float:left;text-align:left;transition-duration: 1.0s">
        <label style="padding-left:70px;padding-top:20px;font-size:25px;font-family: Calibri;font-weight:bold">The Caped Carrot</label>
    </div>
    <a href="CC Online Home.php" class="linker"><b>Home</b></a>
    <a href="#cart" class="linker"><b>Cart</b></a>
    <a href="#wishlist" class="linker"><b>Wishlist</b></a>
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
    <a href="homeDestroy.php" class="linker"><b>
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
<br/>
<div class="main" id="main" onmouseover="closebtn()">
    <br>
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

    if(isset($_POST["btnRemove"]))
    {
        $deleteCart="DELETE FROM cart WHERE cartid='$cid'";

        if(!mysql_query($deleteCart))
        {
            echo '<script type="text/javascript">';
            echo 'alert("Error Occured..., Contact the Administrator")';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Removed Sucessfully...")';
            echo '</script>';
        }
    }
    else if(isset($_POST["btnUpdate"]))
    {
        $insertOrder="UPDATE order_detail set stockid='$sid',username='$username',ordertype='$ot',date='$od',quantity='$quan' WHERE orderid='$oid'";
        $insertCart="UPDATE cart SET stockid='$sid',username='$username',cquantity='$quan' WHERE cartid='$cid'";

        if(!mysql_query($insertOrder))
        {
            echo mysql_error();
        }
        else
        {
            if(mysql_query($insertCart))
            {
                echo '<script type="text/javascript">';
                echo 'alert("Updated Successfully...")';
                echo '</script>';
            }
            else
            {
                echo mysql_error();
            }
        }
    }
    else
    {

    }
    ?>
    <br/><br/>
    <div>
        <div class="maincontainer">
            <label style="font-size:28px;margin-left:50px;font-family:calibri;font-weight:bold;background-color:white">Your Shopping Cart</label><br/>
            <center>
                <div style="border:1px solid black;background-color:teal;color:white;font-size:20px;padding:18px 20px;width:15%;margin-top:20px;margin-left:50px;float:left">Order Summary</div>
                <div class="activator" style="background-color:teal">Payment Option</div>
                <div class="activator">Complete</div>
            </center>
            <div style="margin-top:20px">
                <br/><br/>
                <?php
                session_start();
                $user=$_SESSION["loginuser"];
                $load="SELECT * FROM signup WHERE username='$user'";

                $fill=mysql_query($load);

                $row1=mysql_fetch_array($fill);
                ?>
                <center>
                    <form method="POST" action="CC%20Profile%20Setting.php">
                        <table width="70%" cellpadding="10">
                            <input type="text" placeholder="Enter your name" hidden name="full" value="<?php echo $row1["fullname"];?>">
                            <tr>
                                <td>Username: </td>
                                <td>
                                    <input type="text" name="user" enabled value="<?php echo $row1["username"];?>">
                                </td>
                            </tr>
                            <input type="email" name="email" hidden placeholder="Enter your email" value="<?php echo $row1["email"];?>">
                            <textarea name="add" hidden><?php echo $row1["address"];?></textarea>
                            <input type="password" hidden name="password" placeholder="Enter your password" value="<?php echo $row1["password"];?>"/>
                            <input type="password" hidden name="confirmpassword" placeholder="Enter your password again" value="<?php echo $row1["password"];?>">
                            <input type="text" hidden name="contactno" placeholder="Enter your contact No" value="<?php echo $row1["contactno"];?>"/>
                            <tr>
                                <td>Payment type: </td>
                                <td>
                                    <input list="category" name="payment" value="<?php echo $row1["paymenttype"];?>">
                                    <datalist id="category">
                                        <option>--Select Payment Option--</option>
                                        <option>Credit</option>
                                        <option>Debit</option>
                                    </datalist>
                                </td>
                            </tr>
                            <tr>
                                <td>Card No: </td>
                                <td>
                                    <input type="text" name="cardno" placeholder="Enter Card No" value="<?php echo $row1["cardno"];?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Amount: </td>
                                <td>
                                    <input type="text" name="amount" placeholder="Amount" value="<?php echo $row1["amount"];?>"/>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" value="Pay" name="btnUpdate">
                    </form>
                    <?php

                    if(isset($_POST["full"]) && isset($_POST["user"]) && isset($_POST["email"]) && isset($_POST["add"]) && isset($_POST["password"]) && isset($_POST["confirmpassword"]) && isset($_POST["contactno"]) && isset($_POST["payment"]) && isset($_POST["cardno"]) && isset($_POST["amount"]))
                    {
                        $first=$_POST["full"];
                        $usern=$_POST["user"];
                        $ema=$_POST["email"];
                        $address=$_POST["add"];
                        $pass=$_POST["password"];
                        $confirmpass=$_POST["confirmpassword"];
                        $contno=$_POST["contactno"];
                        $paid=$_POST["payment"];
                        $card=$_POST["cardno"];
                        $amount=$_POST["amount"];
                    }
                    else
                    {
                    }

                    if(isset($_POST["btnUpdate"]))
                    {
                        $updateString="UPDATE signup SET fullname='$first',email='$ema',address='$address',password='$pass',contactno='$contno',paymenttype='$paid',cardno='$card',amount='$amount' WHERE username='$usern'";

                        if(!mysql_query($updateString))
                        {
                            $error=die('Error'.mysql_error());
                        }
                        else
                        {
                            echo '<script type="text/javascript">';
                            echo 'alert("Profile Updated Successfully..."+" Your Profile will be update soon.")';
                            echo '</script>';
                        }
                    }
                    ?>
                </center>
            </div>
        </div>
    </div>
    <br/><br/><br/>
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
                            <form method="post" action="CC Online Package.php">
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
                                $selectString="SELECT * FROM stock WHERE categoryname='Package' AND stockname='$searchpack'";

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