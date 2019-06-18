<?php
    require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TCC - About Us</title>
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
        .subhead
        {
            font-size:40px;
            color:black;
            font-family: calibri;
            border-bottom:2px solid teal;
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
            margin-top:700px;
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
        input[type=text],input[type=email],textarea
        {
            background-color: transparent;
            border:none;
            box-sizing: border-box;
            border-bottom: 1px solid black;
            outline:none;
            padding:10px;
            width:95%;
            font-family: segoe UI;
            color:black;
            transition-duration:1.0s;
        }
        input[type=text]:hover,input[type=email]:hover,textarea:hover
        {
            color: black;
            border-bottom: 2px solid #008080;
        }
        input[type=submit]
        {
            margin:5px;
            width:95%;
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
        .subcontainer1
        {
            float:right;
            width:34.9%;
            background-color:transparent;
            margin-top:50px;
        }
        .scontainer
        {
            margin:23px;
        }
        .subcontainer
        {
            float:left;
            width:65%;
            margin-top:50px;
            padding-top:20px;
            padding-bottom:50px;
            background-color:transparent;
            border-right:1px solid teal;
        }
        .contact
        {
            font-size:20px;
            font-family: cinzel;
            padding:10px;
        }
        .cont
        {
            font-family:calibri;
        }
    </style>
    <script>
        function validate()
        {
            var ename=document.forms["contactus"]["name"].value;
            var ema=document.forms["contactus"]["email"].value;
            var com=document.forms["contactus"]["comments"].value;

            if(isAlpha(ename))
            {
                if(emailValidation(ema))
                {
                    if(isAlpha(com))
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }

        function isAlpha(elemValue)
        {
            if(!isAvailable(elemValue))
            {
                var exp=/^[a-z]+$/;

                if(elemValue.match(exp))
                {
                    return true;
                }
                else
                {
                    alert("Enter a Valid Name");
                    return false;
                }
            }
            else
            {
                return false;
            }
        }

        function isAvailable(elemValue)
        {
            if(elemValue=="" || elemValue==null)
            {
                alert("You Can't Keep fields empty");
                return true;
            }
            else
            {
                return false;
            }
        }

        function emailValidation(elemValue)
        {
            if(!isAvailable(elemValue))
            {
                var atops = elemValue.indexOf("@");
                var dotops = elemValue.indexOf(".");

                if(atops <1 || dotops+2 >=elemValue.length || atops+2>dotops)
                {
                    alert("Enter a valid Email Address");
                    return false;
                }
                else
                {
                    return true;
                }
            }
            else
            {
                return false;
            }
        }

    </script>
</head>
<body>
<div class="main">
    <nav class="navitop">
        <a href="CCHomePage.php">HOME</a>
        <a href="CC About Us.html">ABOUT US</a>
        <a href="CCFoodMenu.php">FOOD MENU</a>
        <a style="color:teal;border-left:2px solid teal;border-right:2px solid teal" href="CC Contact Us.php">CONTACT US</a>
        <a href="CC FAQ.html">FAQ</a>
    </nav>
    <div class="content">
        <center>
            <label class="heading">CONTACT US</label>
        </center>
        <div class="bottomcontent">
            <center>
                <label class="subhead">Fill out the form below to know more About Us</label>
            </center>
            <p></p>
            <div class="subcontainer">
                <center>
                    <a href="http://www.facebook.lk"><img src="CSS/Icons/facebook.png" width="80px"></a>
                    <a href="http://www.instagram.lk"><img src="CSS/Icons/instagram.png" width="80px"></a>
                    <a href="http://www.googleplus.lk"><img src="CSS/Icons/google.png" width="80px"></a>
                    <a href="http://www.linkedin.lk"><img src="CSS/Icons/linkedin.png" width="80px"><br/></a>
                </center>
                <div style="margin-left:220px" class="contact">
                    <label style="font-size:24px;border-bottom:2px solid teal">Contact Us</label><br/><br/>
                    <label class="cont">Fax: 0110000000</label><br/><br/>
                    <label class="cont">Mobile: 0770000000/0777000000</label><br/><br/>
                    <label class="cont">Office: 0114444444</label>
                </div>
            </div>
            <div class="subcontainer1">
                <div class="scontainer">
                    <form name="contactus" method="POST" action="CC Contact Us.php">
                        <label>Name</label><br/>
                        <input type="text" placeholder="Full Name" id="name" name="fname"><br/><br/>
                        <label>E-Mail</label><br/>
                        <input type="email" placeholder="E-Mail" id="email" name="email"><br/><br/>
                        <label>Comments</label><br/>
                        <textarea placeholder="Enter Your Comments Here" id="comments" name="comment"></textarea><br/><br/>
                        <input type="submit" value="Submit" name="btnSubmit">
                    </form>
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
    </div>
</body>
</html>

<?php
    if(isset($_POST["fname"]) && isset($_POST["email"]) && isset($_POST["comment"]))
    {
        $name=$_POST["fname"];
        $ema=$_POST["email"];
        $com=$_POST["comment"];
    }
    else
    {
    }

    if(isset($_POST["btnSubmit"]))
    {
        $insertString="INSERT INTO comment VALUES('$name','$ema','$com')";

        if(!mysql_query($insertString))
        {
            $error='Error: '.mysql_error();
            echo '<script>';
            echo 'alert($error)';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Thank you for Commenting...")';
            echo '</script>';
        }
    }
?>