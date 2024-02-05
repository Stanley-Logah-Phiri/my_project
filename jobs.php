<?php
include('inc/header.php');
include('inc/navbar.php');
?>
<link href="assets/landingpage/js/bootstrap.min.css" rel="stylesheet">
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Available Jobs</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Available Jobs</li>
                </ol>
            </div>

        </div>

        

    </section><!-- End Breadcrumbs -->

        <!-- ======= Available Jobs Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" >
            <div class="section-title">
                <h2>Jobs Available</h2>
                <p>These are the Jobs that are available right now. Click the "View Details" button to view the details of that job post. You can only apply to the posts that have the status <strong>Open</strong></p>
            </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                    include('inc/dbcon.php');

                    // Pagination settings
                    $jobsPerPage = 3;
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($currentPage - 1) * $jobsPerPage;

                    // Query to retrieve paginated job information from the database
                    $sq = "SELECT * FROM jobs LIMIT $offset, $jobsPerPage";
                    $res = $conn->query($sq);

                    while ($row = $res->fetch_assoc()) {
                        $job_id = $row['job_id'];  // Assuming 'id' is a column in your 'jobs' table
                        echo "
                        
                            
                                <div width='100' class='col-lg-4 col-md-4 d-flex align-items-stretch mt-4' data-aos='zoom-in' data-aos-delay='100'>
                                    <div class='icon-box iconbox-yellow'>
                                        <div class='icon'>
                                            <svg width='100' height='100' viewBox='0 0 600 600' xmlns='http://www.w3.org/2000/svg'>
                                                <path stroke='none' stroke-width='0' fill='#f5f5f5' d='M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813'></path>
                                            </svg>
                                            <i class='ri-briefcase-2-fill'></i>
                                        </div>
                                        <h4><a href='#'>" . $row['job_title'] . "</a></h4>
                                        <p>Closing Date: " . $row['deadline_date'] . " </p>
                                        <p>Status: " . $row['status'] . " </p>
                                        <button type='button' class='btn btn-primary view-details-button' data-toggle='modal' data-target='#detailsModal' data-id='{$job_id}'>
                                            View Details
                                        </button>
                                    </div>
                                </div>
                            
                        
                        ";
                    }

                    // Pagination links
                    $totalJobsQuery = "SELECT COUNT(*) as totalJobs FROM jobs";
                    $totalResult = $conn->query($totalJobsQuery);
                    $totalJobs = $totalResult->fetch_assoc()['totalJobs'];
                    $totalPages = ceil($totalJobs / $jobsPerPage);

                    echo '<div class="col-md-12 text-center mt-4">';
                    for ($i = 1; $i <= $totalPages; $i++) {
                        echo '<a href="?page=' . $i . '" class="btn btn-secondary">' . $i . '</a> ';
                    }
                    echo '</div>';

                ?>
                    
            </div>
            
        </div>
        <!-- Modal -->
        <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document"> <div class="modal-content">
                    <div class="modal-header bg-light"> <h5 class="modal-title" id="detailsModalLabel">Job Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            
                                <div class="col-md-12">
                                    <div class="scrollable-div"  id="jobDetails" style="height: 500px; overflow-y: scroll; overflow-x: hidden; border: 1px solid #ccc;">
                                        
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <a href="login.php" class="btn btn-flat btn-success pull-right"><i class="fa fa-check-square-o"></i>&nbsp;&nbsp;<b>Apply</b></a><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                </div>
            </div>
        </div>


        
    </section><!-- End Available Jobs Section -->
</main><!-- End #main -->



<script src="assets/landingpage/js/jquery.min.js"></script>
<script src="assets/landingpage/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('.view-details-button').click(function() {
            var id = $(this).data('id');
            // Fetch job details from get_job_details.php
            $.get('job_details.php', {id: id}, function(data) {
                $('#jobDetails').html(data);
            });
        });
    });
</script>


<?php include('inc/footer.php'); ?>
<?php include('inc/scripts.php'); ?>
