
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
			echo "<td>idbook ".$row['idbook']."</td>";
			echo "<td>isbn ".$row['isbn']."</td>";
			echo "<td>bookname ".$row['bookname']."</td>";
			echo "<td>bookcodesubject ".$row['bookcodesubject']."</td>";
			echo "</tr>";
		}//end while
	//end if mum_rows

include "footer.template.php";
?>