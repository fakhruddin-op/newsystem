<?php
include "checksession.php";
//insertactivity.php
include ("header.template.php");
?>

Insert Book<br>
<hr>
<form method="post" action=""
	enctype="multipart/form-data">
    
    Seller Name <input name="username" type="text"
	class="form-control">
    Title <input name="bookname" type="text"
	class="form-control">
	ISBN <input name="isbn" type="text"
	class="form-control">
	Code book <input name="bookcodesubject" type="text"
	class="form-control">
	Contact <input name="contact" type="text"
	class="form-control">
	
	<hr>
	
	<br>
	
	<button class="btn btn-success">Save Record</button>

</form>

<?php
include "footer.template.php";
?>