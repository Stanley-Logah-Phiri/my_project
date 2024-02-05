<?php

        include('dbcon.php');
       
        // echo   $user = $row['user_id'];
         $user = $row['user_id'];
         $sq = "SELECT * FROM user_portfolio WHERE user_id = '$user'";
         $res = $conn->query($sq);
         if ($rows = $res->fetch_assoc()) {
            echo "
            <div class='form-group'>
            <div class='row'>
                <div class='col-md-3'>
                <label for='exampleInputPassword1'>Name:</label>
                </div> 
                <div class='col-md-9'>
                <p>".$rows['full_name']."</p>  
                </div> 

            </div>
            <div class='form-group'>
            <div class='row'>
                <div class='col-md-3'>
                <label for='address'>Physical address:</label>
                </div> 
                <div class='col-md-9'>
                <p>".$rows['address']."</p>  
                </div> 

            </div
            <div class='form-group'>
            <div class='row'>
                <div class='col-md-3'>
                <label for='phone_number'>Phone:</label>
                </div> 
                <div class='col-md-9'>
                <p>".$rows['phone_number']."</p>  
                </div> 

            </div>
            <div class='form-group'>
            <div class='row'>
                <div class='col-md-3'>
                <label for='email'>Email:</label>
                </div> 
                <div class='col-md-9'>
                <p>".$rows['email']."</p>  
                </div> 

            </div>

            <div class='form-group'>
            <div class='row'>
                <div class='col-md-3'>
                <label for='qualifications'>Qualifications:</label>
                </div> 
                <div class='col-md-9'>
                <p>".$rows['degree']."</p> 
                <p>".$rows['institution']."</p>
                </div> 

            </div>

            <div class='form-group'>
            <div class='row'>
                <div class='col-md-3'>
                <label for='exp'>Experience:</label>
                </div> 
                <div class='col-md-9'>
                <p>".$rows['job_title']."</p> 
                <p>".$rows['company_name']."</p>
                </div> 

            </div>
            <div class='form-group'>
            <div class='row'>
                <div class='col-md-3'>
                <label for='skills'>Skills:</label>
                </div> 
                <div class='col-md-9'>
                <p>".$rows['skills']."</p>  
                </div> 

            </div>
            <div class='form-group'>
            <div class='row'>
                <div class='col-md-3'>
                <label for='cert'>Certifications:</label>
                </div> 
                <div class='col-md-9'>
                <p>".$rows['certifications']."</p>  
                </div> 

            </div>
            <div class='form-group'>
            <div class='row'>
                <div class='col-md-3'>
                <label for='links'>Achievements:</label>
                </div> 
                <div class='col-md-9'>
                <p>".$rows['project_links']."</p>  
                </div> 

            </div>
            
            
            
            ";












             
         }else{
            echo "Unable to get user details";
        }
?>