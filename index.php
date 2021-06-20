
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
      <img class="d-block w-100" src="https://photo-zmp3.zadn.vn/cover/8/2/d/8/82d884e583a2226d37df196495da6b20.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://photo-zmp3.zadn.vn/covers/3/1/310b98ade43043a069c3d3e9ee0c5766_1515485837.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://photo-zmp3.zadn.vn/covers/2/a/2ac9d9aa479519e1724db5b860373578_1499827968.jpg" alt="Third slide">
    </div>
	   <div class="carousel-item">
      <img class="d-block w-100" src="https://photo-zmp3.zadn.vn/covers/d/1/d1c2738deec7efd1942a3027a1c436b0_1499828277.jpg" alt="Third slide">
    </div>
	  <div class="carousel-item">
      <img class="d-block w-100" src="https://photo-zmp3.zadn.vn/cover/b/0/6/d/b06db10784a4c5c1ff9d9beb14f312c3.jpg" alt="Third slide">
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
		<h2 class="list-product-title">New Songs</h2>
		<div class="list-product-subtitle">
			
		</div>
		<div class="product-group">
			<div class="row">
				
					  <?php
						include("include/conn.php");
				        $get_pro= "select * from song";
		                  $run_pro = mysqli_query($connect, $get_pro);
							while($row_pro = mysqli_fetch_array($run_pro)){
								$id =$row_pro['SongID'];
								$SongName =$row_pro['SongName'];
								$Price =$row_pro['Price'];
								$NameSinger =$row_pro['NameSinger'];
								$Image =$row_pro['Image'];
								$MP3 =$row_pro['MP3'];
								echo "
								   <div class='col-md-3 col-sm-6 col-12'>
					                <div class='card card-product mb-3' >
									<a href='details.php?id=$id' style='text-decoration: none; text-align: center;'>
									  <div id='song'>
									  <img src='img/$Image' width='280' height='280' >
									  <h1>$SongName</h1>
									  <p><b>Price: $Price</b></p>
									  <p><b>Singer: $NameSinger</b></p>
									  <audio controlsList='nodownload'  ontimeupdate='myAudio(this)'src='./song/$MP3'></audio>
									 
									  
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