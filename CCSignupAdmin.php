<?php
require 'db_connect.php';
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Sign Up</title>
        <link rel="icon" href="CSS/Icons/carrot.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="CSS/signupDesign.css">
        <script language="javascript" type="text/javascript" src="Javascript/signupValidation.js">
        </script>
    </head>
    <body>
    <div class="container">
        <div class="subcontainer">
            <h1 style="text-align:center;color:white;font-family:cinzel">THE CAPED CARROT</h1>
        </div>
        <div class="subcontainer1">
            <div class="scontainer">
                <p>Sign up</p><br/>
                <form name="signup" method="POST" action="CCSignupAdmin.php" onsubmit="return validate()">
                    <label>Full Name</label><br/>
                    <input type="text" placeholder="Full Name" id="fname" name="fullname"><br/><br/>
                    <label>User Name</label><br/>
                    <input type="text" placeholder="User Name" id="uname" name="username"><br/><br/>
                    <label>E-Mail</label><br/>
                    <input type="email" placeholder="E-Mail" id="email" name="email"><br/><br/>
                    <label>Password</label><br/>
                    <input type="password" placeholder="Password" id="ppassword" name="password"><br/><br/>
                    <label>Confirm Password</label><br/>
                    <input type="password" placeholder="Confirm Password" id="conpass" name="confirmpassword"><br/><br/>
                    <b style="color:white"><input type="checkbox" style="border-radius:5px;background-color:teal">I Agree to the terms<br/></b>
                    <br/>
                    <input type="submit" value="Sign Up" name="btnSignup">
                </form>
            </div>
        </div>
    </div>
    </body>
    </html>

<?php

    if(isset($_POST["fullname"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirmpassword"]))
    {
        $fname=$_POST["fullname"];
        $uname=$_POST["username"];
        $ema=$_POST["email"];
        $pass=$_POST["password"];
        $conpass=$_POST["confirmpassword"];
    }

    if(isset($_POST["btnSignup"]))
    {
        $insertString="INSERT INTO tcc_adminsignup VALUES('$fname','$uname','$ema','$pass')";

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
            echo 'alert("Account Created Successfully...")';
            header('Location: CCSigninAdmin.php');
            echo '</script>';
        }
    }
?>