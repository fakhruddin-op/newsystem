<?php
session_start();
if ($_SESSION['accesslevel']!='seller') {
	header('location: ../login.php');
}

//database operation
include "../dbconnect.php";

// update book in DB
if(isset($_POST['btn_updatebook'])){

	$bookid=$_POST['idbook'];
	$price=$_POST['price'];
	$bookname=$_POST['bookname'];
	$bookcodesubject=$_POST['bookcodesubject'];

//sql update
$sql="UPDATE orderbook 
	  SET price='$price', bookname='$bookname', bookcodesubject='$bookcodesubject' 
	  WHERE idbook='$bookid'";
	  if (mysqli_error($conn)) {
	  	echo "Failed to update book information";
	  	echo "Error: ".mysqli_error($conn);
	  	exit();
	  }

$rs=mysqli_query($conn,$sql);
	if($rs==true){
		echo "Record saved";
		header('Location: listing.php?success=saved');
		exit();	
	}else{
		echo "Cannot save record";
		exit();
	}
}
// check if idbook is in url if not return to listing page
if (isset($_GET['idbook'])) {
	$idbook=$_GET['idbook'];
	$qr=mysqli_query($conn,"SELECT * FROM orderbook WHERE idbook = $idbook ");
	if (mysqli_error($conn)) {
		echo "Failed to get book information from DB";
		echo "Error: ".mysqli_error($conn);
	}
	$rec=mysqli_fetch_array($qr);
	$price= $rec['price'];
	$bookname= $rec['bookname'];
	$bookcodesubject=$rec['bookcodesubject'];

}

include "header.template.php";
?>
<div class="card o-hidden border-0 shadow-lg my-1"  >
 <div class="card-header py-3" >
 <h5 class="m-0  font-weight-bold text-primary">Update Book</h5>
 </div>
  <div class="card-body p-0" >
    <!-- card padding -->
    <div class="p-4">
    <!-- form start -->
    <form class="user" method="post" action="updatebook.php">

	    <!-- ISBN textbox -->
	    <div class="form-row">
	      <div class="form-group col-md-7">
	        <label  for="title">Price</label>
	        <input name="price" type="text"  class="form-control form-control" id="title" placeholder="price" value="<?=$price?>" required>
	        <!-- id book hidden input -->
	        <input type="hidden" name="idbook" value="<?=$idbook?>">
	       </div>
	     </div>
	     <!-- Book Name textbox -->
	     <div class="form-row">
	       <div class="form-group col-md-4">
	         <label for="starttime">Book Name</label>
	         <input name="bookname" type="text" class="form-control form-control" id="starttime" placeholder="book name" value="<?=$bookname?>" required>
	       </div>
	       <!-- Book code subject textbox -->
	       <div class="form-group col-md-4">
	          <label for="endtime">Book Code Subject</label>
	          <input name="bookcodesubject" type="text" class="form-control form-control" id="endtimes" placeholder ="book code subject" value="<?=$bookcodesubject?>" required>
	       </div>
	     </div>
	     
	     <hr>   
	     <div align="right">
	       <div  class="col-md-2">
	         <input class="btn btn-success" type="submit" name="btn_updatebook" value="Save Update">
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