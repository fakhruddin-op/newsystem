<?php
include "header.template.php";
require 'dbconnect.php';

$sql="SELECT o.*, u.* FROM orderbook as o 		
	join user as u
	on o.ownerid=u.id where o.status ='not apporove' ";
	$rs=mysqli_query($conn,$sql);
	if (mysqli_error($conn)) {
		echo 'error'.mysqli_error($conn);
		exit();
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
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Seller Name</th>
                      <th>Contact</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Seller Name</th>
                      <th>Contact</th>
                       <th>Action</th>
                    </tr>
                 </tfoot>
                  <?php 
					
					while ($rec=mysqli_fetch_array($rs)) {

					?>
                  <tbody>
                    <tr>
					 <td><?=$rec['username']?></td>
					 <td><?=$rec['contact']?></td>
					 <td><a class="btn btn-primary btn-circle btn-sm" href="viewbook.php?bookid=<?=$rec['idbook']?> "><i class="fas fa-eye"></i></a></td>
          </tr>
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
<?php 
include "footer.template.php";
?>