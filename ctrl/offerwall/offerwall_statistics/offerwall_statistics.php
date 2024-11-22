<?php
$total_today_offerwall_earned = totalTodayOfferwallEarn();
$total_today_offerwall_earned_ref = totalTodayOfferwallEarnRef();
?>
<div class="row">
    <div class="col-lg-6">
        <ol class="list-group text-center mt-3 mb-2">
            <li class="list-group-item  bg-dark">
                <div class="ms-2 me-auto">
                <div class="fw-bold h4 text-primary"><?php echo ucfirst($todayName).' '. ucfirst($earnedName);?></div>
                <h5><span class="badge bg-primary rounded-pill text-dark"><?php echo number_format($total_today_offerwall_earned['SUM(Flreward)'],8).' '. strtoupper($selectedCoin);?></span></h5>
                </div>
            </li>
        </ol>
    </div>
    
    <div class="col-lg-6">
        <ol class="list-group text-center mt-3 mb-2">
            <li class="list-group-item  bg-dark">
                <div class="ms-2 me-auto">
                    <div class="fw-bold h4 text-primary"><?php echo ucfirst($todayName).' '.ucfirst($referralsName).' '. ucfirst($earnedName);?></div>
                    <h5><span class="badge bg-primary rounded-pill text-dark"><?php echo number_format($total_today_offerwall_earned_ref['SUM(Flreward)'],8).' '. strtoupper($selectedCoin);?></span></h5>
                </div>
            </li>
        </ol>
    </div>
    
    <div class="col-lg-6">
        <ol class="list-group text-center mt-3 mb-2">
            <li class="list-group-item  bg-dark">
                <div class="ms-2 me-auto">
                <div class="fw-bold h4 text-primary"><?php echo ucfirst($totalName).' '. ucfirst($earnedName);?></div>
                <h5><span class="badge bg-primary rounded-pill text-dark"><?php echo number_format($user_info['FLearned_offerwall'],8).' '. strtoupper($selectedCoin);?></span></h5>
                </div>
            </li>
        </ol>
    </div>
    
    <div class="col-lg-6">
        <ol class="list-group text-center mt-3 mb-2">
            <li class="list-group-item  bg-dark">
                <div class="ms-2 me-auto">
                    <div class="fw-bold h4 text-primary"><?php echo ucfirst($totalName).' '. ucfirst($referralsName).' '. ucfirst($earnedName);?></div>
                    <h5><span class="badge bg-primary rounded-pill text-dark"><?php echo number_format($user_info['FLearned_offerwall_ref'],8).' '. strtoupper($selectedCoin);?></span></h5>
                </div>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12"><hr></div>
</div>