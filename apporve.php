<?php
include "header.template.php";
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
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Seller Name</th>
                      <th>Contact</th>
                    </tr>
                 </tfoot>
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