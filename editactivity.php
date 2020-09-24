<?php
include "checksession.php";
//editactivity.php
include "header.template.php";
include "dbconnect.php";
$idbook=$_GET['idbook'];
$sql="SELECT * FROM newsystem
		WHERE idbook='$idbook' ";
$rs=mysqli_query($conn, $sql);
$rec=mysqli_fetch_array($rs);
?>

Edit Record<br>
<form method="post" action="updateactivity.php">
	isbn* <input name="isbn" type="text"
	class="form-control">
	bookname* <input name="bookname" type="text"
	class="form-control">
	bookcodesubject* <input name="bookcodesubject" type="text"
	class="form-control">
	<button type="submit"
	class="btn btn-success">Save Record</button>
</form>
<?php
include ("footer.template.php");
//editactivity.php save-as
?>