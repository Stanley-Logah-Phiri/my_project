<?php include('inc/dbcon.php');?>
<?php

// Function to sanitize output
function sanitizeOutput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

session_start();
$userId = $_SESSION['user_id']; 

$sql = "SELECT * FROM user_portfolio WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();?>

       <!--  <div class="col-md-12">
            <div class="box-tools pull-right">
                <a class='btn btn-primary' href='#edit_portfolio_".$user["user_id"]."' data-toggle='modal'><i class='fa fa-eye'></i><span>Edit Portfolio</span></a>
            </div>
                
        </div>
 -->
    <div class="col-md-12 no-padding">
        <div class="box box-solid no-padding">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="uploads/<?php echo $user['profile_picture']; ?>" alt="User profile picture" style="width: 150px; height: 150px;">

                <h3 class="profile-username text-center"><?php echo $name?></h3>

                <p class="text-muted text-center"><?php echo $profe?></p>


                
            </div>
        
        </div>
    </div>
    <div class = "col-md-4">
        <div class="box box-solid no-border">
            <div class="box-header no-border">
                <strong><h4 class="box-title"><b>About Me</b></h4></strong><hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-border">
                <p><strong>Full Name:</strong> <?php echo $row['full_name']; ?></p>
                <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
                <p><strong>Phone Number:</strong> <?php echo $row['phone_number']; ?></p>
                <p><strong>Email:</strong> <?php echo $row['email']; ?></p><br/>
               
                <strong><h4 class="box-title"><b>Skills</b></h4></strong><hr>
                <?php
                // Your comma-separated string
                $csvString = $row['skills'];

                // Explode the string into an array
                $values = explode(',', $csvString);

                // Check if there are values in the array
                if (!empty($values)) {
                    // Print the bullet list
                    echo '<ul>';
                    foreach ($values as $value) {
                        echo '<li>' . $value . '</li>';
                    }
                    echo '</ul>';
                } else {
                    // Handle the case where the array is empty
                    echo 'No values found.';
                }
                ?>
                <br/>

                <strong><h4 class="box-title"><b>Links to projects</b></h4></strong><hr>

                <?php
                  
                    $csvString = $row['project_links'];

                    // Explode the string into an array
                    $values = explode('\n', $csvString);

                    // Check if there are values in the array
                    if (!empty($values)) {
                        // Print the bullet list
                        echo '<ul>';
                        foreach ($values as $value) {
                            $value = nl2br($value);
                            echo '<li><a target="_blank">' . $value . '</a></li>';
                        }
                        echo '</ul>';
                    } else {
                        // Handle the case where the array is empty
                        echo 'No values found.';
                    }
                ?>
                
                </p><br/>

                
            </div>
            <!-- /.box-body -->
            <div class="box box-solid no-border">
            <div class="box-header no-border">
                    <strong><h2 class="box-title"><b>Education Background</b></h2></strong><hr>
                </div>
                    <!-- <div class="box-body"> -->
                <div class="box-body no-border">
                    <div class="row">
                        <?php
                        
                        $degrees = explode(',', $row['degree']);
                        $institutions = explode(',', $row['institution']);
                        $graduationDates = explode(',', $row['graduation_date']);

                        
                        $numEntries = count($degrees);
                        ?>

                        <?php for ($i = 0; $i < $numEntries; $i++) { ?>
                            <div class="col-md-12">
                                <h5><strong>Qualification:</strong> <?php echo $degrees[$i]; ?></h5>
                                <h5><strong>Institution:</strong> <?php echo $institutions[$i]; ?></h5>
                                <h5><strong>Graduation date:</strong> <?php echo $graduationDates[$i]; ?></h5>
                               
                            </div>
                        <?php } ?>
                    </div>  
                </div>
            </div>
        </div>
    </div>

    <div class = "col-md-8">
        <div class="box box-solid no-border">
            <div class="box-header no-border">
                <strong><h4 class="box-title"><b>Work Experience</b></h4></strong><hr>
            </div>
                <!-- <div class="box-body"> -->
            <div class="box-body no-border">
                <?php
                  
                    $jobTitles = explode(',', $row['job_title']);
                    $companyNames = explode(',', $row['company_name']);
                    $employmentDates = explode(',', $row['employment_dates']);

                    $numEntries = count($jobTitles);
                ?>

                <div class="row">
                    <?php for ($i = 0; $i < $numEntries; $i++) { ?>
                        <div class="col-md-12">
                            <h5><strong>Postition:</strong> <br> <?php echo $jobTitles[$i]; ?></h5>
                            <h5><strong>Company</strong> <br><?php echo $companyNames[$i]; ?></h5>
                            <h5><strong>Period</strong> <br><?php echo $employmentDates[$i]; ?></h5>
                            
                        </div>
                    <?php } ?>
                    <div class="col-md-12"><strong><h4 class="box-title"><b>Certifications</b></h4></strong><hr></div>
                    <?php
                    
                    $certifications = explode(',', $row['certifications']);
                    $filePaths = explode(',', $row['certifications_file_path']);


                    $numEntries = count($certifications);
                    ?>

                    <?php for ($i = 0; $i < $numEntries; $i++) { ?>
                        <div class="col-md-12">
                            <h5><strong>Certification:</strong> <?php echo $certifications[$i]; ?></h5>
                            <h5><strong>File:</strong> <a href="<?php echo $filePaths[$i]; ?>" target="_blank"><?php echo "view certification"; ?></a></h5>
                            
                        </div>
                    <?php } ?>
                </div>
            </div>
            
        </div>
        
        
    </div>



<?php
}
?>