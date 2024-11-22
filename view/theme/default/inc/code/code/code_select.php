<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="pill" href="#faucet_top_code"><?php echo ucwords($faucetName.' '.$topName);?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#faucet_bottom_code"><?php echo ucwords($faucetName.' '.$bottomName);?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#faucet_code"><?php echo ucwords($faucetName.' '.$codeName);?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#surf_top_code"><?php echo ucwords($surfName.' '.$topName);?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#surf_bottom_code"><?php echo ucwords($surfName.' '.$bottomName);?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#shortlinks_top_code"><?php echo ucwords($shortlinksName.' '.$topName);?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#shortlinks_bottom_code"><?php echo ucwords($shortlinksName.' '.$bottomName);?></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#offerwall_top_code"><?php echo ucwords($offerwallName.' '.$topName);?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#offerwall_bottom_code"><?php echo ucwords($offerwallName.' '.$bottomName);?></a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane container active border" id="faucet_top_code">
        <?php require __DIR__.'/form/faucet_top_code_form.php';?>
    </div>
    <div class="tab-pane container border" id="faucet_bottom_code">
        <?php require __DIR__.'/form/faucet_bottom_code_form.php';?>
    </div>
    <div class="tab-pane container border" id="faucet_code">
        <?php require __DIR__.'/form/faucet_code_form.php';?>
    </div>
    <div class="tab-pane container border" id="surf_top_code">
        <?php require __DIR__.'/form/code_surf_top_form.php';?>
    </div>
    <div class="tab-pane container border" id="surf_bottom_code">
        <?php require __DIR__.'/form/code_surf_bottom_form.php';?>
    </div>
    <div class="tab-pane container border" id="shortlinks_top_code">
        <?php require __DIR__.'/form/shortlinks_top_code_form.php';?>
    </div>
    <div class="tab-pane container border" id="shortlinks_bottom_code">
        <?php require __DIR__.'/form/shortlinks_bottom_code_form.php';?>
    </div>
    
    <div class="tab-pane container border" id="offerwall_top_code">
        <?php require __DIR__.'/form/offerwall_top_code_form.php';?>
    </div>
    <div class="tab-pane container border" id="offerwall_bottom_code">
        <?php require __DIR__.'/form/offerwall_bottom_code_form.php';?>
    </div>
</div>