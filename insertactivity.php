<?php
session_start();
if ($_SESSION['accesslevel']!='seller') {
	header('location: login.php');
}

//database operation
include "dbconnect.php";

if(isset($_POST['isbn']) &&
	isset($_POST['bookname']) && isset($_POST['bookcodesubject'])){

	//simpan ke database
	$userid=$_SESSION['id'];
	$isbn=$_POST['isbn'];
	$bookname=$_POST['bookname'];
	$bookcodesubject=$_POST['bookcodesubject'];

	//sql insert
	$sql="INSERT INTO orderbook ( isbn,ownerid ,bookname, bookcodesubject)
		VALUES('$isbn','$userid','$bookname','$bookcodesubject')";
		//data dari borang html
		//echo $sql;
	if (mysqli_error($conn)) {
		echo "error". mysqli_error();
	}

	$rs=mysqli_query($conn,$sql);
	if($rs==true){
		echo "Record saved";
		header('Location: listing.php?success=saved');
		exit();
	}else{
		echo "Cannot save record";
	}
}//end isset

//insertactivity.php
include "header.template.php";
?>

<h1>Insert Book<br></h1>
<form method="post" action="insertactivity.php"
	enctype="multipart/form-data">


	isbn* <input name="isbn" type="text"
	class="form-control">
	bookname* <input name="bookname" type="text"
	class="form-control">
	bookcodesubject* <input name="bookcodesubject" type="text"
	class="form-control">
	<br>
	<hr>
	<button class="btn btn-success">Save Record</button>

</form>

<?php



?>
<?php
include "footer.template.php";
?>