<div class="row mt-3">
    
    <div class="col-lg-6">
        <div class="mt-4 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucfirst($totalName).' '. ucfirst($shortlinksName);?></h5>
                    <h5><?php echo hrfFormat(totalShortlinks());?></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-link-45deg text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="mt-4 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucfirst($activeName).' '. ucfirst($shortlinksName);?></h5>
                    <h5><?php echo hrfFormat($active_shortlink['COUNT(id)']);?></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-link-45deg text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="mt-4 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucwords($enabledName).' '.ucfirst($amountName);?></h5>
                    <h5><?php echo number_format($active_shortlink['SUM(pay_amount)'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-wallet text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="mt-4 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucwords($enabledName).' '.ucfirst($amountName);?></h5>
                    <h5><?php echo number_format($active_shortlink['SUM(usd_amount)'],$site_info_row['truncate_currency']).' '. strtoupper('usd');?></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-wallet text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="mt-4 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($viewedName);?></h5>
                    <h5><?php echo hrfFormat($today_total_shortlinks_views['COUNT(id)']);?></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-eye text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="mt-4 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($earnedName);?></h5>
                    <h5><?php echo number_format($today_total_shortlinks_views['SUM(amount)'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-wallet text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="mt-4 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($refName).' '. ucfirst($tasksName);?></h5>
                    <h5><?php echo hrfFormat($today_total_shortlinks_views_ref['COUNT(id)']);?></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-eye text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="mt-4 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($refName).' '. ucfirst($earnedName);?></h5>
                    <h5><?php echo number_format($today_total_shortlinks_views_ref['SUM(amount)']/100*$site_info_row['shortlinks_ref_commission'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-wallet text-primary"></i></div>
            </div>
        </div>
    </div>
    
</div>

