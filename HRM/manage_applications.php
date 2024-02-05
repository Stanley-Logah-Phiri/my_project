<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<?php include('inc/sidebar.php'); ?>


	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				MANAGE APPLICATIONS
				<small><?php //print_r($_POST);?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="manage_users.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Manage Applications</li>
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
										
							<h2 class="box-title pull-left"><b>LIST OF APPLICATIONS</b></h2>
							
							<div class="box-tools pull-right">
								<form role="form" method="POST" action="" enctype="multipart/form-data">

									<div class="form-group">
										
										<select class="form-control select2" name="job_id" required>
											<option selected="selected" disabled>Select Job Title</option>
											<?php
												// Add your database connection code here
												include('../inc/dbcon.php');

												// Fetch distinct job titles from the jobs table
												$jobTitlesQuery = "SELECT * FROM jobs";
												$jobTitlesResult = $conn->query($jobTitlesQuery);

												if ($jobTitlesResult->num_rows > 0) {
													while ($rowss = $jobTitlesResult->fetch_assoc()) {
														echo "<option value='" . $rowss['job_id'] . "'>" . $rowss['job_title'] . "</option>";

													}
												} else {
													echo "<option value=''>No job titles found</option>";
												}
												?>
										</select>
										<button type="submit" class="btn btn-flat btn-success pull-right" name="Submit"><i class="fa fa-plus"></i>&nbsp;&nbsp;<b>Select</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>

									</div>
								</form>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">

							<div class="row">
								<div class="col-md-12">
									
								
								
								</div>
								
								<div class="col-lg-12 col-md-12"><br>
									<table id="example1" class="table table-hover table-striped table-bordered table-responsive">
										<thead>
											<tr>
												<th style="width:2px;">No.</th>
												<th>Name</th>
												<th>Email</th>
												<th>Job title</th>
												<th>Score</th>
												<th>Recommendation</th>
											</tr>
										</thead>
										<tbody>
											<?php
											include('inc/dbcon.php');
											if (isset($_POST['Submit']) == 'POST') {
												$jobTitle = $_POST['job_id'];

												$sw = "SELECT * FROM jobs where job_id = '$jobTitle'";
												$r = $conn->query($sw);
												$rs = $r->fetch_assoc();
												$job = $rs['job_title'];

												$ssql = "SELECT * FROM job_applications where job_id = '$jobTitle'
														ORDER BY score DESC";
												$rre = $conn->query($ssql);
												$count = 0;
												while ($roww = $rre->fetch_assoc()) {
													$count += 1;
													$recommendation = ($roww['score'] >= 50) ? 'Recommended' : 'Not Recommended';

													echo "
														<tr>
															<td>".$count."</td>
															<td>".$roww['fullname']."</td>
															<td>".$roww['email']."</td>
															<td>".$job."</td>
															<td>".$roww['score']."</td>
															<td>".$recommendation."</td>
														</tr>";
												}
											} else {
												$ssql = "SELECT * FROM job_applications INNER JOIN jobs ON job_applications.job_id = jobs.job_id
															ORDER BY score DESC";
												$rre = $conn->query($ssql);
												$count = 0;
												while ($roww = $rre->fetch_assoc()) {
													$count += 1;
													$recommendation = ($roww['score'] >= 50) ? 'Recommended' : 'Not Recommended';

													echo "
														<tr>
															<td>".$count."</td>
															<td>".$roww['fullname']."</td>
															<td>".$roww['email']."</td>
															<td>".$roww['job_title']."</td>
															<td>".$roww['score']."</td>
															<td>".$recommendation."</td>
														</tr>";
												}
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