<?php
session_start();
if ($_SESSION['accesslevel']!='seller') {
	header('location: login.php');}
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
	<br>
	<hr>
	<button class="btn btn-success">Save Record</button>

</form>

<?php

//database operation
include "dbconnect.php";

if(isset($_POST['isbn']) &&
	isset($_POST['bookname']) && isset($_POST['bookcodesubject'])){

	//simpan ke database
	
	$isbn=$_POST['isbn'];
	$bookname=$_POST['bookname'];
	$bookcodesubject=$_POST['bookcodesubject'];

	//sql insert
	$sql="INSERT INTO orderbook ( isbn, bookname, bookcodesubject)
		VALUES('$isbn','$bookname','$bookcodesubject')";
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