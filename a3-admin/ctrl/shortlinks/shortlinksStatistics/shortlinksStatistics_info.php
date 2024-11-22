<div class="row" style="max-width: 100%;">
    <div class="col-lg-3">
         <div class="card bg-primary bg-opacity-75 text-dark">
            <div class="card-body">
                <h4 class="card-title"><b><?php echo ucfirst($totalName).' '. ucfirst($viewedName);?></b></h4>
              <p class="card-text"><b><?php echo $totalShortlinks;?></b></p>
            </div>
          </div>
    </div>
    
    <div class="col-lg-3">
         <div class="card bg-success bg-opacity-75 text-dark">
            <div class="card-body">
                <h4 class="card-title"><b><?php echo ucfirst($totalName).' '. ucfirst($earnedName);?></b></h4>
                <p class="card-text"><b><?php echo number_format($totalShortlinksAmount,8).' '. strtoupper($selectedCoin);?></b></p>
            </div>
          </div>
    </div>
        
    <div class="col-lg-3">
        <div class="card bg-primary bg-opacity-75 text-dark">
            <div class="card-body">
                <h4 class="card-title"><b><?php echo ucfirst($todayName).' '. ucfirst($viewedName);?></b></h4>
              <p class="card-text"><b><?php echo $todayShortlinksTodayViewed;?></b></p>
            </div>
          </div>
    </div>
    
    <div class="col-lg-3">
        <div class="card bg-success bg-opacity-75 text-dark">
            <div class="card-body">
                <h4 class="card-title"><b><?php echo ucfirst($todayName).' '. ucfirst($earnedName);?></b></h4>
                <p class="card-text"><b><?php echo number_format($todayShortlinksTodayEarnedAmount,8).' '. strtoupper($selectedCoin);?></b></p>
            </div>
          </div>
        </div>
    
</div>
<div class="row">
    <div class="col-lg-12"><hr></div>
</div>