<?php 
require 'info_fun.php';
$tot_today_deposit = todayDeposit();
?>

<div class="row mt-3 mb-3">
    <div class="col-lg-12">
        
        <div class="row">
            
            <!-- total deposited -->
            <div class="col-lg-3">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h5 class="text-secondary"><?php echo ucfirst($totalName).' '. ucfirst($depositName);?></h5>
                            <h5><?php echo hrfFormat($site_info_row['deposit_total']);?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><span class="material-icons text-primary">open_in_new</span></div>
                    </div>
                </div>
            </div>

            <!-- today count deposit -->
            <div class="col-lg-3">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h5 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($depositName);?></h5>
                            <h5><?php echo hrfFormat($tot_today_deposit['COUNT(id)']);?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><span class="material-icons text-primary">open_in_new</span></div>
                    </div>
                </div>
            </div>

            <!-- today deposit -->
            <div class="col-lg-3">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h5 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($amountName);?></h5>
                            <h5><?php echo number_format($tot_today_deposit['SUM(amount)'],8);?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><span class="material-icons text-primary">open_in_new</span></div>
                    </div>
                </div>
            </div>
            
            <!-- today count users -->
            <div class="col-lg-3">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h5 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($usersName);?></h5>
                            <h5><?php echo hrfFormat($tot_today_deposit['COUNT(DISTINCT uname)']);?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><span class="material-icons text-primary">open_in_new</span></div>
                    </div>
                </div>
            </div>

        </div>  
        
    </div>

</div>