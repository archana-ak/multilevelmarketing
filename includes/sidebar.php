<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">

		<?PHP if(isset($_SESSION['id']))
				{  
			$id=$_SESSION['id'];
             $t=mysqli_fetch_array(mysqli_query($mysqli,"select * from userregistration where id='$id'"),MYSQLI_BOTH) or die(mysqli_error($mysqli));?> 
				<li class="ts-label" style="font-size: 30px; "><?php  if(!empty($t['firstName'])){echo $t['firstName']; }else{echo" Main";}?></li>
				
					<li><a href="dashboard.php"><i class="fa fa-desktop"></i>Dashboard</a></li>
					<li><a href="my-profile.php"><i class="fa fa-user"></i> My Profile</a></li>
	                <li><a href="bank-details.php"><i class="fa fa-university"></i>Bank Details</a></li>
					<li><a href="registration.php"><i class="fa fa-files-o"></i> Add New</a></li>
					<li><a href="withdrawl.php"><i class="fa fa-google-wallet"></i>Withdrawl</a></li>
					<?php
					include('config.php');

					$id=$_SESSION['id'];
                    $t1=mysqli_fetch_array(mysqli_query($mysqli,"select * from userregistration where id='$id'"),MYSQLI_BOTH) or die(mysqli_error($mysqli)); 
                    if(($t1['status'])==0)
                    {?>
                    	<li><a href="sec_wallet.php"><i class="fa fa-money"></i>Activate account</a></li><?php }
                    	else 
                    	{?>
                    	<li style="display: none;"><a href="sec_wallet.php"><i class="fa fa-money"></i>Activate account</a></li>

               
<?php } }
else { ?>
				
				<li><a href="registration.php"><i class="fa fa-files-o"></i> User Registration</a></li>
				<li><a href="index.php"><i class="fa fa-users"></i> User Login</a></li>
				<!--<li><a href="admin"><i class="fa fa-user"></i> Admin Login</a></li>-->
				<?php }  ?>

			</ul>
		</nav>