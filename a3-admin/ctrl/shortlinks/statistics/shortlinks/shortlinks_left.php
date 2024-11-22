<div class="row">
    <div class="col-lg-6">
        <div class="mt-4 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucfirst($idName);?></h5>
                    <h5><?php echo $shortlinks_info['id'];?></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-link-45deg text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="mt-4 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucfirst($totalName).' '. ucfirst($viewedName);?></h5>
                    <h5><?php echo hrfFormat($shortlinks_info['view']);?></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-eye text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="mt-4 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($viewedName);?></h5>
                    <h5><?php echo hrfFormat($today_views['COUNT(id)']);?></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-eye text-primary"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="mt-4 p-1 bg-transparent border text-dark rounded">
            <div class="d-flex bd-highlight">
                <div class="p-2 col-lg-9 bd-highlight">
                    <h5 class="text-secondary"><?php echo ucfirst($todayName).' '. ucfirst($paidName);?></h5>
                    <h5><?php echo number_format($today_views['SUM(amount)'],8);?></h5>
                </div>
                <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-wallet text-primary"></i></div>
            </div>
        </div>
    </div>

</div>

