<?php

    include_once("inc/dbcon.php");
    $user_id = $_SESSION['user_id'];
      

    $q = "SELECT * FROM users WHERE user_id = '$user_id'";
    $qu = $conn->query($q);
    $ro = $qu->fetch_assoc();

    $loggedInUserEmail = $ro['email'];
    $loggedInUserName = $ro['full_name'];

?>


<div class="modal fade" id="apply_jobs_<?php echo $row['job_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
           <!--  <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">  -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">APPY FOR <?php echo $row['job_title']; ?> JOB POST</h4></center>
                </div>
                <div class="modal-body">

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
                    
                    <input type="text" name="jobId" class="form-control" id="jobId" value="<?php echo $row['job_id']; ?>">
                    
                    <input type="text" id="userId" class="form-control" name="userId" value="<?php echo $user_id; ?>">
                 
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="extractAndPostData()" class="btn btn-flat btn-success pull-right" name=""><i class="fa fa-plus"></i>&nbsp;&nbsp;<b>Apply</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span> 
                                                    
                                                    
                    <button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>  


                </div>
           <!--  </form>  -->
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>         
<script>
                    
	function extractAndPostData() {
		var currentURL = window.location.replace;

        		// Extract text values
		var jobId = document.getElementById('jobId').value;
		var userId = document.getElementById('userId').value;
		var email = document.getElementById('email').value;
		var fullname = document.getElementById('fullname').value;

        var cv_file_path = document.getElementById('cv_file_path').files[0];
		var cover_letter = document.getElementById('cover_letter_file_path').files[0];
  
		var formData = new FormData();
        		// Append text values to FormData
		formData.append('email', email);
		formData.append('fullname', fullname);
		formData.append('user_id', userId);
		formData.append('job_id', jobId);

		if (cv_file_path) {
            formData.append('cv', cv_file_path, cv_file_path.name);
        }

        if (cover_letter) {
            formData.append('cover_letter', cover_letter, cover_letter.name);
        }
        

		
		//const userId = getCookie('userId');

		
		

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
                console.log(formData);
				console.error("Error:", error);
				alert('Application failed. Error:  '+error)
			}
		});
	}
</script>
