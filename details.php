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
  <div class="container">
 <div class="row justify-content-between">
    <?php 
   include("include/conn.php");
   if($connect){ echo"";}
    $id=$_GET["id"];
    $sql="SELECT * FROM song Where song.ProductID={$id} ";
    $rs= mysqli_query($connect,$sql);
    while ($row=mysqli_fetch_assoc($rs)) {
     ?>
        <div class="col-12" style=" text-align: left;">
        <h2 class="name-pro">Name Of product: <?php echo $row['ProductName'] ?></h2>
        <p style="color: red;padding-left: 20px;"> Price: <?php echo $row['Price']." "; ?></p>
          
          <script type="text/javascript">
            function myAudio(event){
              if(event.currentTime >60){
                event.currentTime=0;
                event.pause();
                alert ("Sign in to continue!")
              }
            }
        
          </script>
        <br>
        <br>
        <div style="border-bottom: 1px solid black"></div>
        <br>
        <p>
          Basic product info:
        </p>
        
        
        </div>
        <div class="col-4">
          <img src="img/<?php echo $row['Image']?>" style="width: 600px;height: 500px" >
      
      

        </div>
   
   
        <?php
      }
      ?>
     </div>
     </div>
    
     <form method="post" action="manage.php"> 
            <input type="number" name="sl" value="1" min="1" max="1" style="display: none;"> 
          <input type="hidden" name="id" value="<?=$id?>">
          <button type="submit" style="float: inherit" name="button-buy" class="button-buy"><i class="fas fa-cart-plus"></i>  Add to cart</button>
          </form>
	 </div>
		
	 
       
	 </div>
	      
     </div>


<script src="WebsiteLayout/jquery-3.3.1.min.js"></script>
<script src="WebsiteLayout/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>