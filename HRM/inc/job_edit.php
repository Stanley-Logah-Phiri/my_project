
           
<div class="modal fade" id="job_edit_<?php echo $row['job_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle-o"></i></button>
                        <center><h4 class="modal-title" id="myModalLabel">EDIT JOB VACANCY</h4></center>
                    </div>
            <div class="modal-body">
        
                <form method="POST" class="form-horizontal" action="inc/edit_job.php">
                    
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
               