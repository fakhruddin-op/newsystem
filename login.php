
<?php
include ("header.template.php");


?>
Login
<form method="post" action="verify.php">
Email <input type="text"
name="email" class="form-control"><br>
Password <input type="password"
name="password" class="form-control">
<button type="submit">Login</button>
</form>

<?php
if(isset($_GET['msg'])){

   echo "<div class ='alert 
	alert-warning'>";
	echo "Login failed<br>";
	echo "</div>";
}
    include ("footer.template.php");

    ?>