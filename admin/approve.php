<?php
include "header.template.php";
require '../dbconnect.php';

$sql="SELECT o.*, u.* FROM orderbook AS o 		
	    JOIN user AS u
	    ON o.ownerid=u.id 
      WHERE o.status ='not apporove' ";
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
              <h6 class="m-0 font-weight-bold text-primary">Request book</h6>
            </div>
            <div class="card-body">
              <?php
              if (isset($_GET['success'])) {
                if ($_GET['success']=="approve") {
                   echo '<div class="alert alert-success" role="alert">Succesfully approve the book<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                }
              }
              ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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

 </body>
<?php 
include "footer.template.php";
?>