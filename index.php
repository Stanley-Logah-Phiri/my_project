
<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>


	<!-- ======= Hero Section ======= -->
	<section id="hero" >
		<div id="heroCarousel"  data-bs-interval="3000" class="carousel slide carousel-fade" data-bs-ride="carousel">

			<div class="carousel-inner" role="listbox">

				<!-- Slide 1 -->
				<div class="carousel-item active" style="background-image: url(assets/landingpage/img/hero-bg.jpg);">
					<div class="carousel-container">
						<div class="carousel-content animate__animated animate__fadeInUp">
						<h2>Welcome to <span>Tnm Recruitment</span></h2>
						<p>
						Telekom Networks Malawi (TNM) PLC, Company number 4029 was the pioneer mobile network in Malawi and it is listed on the Malawi stock exchange. TNM is wholly Malawian owned with the following shareholders; Press Corporation Limited 41.31%, Old Mutual Life Assurance Company (Mw) Limited 24.07%, Magni Holdings Limited 5.01%, NICO Life Insurance Company Limited 4.88%, Livingstone Holdings Ltd 1.87%, Magetsi Pension Fund 1.488%, Unilogy Holdings Limited 1.26%, Investment Alliance Limited, 1.034% among the top ten shareholders TNM is listed on the Malawi stock exchange and its strength comes from being the first local mobile operator
						</p>
						<div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
						</div>
					</div>
				</div>

				<!-- Slide 2 -->
				<div class="carousel-item" style="background-image: url(assets/landingpage/img/about1.jpg);">
				<div class="carousel-container">
					<div class="carousel-content animate__animated animate__fadeInUp">
					<h2>TNM Recruitment Portal</h2>
					<p>Embark on your career journey with us! Explore a curated list of job opportunities within TNM. Create a personalized profile, showcase your skills and experience, and let your career aspirations align with our exciting openings..</p>
					<div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
					</div>
				</div>
				</div>

				<!-- Slide 3 -->
				<div class="carousel-item" style="background-image: url(assets/landingpage/img/slide.jpg);">
				<div class="carousel-container">
					<div class="carousel-content animate__animated animate__fadeInUp">
					<h2>TNM Recruitment Portalt</h2>
					<p>We are excited to introduce you to our bespoke Recruitment Portal, an exclusive gateway tailored just for [Your Company]. This platform is your go-to destination for all your recruitment needs, offering a seamless experience for both job seekers and hiring managers..</p>
					<div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
					</div>
				</div>
				</div>

			</div>

			<a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
				<span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
			</a>

			<a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
				<span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
			</a>

			<ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

		</div>
	</section><!-- End Hero -->

	<main id="main">

		<!-- ======= About Us Section ======= -->
		<section id="about-us" class="about-us">
			<div class="container" data-aos="fade-up">

			
			<div class="row">
          <div class="justify-content-center col-lg-6 order-1 order-lg-2 aos-init aos-animate" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/landingpage/img/about1.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>TNM recruitment portal</h3>
            <p class="fst-italic">
              TNM recruitment portal is a platform provided by TNM-Malawi <br>
              to enable the applicatio of job vacancies available in the company digitally.<br>
              This portal provides a recruitment process that is fair to all candidates.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> We recognise talent and provide opportunity. </li>
              <li><i class="bi bi-check-circle"></i> We recognise talent and provide opportunity. </li>
              <li><i class="bi bi-check-circle"></i> We recognise talent and provide opportunity.</li>
            </ul>
            <p>
            We recognise talent and provide opportunity.We recognise talent and provide opportunity.We recognise talent and provide opportunity.We recognise talent and provide opportunity.
            </p>

          </div>
        </div>
			</div>
		</section><!-- End About Us Section -->

			<!-- Available Jobs Section -->
			<section id="features" class="features section-bg">
				<div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2 style="font-size: 2rem; font-weight: 700;">Available Jobs</h2>
            <p>THESE ARE THE JOBS THAT HAVE BEEN POSTED.</p>
        </div>

        <div class="row">
            <?php
            include("inc/dbcon.php");

            // Pagination settings
            $jobsPerPage = 4;
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($currentPage - 1) * $jobsPerPage;

            // Query to retrieve paginated job information from the database
            $jobsQuery = "SELECT job_title, status, deadline_date FROM jobs LIMIT $offset, $jobsPerPage";
            $result = $conn->query($jobsQuery);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="card" style="width: 75%; border: 1px solid #ddd; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                            <div class="card-body" style="padding: 20px; text-align: center;">
                                <i class="ri-briefcase-2-fill" style="color: #ffbb2c; font-size: 24px; margin-bottom: 10px;"></i>
                                <h3 class="job-title" style="font-size: 1.2rem;"><?php echo $row['job_title']; ?></h3>
                                <p>Status: <?php echo $row['status']; ?></p>
                                <p>Deadline: <?php echo $row['deadline_date']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }

                // Pagination links
                $totalJobsQuery = "SELECT COUNT(*) as totalJobs FROM jobs";
                $totalResult = $conn->query($totalJobsQuery);
                $totalJobs = $totalResult->fetch_assoc()['totalJobs'];
                $totalPages = ceil($totalJobs / $jobsPerPage);

                echo '<div class="col-12 text-center mt-4">';
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<a href="?page=' . $i . '" class="btn btn-secondary">' . $i . '</a> ';
                }
                echo '</div>';
            } else {
                echo '<div class="col-12 text-center">No jobs available.</div>';
            }

            $conn->close();
            ?>
        </div>
    </div>
</section>
<!-- End Available Jobs Section -->




		

	</main><!-- End #main -->

<?php include('inc/footer.php'); ?>
<?php include('inc/scripts.php'); ?>
