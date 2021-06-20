
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="WebsiteLayout/style.css">
	<link rel="stylesheet" type="text/css" href="WebsiteLayout/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript">
            function myAudio(event){
              if(event.currentTime >60){
                event.currentTime=0;
                event.pause();
                alert ("Payment to listen to the full song!")
              }
            }
          </script>
</head>
<body>
<!-- menu -->
	<?php
	session_start();
	?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
	  <a class="navbar-brand" href="#"></a>
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
                      Admin
                  </a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="./admin/songlist.php">Song</a>
                      <a class="dropdown-item" href="">Genre</a>
                      
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
	  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
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
    <div class="carousel-item">
      <img class="d-block w-100" src="https://kiddystore.vn/uploads/slider/kiddystore_vn_1617330762.jpg" 
      alt="Third slide">
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
  <div class="row mt-5">
    <h2 class="list-product-title">New Products</h2>
    <div class="list-product-subtitle">
      
    </div>
    <div class="product-group">
      <div class="row">
        
            <?php
              include("include/conn.php");
                $get_pro= "select * from song";
                      $run_pro = mysqli_query($connect, $get_pro);
              while($row_pro = mysqli_fetch_array($run_pro)){
                $id =$row_pro['ProductID'];
                $ProductName =$row_pro['ProductName'];
                $Price =$row_pro['Price'];
                $OriGin =$row_pro['OriGin'];
                $Image =$row_pro['Image'];
                
                echo "
                   <div class='col-md-6 col-sm-4 col-12'>
                          <div class='card card-product mb-5' >
                  <a href='details.php?id=$id' style='text-decoration: none; text-align: center;'>
                    <div id='song'>
                    <img src='img/$Image' width='280' height='280' >
                    <h1>$ProductName</h1>
                    <p><b>Price: $Price</b></p>
                    <p><b>OriGin: $OriGin</b></p>
                    
                   
                    
                     </div>
                    </div>
                  </div>
                    ";
              }           
        ?>
			
			</div>
			</div>
			</div>
</div>
<!-- end list product -->

<!-- Load jquery trước khi load bootstrap js -->
<script src="WebsiteLayout/jquery-3.3.1.min.js"></script>
<script src="WebsiteLayout/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>