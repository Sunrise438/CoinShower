<?php
require 'info_fun.php';

$today_surf_info = todaySurfView();

//today claimed info
//$today_claimed_row = todayClaimed();
$today_surf_ref_row = todayReferralsSurf();
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
            
            <!-- today users -->
            <div class="col-lg-6">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h4 class="text-secondary"><?php echo ucfirst($activeName).' '. ucfirst($surfName);?></h4>
                            <h5><?php echo hrfFormat(totalSurf('active'));?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><span class="material-icons text-primary">open_in_new</span></div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h4 class="text-secondary"><?php echo ucfirst($inactiveName).' '. ucfirst($surfName);?></h4>
                            <h5><?php echo hrfFormat(totalSurf('inactive'));?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><span class="material-icons text-primary">open_in_new</span></div>
                    </div>
                </div>
            </div>
            
            <!-- total views -->
            <div class="col-lg-6">
                    <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 col-lg-9 bd-highlight">
                                <h4 class="text-secondary"><?php echo ucfirst($totalName).' '. ucfirst($viewedName);?></h4>
                                <h5><?php echo hrfFormat($site_info_row['total_surf_amount']);?></h5>
                            </div>
                            <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><span class="material-icons text-primary">open_in_new</span></div>
                        </div>
                    </div>
                </div>

                <!-- total earned -->
                <div class="col-lg-6">
                    <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 col-lg-9 bd-highlight">
                                <h4 class="text-secondary"><?php echo ucfirst($totalName).' '. ucfirst($earnedName);?></h4>
                                <h5><?php echo number_format($site_info_row['total_surf_amount'],$site_info_row['truncate_currency']);?></h5>
                            </div>
                            <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><span class="material-icons text-primary">open_in_new</span></div>
                        </div>
                    </div>
                </div>
                
                <!-- today views -->
            <div class="col-lg-6">
                    <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 col-lg-9 bd-highlight">
                                <h4 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($viewedName);?></h4>
                                <h5><?php echo hrfFormat($today_surf_info['COUNT(id)']);?></h5>
                            </div>
                            <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><span class="material-icons text-primary">open_in_new</span></div>
                        </div>
                    </div>
                </div>

                <!-- today earned -->
                <div class="col-lg-6">
                    <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 col-lg-9 bd-highlight">
                                <h4 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($earnedName);?></h4>
                                <h5><?php echo number_format($today_surf_info['SUM(amount)'],$site_info_row['truncate_currency']);?></h5>
                            </div>
                            <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><span class="material-icons text-primary">open_in_new</span></div>
                        </div>
                    </div>
                </div>            
        </div>  
        
        <!-- notification -->
        <div class="row">
            <div class="col-lg-12">
                <div id="notification"></div>
            </div>
        </div>
        
        <!-- Latest Transaction -->
        <div class="row">
            <div class="col-lg-12">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h4 class="text-secondary"><?php echo ucfirst($latestName).' '. ucfirst($transactionName);?></h4>
                        </div>
                    </div>
                    <?php require 'data/latest_transaction.php';?>
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-lg-6">
        
        <div class="row">
            
            <div class="col-lg-6">
                <div class="mt-4 p-1 bg-transparent border text-dark rounded">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 col-lg-9 bd-highlight">
                            <h4 class="text-secondary"><?php echo ucfirst($referralsName).' '. ucfirst($paidName);?></h4>
                            <h5><?php echo number_format($site_info_row['total_surf_ref_amount'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h5>
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
                            <h5><?php echo hrfFormat($today_surf_ref_row['COUNT(id)']);?></h5>
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
                            <h5><?php echo number_format($today_surf_ref_row['SUM(amount)']/100*$site_info_row['surf_ref_commission'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h5>
                        </div>
                        <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi bi-cash-stack h1 text-primary"></i></i></div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class="row">
            <div class="col-lg-12 mt-3 mb-3">
                <?php require 'data/daily_earning.php';?>
                <h4 class="text-secondary"><?php echo ucfirst($dailyName).' '. ucfirst($earningName)?></h4>
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 mt-3 mb-3">
                <?php require 'data/daily_tasks.php';?>
                <h4 class="text-secondary"><?php echo ucfirst($dailyName).' '. ucfirst($tasksName)?></h4>
                <canvas id="myChartTasks" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 mt-3 mb-3">
                <?php require 'data/daily_registered_users.php';?>
                <h4 class="text-secondary"><?php echo ucfirst($dailyName).' '. ucfirst($registeredName).' '. ucfirst($usersName)?></h4>
                <canvas id="myregisteredusers" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
        
    </div>
</div>

<script src="ctrl/surf/surf/surf_info/data/js/daily_earning.js"></script>
<script src="ctrl/surf/surf/surf_info/data/js/daily_tasks.js"></script>
<script src="ctrl/surf/surf/surf_info/data/js/daily_registered_users.js"></script>
<script src="ctrl/surf/surf/surf_info/notification/js/js.js"></script>
