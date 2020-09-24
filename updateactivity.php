<?php
include "header.template.php";
//updateactivity.php
if(isset($_POST['isbn']) &&
	isset($_POST['bookname']) && isset($_POST['bookcodesubject'])){

	//simpan ke database
	include "dbconnect.php";
	
	//fetch data
	$id=$_POST['id'];
	$isbn=$_POST['isbn'];
	$bookname=$_POST['bookname'];
	$bookcodesubject=$_POST['bookcodesubject'];
	

	//sql insert
	$sql="UPDATE newsystem
		SET
		isbn='$isbn', 
		bookname='$bookname', 
		bookcodesubject='$bookcodesubject'
		WHERE id='$id'";
		//data dari borang html
		//echo $sql;

	$rs=mysqli_query($conn,$sql);
	if (mysqli_error($rs)==true){
		echo mysqli_error($rs);
	}//sql error
	if($rs==true){
		header ("Location: searchactivity.php?msg=Record update");
		echo "Record update";
	}else{
		//header ("Location: searchactivity.php?msg=Cannot save Record ");
		echo "Cannot save record";
	}
}//end isset

?>
<?php
include "footer.template.php";
?>
