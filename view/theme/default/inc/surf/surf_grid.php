<div class="card mb-3">
    <div class="card-body border bg-dark rounded border-dark">
        <h4 class="card-title text-primary"><span class="text-secondary" id="<?php echo base64_encode($row['id']);?>timerresult"><img src="image/img/star.png" height="25px"></span><?php echo ' '.ucfirst($row['title']);?></h4>
        <div class="d-flex flex-column mb-2">
            <div class="p-2 text-secondary">
                 <?php echo ucfirst($row['description']);?>
            </div>
        </div>
        <div class="d-flex justify-content-between fw-bold">
            <div class="p-2 flex-fill text-success">
                <?php echo number_format($row['price']/100*$site_info_row['surf_commission'],8).' '. strtoupper($selectedCoin);?>
            </div>
          <div class="p-2 flex-fill text-secondary">
              <i class="material-icons">schedule</i><?php echo ' '.$row['duration'].' s';?>
          </div>
          <div class="p-2 flex-fill">
          <p class="text-end text-secondary" title="<?php echo ucfirst($viewName);?>"><?php echo hrfFormat($row['view']).' ';?><i class="bi bi-graph-up"></i></p>
            
          </div>
        </div>
        
        <div class="col-lg-12">
            <form  id="<?php echo base64_encode($row['id']);?>">
                <input type="hidden" name="id" id="id" value="<?php echo base64_encode($row['id']); ?>">
                <input type="hidden" name="url" id="url" value="<?php echo $row['url']; ?>">
                <input type="hidden" name="timer" id="timer" value="<?php echo $row['duration']; ?>">
                <div class="d-grid">
                <input class="btn btn-outline-success btn-block" btn-large" id="submitbtn" type="submit" 
                       value="<?php echo ucfirst($viewName);?>" >
                </div>
            </form>
        </div>
         
    </div>
</div>