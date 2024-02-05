<div class="modal fade" id="job_extend_<?php echo $row['job_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">EXTEND DEADLINE</h4></center>
            </div>
            <div class="modal-body">    
                <form method="POST" class="form-horizontal" action="inc/job_crud.php">
                        
                        <div class="modal-body">
                            <div class="container-fluid">  
                                <input type="hidden" class="form-control" name="job_id" value="<?php echo $row['job_id']; ?>" required>
      
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Title</label>
                                    <p><?php echo $row['job_title']; ?></p>     
                            </div>  
                            <div class="form-group">
                                <label for="date">Deadline</label>
                                <input type="date" class="form-control" name="dead_line" value="<?php echo $row['deadline_date']; ?>" class="form-control"> 
                            </div> 
                        </div>
                        <div class="modal-footer">		                   
                            <button type="submit" name="extend" class="btn btn-flat btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;<b>EXTEND</b></button><span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <button type="reset" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;<b>CANCEL</b></button>
                        </div> 
                </form>
            </div>
        </div>
    </div>
</div>

