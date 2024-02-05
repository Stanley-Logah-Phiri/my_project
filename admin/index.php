<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<?php include('inc/sidebar.php'); ?>
<?php      
     if(isset($_GET['job_id'])){
       $job_id = $_GET['job_id'];
     }

?> 
<!-- Select2 -->
<link rel="stylesheet" href="../assets/bower_components/select2/dist/css/select2.min.css">	
<style type="text/css">
	.mt20{
		margin-top:20px;
	}
	.bold{
		font-weight:bold;
	}

	/* chart style*/
	#legend ul {
		list-style: none;
	}

	#legend ul li {
		display: inline;
		padding-left: 30px;
		position: relative;
		margin-bottom: 4px;
		border-radius: 5px;
		padding: 2px 8px 2px 28px;
		font-size: 14px;
		cursor: default;
		-webkit-transition: background-color 200ms ease-in-out;
		-moz-transition: background-color 200ms ease-in-out;
		-o-transition: background-color 200ms ease-in-out;
		transition: background-color 200ms ease-in-out;
	}

	#legend li span {
		display: block;
		position: absolute;
		left: 0;
		top: 0;
		width: 20px;
		height: 100%;
		border-radius: 5px;
	}
</style>
<style type="text/css">
	.mt200{
		margin-top:20px;
	}
	.bold{
		font-weight:bold;
	}

	/* chart style*/
	#legends ul {
		list-style: none;
	}

	#legends ul li {
		display: inline;
		padding-left: 30px;
		position: relative;
		margin-bottom: 4px;
		border-radius: 5px;
		padding: 2px 8px 2px 28px;
		font-size: 14px;
		cursor: default;
		-webkit-transition: background-color 200ms ease-in-out;
		-moz-transition: background-color 200ms ease-in-out;
		-o-transition: background-color 200ms ease-in-out;
		transition: background-color 200ms ease-in-out;
	}

	#legends li span {
		display: block;
		position: absolute;
		left: 0;
		top: 0;
		width: 20px;
		height: 100%;
		border-radius: 5px;
	}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">

				<?php
					include("inc/dbcon.php");
					// Query to count the number of users Registered
					$countQuery = "SELECT * FROM jobs";
					$result = $conn->query($countQuery);						
				?>
				<h3><?php echo $result->num_rows; ?></h3>

				<p>JOB POSTS</p>
				</div>
				<div class="icon">
				<i class="ion ion-briefcase"></i>
				</div>
				<a href="manage_jobs.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
				<?php
					include("inc/dbcon.php");
					// Query to count the number of users Registered
					$countQuery = "SELECT * FROM users";
					$result = $conn->query($countQuery);						
				?>
				<h3><?php echo $result->num_rows; ?></h3>

				<p>Users</p>
				</div>
				<div class="icon">
				<i class="ion ion-person"></i>
				</div>
				<a href="manage_users.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
				<?php
					include("inc/dbcon.php");
					// Query to count the number of job applications
					$countQuery = "SELECT * FROM job_applications";
					$result = $conn->query($countQuery);						
				?>
				<h3><?php echo $result->num_rows; ?></h3>

				<p>job applications</p>
				</div>
				<div class="icon">
				<i class="ion ion-document-text"></i>
				</div>
				<a href="manage_applications.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
				<?php
					include("inc/dbcon.php");
					// Query to count the number of users portfolio
					$countQueryw = "SELECT * FROM user_portfolio";
					$resultw = $conn->query($countQueryw);						
				?>
				<h3><?php echo $resultw->num_rows; ?></h3>

				<p>User portfolios</p>
				</div>
				<div class="icon">
				<i class="ion ion-person"></i>
				</div>
				<a href="manage_users.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<!-- Main row -->
		<div class="row">
			<!-- Left col -->
			<section class="col-md-12 connectedSortable">
				<!-- quick email widget -->
				<div class="col-md-4">
					<div class="box box-success">
						<div class="box-header">
						<i class="fa fa-briefcase"></i>

						<h3 class="box-title">JOB POST REPORTS</h3>
						<!-- tools box -->
						<div class="pull-right box-tools">
							
						</div>
						<!-- /. tools -->
						</div>
						<div class="box-body">
						<div class="col-md-12">
								<div class="chart bordered">
									<br>
									<div id="legends" class="text-center"></div>
									<canvas id="pieChart" style="height: 200px;width: 300px;"></canvas>
								</div>
							</div>
						</div>
						
					</div>

				
				</div>
				<div class="col-md-8">
					<!-- quick email widget -->
					<div class="box box-success">
						<div class="box-header">
						<i class="fa fa-briefcase"></i>

						<h3 class="box-title">JOB APPLICATION REPORTS</h3>
						<!-- tools box -->
						<div class="pull-right box-tools">
							
							<form class="form-inline">

									<div class="form-group">
										
										<select class="form-control select2" id="select_job" required>
											<option selected="selected" disabled>Select Job Title</option>
											<?php
												// Add your database connection code here
												include('../inc/dbcon.php');

												// Fetch distinct job titles from the jobs table
												$jobTitlesQuery = "SELECT * FROM jobs";
												$jobTitlesResult = $conn->query($jobTitlesQuery);

												if ($jobTitlesResult->num_rows > 0) {
													while ($rowss = $jobTitlesResult->fetch_assoc()) {
														echo "<option value='" . $rowss['job_id'] . "'>" . $rowss['job_title'] . "</option>";

													}
												} else {
													echo "<option value=''>No job titles found</option>";
												}
												?>
										</select>
										
									</div>
							</form>
						</div>
						<!-- /. tools -->
						</div>
						<div class="box-body">
							
							<div class="col-md-12">
								<div class="chart bordered">
									<br>
									<div id="legend" class="text-center"></div>
									<canvas id="barChart" style="height:350px"></canvas>
								</div>
							</div>
						</div>
							
					</div>
		
				</div>



				
				

			</section>

			
		</div>
		

	</section>
	<?php  //echo $_SERVER['PHP_SELF'];?>
	
</div>
<!-- /.content-wrapper -->
<?php
	
	$jobs = array();
	$jobs_count = array();
	$jobs_counts = array();
	$jobs_counting = array();
	$jobs_counting1 = array();


	$sql = "SELECT * FROM jobs  WHERE job_id = '$job_id'";
	$rquery_jobs = $conn->query($sql);

	$user_active = array();
	$user_deactive = array();

	while ($row = $rquery_jobs->fetch_assoc()) {
		$job_id = $row['job_id'];

		$sql_applications = "SELECT * FROM job_applications WHERE job_id = '$job_id' AND status = 'pending'";
		$rquery_applications = $conn->query($sql_applications);
		array_push($jobs_count, $rquery_applications->num_rows);


		$sql_applicationsshortlisted = "SELECT * FROM job_applications WHERE job_id = '$job_id' AND status = 'shortlisted'";
		$rquery_applicationsshortlisted = $conn->query($sql_applicationsshortlisted);
		array_push($jobs_counts, $rquery_applicationsshortlisted->num_rows);



		$sql_recommended = "SELECT * FROM job_applications WHERE job_id = '$job_id' AND recommendation = 'recommended'";
		$rquery_recommended = $conn->query($sql_recommended);
		array_push($jobs_counting, $rquery_recommended->num_rows);


		$sql_notrecommended = "SELECT * FROM job_applications WHERE job_id = '$job_id' AND recommendation = 'not recommended'";
		$rquery_notrecommended = $conn->query($sql_notrecommended);
		array_push($jobs_counting1, $rquery_notrecommended->num_rows);



		

		$sql_job = "SELECT * FROM jobs WHERE job_id = '$job_id'";
		$rquery_job = $conn->query($sql_job);

		$rr = $rquery_job->fetch_assoc();
		$job = $rr['job_title'];
		array_push($jobs, $job);
	}

	$jobs = json_encode($jobs);
	$jobs_count = json_encode($jobs_count);
	$jobs_counts = json_encode($jobs_counts);


	$jobs_counting = json_encode($jobs_counting);
	$jobs_counting1 = json_encode($jobs_counting1);




   

  	$sql="SELECT * FROM jobs WHERE status = 'closed'";
	$query=$conn->query($sql);
	$samsung = $query->num_rows;

	//for Apple
	$sql="SELECT * FROM jobs WHERE status = 'cancelled'";
	$aquery=$conn->query($sql);
	$apple = $aquery->num_rows;

	//for Vivo
	$sql="SELECT * FROM jobs WHERE status = 'open'";
	$vquery=$conn->query($sql);
	$vivo = $vquery->num_rows;



?>



<?php include('inc/footer.php'); ?>


<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="../assets/bower_components/chart.js/Chart.js"></script>
<!-- FastClick -->
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Select2 -->
<script src="../assets/bower_components/select2/dist/js/select2.full.min.js"></script>
		<!-- InputMask -->
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../scrips.js"></script>
<!-- page script -->

<script>
    $(function(){
    $('#select_job').change(function(){
        window.location.href = 'index.php?job_id='+$(this).val();
    });
    });
</script>
<script>
  $(function () {
		

	var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
	var pieChart       = new Chart(pieChartCanvas)
	var PieData        = [
	  {
		value    :<?php echo $samsung;?>,
		color    : '#f56954',
		highlight: '#f56954',
		label    : 'Closed'
	  },
	  {
		value    : <?php echo $apple;?>,
		color    : '#00a65a',
		highlight: '#00a65a',
		label    : 'Cancelled'
	  },
	  {
		value    : <?php echo $vivo;?>,
		color    : '#f39c12',
		highlight: '#f39c12',
		label    : 'Open'
	  }
	  
	]
	var pieOptions     = {
	  //Boolean - Whether we should show a stroke on each segment
	  segmentShowStroke    : true,
	  //String - The colour of each segment stroke
	  segmentStrokeColor   : '#fff',
	  //Number - The width of each segment stroke
	  segmentStrokeWidth   : 2,
	  //Number - The percentage of the chart that we cut out of the middle
	  percentageInnerCutout: 0, // This is 0 for Pie charts
	  //Number - Amount of animation steps
	  animationSteps       : 100,
	  //String - Animation easing effect
	  animationEasing      : 'easeOutBounce',
	  //Boolean - Whether we animate the rotation of the Doughnut
	  animateRotate        : true,
	  //Boolean - Whether we animate scaling the Doughnut from the centre
	  animateScale         : false,
	  //Boolean - whether to make the chart responsive to window resizing
	  responsive           : true,
	  // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
	  maintainAspectRatio  : true,
	  //String - A legend template
	  legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legends"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
	}
	//Create pie or douhnut chart
	// You can switch between pie and douhnut using the method below.
	var myChart = pieChart.Pie(PieData, pieOptions)
	document.getElementById('legends').innerHTML = myChart.generateLegend();

	/* ChartJS
	 * -------
	 * Here we will create a few charts using ChartJS
	 */

	//--------------
	//- AREA CHART -
	//--------------

	// Get context with jQuery - using jQuery's .get() method.
	var barChartCanvas = $('#barChart').get(0).getContext('2d')
	// This will get the first returned node in the jQuery collection.
	var barChart       = new Chart(barChartCanvas)

	var barChartData = {
	  labels  : <?php echo $jobs;?>,
	  datasets: [
		{
		  label               : 'Pending',
		  fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
		  data                : <?php echo $jobs_count;?>
		},
		{
		  label               : 'Not Recommanded',
		  fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
		  data                : <?php echo $jobs_counting1;?>
		},
		{
		  label               : 'Recommanded',
		  fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
		  data                : <?php echo $jobs_counting;?>
		},
		{
		  label               : 'Shortlisted',
		  fillColor           : 'rgba(40, 214, 222, 1)',
          strokeColor         : 'rgba(40, 214, 222, 1)',
          pointColor          : 'rgba(40, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
		  data                : <?php echo $jobs_counts;?>
		},
	  ]
	}

	barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero        : true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines      : true,
        //String - Colour of the grid lines
        scaleGridLineColor      : 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth      : 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines  : true,
        //Boolean - If there is a stroke on each bar
        barShowStroke           : true,
        //Number - Pixel width of the bar stroke
        barStrokeWidth          : 1,
        //Number - Spacing between each of the X value sets
        barValueSpacing         : 5,
        //Number - Spacing between data sets within X values
        barDatasetSpacing       : 1,
        //String - A legend template
        legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to make the chart responsive
        responsive              : true,
        maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    var myChart = barChart.Bar(barChartData, barChartOptions)
    document.getElementById('legend').innerHTML = myChart.generateLegend();

	
	
	
  })
</script>

</body>
</html>

