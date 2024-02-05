

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
				PORTFOLIO SECTION (Create and View Your Portfolio)
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
					<div class="box box-primary">
						<div class="box-body box-profile">
							<img class="profile-user-img img-responsive img-circle" src="uploads/<?php echo $user['profile_picture']; ?>" alt="User profile picture" style="width: 150px; height: 150px;">

							<h3 class="profile-username text-center"><?php echo $name?></h3>

							<p class="text-muted text-center"><?php echo $profe?></p>


							<a href="<?php echo $cv ?>" class = "btn btn-success btn-block" target="_blank">View your CV</a>
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
							<?php echo $edu ?> from <?php echo $inst?>
							</p>

							<hr>

							<strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

							<p class="text-muted"><?php echo $address?></p>

							<hr>

							<strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

							<p>
							
							<span class="label label-info"><?php echo $skills?></span>
							
							</p>

							<hr>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<div class="col-xs-9">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#fa-icons" data-toggle="tab" aria-expanded="true">Add Portifolio</a></li>
							<li class=""><a href="#glyphicons" data-toggle="tab" aria-expanded="false">View Portifolio</a></li>
							<!-- <li class=""><a href="#glyphicons" data-toggle="tab" aria-expanded="false">Edit Portifolio</a></li> -->
						</ul>
						<div class="tab-content">
							<!-- Font Awesome Icons -->
							<div class="tab-pane active" id="fa-icons">
								<div class="row">
									<div class="col-md-12">
										<form id="manual-application-form" method="post" action="" enctype="multipart/form-data">
											<!-- Contact Information -->
											<div class="col-md-12">

												<progress id="form-progress" style="width: 100%;" max="100" value="<?php echo ($currentStep - 1) / 6 * 100; ?>"></progress>
											</div>
											<div class="col-md-12">
											<!-- Contact Information Section -->
											<div class="form-step" id="step1" style="display: <?php echo ($currentStep == 1) ? 'block' : 'none'; ?>">
												<h2>Contact Information</h2>
												<div class="form-group">
													<label for="full_name">Full Name:</label>
													<input type="text" class="form-control" id="full_name" name="FullName" required>
												</div>
												<div class="form-group">
													<label for="address">Address:</label>
													<input type="text" class="form-control" id="address" name="Address" required>
												</div>
												<div class="form-group">
													<label for="phone_number">Phone Number:</label>
													<input type="tel" class="form-control" id="phone_number" name="PhoNumber" required>
												</div>
												<div class="form-group">
													<label for="email">Email Address:</label>
													<input type="email" class="form-control" id="email" name="Email" required>
												</div>
												<button type="button" class="btn btn-success" onclick="nextStep(2)">Next</button>
											</div>

											<!-- Education Section -->
											<div class="form-step" id="step2" style="display: <?php echo ($currentStep == 2) ? 'block' : 'none'; ?>;">
												<h2>Education</h2>
												<div id="educationEntries">
													<div class="form-group">
														<div class="row">
															<div class="col-md-4">
																<label for="Degree">Qualification:</label>
																<input type="text" class="form-control" name="Education[Degree][]" required>
															</div>
															<div class="col-md-4">
																<label for="institution">Institution:</label>
																<input type="text" class="form-control" name="Education[Institution][]" required>
															</div>
															<div class="col-md-3">
																<label for="graduation_date">Graduation Date:</label>
																<input type="date" class="form-control" name="Education[GraduationDate][]" required>
															</div>
															<div class="col-md-1">
																<button type="button" class="btn btn-success" onclick="addEntry('educationEntries')">Add</button>
															</div>
														</div>
													</div>
												</div>
												<button type="button" class="btn btn-success" onclick="prevStep()">Previous</button>
												<button type="button" class="btn btn-success" onclick="nextStep(3)">Next</button>
											</div>

											<!-- Professional Experience Section -->
											<div class="form-step" id="step3" style="display: <?php echo ($currentStep == 3) ? 'block' : 'none'; ?>;">
												<h2>Professional Experience</h2>
												<div id="experienceEntries">
													<div class="form-group">
														<div class="row">
															<div class="col-md-4">
																<label for="job_title">Job Title:</label>
																<input type="text" class="form-control" name="ProfessionalExperience[JobTitle][]">
															</div>
															<div class="col-md-4">
																<label for="company_name">Company Name:</label>
																<input type="text" class="form-control" name="ProfessionalExperience[CompanyName][]">
															</div>
															<div class="col-md-3">
																<label for="employment_dates">Years Worked:</label>
																<input type="text" class="form-control" name="ProfessionalExperience[EmploymentDates][]">
															</div>
															<div class="col-md-1">
																<button type="button" class="btn btn-success" onclick="addEntry('experienceEntries')">Add</button>
															</div>
														</div>
													</div>
												</div>
												<button type="button" class="btn btn-success" onclick="prevStep()">Previous</button>
												<button type="button" class="btn btn-success" onclick="nextStep(4)">Next</button>
											</div>

											<!-- Skills Section -->
											<div class="form-step" id="step4" style="display: <?php echo ($currentStep == 4) ? 'block' : 'none'; ?>;">
												<h2>Skills</h2>
												<div id="skillsEntries">
													<div class="form-group">
														<div class="row">
															<div class="col-md-4">
																<label for="skills">Skills:</label>
																<input type="text" class="form-control" name="Skills[]">
															</div>
															<div class="col-md-1">
																<button type="button" class="btn btn-success" onclick="addEntry('skillsEntries')">Add</button>
															</div>
														</div>
													</div>
												</div>
												<button type="button" class="btn btn-success" onclick="prevStep()">Previous</button>
												<button type="button" class="btn btn-success" onclick="nextStep(5)">Next</button>
											</div>

											<!-- Certifications Section -->

											<!-- Certifications Section -->
											<div class="form-step" id="step5" style="display: <?php echo ($currentStep == 5) ? 'block' : 'none'; ?>;">
												<h2>Certifications</h2>
												<div id="certificationsEntries" class="form-group">
													<div class="row">
														<!-- <div class="col-md-3">
															<label for="certifications">Certifications:</label>
															<input type="text" class="form-control" name="Certifications[]">
														</div> -->
														<div class="col-md-4">
															<label for="certifications">Certifications (optional):</label>
															<input type="text" class="form-control" name="Certifications[]">
														</div>

														<!-- Certification File Upload -->
														<div class="col-md-4">
															<label for="certifications_file">Certifications File (PDF only, optional):</label>
															<input type="file" class="form-control" id="certifications_file" name="certifications_file" accept=".pdf">
														</div>
														<div class="col-md-4">
															<button type="button" class="btn btn-success" onclick="addEntry('certificationsEntries')">Add</button>
														</div>
													</div>

												</div>
												<div class="col-md-4 pull-right">
													<button type="button" class="btn btn-success pull-right" onclick="nextStep(6)">Next</button>
													<button type="button" class="btn btn-success pull-right" onclick="prevStep()">Previous</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														
												</div>
												
											</div>

											<!-- File Upload Section -->
											<div class="form-step" id="step6" style="display: none;">
												<p><h2>Additional documents</h2>
												</p>
												<div class="form-group">
													<label for="cv_document">CV Document (PDF only):</label>
													<input type="file" class="form-control" id="cv_document" name="cv_document" accept=".pdf" required>
												</div>
												<div class="form-group">
													
													<label for="project_links">Links to Projects/websites (optional):</label>
													<textarea class="form-control" id="project_links" name="project_links" rows="3"></textarea>
												</div>
												<button type="submit" class="btn btn-success pull-right">Submit</button>&nbsp;&nbsp;
												<button type="button" class="btn btn-success pull-right" onclick="prevStep()">Previous</button>
												
											</div>

											<script>
												function addEntry(containerId) {
													const container = document.getElementById(containerId);
													const newEntry = container.firstElementChild.cloneNode(true);
													container.appendChild(newEntry);
												}
											</script>

											<script>
												let currentStep = <?php echo isset($_SESSION['currentStep']) ? $_SESSION['currentStep'] : 1; ?>;
												const totalSteps = 6;

												function updateProgress() {
													const progress = ((currentStep - 1) / (totalSteps - 1)) * 100;
													document.getElementById('form-progress').value = progress;
												}

												function nextStep(next) {
													console.log('Next button clicked');
													console.log('Current step:', currentStep);
													document.getElementById('step' + currentStep).style.display = 'none';
													currentStep = next;
													document.getElementById('step' + currentStep).style.display = 'block';
													updateProgress();

													// Store the current step in the session
													fetch('store_progress.php', {
														method: 'POST',
														headers: {
															'Content-Type': 'application/json',
														},
														body: JSON.stringify({
															currentStep: currentStep,
														}),
													});
												}

												function prevStep() {
													console.log('Previous button clicked');
													console.log('Current step:', currentStep);
													if (currentStep > 1) {
														document.getElementById('step' + currentStep).style.display = 'none';
														currentStep--;
														document.getElementById('step' + currentStep).style.display = 'block';
														updateProgress();

														// Store the current step in the session
														fetch('store_progress.php', {
															method: 'POST',
															headers: {
																'Content-Type': 'application/json',
															},
															body: JSON.stringify({
																currentStep: currentStep,
															}),
														});
													}
												}
											</script>
												
											</div>

										
										</form>
								
									</div>

								
								</div>

								

							</div>
							<!-- /#fa-icons -->

							<!-- glyphicons-->
							<div class="tab-pane" id="glyphicons">
								<div class="row">
									<div class="col-md-12">

										<!-- VIEW PORTFOLIO SECTION -->
										<?php include("port_view.php"); ?>

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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //session_start();
    include_once("inc/dbcon.php");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


        // Function to sanitize input data
        function sanitizeInput($data) {
            return htmlspecialchars(stripslashes(trim($data)));
        }

        // Function to handle array input
        function handleArrayInput($array) {
            return implode(', ', array_map('sanitizeInput', $array));
        }

        // Function to handle file upload
        function handleFileUpload($fileInput, $destinationFolder) {
            $targetFolder = $destinationFolder . '/';
            $targetFilePath = $targetFolder . basename($_FILES[$fileInput]["name"]);
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            // Check if file is a valid PDF
            if ($fileType != "pdf") {
                echo "Only PDF files are allowed.";
                return false;
            }

            // Move the uploaded file to the specified folder
            if (move_uploaded_file($_FILES[$fileInput]["tmp_name"], $targetFilePath)) {
                return $targetFilePath;
            } else {
                echo "File upload failed.";
                return false;
            }
        }

        // Insert data into user_portfolio table
        $fullName = sanitizeInput($_POST['FullName']);
        $address = sanitizeInput($_POST['Address']);
        $phoneNumber = sanitizeInput($_POST['PhoNumber']);
        $email = sanitizeInput($_POST['Email']);

        $degree = handleArrayInput($_POST['Education']['Degree']);
        $institution = handleArrayInput($_POST['Education']['Institution']);
        $graduationDate = handleArrayInput($_POST['Education']['GraduationDate']);

        $jobTitle = handleArrayInput($_POST['ProfessionalExperience']['JobTitle']);
        $companyName = handleArrayInput($_POST['ProfessionalExperience']['CompanyName']);
        $employmentDates = handleArrayInput($_POST['ProfessionalExperience']['EmploymentDates']);

        $skills = handleArrayInput($_POST['Skills']);
        $certifications = handleArrayInput($_POST['Certifications']);

        // Handle certifications file upload
        $certificationsFilePath = '';
        if ($_FILES['certifications_file']['size'] > 0) {
            $certificationsFilePath = handleFileUpload('certifications_file', 'uploads/certifications');
        }

        $cvDocumentFilePath = handleFileUpload('cv_document', 'uploads/cv_documents');
        $projectLinks = sanitizeInput($_POST['project_links']);

        // Insert data into the user_portfolio table
        $sql = "INSERT INTO user_portfolio (user_id, full_name, address, phone_number, email, degree, institution, graduation_date, job_title, company_name, employment_dates, skills, certifications, certifications_file_path, cv_document_path, project_links) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Replace 'your_user_id' with the actual user ID
        $userId = $_SESSION['user_id'];

        $stmt->bind_param(
            "isssssssssssssss",
            $userId,
            $fullName,
            $address,
            $phoneNumber,
            $email,
            $degree,
            $institution,
            $graduationDate,
            $jobTitle,
            $companyName,
            $employmentDates,
            $skills,
            $certifications,
            $certificationsFilePath,
            $cvDocumentFilePath,
            $projectLinks
        );

        if ($stmt->execute()) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
}
?>
