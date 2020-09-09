<?php
//updateactivty.php
if(isset($_POST['idadmin']))&&
isset($_POST['bookname'])) && isset ($_POST['bookname'])){

//simpan ke database
include "dbconnect.php";

//fetch data
$id=$_POST['id'];
$idadmin=$_POST['idadmin'];
$bookname=$_POST['bookname'];
$bookcodesubject=$_POST['bookcodesubject'];


//sql insert
$sql="UPDATE newsystem
SET
idadmin='$idadmin',
bookname='$bookname', 
bookcodesubject='$bookcodesubject'
WHERE id='id'";
//data dari borang html
//echo $sql;

$rs=mysqli_query($conn, $sql);
if($rs==true){
	header "Location: editactivity.php?msg=Record update";
	echo"Record update";
}else{
	//header "Location: editactivity.php?msg=Record update";
	echo "Cannot save record";
}
}