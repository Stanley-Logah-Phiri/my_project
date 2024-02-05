<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<?php include('inc/sidebar.php'); ?>


	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				MANAGE USERS
				<small><?php //print_r($_POST);?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="manage_users.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Manage Users</li>
			</ol>
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

		
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">
										
							<h2 class="box-title pull-left"><b>LIST OF USERS</b></h2>
							
							<div class="box-tools pull-right">
								<!-- <a data-target="#import_users" data-toggle="modal" class="btn btn-flat btn-success pull-right"><i class="fa fa-upload"></i><span>&nbsp;<b>UPLOAD</b></span></a><br/> -->
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">

							<div class="row">
							<div class="col-md-12">
										<?php
											if(isset($_SESSION['user_error'])){
											echo "
												<div class='alert callout alert-danger alert-dismissible'>
												<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<h4><i class='icon fa fa-warning'></i> Error!</h4>
												".$_SESSION['user_error']."
												</div>
											";
											unset($_SESSION['user_error']);
											}
											if(isset($_SESSION['user_success'])){
											echo "
												<div class='alert alert-success alert-dismissible'>
												<button type='button' class='close text-white' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<h4><i class='icon fa fa-check'></i> Success!</h4>
												".$_SESSION['user_success']."
												</div>
											";
											unset($_SESSION['user_success']);
											}
										?>
									</div>
								
								
								<div class="col-lg-12 col-md-12"><br>
									<table  id="example1"  class="table table-hover table-striped table-bordered table-responsive">
										<thead>
											<tr>
												<!-- <th style="width:2px;">No.</th> -->
												<th>ID</th>
												<th>Fullname</th>
												<th>Email</th>
												<th>Status</th>
												<th>Action</th>
											</tr>                                                             
										</thead>
										<tbody>
											<?php
												include('inc/dbcon.php');

												$sql = "SELECT * FROM users";
												$result = $conn->query($sql);
												$count = 0;
												while ($row = $result->fetch_assoc()) {
													$count += 1;
													

													$userId = $row['user_id'];
													$userStatus = $row['status'];

													if ($userStatus == 'Active') {
														$buttonClass = 'danger';
														$buttonClass1 = 'success';
														$iconClass = 'ban';
														$iconClass1 = 'clock-o';
														$action = 'deactivate_';
														$action1 = 'extend_';
														$action2 = '';
														$modalID = 'deactivate';
														$status = 'success';
														$stat = '';
														$stat1 = '';
														$stat2 = 'disabled';
													} else{
														$buttonClass = 'success';
														$buttonClass1 = 'success';
														$iconClass = 'check';
														$iconClass1 = 'clock-o';
														$action = 'activate_';
														$action1 = '';
														$action2 = 'edit_';
														$modalID = 'activate';
														$status = 'warning';
														$stat = '';
														$stat1 = 'disabled';
														$stat2 = '';

													}
													echo "
														<tr>
															<td>".$count."</td>
															<td>".$row['full_name']."</td>
															<td>".$row['email']."</td>
															<td>". $row['status']."</td>
															<td>
																<a class='btn btn-$buttonClass' href='#user_$action".$row['user_id']."' data-toggle='modal' $stat>
																	<i class='fa fa-$iconClass'></i>
																	<span>$modalID</span>
																</a>
															</td>
														</tr>
													
													
													";

													 include('inc/user_modal.php'); 
													 

												}

											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- /.row (main row) -->

		</section>
		<!-- /.content -->

	</div>

<?php include('inc/user_modal.php');?>

<?php include('inc/footer.php'); ?>
<?php include('inc/scripts.php'); ?>