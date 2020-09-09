<?php
include "checksession.php";
//editactivity
include ("header.template.php");
include "dbconnect.php";

$id+$_GET['id'];
$sql="SELECT * FROM activities
WHERE id='id'";
$rs=mysqli_query($conn, $sql);
$rec=mysqli_fetch_array($rs);
?>
/
}
include ("header.template.php");
insert record <br>
<form method="post" action="updateactivity.php">
	id <input name="id" type="text"
    class="form-control" readonly
    value="<?php echo $rec['id']?>">
    Activity* <input name="activityname" type="text"
    class="form-control"
    value="<?php echo $rec['activityname']?>">
    Time* <input type="time"  name="time"
    class="form-control"
    value="<?php echo $rec['time']?>">
    Date* <input type="date"  name="date"
    class="form-control"
    value="<?php echo $rec['date']?>">
    Speaker <input type="speaker"  name="speaker"
    class="form-control">
<button type="submit"> Save Record</button>
</form>

<?php

include ("footer.template.php");
//editactivity.php save-as
?>

