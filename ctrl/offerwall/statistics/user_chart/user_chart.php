<div class="row">
    <div class="col-lg-12 bg-dark rounded">
        <div class="row">
            <div class="col-lg-12 mt-3 mb-3">
                <?php require 'daily_earning.php';?>
                <h4 class="text-white"><?php echo ucfirst($dailyName).' '. ucfirst($earningName)?></h4>
                <canvas class="text-white" id="userearning" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 mt-3 mb-3">
                <?php require 'daily_ref_earn.php';?>
                <h4 class="text-white"><?php echo ucfirst($dailyName).' '. ucfirst($referralsName).' '. ucfirst($earningName)?></h4>
                <canvas id="userrefearn" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 mt-3 mb-3">
                <?php require 'daily_ref.php';?>
                <h4 class="text-white"><?php echo ucfirst($dailyName).' '. ucfirst($registeredName).' '. ucfirst($referralsName)?></h4>
                <canvas id="userref" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
        
    </div>
</div>

<script src="ctrl/faucet/faucet_statistics/user_chart/js/daily_earning.js"></script>
<script src="ctrl/faucet/faucet_statistics/user_chart/js/daily_ref.js"></script>
<script src="ctrl/faucet/faucet_statistics/user_chart/js/daily_ref_earn.js"></script>