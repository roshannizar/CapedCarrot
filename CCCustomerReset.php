<?php
require 'db_connect.php';
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Reset Password</title>
        <link rel="icon" href="CSS/Icons/carrot.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="CSS/signupDesign.css">
        <script language="javascript" type="text/javascript" src="Javascript/signupValidation.js">
        </script>
    </head>
    <body>
    <?php
    session_start();
    $user=$_SESSION["loginuser"];
    $DataGridView="SELECT * FROM signup where username='$user'";
    $stock=mysql_query($DataGridView);
    $row=mysql_fetch_array($stock)
    ?>
    <div class="container">
        <div class="subcontainer">
            <h1 style="text-align:center;color:white;font-family:cinzel">THE CAPED CARROT</h1>
        </div>
        <div class="subcontainer1">
            <div class="scontainer">
                <p>Change Password</p><br/>
                <label>Username: <?php echo $row["username"]; ?></label>
                <form name="Reset Password" method="POST" action="CCCustomerReset.php" onsubmit="">
                    <input type="text" placeholder="Full Name" id="fname" hidden name="fullname" value="<?php echo $row["fullname"]; ?>"><br/><br/>
                    <br/><br/>
                    <input type="text" hidden name="add" value="<?php echo $row["address"]; ?>">
                    <input type="text" hidden name="payment" value="<?php echo $row["paymenttype"]; ?>">
                    <input type="text" hidden name="cardno" value="<?php echo $row["cardno"]; ?>">
                    <Input type="text" hidden name="amount" value="<?php echo $row["amount"]; ?>">
                    <input type="text" hidden name="contactno" value="<?php echo $row["contactno"]; ?>">
                    <input type="text" placeholder="User Name" id="uname" hidden name="username" value="<?php echo $row["username"]; ?>"><br/><br/>
                    <input type="email" placeholder="E-Mail" id="email" hidden name="email" value="<?php echo $row["email"]; ?>">
                    <label>Password</label><br/>
                    <input type="password" placeholder="Password" id="ppassword" name="password" value="<?php echo $row["password"]; ?>"><br/><br/>
                    <label>Confirm Password</label><br/>
                    <input type="password" placeholder="Confirm Password" id="conpass" name="confirmpassword" value="<?php echo $row["password"]; ?>"><br/><br/>
                    <br/><br/><br/><br/><br/><br/><br/>
                    <input type="submit" value="Update Password" name="btnSignup">
                </form>
            </div>
        </div>
    </div>
    </body>
    </html>

<?php

if(isset($_POST["amount"]) && isset($_POST["add"]) && isset($_POST["payment"]) && isset($_POST["contactno"]) && isset($_POST["cardno"]) && isset($_POST["fullname"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirmpassword"]))
{
    $am=$_POST["amount"];
    $pay=$_POST["payment"];
    $address=$_POST["address"];
    $cont=$_POST["contactno"];
    $fname=$_POST["fullname"];
    $uname=$_POST["username"];
    $ema=$_POST["email"];
    $card=$_POST["cardno"];
    $pass=$_POST["password"];
    $conpass=$_POST["confirmpassword"];
}

if(isset($_POST["btnSignup"]))
{
    $updateString="UPDATE signup SET fullname='$fname',email='$ema',address='$address',password='$pass',contactno='$cont',paymenttype='$pay',cardno='$card', amount='$amount' WHERE username='$uname'";

    if(!mysql_query($updateString))
    {
        $error='Error: '.mysql_error();
        echo '<script>';
        echo 'alert($error)';
        echo '</script>';
    }
    else
    {
        echo '<script type="text/javascript">';
        echo 'alert("Password Changed Successfully...")';
        header('Location: CCSignin.php');
        echo '</script>';
    }
}
?>