    <?php


        // Function to sanitize output
        function sanitizeOutput($data) {
            return htmlspecialchars(stripslashes(trim($data)));
        }

        // Replace 'your_user_id' with the actual user ID
        $userId =  $row['user_id'];

        // Retrieve user portfolio data
        $sql1 = "SELECT * FROM user_portfolio WHERE user_id = $userId";
        $result = $conn->query($sql1);
        

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <div class="container mt-5">
                <h1 class="mb-4">User Portfolio</h1>

                <!-- Contact Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>Contact Information</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>Full Name:</strong> <?php echo sanitizeOutput($row['full_name']); ?></p>
                        <p><strong>Address:</strong> <?php echo sanitizeOutput($row['address']); ?></p>
                        <p><strong>Phone Number:</strong> <?php echo sanitizeOutput($row['phone_number']); ?></p>
                        <p><strong>Email:</strong> <?php echo sanitizeOutput($row['email']); ?></p>
                    </div>
                </div>

                <!-- Education Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>Education</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>Degree:</strong> <?php echo sanitizeOutput($row['degree']); ?></p>
                        <p><strong>Institution:</strong> <?php echo sanitizeOutput($row['institution']); ?></p>
                        <p><strong>Graduation Date:</strong> <?php echo sanitizeOutput($row['graduation_date']); ?></p>
                    </div>
                </div>

                <!-- Professional Experience Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>Professional Experience</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>Job Title:</strong> <?php echo sanitizeOutput($row['job_title']); ?></p>
                        <p><strong>Company Name:</strong> <?php echo sanitizeOutput($row['company_name']); ?></p>
                        <p><strong>Years Worked:</strong> <?php echo sanitizeOutput($row['employment_dates']); ?></p>
                    </div>
                </div>

                <!-- Skills Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>Skills</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>Skills:</strong> <?php echo sanitizeOutput($row['skills']); ?></p>
                    </div>
                </div>

                <!-- Certifications Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>Certifications</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>Certifications:</strong> <?php echo sanitizeOutput($row['certifications']); ?></p>
                        <?php if (!empty($row['certifications_file_path'])) { ?>
                            <p><strong>Certifications File:</strong> <a href="<?php echo $row['certifications_file_path']; ?>" target="_blank">View File</a></p>
                        <?php } ?>
                    </div>
                </div>

                <!-- Additional Documents Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>Additional Documents</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>CV Document:</strong> <a href="<?php echo $row['cv_document_path']; ?>" target="_blank">View CV Document</a></p>
                        <p><strong>Project Links:</strong> <?php echo sanitizeOutput($row['project_links']); ?></p>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "No portfolio data found for the user.";
        }

        
        ?>