
<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<?php include('inc/sidebar.php'); ?>




	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				JOB POSTS
				<small><?php //print_r($_POST);?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="manage_users.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Job posts</li>
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
		
			
				<div class="col-md-8">
					<div class="box box-success">
						<div class="box-header with-border">
										
							<h2 class="box-title pull-left"><b>Available Jobs</b></h2>
							
							<div class="box-tools pull-right">
								
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">

							<div class="row">
							
								<div class="col-md-12"><br>
									<table  id="example1"  class="table table-hover table-striped table-bordered table-responsive">
										<thead>
										    <thead>
									    <tr>
									        <th style="width:2px;">No.</th>
									        <th>Job Title</th>
									        <th>Deadline</th>
									        <th>Status</th>
									        <th>Action</th>
									    </tr>                                                             
									</thead>
									<tbody>
									    <?php
									        include('inc/dbcon.php');

									        // Get the user's ID from the session
									        
											$userId=$_SESSION['user_id'];

									        $sql = "SELECT * FROM jobs";

									        $stmt = $conn->prepare($sql);
									        $stmt->execute();
									        $result = $stmt->get_result();
									        $stmt->close();
									        $count = 0;

									        while ($row = $result->fetch_assoc()) {
									            $count += 1;
									            echo "
									                <tr>
									                    <td>" . $count . "</td>
									                    <td>" . $row['job_title'] . "</td>
									                    <td>" . $row['deadline_date'] . "</td>
									                    <td>" . $row['status'] . "</td>
									                    <td>  
									                        <a class='btn btn-primary' href='#job_details_".$row['job_id']."' data-toggle='modal'>
									                            <i class='fa fa-eye'></i>
									                            <span>View Details</span>
									                        </a>
															<a class='btn btn-success' href='view_jobs.php?jobId=" . $row['job_id'] . "'>
																<i class='fa fa-check'></i>
																<span>Apply</span>
															</a>
														
									                    </td>
									                </tr>";

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
				<div class="col-md-4">

<div class="box box-success no-padding pull-left">
	
	<div class="box-header with-border">
		
		<h2 class="box-title pull-left"><b>Application Form</b></h2>
		<div class="row">
			<div class="col-md-12">
			<?php 
	
				if (isset($_GET['jobId']) AND isset($_GET['jobId'])) {
					
					$jobId = $_GET['jobId'];
					


					
			?>
			</div>
		</div>
	</div>
	
	<div class="box-body"> 
		<input type="hidden" id="job_id" class="form-control" name="jobId" value="<?php echo $_GET['jobId']; ?>">

		<input type="hidden" id="userId" class="form-control" name="userId" value="<?php echo $userId; ?>">

		<div class="form-group">
			<input type="hidden" class="form-control" name="fullname" id="fullname" placeholder="name..." value="<?php echo $loggedInUserName; ?>" required>  
		</div>
		<div class="form-group">
			<input type="hidden" class="form-control" name="email" id="email" placeholder="Email..." value="<?php echo $loggedInUserEmail; ?>" required>  
		</div> 
		
		<div class="form-group">
			<label for="exampleInputPassword1">Upload Your CV</label>
			<input type="file" class="form-control" name="cv_file_pathb" id="cv_letter"  required>  
		</div> 
		<div class="form-group">
			<label for="exampleInputPassword1">Upolad Cover Letter</label>
			<input type="file" class="form-control" name="cover_letterb" id="cover_letter" required>  
		</div>         
		

	</div>

	<div class="box-footer">                            
		<button type="submit" onclick="extractAndPostData()" class="btn btn-flat btn-success pull-right" name=""><i class="fa fa-plus"></i>&nbsp;&nbsp;<b>Apply</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>                                           
		<button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>  
	</div>

	<?php }?>
</div>

</div>


			</div>
			<!-- /.row (main row) -->

		</section>


	</div>


<?php include('inc/footer.php'); ?>
<?php include('inc/scripts.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

    function extractAndPostData() {
        var currentURL = window.location.href;
        // Extract text values
		var job_id = document.getElementById('job_id').value;
		var userId = document.getElementById('userId').value;
        var email = document.getElementById('email').value;
        var fullname = document.getElementById('fullname').value;
        // Extract file values
        var cv_letter = document.getElementById('cv_letter').files[0];
		var cover_letter = document.getElementById('cover_letter').files[0];

		

        // Create FormData object
        var formData = new FormData();
     
        // Append text values to FormData
        formData.append('email', email);
        formData.append('fullname', fullname);
        formData.append('user_id', userId);
        formData.append('job_id', job_id);
        // Append file values to FormData
        // Append file values to FormData
		if (cv_letter) {
			formData.append('cv', cv_letter, cv_letter.name);
		}

		if (cover_letter) {
			formData.append('cover_letter', cover_letter, cover_letter.name);
		}
        console.log('CV File:', formData);
		console.log('CV File:', cv_letter);
		console.log('Cover Letter File:', cover_letter);
	


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
                    window.location.href = "http://localhost/portal/candidate/view_jobs.php";
                }
                else{
                    alert('Application submitted successfully!')
                    window.location.href = "http://localhost/portal/candidate/view_jobs.php";
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


