<!DOCTYPE html>

  <head>
<!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
  </head>

<style>
.alert {
    text-align: center;
    padding: 12px;
    background-color: #f44336; /* Red */
    color: white;
    margin-bottom: 10px;  
}
</style>


<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
    
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];

// Establishing Connection with Server by passing server_name, user_id and password as a parameter

$connection = mysql_connect("localhost", "msmmachine", "Coffee2017");

// To protect MySQL injection for Security purpose

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

// Selecting Database
$db = mysql_select_db("kike", $connection);
// SQL query to fetch information of registerd users and finds user match.

$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
$rows = mysql_num_rows($query);

if ($rows == 1) {


$query = mysql_query("select * from login where password='$password' AND username='$username' AND admin = 1", $connection);
$master = mysql_num_rows($query);
     
	 
	 $_SESSION['login_user']=$username; // Initializing Session
	 
        if($master == 1) { // some way of identifying an admin
            // admin

            header("location: wood/profile.php"); // Redirecting To Other Page
            exit;
        } else {
            // user
            header("location: user/profile.php");
            exit;
        }

$_SESSION["id"]= $user["id"];
			
			if(!empty($_POST["remember"])) {
				setcookie ("username",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["username"])) {
					setcookie ("username","");
				}
				if(isset($_COOKIE["password"])) {
					setcookie ("password","");
				}
			}
                  } 

else {
$error = "Username or Password is invalid";

echo ' <div class="fixed-top">

<div class="alert alert-primary"  role="alert">
  Invalid username or password
</div> </div>' ;

}

mysql_close($connection); // Closing Connection
}
}
?>

</html>    


