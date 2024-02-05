<form method="POST" action="manage_profile.php" enctype="multipart/form-data">

	<div class="form-group">
		<label for="profilep">Update profile picture</label>
		<input type="file" name="profilep" id="profilep" class="form-control" accept = ".jpg, .png, .jpeg">
	</div>
	<button type="submit" name="profilep_pic" class="btn btn-success pull-right"><span class="glyphicon glyphicon-check"></span> Update</button>
</form>


<?php
	include('dbcon.php');

	/* if (isset($_POST['profilep'])) {

		if (isset($_FILES['profilep']) && $_FILES['profilep']['error'] === UPLOAD_ERR_OK) {

			$uploadDir = 'uploads/';
	

			if (!is_dir($uploadDir)) {
				mkdir($uploadDir, 0755, true);
			}
	
	
			$uniqueFilename = uniqid('profile_') . '_' . basename($_FILES['profilep']['name']);
			$uploadPath = $uploadDir . $uniqueFilename;

			if (move_uploaded_file($_FILES['profilep']['tmp_name'], $uploadPath)) {
	
				$newFilePath = $uploadPath; 

				$updateQuery = "UPDATE users SET profile_picture = '$newFilePath' WHERE user_id = '$user_id'";
	

				if ($mysqli->query($updateQuery)) {
					echo '<script>alert("Profile picture updated successfully");</script>';
				} else {
					echo '<script>alert("Error updating the profile picture in the database");</script>';
				}
			} else {
	
				echo '<script>alert("Error uploading the profile picture");</script>';
			}
		} else {

			echo '<script>alert("Please select a valid profile picture");</script>';
		}
	}
 */

 
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
