<div class="card mb-3">
    <div class="card-body bg-dark border rounded border-dark">
        <h4 class="card-title"><img src="image/img/star.png" height="25px"> <a href="<?php echo $row['ref_shortlinks'];?>" target="_blank"><?php echo $row['site_name'];?></a></h4>
        <div class="d-flex justify-content-between fw-bold">
            <div class="p-2 flex-fill text-success">
                <?php echo $row['view_limit'].' '.$viewsName.' '. ucfirst($availableName);?>
            </div>
          <div class="p-2 flex-fill text-secondary">
              <?php echo number_format($row['pay_amount'],8).' '. strtoupper($selectedCoin);?>
          </div>
          <div class="p-2 flex-fill">
              <p class="text-end text-secondary" title="<?php echo ucfirst($viewName);?>"><?php echo hrfFormat($row['view']).' ';?><i class="bi bi-graph-up"></i></p>
              </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-grid">
                <a href="<?php echo $row['shortlinks'];?>" class="btn btn-outline-success btn-block" 
                 title="<?php echo ucfirst($viewName.' '. ucfirst($linkName));?>"><?php echo ucfirst($viewName);?></a>
            </div>

        </div>       
        
    </div>
</div>