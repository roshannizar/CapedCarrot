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
                <form name="Sign In" method="POST" action="CCSigninAdmin.php" onsubmit="return validate()">
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

        $_SESSION['login_user']=$username;

        $result = mysql_query("SELECT username,password FROM tcc_adminsignup where username='$username' AND password='$password'") or die("failed to query the database" . mysql_error());
        $row = mysql_fetch_array($result);

        if ($row['username'] == $username && $row['password'] == $password)
        {
            echo "Login Was successful welcome" . $row['username'];
            header("location: CCAdminPage.php");
            echo "Active Profile: ".$_SESSION['login_user'];
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Invalid Credentials, Please Try Again...")';
            echo '</script>';
        }
    }
?>