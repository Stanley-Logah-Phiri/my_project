<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
			<img src="uploads/<?php echo $user['profile_picture']; ?>" class="img-circle" alt="User Image" style="height:50px; width: 50px;">
			</div>
			<div class="pull-left info">
			<p> <?php echo $user['full_name'];?></p>
			<a href="index.php"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
				<li class="header">DASHBOARD</li>
				<li>
					<a href="index.php">
						<i class="fa fa-dashboard"></i> <span>Dashboard</span>
					</a>
				</li>
				<li class="header">MAIN NAVIGATION</li>
				<li>
					<a href="manage_users.php">
						<i class="fa fa-group"></i> <span>Portfolios</span>
					</a>
				</li>
                <li>
					<a href="manage_jobs.php">
						<i class="fa fa-balance-scale"></i> <span>Job Posts</span>
					</a>
				</li>
				
				<li class="treeview">
					<a href="#">
						<i class="fa fa-newspaper-o"></i>
						<span>Manage Application</span>
						<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="manage_applications.php"><i class="fa fa-circle-o"></i>Applications</a></li>
						<li><a href="manage_shortlisting.php"><i class="fa fa-circle-o"></i>Shortlisting</a></li>
					</ul>
				</li>
				
				<li class="treeview">
					<a href="#">
						<i class="fa fa-newspaper-o"></i>
						<span>Manage Interviews</span>
						<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="#"><i class="fa fa-circle-o"></i>Add Panel</a></li>
						<li><a href="#"><i class="fa fa-circle-o"></i>Schedule Interviews</a></li>
						<li><a href="#"><i class="fa fa-circle-o"></i>Conduct INterviews</a></li>

					</ul>
				</li>
				
				<li class="treeview">
					<a href="#">
						<i class="fa fa-newspaper-o"></i>
						<span>Onboarding</span>
						<span class="pull-right-container">
						</span>
					</a>
				</li>
				<li>
					<a href="manage_profile.php">
						<i class="fa fa-user"></i> <span>Profile</span>
					</a>
				</li>

			
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>