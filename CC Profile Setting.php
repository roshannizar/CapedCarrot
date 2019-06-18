<?php
    require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TCC - Profile Setting</title>
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
            padding-left:100px;
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
            background-position-x: 50px;
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
        .search:hover
        {
            width:40%;
            background-image: url(CSS/Icons/search.png);
            background-position: right;
            background-size: 50px;
            background-repeat: no-repeat;
            text-align:left
        }
        .footer
        {
            position:absolute;
            width:96%;
            right:0;
            margin-top:1100px;
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
        .main
        {
            width:95.5%;
            margin-left:55px;
            background-color: whitesmoke;
            margin-top:30px;
            position:absolute;
            right:0;
            z-index:-2;
            border-top:30px solid teal;
        }
        .maincontainer img
        {
            cursor: pointer;
            transition-duration: 1.0s;
        }
        .maincontainer img:hover
        {
            width:30%;
        }
        .heading1
        {
            font-size:80px;
            color:black;
            font-family:cinzel;
            padding-top:150px;
        }
        input[type=text],input[type=email],input[type=password],textarea
        {
            background-color: transparent;
            border:none;
            box-sizing: border-box;
            border-bottom: 2px solid black;
            outline:none;
            padding:10px;
            width:95%;
            font-family: segoe UI;
            color:black;
            transition-duration:1.0s;
        }
        input[type=text]:hover,textarea:hover
        {
            background-color: transparent;
            color:black;
            border-bottom: 2px solid #008080;
        }
        input[type=email]:hover
        {
            background-color: transparent;
            color:black;
            border-bottom: 2px solid #008080;
        }
        input[type=password]:hover
        {
            color:black;
            border-bottom: 2px solid #008080;
        }
        input[type=submit]
        {
            margin:5px;
            width:45%;
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
            document.getElementsByName("main").style.marginLeft="230px";
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
    <button class="btn2" style="padding-left:100px;background-image:url(CSS/Icons/person.png);background-size: 50px;background-repeat: no-repeat"><?php session_start(); echo "Active Profile: ".$_SESSION["loginuser"];?></button>
    <p></p>
    <a href="CC Online Package.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/package.png);background-size: 50px;background-repeat: no-repeat">Packages</button></a>
    <a href="CC Online Rice.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/food.png);background-size: 50px;background-repeat: no-repeat">Rice</button></a>
    <a href="CC Online Curry.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/curry.png);background-size: 50px;background-repeat: no-repeat">Curry</button></a>
    <a href="CC%20Online%20Dessert.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/dessert.png);background-size: 50px;background-repeat: no-repeat">Dessert</button></a>
    <a href="CC%20Online%20Beverages.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/beverages.png);background-size: 50px;background-repeat: no-repeat">Beverages</button></a>
    <button class="btn" style="border-left:4px solid teal;padding-left:100px;background-image:url(CSS/Icons/settings.png);background-size: 50px;background-repeat: no-repeat">Settings</button>
    <div class="btndrop">
        <a href="CC Profile Setting.html" style="border-left:4px solid teal"><button>Profile Settings</button></a>
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
<br/><br/><br/><br/>
<center>
    <label class="heading1">Profile Setting</label>
</center>
<div class="main" id="main" onmouseover="closebtn()">
    <br>
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
    <br/><br/>
    <div>
        <?php
            session_start();
            $user=$_SESSION["loginuser"];
            $load="SELECT * FROM signup WHERE username='$user'";

            $fill=mysql_query($load);

            $row1=mysql_fetch_array($fill);
        ?>
        <label style="font-size:28px;font-family:calibri;margin-left:60px;margin-bottom:20px">Profile</label>
        <center>
        <form method="POST" action="CC%20Profile%20Setting.php">
            <table width="50%" cellpadding="10">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" placeholder="Enter your name" name="full" value="<?php echo $row1["fullname"];?>">
                    </td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="user" value="<?php echo $row1["username"];?>">
                    </td>
                </tr>
                <tr>
                    <td>E-Mail: </td>
                    <td>
                        <input type="email" name="email" placeholder="Enter your email" value="<?php echo $row1["email"];?>">
                    </td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td>
                        <textarea name="add"><?php echo $row1["address"];?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter your password" value="<?php echo $row1["password"];?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirmpassword" placeholder="Enter your password again" value="<?php echo $row1["password"];?>">
                    </td>
                </tr>
                <tr>
                    <td>Contact No: </td>
                    <td>
                        <input type="text" name="contactno" placeholder="Enter your contact No" value="<?php echo $row1["contactno"];?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Payment type: </td>
                    <td>
                        <input type="text" name="payment" placeholder="Select Payment Type" value="<?php echo $row1["paymenttype"];?>"/>
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
            <input type="submit" value="Update Profile" name="btnUpdate">
        </form>
        </center>
    </div>
    <br/><br/>
</div>
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
</script>
</body>
</html>