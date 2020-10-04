<?php
if (isset($_GET['katakunci'])){
  $key=$_GET['katakunci'];
}else{
  $key="";
}
$sql="SELECT idbook,isbn,bookname,bookcodesubject
  FROM orderbook
  WHERE bookname
   LIKE '%$key%' ";
include "dbconnect.php";
$rs=mysqli_query($conn, $sql);
if(mysqli_num_rows($rs)==0){
  echo "No record found";
}else{//paparan rekod
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Easy Book</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>

<body  id="page-top">

<div class="jumbotron">
  <div class="container text-center">
    <h1 class="h1 mb-1 text-gray-800">Easy Book</h1>      
    <p>Find book here</p>
  </div>
</div>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark "style="background-color: #023047;">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto col-5">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    </ul> 
    <form class="form-inline my-2 my col-6">
      <input class="form-control form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      
    </form>
     <ul class="navbar-nav mr-auto col-1">
      <li class="nav-item active">
        <a class="nav-link" href="login.php">Login </a>
      </li>
    </ul> 
  </div>
</nav>
<div class="container">    
  <div class="row">
    <?php 
    while ($rec=mysqli_fetch_array($qr)) {
    ?>  

    <div class="col-sm-4 mb-3">
      <div class="card" >
        <img class="card-img-top" src="https://placehold.it/150x80?text=IMAGE" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?=$rec['bookname']?></h5>
          <p class="card-text"><?=$rec['username']?></p>
           <p class="card-text"><?=$rec['price']?></p>
            <p class="card-text"><?=$rec['bookcodesubject']?></p>
            <p class="card-text"><?=$rec['contact']?></p>
          <a href="#" class="btn btn-primary">Book Now</a>
        </div>
      </div>
    </div>
    <?php
    }
     ?>
    
  </div>
</div><br>


  <div class="container-fluid text-center  p-2">
    <h5>Sell Your book here</h5>
    <a class="btn btn-success btn-sm" href="register/">click here</a>
  </div>
</div>

</body>
</html>
<?php
include "footer.template.php";
?>