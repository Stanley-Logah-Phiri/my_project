<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<?php include('inc/sidebar.php'); ?>


<?php include('inc/dbcon.php'); 
session_start();

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

if ($result) {
	$userDetails = mysqli_fetch_assoc($result);
	$profile = isset($userDetails['profile_picture']) ? $userDetails['profile_picture'] : '';
	$name = isset($userDetails['full_name']) ? $userDetails['full_name'] : '';
	$email = isset($userDetails['email']) ? $userDetails['email'] : '';
} else {
	
	$profile = '';
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">User profile</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="../assets/landingpage/img/profilePics/profile1.jpg<?php //echo $profile; ?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?php echo $name?></h3>

            <p class="text-muted text-center">Software Engineer</p>

            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">About Me</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

            <p class="text-muted">
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

            <p class="text-muted">Malibu, California</p>

            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

            <p>
              <span class="label label-danger">UI Design</span>
              <span class="label label-success">Coding</span>
              <span class="label label-info">Javascript</span>
              <span class="label label-warning">PHP</span>
              <span class="label label-primary">Node.js</span>
            </p>

            <hr>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#create_portfolio" data-toggle="tab">create_portfolio</a></li>
            <li><a href="#view_port" data-toggle="tab">view_port</a></li>
          </ul>
          <div class="tab-content">
          <div class="active tab-pane" id="create_portfolio">
    <div class="row">
        <div class="col-md-12">
            <form id="portfolioForm" method="post" action="" enctype="multipart/form-data">
              <div class="col-md-12">

                <progress id="form-progress" style="width: 100%;" max="100" value="<?php echo ($currentStep - 1) / 6 * 100; ?>"></progress>
              </div>
                  <!-- Step 1: Contact Information -->
                <div class="tab" id="step1">
                  <h3>Contact Information</h3>
                  <!-- Add your contact information fields here -->
                  <div class="form-group">
                    <label for="full_name">Full Name:</label>
                    <input type="text" class="form-control" id="full_name" name="FullName" required>
                  </div>
                  <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="Address" required>
                  </div>
                  <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="tel" class="form-control" id="phone_number" name="PhoNumber" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" class="form-control" id="email" name="Email" required>
                  </div>
                </div>

                <!-- Step 2: Education Background -->
                <div class="tab" id="step2">
                    <h3>Education Background</h3>
                    <!-- Add your education background fields here -->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="Degree">Degree:</label>
                        <input type="text" class="form-control" name="Education[Degree][]" required>
                      </div>
                      <div class="col-md-4">
                        <label for="institution">Institution:</label>
                        <input type="text" class="form-control" name="Education[Institution][]" required>
                      </div>
                      <div class="col-md-3">
                        <label for="graduation_date">Graduation Date:</label>
                        <input type="date" class="form-control" name="Education[GraduationDate][]" required>
                      </div>
                      <div class="col-md-1">
                        <button type="button" class="btn btn-success" onclick="addEntry('educationEntries')">Add</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Step 3: Experience -->
                <div class="tab" id="step3">
                    <h3>Experience</h3>
                    <!-- Add your experience fields here -->
                </div>

                <!-- Step 4: Skills -->
                <div class="tab" id="step4">
                    <h3>Skills</h3>
                    <!-- Add your skills fields here -->
                </div>

                <!-- Step 5: Certifications -->
                <div class="tab" id="step5">
                    <h3>Certifications</h3>
                    <!-- Add your certifications fields here -->
                </div>

                <!-- Step 6: Additional Documents -->
                <div class="tab" id="step6">
                    <h3>Additional Documents</h3>
                    <!-- Add your additional documents fields here -->
                </div>

                <!-- Navigation buttons -->
                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="prevTab()">Previous</button>
                        <button type="button" class= "btn btn-success" id="nextBtn" onclick="nextTab()">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var currentTab = 0;
    showTab(currentTab);

    function showTab(n) {
        var tabs = document.getElementsByClassName("tab");
        tabs[n].style.display = "block";

        if (n === 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }

        if (n === tabs.length - 1) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
    }

    function nextTab() {
        var tabs = document.getElementsByClassName("tab");

        if (currentTab < tabs.length - 1) {
            tabs[currentTab].style.display = "none";
            currentTab++;
            showTab(currentTab);
        } else {
            // Handle form submission or any other final steps
            document.getElementById("portfolioForm").submit();
        }
    }

    function prevTab() {
        var tabs = document.getElementsByClassName("tab");

        if (currentTab > 0) {
            tabs[currentTab].style.display = "none";
            currentTab--;
            showTab(currentTab);
        }
    }
</script>

            <!-- /.tab-pane -->
            <div class="tab-pane" id="view_port">
              <!-- The timeline -->
              <ul class="timeline timeline-inverse">
                <!-- timeline time label -->
                <li class="time-label">
                      <span class="bg-red">
                        10 Feb. 2014
                      </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-envelope bg-blue"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                    <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-primary btn-xs">Read more</a>
                      <a class="btn btn-danger btn-xs">Delete</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-user bg-aqua"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                    </h3>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-comments bg-yellow"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                    <div class="timeline-body">
                      Take me to your leader!
                      Switzerland is small and neutral!
                      We are more like Germany, ambitious and misunderstood!
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <li class="time-label">
                      <span class="bg-green">
                        3 Jan. 2014
                      </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-camera bg-purple"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                    <div class="timeline-body">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
            </div>
            <!-- /.tab-pane -->

          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>

<?php include('inc/footer.php'); ?>


<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="../assets/bower_components/chart.js/Chart.js"></script>
<!-- FastClick -->
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- page script -->




</body>
</html>
