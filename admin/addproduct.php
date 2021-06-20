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
	  <a class="navbar-brand" href="#">Navbar</a>
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
        <div class="row justify-content-center">
			<div class="col col-8">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Songs name</label>
                <input class="form-control" name="SongName" type="text">
            </div>
			<div class="form-group">
                <label for="name">Price</label>
                <input class="form-control" name="Price" type="text">
            </div>
			<div class="form-group">
                <label for="name">Name Singer</label>
                <input class="form-control" name="NameSinger" type="text">
            </div>
			
            <div class="form-group">
              <label for="priceproduct">Image</label>
              <input type="file" name="Image" id="priceproduct" class="form-control">
            </div>
            <div class="form-group">
              <label for="des">MP3</label>	
              <input name="MP3" type="file" id="des" class="form-control">
				
            </div>
				<div class="form-group">
                <label for="category">Genre</label>
                <select name="GenreID">   

				  <?php
						include("../include/conn.php");
                        $result=$connect->query("select * from genre");
                        while($row=$result->fetch_array()){
                            $catId=$row["GenreID"];
                            $catName=$row["GenreName"];
                            echo "<option value='$catId'>$catName</option>";
                        }
                    ?>
              </select>

            </div>
       <diV><button name="Add" type="submit" class="form-control btn btn-primary">Add</button>
</diV>

            
            </form>
			</div>
        </div>
    </div>
                <?php
                if(isset($_POST['Add'])){
                    $Song_name=$_POST['SongName'];
                    $Price=$_POST['Price'];
                    $Name_Singer=$_POST['NameSinger'];
					$Genre=$_POST['GenreID'];
                    $Song_Image=$_FILES['Image']['name'];
					
                    $target="../img/".basename($Song_Image);
                    $resulttarget="img/".basename($Song_Image);
					$MP3=$_FILES['MP3']['name'];
                    $target2="../song/".basename($MP3);
                    $resulttarget2="song/".basename($MP3);
					move_uploaded_file($_FILES['Image']['tmp_name'],$target);
					move_uploaded_file($_FILES['MP3']['tmp_name'],$target2);
                        $result2=$conn->query("INSERT INTO song VALUES(NULL,'$Song_name','$Price','$Name_Singer','$Song_Image','$MP3','$Genre')");
                        
					
                        if($result2){
                            echo "<script>alert('thêm dữ liệu thành công')</script>";
                       
                        }
                        else{
                            echo "<script>alert('thêm dữ liệu thất bại')</script>";
                          
                        }
                }
           



?>


<script src="WebsiteLayout/jquery-3.3.1.min.js"></script>
<script src="WebsiteLayout/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>