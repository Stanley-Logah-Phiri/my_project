<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/inc/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/inc/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/inc/vendor/phpmailer/src/SMTP.php'; 





include('inc/header.php'); 


?>

<?php include('inc/navbar.php'); ?>
<?php include('inc/sidebar.php'); ?>


	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				SHORTLISTING CANDIDATES
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
				<div class="col-md-3">
					<form role="form" method="POST" action="manage_shortlisting.php" enctype="multipart/form-data">
						<!--box -->
						<div class="box box-success no-padding pull-left">
							
							<div class="box-header with-border">
								
								<h2 class="box-title pull-left"><b>SHORTLIST CANDIDATES</b></h2>
								<div class="row">
									<div class="col-md-12">
										
									</div>
								</div>
							</div>
							<!-- /.box-header -->
							
							<div class="box-body">  
  
								<div class="form-group">
									<label for="exampleInputPassword1">Select Job Title</label>
									<select class="form-control select2" name="job_title" required>
										<option selected="selected" disabled>Select Title</option>
										<?php
											// Add your database connection code here
											include('../inc/dbcon.php');

											// Fetch distinct job titles from the jobs table
											$jobTitlesQuery = "SELECT * FROM jobs ";
											$jobTitlesResult = $conn->query($jobTitlesQuery);

											// Example for the first query fetching job titles
											if ($jobTitlesResult->num_rows > 0) {
												while ($row = $jobTitlesResult->fetch_assoc()) {
													echo "<option value='" . $row['job_id'] . "'>" . $row['job_title'] . "</option>";
												}
											} else {
												echo "<option value=''>No job titles found</option>";
											}
										?>
																													
									</select>
								</div>    
								<div class="form-group">
									<label for="shortlist_count">Number of People to Shortlist:</label>
                					<input type="number" min="1" class="form-control" name="shortlist_count" required>
								</div> 



								
								                                                
							
								<!-- /.form-group -->               
							</div>
							<!-- /.box-body -->

							<div class="box-footer">                            
								<button type="submit" class="btn btn-flat btn-success pull-right" name="submit"><i class="fa fa-plus"></i>&nbsp;&nbsp;<b>Shortlist</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>                                           
								<button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>  
							</div>
						
						</div>
						<!-- /.box -->
					</form>
				</div>
				<div class="col-md-9">
					<div class="box box-success">
						<div class="box-header with-border">
										
							<h2 class="box-title pull-left"><b>LIST OF SHORTLISTED</b></h2>
							
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
												<th>No.</th>
												<th>Fullname</th>
												<th>Email</th>
												<th>Job Tittle</th>
											</tr>                                                             
										</thead>
										<tbody>
										<?php
											// Include database connection
											include('inc/dbcon.php');

											// Check if the form is submitted
											if (isset($_POST['submit'])) {

												// Retrieve form data
												$job_id = $_POST['job_title'];
												$shortlist_count = $_POST['shortlist_count'];

												// Fetch pending job applications based on the selected job and order by score
												$applicationsQuery = "SELECT * FROM job_applications
																	WHERE job_id = '$job_id' AND status = 'pending' AND recommendation = 'recommended'
																	ORDER BY score DESC
																	LIMIT $shortlist_count";

												$applicationsResult = $conn->query($applicationsQuery);

												// Check if there are applications to shortlist
												if ($applicationsResult->num_rows > 0) {

													// Initialize an array to store shortlisted applications
													$shortlistedApplications = array();
													$count = 0;
													// Iterate through the result set and store shortlisted applications
													while ($row = $applicationsResult->fetch_assoc()) {
														
														$shortlistedApplications[] = $row;

														// Update the status of the shortlisted application to 'shortlisted'
														$updateStatusQuery = "UPDATE job_applications SET status = 'shortlisted'
																			WHERE id = '{$row['id']}'";

														$conn->query($updateStatusQuery);
													}




													// Insert shortlisted applications into the 'shortlisted' table
													foreach ($shortlistedApplications as $application) {
														$insertQuery = "INSERT INTO shortlisted (fullname, email, job_title, job_id)
																		VALUES ('{$application['fullname']}', '{$application['email']}', 
																				(SELECT job_title FROM jobs WHERE job_id = '$job_id'), '$job_id')";

														$conn->query($insertQuery);
														$full_name = $application['fullname'];
														$email = $application['email'];
														$jobsss = $application['job_title'];
														
														$message ="
														<b>Dear $full_name</b><br/>
														<br><b></b>
														<b>
															We hope this message finds you well. We are pleased to inform you that after careful consideration of your application for the $jobsss position at TNM Malawi, we are impressed with your qualifications and experience, and we are excited to let you know that you have been shortlisted for the next stage of our hiring process.

															Interview Details:
															- Date: [Date]
															-Time:** [Time]
															- Location: [Address or Virtual Meeting Details]

															During the interview, you will have the opportunity to discuss your skills, experiences, and how they align with the requirements of the position. We encourage you to prepare for the interview by researching our company, understanding the role, and thinking about how your unique strengths can contribute to our team.

															If the provided interview schedule is inconvenient for you, please contact us as soon as possible, and we will do our best to accommodate your availability.

															We congratulate you on reaching this stage, and we look forward to meeting with you to explore the possibility of you joining our team at TNM Malawi.<br>

															Best Regards,															
																									
															<br>
															HRM TNM Malawi<br>
									
													   ";
									
														// passing true in constructor enables exceptions in PHPMailer
										
														$mail = new PHPMailer(true);
										
														try {
															// Server settings
															// $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
															$mail->isSMTP();
															$mail->Host = 'smtp.gmail.com';
															$mail->SMTPAuth = true;
															$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
															$mail->Port = 587;
										
															$mail->Username = 'christiechagoe@gmail.com'; // YOUR gmail email
															$mail->Password = 'ieip gdio kzjm apgc'; // YOUR gmail password
										
															// Sender and recipient settings
															$mail->setFrom('logahstankey@gmail.com', 'TNM RECUITMENTS');
															$mail->addAddress($email, 'Receiver Name');
															$mail->addReplyTo('logahstankey@gmail.com', 'TNM RECUITMENTS'); // to set the reply to
										
															// Setting the email content
															$mail->IsHTML(true);
															$mail->Subject = "Congratulations! You've Been Shortlisted for a Job Interview at TNM Malawi";
															$mail->Body = $message;
															$mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';
										
															$mail->send();
															$_SESSION['success'] = 'Account Successfully Created Please login to your email to get activation code';
															
														}catch (Exception $e) {
															echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
															
														}
														
													}
													

													// Display shortlisted applications to the admin													
															
													foreach ($shortlistedApplications as $application) {
														// Fetch job title from the 'jobs' table based on 'job_id'
														$count = $count + 1;
														$jobTitleQuery = "SELECT job_title FROM jobs WHERE job_id = '{$application['job_id']}'";
														$jobTitleResult = $conn->query($jobTitleQuery);

														if ($jobTitleResult->num_rows > 0) {
															$jobTitleRow = $jobTitleResult->fetch_assoc();
															$jobTitle = $jobTitleRow['job_title'];
														} else {
															$jobTitle = "N/A"; // Set a default value if job title not found
														}

														echo "<tr>
																<td>{$count}</td>
																<td>{$application['fullname']}</td>
																<td>{$application['email']}</td>
																<td>{$jobTitle}</td>
															</tr>";
													}

													

												} else {
													echo "<p>No pending applications found for shortlisting.</p>";
												}
											}

											// Close the database connection
											$conn->close();
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