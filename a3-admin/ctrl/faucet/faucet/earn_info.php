<?php
//today claimed info
$today_claimed_row = todayClaimed();
$today_claimed_ref_row = todayReferralsClaimed();

?>

<div class="row">
    <div class="col-lg-6">
        
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h4 class="text-secondary"><?php echo ucfirst($totalName).' '. ucfirst($usersName);?></h4>
                            <h5><?php echo hrfFormat(totalUsers());?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-people text-primary"></i></div>
                    </div>
                </div>
            </div>
            
            <!-- today users -->
            <div class="col-lg-6">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h4 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($usersName);?></h4>
                            <h5><?php echo hrfFormat(todayUsers());?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-people text-primary"></i></div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h4 class="text-secondary"><?php echo ucfirst($totalName).' '. ucfirst($tasksName);?></h4>
                            <h5><?php echo hrfFormat($site_info_row['total_tasks_faucet']);?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi bi-list-task h1 text-primary"></i></i></div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h4 class="text-secondary"><?php echo ucfirst($totalName).' '. ucfirst($paidName);?></h4>
                            <h5><?php echo number_format($site_info_row['total_faucet_amount'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi bi-cash-stack h1 text-primary"></i></i></div>
                    </div>
                </div>
            </div>
            
            <!-- today tasks -->
            <div class="col-lg-6">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h4 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($tasksName);?></h4>
                            <h5><?php echo hrfFormat($today_claimed_row['COUNT(id)']);?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi bi-list-task h1 text-primary"></i></i></div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h4 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($paidName);?></h4>
                            <h5><?php echo number_format($today_claimed_row['SUM(amount)'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi bi-cash-stack h1 text-primary"></i></i></div>
                    </div>
                </div>
            </div>
            
        </div>
        
         <div class="row">
            <div class="col-lg-12">
                <div class="mt-1 p-1 bg-transparent text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h4 class="text-secondary"><?php //echo ucfirst($latestName).' '. ucfirst($transactionName);?></h4>
                        </div>
                    </div>
                    <?php 
                    require 'update/update_faucet_amount_data.php';
                    require 'update/update_faucet_amount.php';
                    ?>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h4 class="text-secondary"><?php echo ucfirst($latestName).' '. ucfirst($transactionName);?></h4>
                        </div>
                    </div>
                    <?php require 'earn_data/latest_transaction.php';?>
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-lg-6">
        
        <!-- referrals info -->
        <div class="row">
            
            <div class="col-lg-6">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h4 class="text-secondary"><?php echo ucfirst($referralsName).' '. ucfirst($paidName);?></h4>
                            <h5><?php echo number_format($site_info_row['total_faucet_ref_amount'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi bi-cash-stack h1 text-primary"></i></i></div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6"></div>
            
            <!-- today tasks -->
            <div class="col-lg-6">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h4 class="text-secondary"><?php echo ucfirst($todayName).' '.ucfirst($refName).' '. ucfirst($tasksName);?></h4>
                            <h5><?php echo hrfFormat($today_claimed_ref_row['COUNT(id)']);?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi bi-list-task h1 text-primary"></i></i></div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h5 class="text-secondary"><?php echo ucfirst($todayName).' '.ucfirst($refName).' '. ucfirst($paidName);?></h5>
                            <h5><?php echo number_format($today_claimed_ref_row['SUM(amount)']/100*$site_info_row['faucet_ref_commission'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi bi-cash-stack h1 text-primary"></i></i></div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class="row">
            <div class="col-lg-12 mt-3 mb-3">
                <?php require 'earn_data/daily_earning.php';?>
                <h4 class="text-secondary"><?php echo ucfirst($dailyName).' '. ucfirst($earningName)?></h4>
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 mt-3 mb-3">
                <?php require 'earn_data/daily_tasks.php';?>
                <h4 class="text-secondary"><?php echo ucfirst($dailyName).' '. ucfirst($tasksName)?></h4>
                <canvas id="myChartTasks" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 mt-3 mb-3">
                <?php require 'earn_data/daily_registered_users.php';?>
                <h4 class="text-secondary"><?php echo ucfirst($dailyName).' '. ucfirst($registeredName).' '. ucfirst($usersName)?></h4>
                <canvas id="myregisteredusers" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
        
    </div>
</div>

<script src="ctrl/faucet/earn/earn_data/js/daily_earning.js"></script>
<script src="ctrl/faucet/earn/earn_data/js/daily_tasks.js"></script>
<script src="ctrl/faucet/earn/earn_data/js/daily_registered_users.js"></script>
