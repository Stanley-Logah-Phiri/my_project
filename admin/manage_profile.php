

<?php //include_once("session/session.php"); ?>
<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<?php include('inc/sidebar.php'); ?>

<?php
session_start();
	include("inc/dbcon.php");
	$user_id = $_SESSION['user_id'];


	$currentStep = isset($_SESSION['currentStep']) ? $_SESSION['currentStep'] : 1; 

	$query = "SELECT * FROM users WHERE user_id = '$user_id'";
	$result = mysqli_query($conn, $query);
	
	if ($result) {
		$userDetails = mysqli_fetch_assoc($result);
		$profile = isset($userDetails['profile_picture']) ? $userDetails['profile_picture'] : '';
		$name = isset($userDetails['full_name']) ? $userDetails['full_name'] : '';
		$email = isset($userDetails['email']) ? $userDetails['email'] : '';
	} else {
		
		$profile = '';
	}
?>
<?php
	$quer = "SELECT * FROM user_portfolio WHERE user_id = '$user_id'";
	$resul = mysqli_query($conn, $quer);
	if ($resul) {
		$userDetails = mysqli_fetch_assoc($resul);
		$edu = isset($userDetails['degree']) ? $userDetails['degree'] : '';
		$profe = isset($userDetails['job_title']) ? $userDetails['job_title'] : '';
		$inst = isset($userDetails['institution']) ? $userDetails['institution'] : '';
		$address = isset($userDetails['address']) ? $userDetails['address'] : '';
		$skills = isset($userDetails['skills']) ? $userDetails['skills'] : '';
		$cv = isset($userDetails['cv_document_path']) ? $userDetails['cv_document_path'] : '';
	}

?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Profile
				<small><?php //print_r($_POST);?></small>
			</h1>
			
			<hr style="border-color: green;"/>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					
				</div>
			</div><br/>
			<!--<hr style="border-color: green;"/> -->
			<!-- Main row -->
			<div class="row">
				<div class="col-md-3">

					<!-- Profile Image -->
					<div class="box box-success">
						<div class="box-body box-profile">
							<img class="profile-user-img img-responsive img-circle" src="uploads/<?php echo $profile; ?>" alt="User profile picture" style="width: 150px; height: 150px;">

							<h3 class="profile-username text-center"><?php echo $name?></h3>

							<p class="text-muted text-center"><?php echo $email?></p>

							<p class="text-muted text-center" class="label label-info">Adminstrator</p>


							
						</div>
					
					</div>
					<!-- /.box -->

					<!-- About Me Box -->
					<div class="box box-success">
						<div class="box-header ">
							<h3 class="box-title">About Me</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<strong><i class="fa fa-book margin-r-5"></i> Education</strong>

							<p class="text-muted">
							B.S. in Information Technology
							</p>

							<hr>

							<strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

							<p class="text-muted">Blantyre, Malawi South</p>

							<hr>

							<strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

							<p>
							
							<span class="label label-info">Web development</span>
							<span class="label label-info">php</span>
							
							</p>

							<hr>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<div class="col-xs-9">
					<div class="nav-tabs-custom success">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#fa-icons" data-toggle="tab" aria-expanded="true">Change Password</a></li>
							<li class=""><a href="#glyphicons" data-toggle="tab" aria-expanded="false">Update profile picture</a></li>
							<!-- <li class=""><a href="#glyphicons" data-toggle="tab" aria-expanded="false">Edit Portifolio</a></li> -->
						</ul>
						<div class="tab-content">
							<!-- Font Awesome Icons -->
							<div class="tab-pane active" id="fa-icons">
								<div class="row">
									<div class="col-md-12">
										<form method="POST" action="">
											<div class="form-group">
												<label for="old">Current Password:</label>
												<input type="password" name="old" id="old" class="form-control" >
											</div>
											<div class="form-group">
												<label for="new">New Password:</label>
												<input type="password" name="new" id="new" class="form-control" >
											</div>
											<div class="form-group">
												<label for="retype">Confirm Password:</label>
												<input type="password" name="retype" id="retype" class="form-control" >
											</div>
											<button type="submit" name="update" class="btn btn-success pull-right"><span class="glyphicon glyphicon-check"></span> Update</button>
										</form>
									</div>

								
								</div>

								

							</div>
							<!-- /#fa-icons -->

							<!-- glyphicons-->
							<div class="tab-pane" id="glyphicons">
								<div class="row">
									<div class="col-md-12">
										
										<?php include('profile_pic.php') ?>
									</div>
								</div>

								
							</div>
							<!-- /#ion-icons -->

						</div>
						<!-- /.tab-content -->
					</div>
					<!-- /.nav-tabs-custom -->
				</div>
			</div>
			<!-- /.row (main row) -->

		</section>
		<!-- /.content -->

	</div>

<?php //include('inc/user_modal.php');?>

<?php include('inc/footer.php'); ?>
<?php include('inc/scripts.php'); ?>

<?php
	session_start();

	if(isset($_POST['update'])){
		//get POST data
		$old = $_POST['old'];
		$new = $_POST['new'];
		$retype = $_POST['retype'];

        include('inc/dbcon.php');

		//get user details
		$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		//check if old password is correct
		if(password_verify($old, $row['password'])){
			//check if new password match retype
			if($new == $retype){
				//hash our password
				$password = password_hash($new, PASSWORD_DEFAULT);

				//update the new password
				$sql = "UPDATE users SET password = '$password' WHERE user_id = '$user_id'";
				if($conn->query($sql)){
					echo '<script>alert("Password updated successfully");</script>';

					//unset our session since no error occured
					
				}
				else{
					$_SESSION['error'] = $conn->error;
				}
			}
			else{
				echo '<script>alert("New and retype password did not match");</script>';

			}
		}
		else{
			echo '<script>alert("Incorrect Old Password");</script>';

		}
	}
?>





