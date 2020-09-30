
<?php
include "checksession.php";
include "header.template.php";
?>

//filename : listing.php
	
<table class="table">
	<tr>
		<td>idbook</td>
		<td>ISBN</td>
		<td>Book Name</td>
		<td>Book Code Subject</td>
		</tr>
	</table>

<?php
$sql="SELECT idbook,isbn,bookname,bookcodesubject
	FROM orderbook
	WHERE bookname
	 LIKE '%$key%' ";
include "dbconnect.php";
$rs=mysqli_query($conn, $sql);
if(mysqli_num_rows($rs)==0){
	echo "No record found";
}else{//paparan rekod
	include "dbconnect.php";

	$sql="SELECT idbook,isbn, bookname, bookcodesubject
		 FROM orderbook";

	//execute sql command
	$result = mysqli_query($conn, $sql);

	//how many record fetched
		while($rec=mysqli_fetch_array($rs)){
			echo "<tr><td>";
			$id=$rec['idbook'];
			echo "<tr>";
			
			echo $rec['idbook'];
			echo "<td>idbook ".$rec['idbook']."</td>";
			echo "<td>isbn ".$rec['isbn']."</td>";
			echo "<td>bookname ".$rec['bookname']."</td>";
			echo "<td>bookcodesubject ".$rec['bookcodesubject']."</td>";
			echo "</tr>";
		}//end while
	//end if mum_rows
	}
?>
<?php
include "footer.template.php";
?>