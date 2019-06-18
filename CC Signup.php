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
            <form name="signup" method="POST" action="CC Signup.php" onsubmit="return validate()">
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
                <input type="submit" value="Sign Up" name="btnSignup">
                <div style="width:0">
                    <input hidden type="text" name="address">
                    <input hidden type="text" name="contactno">
                    <input hidden type="text" name="paymenttype">
                    <input hidden type="text" name="cardno">
                    <input hidden type="text" name="amount">
                </div>
                <br/><br/><br/><br/><br/>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php
    if(isset($_POST["fullname"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirmpassword"]) && isset($_POST["address"]) && isset($_POST["contactno"]) && isset($_POST["paymenttype"]) && isset($_POST["cardno"]) && isset($_POST["amount"]))
    {
        $fname=$_POST["fullname"];
        $uname=$_POST["username"];
        $ema=$_POST["email"];
        $pass=$_POST["password"];
        $conpass=$_POST["confirmpassword"];
        $add=$_POST["address"];
        $con=$_POST["contactno"];
        $paid=$_POST["paymenttype"];
        $card=$_POST["cardno"];
        $amount=$_POST["amount"];
    }
    else
    {
       echo "Complete the Form...";
    }

    if(isset($_POST["btnSignup"]))
    {
        $insertString="INSERT INTO signup VALUES('$fname','$uname','$ema','$add','$pass','$con','$paid','$card','$amount')";

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
            header("Location: CCSignin.php");
            echo '</script>';
        }
    }
?>