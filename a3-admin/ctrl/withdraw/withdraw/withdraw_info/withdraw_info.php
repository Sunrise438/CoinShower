<?php 
require 'info_fun.php';
$tot_pening_withdraw = totalPendingWithdraw();
$tot_today_withdraw = todayWithdraw();
?>

<div class="row mt-3 mb-3">
    <div class="col-xl-12">
        
        <div class="row">
            
                <!-- today count pending withdrwal -->
                <div class="col-xl-3">
                    <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 col-xl-9 bd-highlight">
                                <h5 class="text-secondary"><?php echo ucfirst($totalName).' '. ucfirst($pendingName);?></h5>
                                <h5><?php echo hrfFormat($tot_pening_withdraw['COUNT(id)']);?></h5>
                            </div>
                            <div class="p-2 col-xl-3 flex-shrink-1 bd-highlight"><span class="material-icons text-primary">open_in_new</span></div>
                        </div>
                    </div>
                </div>

                <!-- total pending amounts -->
                <div class="col-xl-3">
                    <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 col-xl-9 bd-highlight">
                                <h5 class="text-secondary"><?php echo ucfirst($pendingName).' '. ucfirst($amountName);?></h5>
                                <h5><?php echo number_format($tot_pening_withdraw['SUM(amount)'],8);?></h5>
                            </div>
                            <div class="p-2 col-xl-3 flex-shrink-1 bd-highlight"><span class="material-icons text-primary">open_in_new</span></div>
                        </div>
                    </div>
                </div>
                
                <!-- today count withdrawal -->
            <div class="col-xl-3">
                    <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 col-xl-9 bd-highlight">
                                <h5 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($withdrawalName);?></h5>
                                <h5><?php echo hrfFormat($tot_today_withdraw['COUNT(id)']);?></h5>
                            </div>
                            <div class="p-2 col-xl-3 flex-shrink-1 bd-highlight"><span class="material-icons text-primary">open_in_new</span></div>
                        </div>
                    </div>
                </div>

                <!-- today withdraw -->
                <div class="col-xl-3">
                    <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 col-xl-9 bd-highlight">
                                <h5 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($amountName);?></h5>
                                <h5><?php echo number_format($tot_today_withdraw['SUM(amount)'],8);?></h5>
                            </div>
                            <div class="p-2 col-xl-3 flex-shrink-1 bd-highlight"><span class="material-icons text-primary">open_in_new</span></div>
                        </div>
                    </div>
                </div>
                
        </div>  
        
    </div>

</div>