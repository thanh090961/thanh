<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="WebsiteLayout/style.css">
	<link rel="stylesheet" type="text/css" href="WebsiteLayout/bootstrap/css/bootstrap.min.css">

</head>
<body>
	<?php
	session_start();
	?>
<!-- menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
	  <a class="navbar-brand" href="#">ATN</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="index.php"> Home <span class="glyphicon glyphicon-home sr-only">(current)</span></a>
              </li>
              <li class="nav-item" >
                  <a class="nav-link" href="#"> <span class="glyphicon glyphicon-user"></span>Link</a>
				  
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdown">
                      Account
                  </a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="login.php">Login</a>
                      <a class="dropdown-item" href="Register.php">Register</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                  </div>
              </li>
          </ul>
          
          <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
              <input class="form-control mr-sm-2" type="search" placeholder="search" name="inputSearch" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>
          </form>
      </div>
  </div>
</nav>
<!-- end menu -->
<!-- slide -->
<div id="carouselExampleIndicators" class="carousel slide mt-1" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	 <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
	 
  </ol>
  <div class="carousel-inner">
     <div class="carousel-item active">
      <img class="d-block w-100" src="https://danhchobeyeu.com/media/cache/data/Banner-Website-He-01-1392x435.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://www.hangdochoi.com/wp-content/uploads/2019/05/hangdochoi-banner-dochoi.jpg" 
      alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://cafefcdn.com/2018/12/17/banner-hinh-do-choi-1545016993587208100840.jpg" 
      alt="Third slide">
    </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="https://danhchobeyeu.com/media/cache/data/Banner-Smoneo-Website-01-1392x435.png" alt="Third slide">
    </div>
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- end slide -->
<!-- list product -->
  <?php 

include("include/conn.php");
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $id =$_POST['id'];
  if (empty($_SESSION['cart'][$id])) {
    $q=mysqli_query($connect,"SELECT * FROM song WHERE ProductID = {$id}");
    $product = mysqli_fetch_assoc($q);
    $_SESSION['cart'][$id]=$product;
  $_SESSION['cart'][$id]['sl']=$_POST['sl'];
  }
  
 }
 ?>
 <div class="container-fluid">
 <div class="row">
  <link rel="stylesheet" type="text/css" href="cart.css">
  <h3 class="giohang"><i class="fas fa-shopping-cart"></i> Cart</h3>
  <br>
  <br>
  <?php 
  if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) :
    ?>
    <div class="products" style="border: 2px solid black">
    <a href="single.php?id=<?php echo $item['ProductID']?>" style="text-decoration: none;">
    <div><img style="width: 310px" src="img/<?php echo $item['Image']?>" class="img-cart"></div>
    <h2><?php echo $item['ProductName'] ?></h2>
        <p style="color: red">Price: <?php echo $item['Price']." $ "; ?></p>
        <?php
    echo "<a href='delcart.php?productid=$item[ProductID]' style='text-decoration: none;'>Delete</a>";
    ?>
         </a>
         </div>
         	 <?php
 	endforeach;
 	}
 	else 
 		echo "There are no products in the product";
 	?>
 	<br>
   <a href="delcart.php?productid=0" style="text-decoration: none; color: white"><button type="button" class="btn btn-danger">Delete All</button></a>
 	<div id="total" class="clearfix">

 		 <?php
 		 $tong = 0;
 		  foreach ($_SESSION['cart'] as $item ) :
 		 	$tong += $item['sl'] * $item['Price'];
 		 endforeach;
 		 ?>
 	
 	</div>	
  <div class="container" style="border-top:3px solid #38D276;margin-top: 20px">
 	<div class="col-md-6" style="border: 1px solid #38D276">
<h3 style="text-align: center;">Payment</h3>
 	<form method="post" action="thanhtoan.php" class="was-validated">
 		<div class="form-group">
  		<label for="usr">UserName:</label>
  		<input type="text" class="form-control" id="user" name="name" value="<?php echo $_SESSION['UserName'];  ?>" readonly>
		</div>
    <label for="bank">Select payment bank</label>
  <select class="custom-select" required id="bank" name="bank">
    <option selected></option>
    <option value="Vietcombank">Vietcombank</option>
    <option value="Techcombank">Techcombank</option>
    <option value="Airpay">Airpay</option>
    <option value="momo">momo</option>
  </select>
<div class="form-group">
  <div class="form-group">
  <label for="usr">Order date:</label>
  <input type="text" class="form-control" id="usr" name="date" value="<?php
  date_default_timezone_set('Asia/Ho_Chi_Minh');
echo "". date("Y.m.d h:i:sa");
?>" readonly>
</div>
<div class="form-group">
  <label for="usr">Total</label>
  <input type="text" class="form-control" id="usr" value=" <?php echo number_format($tong) ." $" ?>" readonly name="total">
</div>
<input type="submit" class="btn btn-success" value="Pay">

 	</form>
 	</div>
 </div>
 </div>
 </div>

<script src="WebsiteLayout/jquery-3.3.1.min.js"></script>
<script src="WebsiteLayout/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>