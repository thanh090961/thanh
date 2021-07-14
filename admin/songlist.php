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
                  <a class="nav-link" href="../index.php"> Home <span class="glyphicon glyphicon-home sr-only">(current)</span></a>
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
          
          <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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
	    <div class="container">
        <div class="row justify-content-center">
			<div class='col-2'>
				<h6>Product name</h6>
			</div>
			<div class='col-2'>
				<h6>Price</h6>
			</div>
			<div class='col-2'>
				<h6>OriGin</h6>
			</div>
			<div class='col-2'>
				<h6>Image</h6>
			</div>
			<div class='col-2'>
				<h6>Genre</h6>
			</div>
			<div class='col-2'>
				<h6>Action</h6>
			</div>
		</div>
		<?php 
		 include("../include/conn.php");
		$sql="select*from song";
		$result= $connect->query($sql);
		while($song=$result->fetch_object()){
			echo "
        <div class='row justify-content-center' style='margin-bottom:20px;'>
			<div class='col-2'>
				<p>$song->ProductName</p>
			</div>
			<div class='col-2'>
				<p>$song->Price</p>
			</div>
			<div class='col-2'>
				<p>$song->OriGin</p>
			</div>
			<div class='col-2'>
				<img src='../img/$song->Image' style=' height: 60px; width: 60px;' >
			</div>";
			$genreID=$song->GenreID;
			$sql1="select*from genre where GenreID=$genreID";
			$result1= $connect->query($sql1);
			$genre=$result1->fetch_object();
			echo"
			<div class='col-2'>
				<p>$genre->GenreName</p>
			</div>
			<div class='col-2'>
			    <a href='addproduct.php'>Add</a>
				<a href='editsong.php?update_id=$song->ProductID'>Edit</a>
				<a href='songlist.php?delete_id=$song->ProductID'>Delete</a>
			</div>
		</div>";
		}
			?>


			
            

    </div>
                <?php
                if(isset($_GET['delete_id'])){
						
					$songID=$_GET['delete_id'];
                    
                        $result2=$connect->query("delete from song where ProductID=$ProductID");
                        
					
                        if($result2){
                            echo "<script>alert('xóa dữ liệu thành công')</script>";
							echo"<script>window.open('Songlist.php','_self')</script>";
                       
                        }
                        else{
                            echo "<script>alert('xóa dữ liệu thất bại')</script>";
                          
                        }
                }
           



?>

	
<script src="WebsiteLayout/jquery-3.3.1.min.js"></script>
<script src="WebsiteLayout/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>