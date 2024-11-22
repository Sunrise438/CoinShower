<div class="row">
    <div class="col-lg-12 mt-3 mb-3">
        <?php require 'earn_data/daily_deposit.php';?>
        <h4 class="text-secondary"><?php echo ucfirst($dailyName).' '. ucfirst($depositName).' '. ucfirst($amountName)?></h4>
        <canvas id="myChartDeposit" style="width:100%;max-width:100%;height: 300px;"></canvas>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mt-3 mb-3">
        <h4 class="text-secondary"><?php echo ucfirst($dailyName).' '. ucfirst($usersName)?></h4>
        <canvas id="myChartUsers" style="width:100%;max-width:100%;height: 300px;"></canvas>
    </div>
</div>

<script src="ctrl/deposit/deposit/statistics/earn_data/js/daily_deposit.js"></script>
<script src="ctrl/deposit/deposit/statistics/earn_data/js/daily_users.js"></script>