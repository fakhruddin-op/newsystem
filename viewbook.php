<?php
if (isset($_GET['updatestatus'])) {
	require 'dbconnect.php';
	$bookid=$_GET['updatestatus'];
	$sql="update orderbook set status='approve' WHERE idbook= '$bookid'";
	$qr=mysqli_query($conn,$sql);
	if (mysqli_error($conn)) {
		echo "error: ".mysqli_error($conn);
		exit();
	}
	else
		header('Location:approve.php?success=approve');
}

$bookid=$_GET['bookid'];
require "dbconnect.php";
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

<div class="card">
  <div class="card-header">
    Book Information
  </div>
  <div class="card-body">
    <h5 class="card-title"><?=$rec['bookname']?></h5>
    <p class="card-text"><?=$rec['username']?></p>
    <p class="card-text"><?=$rec['isbn']?></p>
    <p class="card-text"><?=$rec['bookcodesubject']?></p>
    <p class="card-text"><?=$rec['contact']?></p>
    
    <a href="viewbook.php?updatestatus=<?=$rec['idbook']?>"><button type="button" class="btn btn-primary">Approve</button></a>
    
  </div>
</div>
<?php
include "footer.template.php";


?>