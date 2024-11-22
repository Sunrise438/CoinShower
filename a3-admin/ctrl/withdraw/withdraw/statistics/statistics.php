<div class="row">
    <div class="col-lg-12 mt-3 mb-3">
        <?php require 'earn_data/daily_withdrawal.php';?>
        <h4 class="text-secondary"><?php echo ucfirst($dailyName).' '. ucfirst($paidName)?></h4>
        <canvas id="myChart" style="width:100%;max-width:100%;height: 300px;"></canvas>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mt-3 mb-3">
        <h4 class="text-secondary"><?php echo ucfirst($dailyName).' '. ucfirst($withdrawalName)?></h4>
        <canvas id="myChartWithdrawal" style="width:100%;max-width:100%;height: 300px;"></canvas>
    </div>
</div>

<script src="ctrl/withdraw/withdraw/statistics/earn_data/js/daily_paid.js"></script>
<script src="ctrl/withdraw/withdraw/statistics/earn_data/js/daily_withdrawal.js"></script>