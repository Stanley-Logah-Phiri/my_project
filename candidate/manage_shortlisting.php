<?php include('../inc/header.php'); ?>
<?php include('../inc/navbar.php'); ?>
<?php include('../inc/sidebar.php'); ?>


	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				MANAGE USERS
				<small><?php //print_r($_POST);?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="manage_users.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Manage Users</li>
			</ol>
			<hr style="border-color: green;"/>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					
				</div>
			</div><br/>
			<!--<hr style="border-color: green;"/> -->
			<!-- Main row -->
			<div class="row">
				<div class="col-md-3">
					<form role="form" method="POST" action="" enctype="multipart/form-data">
						<!--box -->
						<div class="box box-success no-padding pull-left">
							
							<div class="box-header with-border">
								
								<h2 class="box-title pull-left"><b>NEW USER</b></h2>
								<div class="row">
									<div class="col-md-12">
										
									</div>
								</div>
							</div>
							<!-- /.box-header -->
							
							<div class="box-body">  
								<div class="form-group">
									<label for="exampleInputPassword1">Title</label>
									<select class="form-control select2" name="" required>
										<option selected="selected" disabled>Select Title</option>
										<option >Mr</option>
										<option >Miss</option>
										<option >Mrs</option>
										<option >Dr</option>
										<option >Prof</option>
																							
									</select>
								</div>     
								<div class="form-group">
									<label for="exampleInputPassword1">First Name</label>
									<input type="text" class="form-control" name="" placeholder="Enter First Name" required>  
								</div> 
								<div class="form-group">
									<label for="exampleInputPassword1">Middle Name</label>
									<input type="text" class="form-control" name="" placeholder="Enter First Name" required>  
								</div>         
								<div class="form-group">
									<label for="exampleInputPassword1">Last Name</label>
									<input type="text" class="form-control" name="" placeholder="Enter First Name" required>  
								</div>                       
								<div class="form-group">
									<label for="exampleInputPassword1">Email</label>
									<input type="text" class="form-control" name="" placeholder="Enter First Name" required>  
								</div>    
								<div class="form-group">
									<label for="exampleInputPassword1">Contact</label>
									<input type="text" class="form-control" name="" placeholder="Enter First Name" required>  
								</div>                                                    
								
								
							
								<!-- /.form-group -->               
							</div>
							<!-- /.box-body -->

							<div class="box-footer">                            
								<button type="submit" class="btn btn-flat btn-success pull-right" name=""><i class="fa fa-plus"></i>&nbsp;&nbsp;<b>ADD</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>                                           
								<button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>  
							</div>
						
						</div>
						<!-- /.box -->
					</form>
				</div>
				<div class="col-md-9">
					<div class="box box-success">
						<div class="box-header with-border">
										
							<h2 class="box-title pull-left"><b>LIST OF USERS</b></h2>
							
							<div class="box-tools pull-right">
								<a data-target="#import_users" data-toggle="modal" class="btn btn-flat btn-success pull-right"><i class="fa fa-upload"></i><span>&nbsp;<b>UPLOAD</b></span></a><br/>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">

							<div class="row">
								<div class="col-md-12">
									
								
								
								</div>
								
								<div class="col-lg-12 col-md-12"><br>
									<table  id="example1"  class="table table-hover table-striped table-bordered table-responsive">
										<thead>
											<tr>
												<th style="width:2px;">No.</th>
												<th>Code</th>
												<th>Username</th>
												<th>Name</th>
												<th>Email</th>
												<th>Status</th>
												<th>Action</th>
											</tr>                                                             
										</thead>
										<tbody>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- /.row (main row) -->

		</section>
		<!-- /.content -->

	</div>

<?php include('../inc/user_modal.php');?>

<?php include('../inc/footer.php'); ?>
<?php include('../inc/scripts.php'); ?>