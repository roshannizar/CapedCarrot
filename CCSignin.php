<?php
    require 'db_connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="CSS/signinDesign.css"/>
</head>
<body>
<div class="container">
    <div class="subcontainer">
        <h1 style="text-align:center;color:white;font-family:cinzel">THE CAPED CARROT</h1>
    </div>
    <div class="subcontainer1">
        <div class="scontainer">
            <p>Sign In</p><br/>
            <form name="Sign In" method="POST" action="CCSignin.php">
                <div style="text-align:center">
                    <img src="CSS/Icons/person.png" width="150px">
                </div>
                <br/>
                <label>User Name</label><br/>
                <input type="text" placeholder="User Name" id="uname" name="uname"><br/><br/>
                <label>Password</label><br/>
                <input type="password" placeholder="Password" id="ppassword" name="pass"><br/><br/>
                <b style="color:white"><input type="checkbox">Show Password<br/></b>
                <br/>
                <input type="submit" value="Sign In">
                <label>Need an account?</label> <a href="CC%20Signup.php" style="text-decoration: none;color:blue;font-size:18px;padding-top:20px;font-family: calibri">Create an Account</a><br/>
                <label>Hi there! </label> <a href="CCCustomerReset.php" style="text-decoration: none;color:blue;font-size:18px;padding-top:20px;font-family: calibri">Forgot your Password?</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php
    session_start();

    $username=$_POST['uname'];
    $password=$_POST['pass'];

    if(($username=="" && $password=="") || ($username==null && $password==null))
    {
    }
    else
    {
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);

        $_SESSION['loginuser']=$username;

        $result = mysql_query("SELECT username,password FROM signup where username='$username' AND password='$password'") or die("failed to query the database" . mysql_error());
        $row = mysql_fetch_array($result);

        if ($row['username'] == $username && $row['password'] == $password)
        {
            header("location: CC Online Home.php");
            session_start();
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Invalid Credentials, Please try again...")';
            echo '</script>';
        }
    }
?>