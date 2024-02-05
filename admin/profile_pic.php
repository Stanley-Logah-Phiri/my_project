<form method="POST" action="manage_profile.php" enctype="multipart/form-data">

	<div class="form-group">
		<label for="profilep">Update profile picture</label>
		<input type="file" name="profilep" id="profilep" class="form-control" accept = ".jpg, .png, .jpeg">
	</div>
	<button type="submit" name="profilep_pic" class="btn btn-success pull-right"><span class="glyphicon glyphicon-check"></span> Update</button>
</form>


<?php
	include('dbcon.php');



 
if (isset($_POST['profilep_pic']) == 'POST') {
    $filename = $_FILES["profilep"]["name"];
    $tempname = $_FILES["profilep"]["tmp_name"];  
	
    $folder = "uploads/".$filename;  

    
    $conn->query("UPDATE users SET profile_picture ='$filename' WHERE user_id = '$user_id'"); //where condition is the session_id for a particular user 
     if (move_uploaded_file($tempname, $folder)) {

        $msg = "Profile Picture updated successfully";

    }else{

        $msg = "Failed to update profile Picture";
    }
}
?>
