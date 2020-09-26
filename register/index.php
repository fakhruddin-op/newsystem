<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Easybook Register</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register Now !</h1>

                  </div>
                  <?php 
                if (isset($_GET['error'])) {
                  if ($_GET['error']=="notfound") {
                    alertwithclose("Matric number did not exist!");
                  } elseif ($_GET['error']=="emptyfield") {
                    alertwithclose("Please fill all the field");
                  }
                }
               ?>
                  <form class="user" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                    <div class="form-group">
                    <label for="email">Email</label>
                      <input name="txt_email" type="email" class="form-control form-control-user" id="email" aria-describedby="email" placeholder="Enter Your Email..." required>
                    </div>
          
                    <input class="btn btn-primary btn-user btn-block" type="submit" name="btn_submit_register" value="Submit">
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php
if (isset($_POST['btn_submit_register'])) {
  require '../dbconnect.php';
  $email=$_POST['txt_email'];
  // check if matric_no is empty
  if (empty($email)) {
    header('Location: index.php?error=emptyfield');
    exit();
  }
  }
  // get user information from DB
  $querry ="SELECT * FROM user WHERE email ='$email' ";
  $qr = mysqli_query($db,$querry);
  if($qr==false){
      echo "Failed to find student<br>";
      echo "SQL error :".mysqli_error($db);
  }
  // check the matric number in DB
  if (mysqli_num_rows($qr)==0) {
      header("Location: index.php?error=notfound");
      exit();
  }
  else if (mysqli_num_rows($qr)==1){
      $record=mysqli_fetch_array($qr);
      $_SESSION['email']=$record['email'];
      $_SESSION['id']=$record['id'];

      // delete request record 
      $deleterecord= mysqli_query($db,"DELETE FROM register WHERE matric_no = '$email' ");
      if($deleterecord==false){
        echo "Failed to delete register request record<br>";
        echo "SQL error :".mysqli_error($db);
        exit();
      }
      header('Location: sendemail.php');
  }
}

?>