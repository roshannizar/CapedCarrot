<?php
    require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TCC - Home</title>
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
            border-top: 4px solid teal;
            color: black;
        }
        .btn1:hover
        {
            border-top: 4px solid teal;
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
        .footer
        {
            position:absolute;
            width:96%;
            right:0;
            margin-top:100px;
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
        .sign
        {
            opacity: 0.6;
            margin-left:20px;
            margin-right:10px;
            margin-top:-182px;
            padding-left:5px;
            padding-right:5px;
            padding-top:70px;
            padding-bottom:80px;
            background-color:dimgrey;
            border:1px solid dimgrey;
            color:white;
            font-size:20px;
            transition-duration: 1.0s;
            cursor: pointer;
        }
        .sign:hover
        {
            opacity:1;
        }
        .detail
        {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            margin-left:20px;
            padding-top:90px;
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

        .close,.close2
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
        .close:focus,
        .close2:hover,
        .close2:focus
        {
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
        .image
        {
            margin-left:70px;
            float:left;
            border-right:1px solid black;
            width:40%;
            background-color: teal;
            height:500px;
            background-image: url(CSS/Images/bwc.jpg);
            background-size: cover;
        }
        .container
        {
            float:left;
            width:50%;
            background-color: white;
            height:500px;
        }
        .addcart
        {
            border:1px solid teal;
            background-color: teal;
            color:white;
            font-size:20px;
            font-family: Calibri;
            margin-right:30px;
            float:right;
            width:30%;
            outline:none;
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
            margin-left:55px;
            background-color: whitesmoke;
            margin-top:500px;
            position:absolute;
            right:0;
            z-index:-2;
            border-top:30px solid teal;
        }
        .maincontainer img
        {
            cursor: pointer;
            margin-left:10px;
            margin-bottom:10px;
            transition-duration: 1.0s;
            width:23%
        }
        .image
        {
            border-top-left-radius:10px;
            border-bottom-left-radius:10px;
        }
        .container
        {
            border-bottom-right-radius:10px;
            border-top-right-radius:10px;
        }
        .Slides1 img,.Slides img,.Slides2 img,.Slides3 img,.Slides4 img
        {
            box-shadow: 1px 1px 3px 1px dimgray;
            margin-left:10px;
        }
        #backislide
        {
            margin-top:30px;
            height:500px;
            background-attachment: fixed;
            background-image: url(CSS/Images/slide1.png);
            background-size:100%;
            background-repeat: no-repeat;
        }
        #backislide1
        {
            margin-top:30px;
            height:500px;
            background-attachment: fixed;
            background-image: url(CSS/Images/slide2.jpg);
            background-size:100%;
            background-repeat: no-repeat;
        }
        #backislide2
        {
            margin-top:30px;
            height:500px;
            background-attachment: fixed;
            background-image: url(CSS/Images/slide3.jpg);
            background-size:100%;
            background-repeat: no-repeat;
        }
        #backislide3
        {
            margin-top:30px;
            height:500px;
            background-attachment: fixed;
            background-image: url(CSS/Images/slide4.jpg);
            background-size:100%;
            background-repeat: no-repeat;
        }
        #backislide4
        {
            margin-top:30px;
            height:500px;
            background-attachment: fixed;
            background-image: url(CSS/Images/slide5.jpg);
            background-size:100%;
            background-repeat: no-repeat;
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
    <h1 class="heading">Categories</h1>
    <button class="btn2" style="padding-left:100px;background-image:url(CSS/Icons/person.png);background-size: 50px;background-repeat: no-repeat">
        <?php
        session_start();
        echo "Active Profile: ".$_SESSION['loginuser'];?>
    </button>
    <p></p>
    <a href="CC Online Package.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/package.png);background-size: 50px;background-repeat: no-repeat">Packages</button></a>
    <a href="CC Online Rice.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/food.png);background-size: 50px;background-repeat: no-repeat">Rice</button></a>
    <a href="CC Online Curry.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/curry.png);background-size: 50px;background-repeat: no-repeat">Curry</button></a>
    <a href="CC%20Online%20Dessert.php"><button class="btn1" style="padding-left:100px;background-image:url(CSS/Icons/dessert.png);background-size: 50px;background-repeat: no-repeat">Dessert</button></a>
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
    <a href="#cart" class="linker"><b>Cart</b></a>
    <a href="#wishlist" class="linker"><b>Wishlist</b></a>
    <a href="HomeDestroy.php" class="linker"><b>Sign Out</b></a>
    <a href="CC Signup.php" class="linker"><b>Sign Up</b></a>
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
    <div class="maincontainer">
        <label style="font-size:28px;font-family:calibri;margin-left:60px;margin-bottom:20px">Packages</label><br/>
        <div class="Slides fade" style="margin-left:50px;margin-top:30px">
            <img src="CSS/Images/starter.JPG"  style="width:23%">
            <img src="CSS/Images/standard.JPG"  style="width:23%">
            <img src="CSS/Images/extreme.JPG" style="width:23%">
            <img src="CSS/Images/supreme.JPG" style="width:23%">
        </div>
    </div>
    <br/><br/>
    <div>
        <label style="font-size:28px;font-family:calibri;margin-left:20px">Rice</label><br/>
        <div class="maincontainer">
            <div class=" fade" style="margin-left:50px;margin-top:30px">
                <?php
                $DataGridView="SELECT * FROM stock WHERE categoryname='Rice'";

                $stock=mysql_query($DataGridView);
                $c=0;
                while($row=mysql_fetch_array($stock))
                {
                    $c++;
                    ?>
                    <label><img style="margin-left:10px;margin-bottom:10px" src="CSS/Images/wali3.jpg" style="width:23%;float:left" class="Slides1" id="myBtn<?php echo $c;?>"></label>
                    <?php
                }
                ?>
            </div>
        </div>

        <?php
        $DataGridView1="SELECT * FROM stock WHERE categoryname='Rice'";
        $stock1=mysql_query($DataGridView1);
        $counts=0;
        while($row1=mysql_fetch_array($stock1))
        {
            $counts++;
            ?>
            <div id="myModal" class="detail">
                <div class="image">
                </div>
                <div class="container">
                    <div style="background-color:teal;width:100%;float:right;padding-bottom:10px;border-bottom:1px solid black;border-top-right-radius:10px">
                        <label style="margin-top:10px;color:white;float:left">Product Detail</label>
                        <label class="close">X</label>
                    </div>
                    <div style="margin-right:10px;margin-left:10px;margin-top:10px;padding-top:20px">
                        <br/><br/>
                        <label style="padding-top:10px;font-size:28px">Product:</label>
                        <br/><br/>
                        <label style="padding-top:10px;font-size:28px">Rs 2400</label>
                        <br/><br/>
                        <summary style="height:200px">DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/></summary>
                        <label>Price: 2400/=</label>
                        <button class="addcart" style="background-color:transparent;color:teal">Add to Wishlist</button>
                        <button class="addcart">Add to Cart</button>
                    </div>
                </div>
            </div>
            <script>
                var modal = document.getElementById('myModal');
                var btn1 = document.getElementById("myBtn<?php echo $counts;?>");
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
            <?php
        }
        ?>
    <br/><br/>
    <center>
        <label>Sign In Recommended </label>
        <label>myBtn<?php echo $c. " ".$counts;?></label>
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
</footer>

    <div id="myModal" class="detail">
        <div class="image">
        </div>
        <div class="container">
            <div style="background-color:teal;width:100%;float:right;padding-bottom:10px;border-bottom:1px solid black;border-top-right-radius:10px">
                <label style="margin-top:10px;color:white;float:left">Product Detail</label>
                <label class="close">X</label>
            </div>
            <div style="margin-right:10px;margin-left:10px;margin-top:10px;padding-top:20px">
                <br/><br/>
                <label style="padding-top:10px;font-size:28px">Product:  Biriyani</label>
                <br/><br/>
                <label style="padding-top:10px;font-size:28px">Rs 2400</label>
                <br/><br/>
                <summary style="height:200px">DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/>DescriptionDescriptionDescriptionDescriptionDescriptionDescriptio<br/></summary>
                <label>Price: 2400/=</label>
                <button class="addcart" style="background-color:transparent;color:teal">Add to Wishlist</button>
                <button class="addcart">Add to Cart</button>
            </div>
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

    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n)
    {
        showDivs(slideIndex += n);
    }

    function showDivs(n)
    {
        var i;
        var x = document.getElementsByClassName("Slides3");
        if (n > x.length)
        {
            slideIndex = 1;
        }
        if (n < 1)
        {
            slideIndex = x.length;
        }
        for (i = 0; i < x.length; i++)
        {
            x[i].style.display = "none";
        }
        x[slideIndex-1].style.display = "block";
    }

    var slideIndex4 = 1;
    showDivs4(slideIndex4);

    function plusDivs4(n)
    {
        showDivs4(slideIndex4 += n);
    }

    function showDivs4(n)
    {
        var i;
        var x = document.getElementsByClassName("Slides4");
        if (n > x.length)
        {
            slideIndex4 = 1;
        }
        if (n < 1)
        {
            slideIndex4 = x.length;
        }
        for (i = 0; i < x.length; i++)
        {
            x[i].style.display = "none";
        }
        x[slideIndex4-1].style.display = "block";
    }

    var slideIndex1 = 1;
    showDivs1(slideIndex1);

    function plusDivs1(n)
    {
        showDivs1(slideIndex1 += n);
    }

    function showDivs1(n)
    {
        var i;
        var x = document.getElementsByClassName("Slides1");
        if (n > x.length)
        {
            slideIndex1 = 1;
        }
        if (n < 1)
        {
            slideIndex1 = x.length;
        }
        for (i = 0; i < x.length; i++)
        {
            x[i].style.display = "none";
        }
        x[slideIndex1-1].style.display = "block";
    }

    var slideIndex2 = 1;
    showDivs2(slideIndex2);

    function plusDivs2(n)
    {
        showDivs2(slideIndex2 += n);
    }

    function showDivs2(n)
    {
        var i;
        var x = document.getElementsByClassName("Slides2");
        if (n > x.length)
        {
            slideIndex2 = 1;
        }
        if (n < 1)
        {
            slideIndex2 = x.length;
        }
        for (i = 0; i < x.length; i++)
        {
            x[i].style.display = "none";
        }
        x[slideIndex2-1].style.display = "block";
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