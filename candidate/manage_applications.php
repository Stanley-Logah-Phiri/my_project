<?php //include('inc/session.php'); ?>

<?php
// Check if the job ID parameter is set in the URL
session_start();
if (isset($_GET['jobId'])) {
    // Get the job ID from the URL
    $job_id = $_GET['jobId'];

    include_once("inc/dbcon.php");

        // Fetch job details from the jobs table
        $jobDetailsQuery = "SELECT job_title FROM jobs WHERE job_id = '$job_id'";
        $jobDetailsResult = mysqli_query($conn, $jobDetailsQuery);
    
        if ($jobDetailsResult) {
            $jobDetails = mysqli_fetch_assoc($jobDetailsResult);
            $job_title = isset($jobDetails['job_title']) ? $jobDetails['job_title'] : 'Unknown Job';
        } else {
            // Handle the case when fetching job details fails
            $job_title = 'Unknown Job';
        }


    // Now you can use $job_id in your code
			    echo "Job ID: $job_id";
			} else {
			    // Handle the case when the job ID is not provided in the URL
			 /*    echo "Job ID not found in the URL."; */
			}
			include_once("inc/dbcon.php");
			$user_id = $_SESSION['user_id'];
			$query = "SELECT email FROM users WHERE user_id = '$user_id'";
			$result = mysqli_query($conn, $query);

			if ($result) {
			    $userDetails = mysqli_fetch_assoc($result);
			    $loggedInUserEmail = isset($userDetails['email']) ? $userDetails['email'] : '';
			} else {
			    // Handle the case when fetching user details fails
			    $loggedInUserEmail = '';
			}
			?>

			<?php
				include_once("inc/dbcon.php");
				$user_id = $_SESSION['user_id'];

				$sql = "SELECT full_name FROM users WHERE user_id = '$user_id'";
				$result1 = mysqli_query($conn, $sql);

				if ($result1) {
				    $userDetails = mysqli_fetch_assoc($result1);
				    $loggedInUserName = isset($userDetails['full_name']) ? $userDetails['full_name'] : '';
				} else {
				    // Handle the case when fetching user details fails
				    $loggedInUserName = '';
				}

			?>






<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<?php include('inc/sidebar.php'); ?>



	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				MY APPLICATIONS
				<small><?php //print_r($_POST);?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="manage_users.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">My Applications</li>
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

					<div class="box box-success no-padding pull-left">
						
						<div class="box-header with-border">
							
							<h2 class="box-title pull-left"><b>Application Form</b></h2>
							<div class="row">
								<div class="col-md-12">
									
								</div>
							</div>
						</div>
						<div class="box-body"> 

							<div class="form-group">

								<label for="exampleInputPassword1">Job Title</label>
								<select class="form-control select2" id="jobds" name="jobId" required>
									<option selected="selected" disabled>Select Job Title</option>
									<?php
										// Add your database connection code here
										include('../inc/dbcon.php');

										// Fetch distinct job titles from the jobs table
										$jobTitlesQuery = "SELECT * FROM jobs";
										$jobTitlesResult = $conn->query($jobTitlesQuery);

										if ($jobTitlesResult->num_rows > 0) {
											while ($rowss = $jobTitlesResult->fetch_assoc()) {
												echo "<option value='".$rowss['job_id']."'>".$rowss['job_title']."</option>";

											}
										} else {
											echo "<option value=''>No job titles found</option>";
										}
										?>
								</select>
							</div>
							<input type="hidden" id="userId" class="form-control" name="userId" value="<?php echo $user_id; ?>">

							<div class="form-group">
								<label for="exampleInputPassword1">Full Name</label>
								<input type="text" class="form-control" name="fullname" id="fullname" placeholder="name..." value="<?php echo $loggedInUserName; ?>" required>  
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Email</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Email..." value="<?php echo $loggedInUserEmail; ?>" required>  
							</div> 
							
							<div class="form-group">
								<label for="exampleInputPassword1">Upload Your CV</label>
								<input type="file" class="form-control" name="cv_file_path" id="cv_file_path" accept=".pdf" required>  
							</div> 
							<div class="form-group">
								<label for="exampleInputPassword1">Upolad Cover Letter</label>
								<input type="file" class="form-control" name="cover_letter" id="cover_letter" accept=".pdf" required>  
							</div>         
							

						</div>

						<div class="box-footer">                            
							<button type="submit" onclick="extractAndPostData()" class="btn btn-flat btn-success pull-right" name=""><i class="fa fa-plus"></i>&nbsp;&nbsp;<b>Apply</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>                                           
							<button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>  
						</div>

					</div>

				</div>

				<div class="col-md-9">
					<div class="box box-success">
						<div class="box-header with-border">
										
							<h2 class="box-title pull-left"><b>My Applications</b></h2>
							
							<div class="box-tools pull-right">
								
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">

							<div class="row">
								<div class="col-md-12">
									
								
								
								</div>
								
								<div class="col-lg-12 col-md-12"><br>
									<table  id="example1"  class="table table-hover table-striped table-bordered table-responsive">
										<thead>
											<tr>
												<th style="width:2px;">No.</th>
												<th>APP ID</th>
												<th>Job Title</th>
												<th>Deadline</th>
												<th>Status</th>												
											</tr>                                                             
										</thead>
										<tbody>
											<?php
												include('inc/dbcon.php');

												// Get the user's ID from the session
												//$userID = 2;

				
												// Fetch job applications with additional information from the jobs table
												$sql = "SELECT a.id, a.job_id, j.job_title, j.deadline_date, a.status
														FROM job_applications a
														INNER JOIN jobs j ON a.job_id = j.job_id
														WHERE a.user_id = ?";
												$stmt = $conn->prepare($sql);
												$stmt->bind_param("i", $user_id);
												$stmt->execute();
												$result = $stmt->get_result();
												$stmt->close();
												$count = 0;
												while ($row = $result->fetch_assoc()) {
													$count +=1;
													echo"
													<tr>
													<td>".$count."</td>
													<td>".$row['id']."</td>
													<td>".$row['job_title']."</td>
													<td>".$row['deadline_date']."</td>
													<td>
														<span class='label label-success'>".$row['status']."</span>															
													</td>
													
												</tr>
											
													";
													
													include("inc/user_modal.php");
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




<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

    function extractAndPostData() {
        var currentURL = window.location.href;
        // Extract text values
		var job_id = document.getElementById('jobds').value;
		var userId = document.getElementById('userId').value;
        var email = document.getElementById('email').value;
        var fullname = document.getElementById('fullname').value;
        // Extract file values
        var cv_file_path = document.getElementById('cv_file_path').files[0];
		var cover_letter = document.getElementById('cover_letter').files[0];

        // Create FormData object
        var formData = new FormData();
     
        // Append text values to FormData
        formData.append('email', email);
        formData.append('fullname', fullname);
        formData.append('user_id', userId);
        formData.append('job_id', job_id);
        // Append file values to FormData
        formData.append('cv', cv_file_path);
		formData.append('cover_letter', cover_letter);
        

        // Make AJAX request to Flask server
        $.ajax({
            url: "http://localhost:8080/pdfs",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if(response.message=='already applied for this job'){
                    alert('You have already applied for this job.')
                    window.location.href = "http://localhost/portal/candidate/manage_applications.php";
                }
                else{
                    alert('Application submitted successfully!')
                    window.location.href = "http://localhost/portal/candidate/manage_applications.php";
                }
                
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
				console.log(formData);
                alert('Application failed. Error:  '+error)
            }
        });
    }
</script>

