<?php
include('includes/pdoconfig.php');
include('includes/config.php');

if(!empty($_POST["parent_id"])) 
{	
$id=$_POST['parent_id'];
$sql=mysqli_query($mysqli,"select * from userregistration where firstName='$id'")or die(); 
 while ($ro=mysqli_fetch_array($sql)) {
$s=$ro['id'];//print_r($s);die();
 	# code...
 

$stmt =mysqli_query($mysqli,"SELECT MAX(id) FROM userregistration WHERE sponsor_id  = '$s'");
while ($row=mysqli_fetch_array($stmt)) {
  ?>
 <?php echo htmlentities($row['MAX(id)']); ?>
  <?php
 }
/*$stmt = $DB_con->prepare("SELECT MAX(id) FROM userregistration WHERE sponsor_id  = :s");
$stmt->execute(array(':id' => $s));
?>
 <?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
 <?php echo htmlentities($row['MAX(id)']); ?>
  <?php
 }*/
}
}
?>