<div class="modal fade" id="modal_applications_<?php echo $rowss['job_title']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">VIEW APPLICATIONS PER JOB</h4></center>
            </div>
            <div class="modal-body">
                <?php
                include('dbcon.php');
                $jobTitle = $rowss['job_title'];
                    $sqll = "SELECT * FROM job_applications WHERE job_title = $jobTitle";
                    $re = $conn->query($sqll);
                    $count = 0;
                    while ($rowW = $re->fetch_assoc()) {
                        $count += 1;
                        
                        echo "
                            <tr>
                                <td>".$count."</td>
                                <td>".$rowW['FullName']."</td>
                                <td>".$rowW['Email']."</td>
                                <td>".$rowW['job_title']."</td>
                                <td>".$rowW['score']."</td>
                                
                            </tr>
                        
                        
                     
                               ";
                    }
                ?>
   
			</div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-flat btn-danger pull-right " data-dismiss="modal"><i class="fa fa-times-circle-o"></i>&nbsp;&nbsp;<b>CANCEL</b></button>

            </div>

        </div>
    </div>
</div>