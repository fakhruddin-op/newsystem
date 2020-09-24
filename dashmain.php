<?php
session_start();
//dash-admin.php
include ("header.template.php");
?>


<h2>Welcome admin <?php echo $_SESSION['username'] ?></h2>
<a href="insertactivity.php">Insert record</a><br>
<a href="updateactivity.php">Update/Delete record</a><br>
<a href="logout.php">Log out</a><br>

<?php
include ("footer.template.php");
?>