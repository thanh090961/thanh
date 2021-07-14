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
      <div class="col col-8">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Product Name</label>
                <input class="form-control" name="ProductName" type="text">
            </div>
      <div class="form-group">
                <label for="name">Price</label>
                <input class="form-control" name="Price" type="text">
            </div>
      <div class="form-group">
                <label for="name">OriGin</label>
                <input class="form-control" name="OriGin" type="text">
            </div>
      
            <div class="form-group">
              <label for="priceproduct">Image</label>
              <input type="file" name="Image" id="priceproduct" class="form-control">
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
                    $Product_Name=$_POST['ProductName'];
                    $Price=$_POST['Price'];
                    $OriGin=$_POST['OriGin'];
          $Genre=$_POST['GenreID'];
                    $Product_Image=$_FILES['Image']['name'];
          
                    $target="../img/".basename($Product_Image);
                    $resulttarget="img/".basename($Product_Image);
          
          move_uploaded_file($_FILES['Image']['tmp_name'],$target);
          
                        $result2=$connect->query("INSERT INTO song VALUES(NULL,'$Product_Name','$Price','$OriGin','$Product_Image','$Genre')");
                        
					
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