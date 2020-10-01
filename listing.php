
<?php
session_start();
if ($_SESSION['accesslevel']!='seller') {
	header('location: login.php');

}
include "header.template.php";
require 'dbconnect.php';
?>
<h2>Welcome back <?php echo $_SESSION['username'] ?></h2>
<?php
$sql="SELECT o.*, u.* FROM orderbook as o 		
	join user as u
	on o.ownerid=u.idbook where o.idbook ='$bookid'";
	$rs=mysqli_query($conn,$sql);
	if (mysqli_error($conn)) {
		echo 'error'.mysqli_error($conn);
		exit();
	}
?>

<?php
$sql="SELECT idbook,isbn,bookname,bookcodesubject
	FROM orderbook
	WHERE bookname
	 LIKE '%idbook%' ";
include "dbconnect.php";
$rs=mysqli_query($conn, $sql);
if(mysqli_num_rows($rs)==0){
	echo "No record found";
}else{//paparan rekod
	include "dbconnect.php";

	$sql="SELECT isbn, bookname, bookcodesubject
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

 <body>
 	  <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>isbn</th>
                      <th>Code Book</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      
                      <th>Title</th>
                      <th>isbn</th>
                      <th>Code Book</th>
                      
                      <th>Action</th>
                    </tr>
                 </tfoot>
                  <tbody>

                 <?php 
					
					while ($rec=mysqli_fetch_array($rs)) {

					?>
                    <tr>
					 <td><?=$rec['isbn']?></td>
					 <td><?=$rec['bookname']?></td>
					 <td><?=$rec['bookcodesubject']?></td>
					
					  <td>
					  	<a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" 
                      data-target="#message<?=$rec['idbook']?>"> <i class="fas fa-trash"></i></a>
              
            </td>
          </tr>
          <!-- add fakulti candidate Modal-->
        <div class="modal fade bd-example-modal-lg" id="message<?=$rec['idbook']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add this voter as candidate? </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-2"><b>Seller Name</b></div>
                          <div class="col-md-6"><b>Title</b></div>
                          
                        </div>
                        <div class="row">
                          <div class="col-md-2"><?=$rec['username']?></div>
                          <div class="col-md-6"><?=$rec['bookname']?></div>
                                                  </div>
                      
                    </div>
                    </div>
                <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
                <a class="btn btn-success" href="deletebook4user.php?bookid=<?=$rec['idbook']?>">Yes</a>
                </div>
            </div>
            </div>
        </div>
                  <?php
              		}
              		?>
                  echo "<a href='editactivity.php?id=$id'>
				<i class='fa fa-edit'></i></a> "
                  </tbody>

                </table>
              </div>
            </div>
          </div>

        </div>

 </body>

<a href="insertactivity.php">Insert record</a><br>
<a href="updateactivity.php">Update/Delete record</a><br>
<a href="logout.php">Log out</a><br>

<?php
include ("footer.template.php");
?>