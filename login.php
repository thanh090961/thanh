<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<style type="text/css">
	body{
    margin: 0;
    padding: 0;
    background: url("img/KRagmc.jpg") no-repeat center center fixed;
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
		
}

.loginbox{
    width: 320px;
    height: 420px;
    background: #000;
    color: #fff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
}



h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}

.loginbox p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.loginbox input{
    width: 100%;
    margin-bottom: 20px;
}

.loginbox input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.loginbox input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #fb2525;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.loginbox input[type="submit"]:hover
{
    cursor: pointer;
    background: #ffc107;
    color: #000;
}
.loginbox a{
    text-decoration: none;
    font-size: 12px;
    line-height: 20px;
    color: darkgrey;
}

.loginbox a:hover
{
    color: #ffc107;
}
	</style>
</head>

<body>
	    <div class="loginbox">
    
        <h1>Login Here</h1>
        <form method="post">
            <p>UserName</p>
            <input type="text" name="UserName" required placeholder="Enter Username">
            <p>PassWord</p>
            <input type="password" name="PassWord" required placeholder="Enter Password">
            <input type="submit" name="login" value="Login">
           
            <a href="Register.php">Don't have an account?</a>
        </form>
        
    </div>
  <?php 
	session_start();


  include("include/conn.php");
  if(isset($_POST['login'])){

    $UserName = $_POST['UserName'];
    $PassWord = $_POST['PassWord'];
    $sql="select * from user where UserName='$UserName' AND PassWord='$PassWord'";
    $result = mysqli_query($connect,$sql);
    $check_login = mysqli_num_rows($result);
    $row_login = mysqli_fetch_array($result);   
    if($check_login == 0){
     echo "<script>alert('Password or username is incorrect, please try again!')</script>";
     exit();
   }  
   if($check_login > 0){ 
   $_SESSION['UserID'] = $row_login['UserID'];
	   $_SESSION['UserName']=$UserName;
 //  $_SESSION['username'] = $username;  
    echo "<script>alert('You have logged in successfully !')</script>";  
    echo"<script>window.open('index.php','_self')</script>";
	  
  }
}
?>
</body>
</html>