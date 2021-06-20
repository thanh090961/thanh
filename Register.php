<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<style type="text/css">
	body{
    margin: 0;
    padding: 0;
    background: url("img/496298.jpg");
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
	
}

.Register{
    width: 320px;
    height: 700px;
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

.Register p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.Register input{
    width: 100%;
    margin-bottom: 20px;
}

.Register input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.Register input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #fb2525;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.Register input[type="submit"]:hover
{
    cursor: pointer;
    background: #ffc107;
    color: #000;
}
.Register a{
    text-decoration: none;
    font-size: 12px;
    line-height: 20px;
    color: darkgrey;
}

.Register a:hover
{
    color: #ffc107;
}
	</style>
</head>

<body>
	<div class="Register">
		<h1>Register Here</h1>
	<form action="register.php" method="post">
		
			
				<p>UserName :</p>
				<input type="text" id="UserName" name="UserName" required placeholder="Enter UserName">
				<p>PassWord :</p>
				<input type="PassWord" id="PassWord" name="PassWord" required placeholder="Enter PassWord">
				<p>Phone :</p>
				<input type="text" id="Phone" name="Phone" required placeholder="Enter PhoneNumber">
				<p>FullName :</p>
				<input type="text" id="FullName" name="FullName" required placeholder="Enter FullName">
				
				<p>CreditCard :</p>
				<input type="text"  id="CreditCard" name="CreditCard">
			
				<input type="submit" name="Register" value="Register">
		        <a href="login.php">already have an account to log in now</a>
			

	</form>
	</div>
	<?php
	include("include/conn.php");
	if (isset($_POST['Register'])){
		$UserName= $_POST['UserName'];
		$PassWord =$_POST['PassWord'];
		$Phone =$_POST['Phone'];
		$FullName =$_POST['FullName'];
		
		$CreditCard =$_POST['CreditCard'];
		$sql="insert into user values ('Null','$UserName','$PassWord','$Phone','$FullName','$Role','$CreditCard')";
		$result = mysqli_query($connect,$sql);
		if ($result){
			echo "<script>alert('Account has been created successfully!')</script>";
			echo "<script>window.open('login.php','_self')</script>";
		}
		else{
			echo "<script>alert('Error')</script>";
		}
	}
	?>
</body>
</html>