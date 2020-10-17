<?php
session_start();
if ($_SESSION['accesslevel']!='seller') {
	header('location: ../login.php');
}

//database operation
include "../dbconnect.php";

if(isset($_POST['btn_savebook'])){

	//simpan ke database
	$userid=$_SESSION['id'];
	$price=$_POST['price'];
	$bookname=$_POST['bookname'];
	$bookcodesubject=$_POST['bookcodesubject'];

	// upload image
	$target_dir = "bookcover/";
	$newfilename = date('U'). basename($_FILES["fileToUpload"]["name"]);
	$target_file = $target_dir .$newfilename;
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["btn_savebook"])) {
	  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	  if($check !== false) {
	    echo "File is an image - " . $check["mime"] . ".";
	    $uploadOk = 1;
	  } else {
	    echo "File is not an image.";
	    $uploadOk = 0;
	  }

	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	  $uploadOk = 0;
	}

	// Check if file already exists
	if (file_exists($target_file)) {
	  echo "Sorry, file already exists.";
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	    echo "<br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	  } else {
	    echo "Sorry, there was an error uploading your file.";
	  }
	}

	//sql insert
	$sql="INSERT INTO orderbook (price ,ownerid ,bookname, bookcodesubject, bookcover)
		VALUES('$price','$userid','$bookname','$bookcodesubject','$newfilename')";


	$rs=mysqli_query($conn,$sql);
	if($rs==true){
		echo "Record saved";
		header('Location: listing.php?success=saved');
		exit();	
	}else{
		echo "Cannot save record";
		echo "<br>Error".mysqli_error($conn);
		exit();
	}
}//end isset

//addbook.php
include "header.template.php";
?>
<div class="card o-hidden border-0 shadow-lg my-1"  >
 <div class="card-header py-3" >
 <h5 class="m-0  font-weight-bold text-primary">Insert Book</h5>
 </div>
  <div class="card-body p-0" >
    <!-- card padding -->
    <div class="p-4">
    <!-- form start -->
    <form class="user" method="post" action="addbook.php" enctype="multipart/form-data">

	    <!-- ISBN textbox -->
	    <div class="form-row">
	      <div class="form-group col-md-7">
	        <label  for="title">Price</label>
	        <input name="price" type="text"  class="form-control form-control" id="title" placeholder="price" required>
	       </div>
	     </div>
	     <!-- Book Name textbox -->
	     <div class="form-row">
	       <div class="form-group col-md-4">
	         <label for="starttime">Book Title</label>
	         <input name="bookname" type="text" class="form-control form-control" id="starttime" placeholder="book name" required>
	       </div>
	       <!-- Book code subject textbox -->
	       <div class="form-group col-md-4">
	          <label for="endtime">Book Code Subject</label>
	          <input name="bookcodesubject" type="text" class="form-control form-control" id="endtimes" placeholder ="book code subject" required>
	       </div>
	       
	     </div>
	     <div class="row">
	     	<!-- book cover page -->
	       <div class="form-group col-md-4">
	          <label for="endtime">Cover Page Book</label>
	          <input name="fileToUpload" type="file" required>
	       </div>

	     </div>
	     <hr>   
	     <div align="right">
	       <div  class="col-md-2">
	         <input class="btn btn-success" type="submit" name="btn_savebook" value="Save Record">
	       </div>
	     </div>
    </form>
    <!-- close card padding -->
    </div>  
    <!-- close card element-->
  </div>
</div>

<?php
include "footer.template.php";
?>