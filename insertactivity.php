<?php
include "checksession.php";
//insertactivity.php
include ("header.template.php");
?>

Insert Book<br>
<form method="post" action="listing.php"
	enctype="multipart/form-data">

	isbn* <input name="isbn" type="text"
	class="form-control">
	bookname* <input name="bookname" type="text"
	class="form-control">
	bookcodesubject* <input name="bookcodesubject" type="text"
	class="form-control">
	
	<hr>
	<h4>Upload profile picture (size 500x500) PNG Format only </h4>
	<input type="file" name="fileToUpload">
	<br>
	<hr>
	<button class="btn btn-success">Save Record</button>

</form>

<?php


//updateadmin.php
//image upload
$target_dir = "imagebook/";
//rename file image
$newfilename=date('d-m-Y')."-".basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir .$newfilename;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {//bytes
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

//database operation
include "dbconnect.php";

if(isset($_POST['isbn']) &&
	isset($_POST['bookname']) && isset($_POST['bookcodesubject'])){

	//simpan ke database
	
	
	//fetch data
	
	$isbn=$_POST['isbn'];
	$bookname=$_POST['bookname'];
	$bookcodesubject=$_POST['bookcodesubject'];

	//sql insert
	$sql="INSERT INTO orderbook
		( isbn, bookname, bookcodesubject, bookcover)
		VALUES('$isbn','$bookname',
		'$bookcodesubject','$newfilename')";
		//data dari borang html
		//echo $sql;
echo "Mysql error:".mysqli_error($conn);

	$rs=mysqli_query($conn,$sql);
	if($rs==true){
		echo "Record saved";
	}else{
		echo "Cannot save record";
	}
}//end isset

?>
<?php
include "footer.template.php";
?>