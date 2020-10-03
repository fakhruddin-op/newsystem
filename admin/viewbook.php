<?php
$bookid=$_GET['bookid'];
require "../dbconnect.php";
$sql="SELECT o.*, u.* FROM orderbook as o 		
	join user as u
	on o.ownerid=u.id where o.idbook ='$bookid'";
$rs=mysqli_query($conn,$sql);
	if (mysqli_error($conn)) {
		echo 'error'.mysqli_error($conn);
		exit();
	}
	$rec=mysqli_fetch_array($rs);

include "header.template.php";
?>
<!-- card size -->
<div class="col-xl-6 col-lg-6 col-md-9">

	<div class="card">
	<div class="card-header">
		Book Information
	</div>
	<div class="card-body">
		<h5 class="card-title"><?=$rec['bookname']?></h5>
		<p class="card-text"><?=$rec['username']?></p>
		<p class="card-text"><?=$rec['isbn']?></p>
		<p class="card-text"><?=$rec['bookcodesubject']?></p>
		
		<a href="admindashboard.php"><button type="button" class="btn btn-danger">Back</button></a>
		
	</div>
	</div>
</div>
<?php
include "footer.template.php";


?>