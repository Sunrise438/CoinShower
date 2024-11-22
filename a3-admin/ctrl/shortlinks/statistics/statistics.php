<div class="row">
    <div class="col-lg-12 mt-3 mb-3">
        <?php require 'earn_data/daily_shortlinks.php';?>
        <h4 class="text-secondary"><?php echo ucfirst($dailyName).' '. ucfirst($earnedName)?></h4>
        <canvas id="myChart" style="width:100%;max-width:100%;height: 300px;"></canvas>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mt-3 mb-3">
        <h4 class="text-secondary"><?php echo ucfirst($dailyName).' '. ucfirst($tasksName)?></h4>
        <canvas id="myChartShortlinks" style="width:100%;max-width:100%;height: 300px;"></canvas>
    </div>
</div>

<script src="ctrl/shortlinks/statistics/earn_data/js/daily_paid.js"></script>
<script src="ctrl/shortlinks/statistics/earn_data/js/daily_shortlinks.js"></script>