<?php
include('includes/pdoconfig.php');
if(!empty($_POST["parent_id"])) 
{	
$id=$_POST['parent_id'];
$stmt = $DB_con->prepare("SELECT MAX(id) FROM userregistration WHERE sponsor_id  = :id");
$stmt->execute(array(':id' => $id));
?>
 <?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
 <?php echo htmlentities($row['MAX(id)']); ?>
  <?php
 }
}

?>