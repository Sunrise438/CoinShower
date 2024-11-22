<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success mt-3 mb-2">
            <?php echo ucwords($cronCommandName).' : <strong>0 * * * * '.$site_info_row['site_url'].'/cron.php /dev/null 2>&1</strong> ('. ucfirst($cronCommandInfoName).')';?>
        </div>
    </div>
</div>