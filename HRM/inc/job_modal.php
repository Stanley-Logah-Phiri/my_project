<!-- User Uploads -->

<div class="modal fade" id="import_jobs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" class="form-horizontal" action="inc/job_crud.php">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle-o"></i></button>
                    <center><h4 class="modal-title" id="myModalLabel">POST JOB VACANCY</h4></center>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">                         
                        <div class="form-group">
                            <label for="exampleInputPassword1">Title</label>
                            <input type="text" class="form-control" name="job_title" placeholder="Enter job title" required>
                            
                        </div>     
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea class="form-control" name="job_description" rows = "4" placeholder="Enter job description" required></textarea>  
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Responsibilities</label>
                            <textarea class="form-control" name="responsibilities" rows = "4" placeholder="Enter responsibilities" required></textarea> 
                        </div>         
                        <div class="form-group">
                            <label for="exampleInputPassword1">Qualifications</label>
                            <textarea class="form-control" name="qualifications" rows = "4" placeholder="Enter qualification" required></textarea>  
                        </div>                       
                        <div class="form-group">
                            <label for="date">Deadline</label>
                            <input type="date" class="form-control" name="deadline_date" class="form-control"> 
                        </div>   
							
                    </div> 
                </div>
                <div class="modal-footer">		                   
                    <button type="submit" name="user_upload" class="btn btn-flat btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;<b>POST JOB</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;<b>CANCEL</b></button>
                </div> 
            </form>
        </div>
    </div>
    
</div>

<!-- job deatails-->
<div class="modal fade" id="job_details_<?php echo $row['job_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">JOB DETAILS</h4></center>
            </div>
            <div class="modal-body">	
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                        <label for="exampleInputPassword1">Title</label>
                        </div> 
                        <div class="col-md-9">
                            <p class="" name="job_description" value="" disabled><?php echo $row['job_title']; ?></p>  
                        </div> 
    
                    </div> 
                </div>    
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="exampleInputPassword1">Description</label>
                        </div> 
                        <div class="col-md-9">
                            <p class="" name="job_description" value="" disabled><?php echo $row['job_description']; ?></p>  
                        </div> 
    
                    </div> 
                </div> 

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="exampleInputPassword1">Responsibilities</label>
                        </div> 
                        <div class="col-md-9">
                            <ul class="responsibilities-list">
                                <?php
                               
                                $responsibilitiesArray = explode('.', $row['responsibilities']);
                                foreach ($responsibilitiesArray as $responsibility) {
                                    echo '<li>' . trim($responsibility) . '</li>';
                                }
                                
                                ?>
                            </ul>
                        </div> 

                    </div> 
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                        <label for="exampleInputPassword1">Qualifications</label>
                        </div> 
                        <div class="col-md-9">
                            <!-- <p class="" name="job_description" value="" disabled><?php echo $row['qualifications']; ?></p>   -->
                            <ul class="qualifications-list">
                                <?php
                                
                                $qualificationsArray = explode('.', $row['qualifications']);
                                foreach ($qualificationsArray as $qualification) {
                                    echo '<li>' . trim($qualification) . '</li>';
                                }
                                
                                ?>
                            </ul>
                        </div> 
    
                    </div> 
                </div> 
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                        <label for="exampleInputPassword1">Deadline</label>
                        </div> 
                        <div class="col-md-9">
                            <p class="" name="job_description" value="" disabled><?php echo $row['deadline_date']; ?></p>  
                        </div> 
    
                    </div> 
                </div>       
            
			</div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-flat btn-default pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>Close</b></button>

            </div>

        </div>
    </div>
</div>


<!-- deactivate modal for job-->
<div class="modal fade" id="job_deactivate_<?php echo $row['job_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">CANCEL JOB</h4></center>
            </div>
            <div class="modal-body">    
                <form method="POST" class="form-horizontal" action="inc/job_crud.php">
                        
                        <div class="modal-body">
                            <div class="container-fluid">  
                                <input type="hidden" class="form-control" name="job_id" value="<?php echo $row['job_id']; ?>" required>                       
                                    <label for="exampleInputPassword1">Title</label>
                                    <p><?php echo $row['job_title']; ?></p>          
                            </div> 
                        </div>
                        <div class="modal-footer">		                   
                            <button type="submit" name="deactivate" class="btn btn-flat btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;<b>CANCEL</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;<b>CANCEL</b></button>
                        </div> 
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Activation Modal -->
<div class="modal fade" id="job_activate_<?php echo $row['job_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">REPOST JOB</h4></center>
            </div>
            <div class="modal-body">    
                <form method="POST" class="form-horizontal" action="inc/job_crud.php">
                        
                        <div class="modal-body">
                            <div class="container-fluid">  
                                <input type="hidden" class="form-control" name="job_id" value="<?php echo $row['job_id']; ?>" required>
      
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Title</label>
                                    <input type="text" class="form-control" name="job_title" value="<?php echo $row['job_title']; ?>" required>     
                            </div>  
                            <div class="form-group">
                                <label for="date">Deadline</label>
                                <input type="date" class="form-control" name="dead_line" value="<?php echo $row['deadline_date']; ?>" class="form-control"> 
                            </div> 
                        </div>
                        <div class="modal-footer">		                   
                            <button type="submit" name="activate" class="btn btn-flat btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;<b>REPOST</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;<b>CANCEL</b></button>
                        </div> 
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="job_edit_<?php echo $row['job_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle-o"></i></button>
                        <center><h4 class="modal-title" id="myModalLabel">EDIT JOB VACANCY</h4></center>
                    </div>
            <div class="modal-body">
        
                <form method="POST" class="form-horizontal" action="inc/job_crud.php">
                    
                    <div class="modal-body">
                        <div class="container-fluid">  
                            <input type="hidden" class="form-control" name="job_id" value="<?php echo $row['job_id']; ?>" required>                       
                            <div class="form-group">
                                <label for="exampleInputPassword1">Title</label>
                                <input type="text" class="form-control" name="job_title" value="<?php echo $row['job_title']; ?>" required>
                                
                            </div>     
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea class="form-control"  name="job_description" style="height:fit-content;" rows= "5"  required><?php echo $row['job_description']; ?></textarea>  
                            </div> 
                            <div class="form-group">
                                <label for="exampleInputPassword1">Responsibilities</label>
                                <textarea class="form-control" name="responsibilities" rows= "5"   required><?php echo $row['responsibilities']; ?></textarea> 
                            </div>         
                            <div class="form-group">
                                <label for="exampleInputPassword1">Qualifications</label>
                                <textarea class="form-control" name="qualifications" rows= "5" required><?php echo $row['qualifications']; ?></textarea>  
                            </div>                       

                                
                        </div> 
                    </div>
                    <div class="modal-footer">		                   
                        <button type="submit" name="user_upload" class="btn btn-flat btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;<b>EDIT JOB</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;<b>CANCEL</b></button>
                    </div> 
                </form>	
            	
			</div>

        </div>
    </div>
</div>
        


