        <!-- job deatails-->
<div class="modal fade" id="job_details_<?php echo $row['job_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">JOB DETAILS</h4></center>
            </div>
            <div class="modal-body">	
                <div class="">
                    <form method="POST" class="form-horizontal" action="">
                        <input type="hidden" class="form-control" name="job_id" value="<?php echo '$jobId'; ?>" required>
    
                        <div class="scrollable-div" style="height: 500px; overflow-y: scroll; overflow-x: hidden; border: 1px solid #ccc;">
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
                    </form>
                </div>  
                    
                
            </div>
            <div class="modal-footer">		
                
                <button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;<b>CANCEL</b></button>
                <?php include('apply_modal.php');?>
            </div> 

        </div>
    </div>
</div>


<!-- modal for deleting user portfolio-->
<div class="modal fade" id="portfolio_delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
            </div>
            <div class="modal-body">	
            	
			</div>
            <div class="modal-footer">
                <a href="delete_portfolio.php?id=<?php echo $row['id']; ?>" class="btn btn-flat btn-success pull-right"><i class="fa fa-check"></i>&nbsp;&nbsp;<b>Delete</b></a><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <button type="button" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>

            </div>

        </div>
    </div>
</div>

<!-- modal for updating portfolio-->
<div class="modal fade" id="application_edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
            </div>
            <div class="modal-body">	
                    
			</div>
            <div class="modal-footer">

                <a href="edit_portfolio.php?id=<?php echo $row['id']; ?>" class="btn btn-flat btn-success pull-right"><i class="fa fa-check-square-o"></i>&nbsp;&nbsp;<b>Edit</b></a><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
           
			              
                <button type="button" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>

            </div>

        </div>
    </div>
</div>







 <!-- MODAL FOR application--> 




