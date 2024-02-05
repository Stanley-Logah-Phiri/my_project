<header class="main-header">
	<!-- Logo -->
	<a href="index.php" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b></b></span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>Candidate</b></span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<a href="#" class="">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">


                
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
                    <?php //include('manage_users.php'); ?>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="uploads/<?php echo $user['profile_picture']; ?>" class="user-image" alt="User Image">
						<span class="hidden-xs"><?php echo $user['email'];?></span><span class="caret"></span>
						
						<span class="pull-right-container">
							<i class="fa fa-angle-bottom pull-right"></i>
						</span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<img src="uploads/<?php echo $user['profile_picture']; ?>" class="img-circle" alt="User Image">
							<p>
                            <?php echo $user['full_name'];?>
								<small>Member since <?php echo  date('M. Y', strtotime($user['date_created']));?></small>
							</p>
						</li>
						<!-- Menu Body -->
						<li class="user-body">
							<div class="row">
								
								<div class="col-xs-4 text-center">
									
								</div>
								<div class="col-xs-4 text-center">
									
								</div>
							</div>
							<!-- /.row -->
						</li>
						<!-- Menu Footer-->
                        <li class="user-footer">
							
							<div class="no-padding">
								<a href='#logout' data-toggle='modal' class="btn btn-success btn-block btn-flat"><b>Sign Out</b></a>
							</div>
						</li>
					</ul>
				</li>
				<!-- Control Sidebar Toggle Button -->
				
			</ul>
		</div>
	</nav>
</header> 
<?php include('inc/logout_modal.php');?>