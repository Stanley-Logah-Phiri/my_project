
<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<?php include('inc/sidebar.php'); ?>


<?php 
include('inc/dbcon.php');
$query = "SELECT * FROM jobs";
$st = $conn->query($query);

while ($row = $st->fetch_assoc()) {
	$dead_l = $row['deadline_date'];
	$dead_line = date_create($row['deadline_date']);
	$todate = date("Y-m-d");
	$current_date = date_create($todate);

	$days = date_diff($current_date, $dead_line);

	$remaining_days = $days->format("%r%a");

	if ($remaining_days <= '0') {
		$query = "UPDATE jobs SET status = 'closed' WHERE deadline_date = '$dead_l'";

        $stmt = $conn->query($query);
	}

}


?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				MANAGE JOBS
				<small><?php //print_r($_POST);?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="manage_users.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Manage Jobs</li>
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
										
							<h2 class="box-title pull-left"><b>JOB POSTS</b></h2>
							
							<div class="box-tools pull-right">
								<?php include('inc/job_modal.php'); ?>
								<a data-target="#import_jobs" data-toggle="modal" class="btn btn-flat btn-success"><i class="fa fa-plus"></i>&nbsp;<b>POST A JOB</b></span></a><br/>
								
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">

							<div class="row">
									<div class="col-md-12">
										<?php
											if(isset($_SESSION['errorMineralCatAdd'])){
											echo "
												<div class='alert callout alert-danger alert-dismissible'>
												<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<h4><i class='icon fa fa-warning'></i> Error!</h4>
												".$_SESSION['errorMineralCatAdd']."
												</div>
											";
											unset($_SESSION['errorMineralCatAdd']);
											}
											if(isset($_SESSION['job_activate_success'])){
											echo "
												<div class='alert alert-success alert-dismissible'>
												<button type='button' class='close text-white' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<h4><i class='icon fa fa-check'></i> Success!</h4>
												".$_SESSION['job_activate_success']."
												</div>
											";
											unset($_SESSION['job_activate_success']);
											}
										?>
									</div>
								
								
								<div class="col-lg-12 col-md-12"><br>
									<table  id="example1"  class="table table-hover table-striped table-bordered table-responsive">
										<thead>
											<tr>
												<th style="width:2px;">No.</th>
												
												<th>Job Post</th>
												<th>Deadline</th>
												<th>Status</th>
												<th>Action</th>
											</tr>                                                             
										</thead>
										<tbody>
											<?php
												include('inc/dbcon.php');

												$sql = "SELECT * FROM jobs";
												$result = $conn->query($sql);
												$count = 0;
												while ($row = $result->fetch_assoc()) {
													$count += 1;
										
													$jobId = $row['job_id'];
													$jobStatus = $row['status'];

													if ($jobStatus == 'open') {
														$buttonClass = 'danger';
														$buttonClass1 = 'success';
														$iconClass = 'ban';
														$iconClass1 = 'clock-o';
														$action = 'deactivate_';
														$action1 = 'extend_';
														$action2 = '';
														$modalID = 'Cancel';
														$status = 'success';
														$stat = '';
														$stat1 = '';
														$stat2 = 'disabled';
													} else if ($jobStatus == 'cancelled') {
														$buttonClass = 'success';
														$buttonClass1 = 'success';
														$iconClass = 'check';
														$iconClass1 = 'clock-o';
														$action = 'activate_';
														$action1 = '';
														$action2 = 'edit_';
														$modalID = 'Repost';
														$status = 'warning';
														$stat = '';
														$stat1 = 'disabled';
														$stat2 = '';

													}else if ($jobStatus == 'closed') {
														$buttonClass = 'danger';
														$buttonClass1 = 'success';
														$iconClass = 'ban';
														$iconClass1 = 'clock-o';
														$modalID = 'Cancel';
														$action = '';
														$action1 = 'extend_';
														$action2 = '';
														$status = 'danger';
														$stat = 'disabled';
														$stat1 = '';
														$stat2 = 'disabled';
													}
													
												
													echo "
														<tr>
															<td>".$count."</td>
															
															<td>".$row['job_title']."</td>
															<td>".$row['deadline_date']."</td>
															<td>
																<span class='label label-$status'>".$row['status']."</span>															
															</td>
															<td>
																<a class='btn btn-success' href='#job_details_".$row['job_id']."' data-toggle='modal' >
																	<i class='fa fa-eye'></i>
																	<span>View</span>
																</a>
																<a class='btn btn-success' href='#job_$action2".$row['job_id']."' data-toggle='modal' $stat2>
																	<i class='fa fa-edit'></i>
																	<span>Edit</span>
																</a>
																<a class='btn btn-$buttonClass' href='#job_$action".$row['job_id']."' data-toggle='modal' $stat>
																	<i class='fa fa-$iconClass'></i>
																	<span>$modalID</span>
																</a>
																<a class='btn btn-$buttonClass1' href='#job_$action1".$row['job_id']."' data-toggle='modal' $stat1>
																	<i class='fa fa-$iconClass1'></i>
																	<span>Extend</span>
																</a>
															</td>
														</tr>
													
													
													";

													include('inc/job_modal.php');
													include('inc/job_edit.php');
													include('inc/extend_modal.php');


												}
												
											?>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="box-footer">

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