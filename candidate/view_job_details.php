<?php //include('inc/session.php'); ?>

<?php
// Check if the job ID parameter is set in the URL
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
} 
			include_once("inc/dbcon.php");
			$user_id = 1;
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
				$user_id = 1;

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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Job Details</title>
</head>
<body>

<?php
include('inc/dbcon.php'); // Adjust the path accordingly

if (isset($_GET['job_id'])) {
    $jobId = $_GET['job_id'];

    $sql = "SELECT job_title, job_description, qualifications, responsibilities
            FROM jobs
            WHERE job_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $jobId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        ?>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h2><?= $row['job_title'] ?></h2>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Job Description</h5>
                    <ul>
                        <?php
                        $jobDescriptionItems = explode("\n", $row['job_description']);
                        foreach ($jobDescriptionItems as $item) {
                            echo "<li>" . trim($item) . "</li>";
                        }
                        ?>
                    </ul>

                    <h5 class="card-title">Qualifications</h5>
                    <ul>
                        <?php
                        $qualificationsItems = explode("\n", $row['qualifications']);
                        foreach ($qualificationsItems as $item) {
                            echo "<li>" . trim($item) . "</li>";
                        }
                        ?>
                    </ul>

                    <h5 class="card-title">Responsibilities</h5>
                    <ul>
                        <?php
                        $responsibilitiesItems = explode("\n", $row['responsibilities']);
                        foreach ($responsibilitiesItems as $item) {
                            echo "<li>" . trim($item) . "</li>";
                        }
                        ?>
                    </ul>
                </div>
                <div class="card-footer">
                    <!-- Apply Now button with modal trigger -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#applyModal">
                        Apply Now
                    </button>
                </div>
            </div>
        </div>

        <!-- Apply Modal -->
        <div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="applyModalLabel">Apply for <?= $row['job_title'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Your application form or message can go here -->
                        <!-- For demonstration purposes, a simple form is shown -->
                        <form role="form" method="POST" action="" enctype="multipart/form-data">
						<!--box -->
						<div class="box box-success no-padding pull-left">
							
							<div class="box-header with-border">
								
								<h2 class="box-title pull-left"><b>Application Form</b></h2>
								<div class="row">
									<div class="col-md-12">
										
									</div>
								</div>
							</div>
							<!-- /.box-header -->
							
							<div class="box-body"> 

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
									<input type="file" class="form-control" name="cv_file_path" id="cv_file_path" placeholder="Upload CV (PDF only)" required>  
								</div> 
								<div class="form-group">
									<label for="exampleInputPassword1">Upolad Cover Letter</label>
									<input type="file" class="form-control" name="cover_letter_file_path" id="cover_letter_file_path" required>  
								</div>
                                
                                <input type="hidden" name="job_id" id="job_id" value="<?= $jobId ?>">
                                
                                <div class="box-footer">                            
								<button type="submit" onclick="extractAndPostData()" class="btn btn-flat btn-success pull-right" name=""><i class="fa fa-plus"></i>&nbsp;&nbsp;<b>Apply</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>  
                                
                                
								<button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>  
							</div>
						
								
		               
							</div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    } else {
        echo "<p>Job not found.</p>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<p>Invalid request.</p>";
}
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function extractAndPostData() {
        // Extract text values
        var email = document.getElementById('email').value;
        var fullname = document.getElementById('fullname').value;
        var user_id = document.getElementById('user_id').value;
        var job_id = document.getElementById('job_id').value;

        // Extract file values
        var cv_file_path = document.getElementById('cv_file_path').files[0];
        var file_input = document.getElementById('fileInput').files[0];

        // Create FormData object
        var formData = new FormData();

        // Append text values to FormData
        formData.append('email', email);
        formData.append('fullname', fullname);
        formData.append('user_id', user_id);
        formData.append('job_id', job_id);

        // Append file values to FormData
        formData.append('cv', cv_file_path);
        

        // Make AJAX request to Flask server
        $.ajax({
            url: "http://localhost:8080/pdfs",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

