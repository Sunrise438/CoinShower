<div class="row">
    
    <div class="col-xl-3">
        <div class="card mb-3 mb-1">
            <div class="card-body">
                <h5 class="card-title text-success fw-bold"><i class="bi bi-person-circle"></i><?php echo ucfirst($usersName);?></h5>
                <p class="text-secondary fw-bold"><?php echo hrfFormat(totalUsers());?></p>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3">
        <div class="card mb-3 mb-1">
            <div class="card-body">
                <h5 class="card-title text-success fw-bold"><i class="bi bi-person-circle"></i><?php echo ucwords($activeName.' '.$usersName.' ('.$dailyName.')');?></h5>
                <p class="text-secondary fw-bold"><?php echo hrfFormat(activeUsers('daily'));?></p>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3">
        <div class="card mb-3 mb-1">
            <div class="card-body">
                <h5 class="card-title text-success fw-bold"><i class="bi bi-currency-exchange"></i><?php echo ucfirst($depositName);?></h5>
                <p class="text-secondary fw-bold"><?php echo hrfFormat($site_info_row['deposit_total']).' '.strtoupper($selectedCoin);?></p>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3">
        <div class="card mb-3 mb-1">
            <div class="card-body">
                <h5 class="card-title text-success fw-bold"><i class="bi bi-currency-exchange"></i></i><?php echo ucfirst($withdrawName);?></h5>
                <p class="text-secondary fw-bold"><?php echo hrfFormat($site_info_row['withdraw_total']).' '. strtoupper($selectedCoin);?></p>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3">
        <div class="card mb-3 mb-1">
            <div class="card-body">
                <h5 class="card-title text-success fw-bold"><i class="bi bi-bank2"></i><?php echo ucfirst($paidName);?></h5>
                <p class="text-secondary fw-bold"><?php echo hrfFormat(totalEarned()).' '. strtoupper($selectedCoin);?></p>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3">
        <div class="card mb-3 mb-1">
            <div class="card-body">
                <h5 class="card-title text-success fw-bold"><i class="bi bi-box-arrow-up-right"></i><?php echo ucfirst($tasksName);?></h5>
                <p class="text-secondary fw-bold"><?php echo hrfFormat(totalTasks());?></p>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3">
        <div class="card mb-3 mb-1">
            <div class="card-body">
                <h5 class="card-title text-success fw-bold"><i class="bi bi-box-arrow-up-right"></i><?php echo strtoupper($selectedCoin).' '. ucfirst($valueName);?></h5>
                <p class="text-secondary fw-bold"><?php echo number_format($selectedCoin_value, $site_info_row['truncate_currency']).' USD';?></p>
            </div>
        </div>
    </div>
    
</div>