<?php
session_start();
if ($_SESSION['accesslevel']!='admin') {
	header('location: login.php');
}
require 'dbconnect.php';

$sql="SELECT o.*, u.* FROM orderbook as o 		
	join user as u
	on o.ownerid=u.id ";
	$rs=mysqli_query($conn,$sql);
	if (mysqli_error($conn)) {
		echo 'error'.mysqli_error($conn);
		exit();
	}

//dash-admin.php
include ("header.template.php");
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
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Seller Name</th>
                      <th>Title</th>
                      <th>isbn</th>
                      <th>Code Book</th>
                      <th>Contact</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Seller Name</th>
                      <th>Title</th>
                      <th>isbn</th>
                      <th>Code Book</th>
                      <th>Contact</th>
                    </tr>
                 </tfoot>
                 <?php 
					
					while ($rec=mysqli_fetch_array($rs)) {

					?>
                  <tbody>
                    <tr>
					 <td><?=$rec['username']?></td>
					 <td><?=$rec['bookname']?></td>
					 <td><?=$rec['bookcodesubject']?></td>
					 <td><?=$rec['isbn']?></td>
					 <td><?=$rec['contact']?></td>
					  <td>
					  	<a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" 
                      data-target="#message<?=$rec['id']?>"> <i class="fas fa-trash"></i></a>
              <a href="#" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#message<?=$rec['id']?>"> <i class="fas fa-plus"></i></a>
            </td>
          </tr>
          <!-- add fakulti candidate Modal-->
        <div class="modal fade bd-example-modal-lg" id="message<?=$rec['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <div class="col-md-2"><b>Matric no</b></div>
                          <div class="col-md-6"><b>Voter Name</b></div>
                          <div class="col-md-2"><b>Faculty</b></div>
                          <div class="col-md-2"><b>Section</b></div>
                        </div>
                        <div class="row">
                          <div class="col-md-2"><?=$rekod['matric_no']?></div>
                          <div class="col-md-6"><?=$rekod['voter_name']?></div>
                          <div class="col-md-2"><?=$rekod['name']?></div>
                          <div class="col-md-2">Faculty</div>
                        </div>
                      
                    </div>
                    </div>
                <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
                <a class="btn btn-success" href="fakulti_addcandidate.php?voterid=<?=$voterid?>">Yes</a>
                </div>
            </div>
            </div>
        </div>
                  </tbody>
                  <?php
              		}
              		?>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        <script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
 </body>
<h2>Welcome admin <?php echo $_SESSION['username'] ?></h2>
<a href="insertactivity.php">Insert record</a><br>
<a href="updateactivity.php">Update/Delete record</a><br>
<a href="logout.php">Log out</a><br>

<?php
include ("footer.template.php");
?>