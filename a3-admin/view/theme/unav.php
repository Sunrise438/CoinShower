<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="admin_nav_side_mobi">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <! -- <a class="navbar-brand" href="dashboard"><i class="bi bi-gear"></i><?php echo ucfirst($dashboardName);?></a>-->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
     
    <!--dashboad-->
    <li class="nav-item navbar-nav fw-bold h5">
        <a class="nav-link" href="dashboard"><i class="bi bi-gear"></i> <?php echo ucfirst($dashboardName);?></a>
    </li>

    <!--faucet-->
    <li class="nav-item dropdown navbar-nav fw-bold">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo ucfirst($faucetName);?></a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="faucet"><?php echo ucfirst($faucetName);?></a></li>
            <li><a class="dropdown-item" href="history?t=today"><?php echo ucfirst($todayName).' '. ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="history"><?php echo ucfirst($faucetName).' '. ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="history?t=user"><?php echo ucfirst($user_sName).' '. ucfirst($claimName);?></a></li>
            <li><a class="dropdown-item" href="clear_history"><?php echo ucfirst($clearName).' '. ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="faucet_settings"><?php echo ucwords($faucetName.' '.$settingsName);?></a></li>
        </ul>
    </li>
    
    <!--surf-->
    <li class="nav-item dropdown navbar-nav fw-bold">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo ucfirst($surfName);?></a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="surf"><?php echo ucfirst($surfName);?></a></li>
            <li><a class="dropdown-item" href="surf?t=surf"><?php echo ucfirst($surfName).' '. ucfirst($adsName);?></a></li>
            <li><a class="dropdown-item" href="surf?t=pending"><?php echo ucfirst($pendingName).' '.ucfirst($approvalName);?></a></li>
            <li><a class="dropdown-item" href="surf?t=active"><?php echo ucfirst($activeName).' '.ucfirst($surfName);?></a></li>
            <li><a class="dropdown-item" href="surf?t=inactive"><?php echo ucfirst($inactiveName).' '.ucfirst($surfName);?></a></li>
            <li><a class="dropdown-item" href="surf?t=delete"><?php echo ucfirst($pendingName).' '.ucfirst($deleteName);?></a></li>
            <li><a class="dropdown-item" href="surf?t=user"><?php echo ucfirst($user_sName).' '.ucfirst($surfName);?></a></li>
            <li><a class="dropdown-item" href="surf_history"><?php echo ucfirst($surfName).' '.ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="surf_history?t=today"><?php echo ucfirst($todayName).' '.ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="surf_history?t=user"><?php echo ucfirst($user_sName).' '.ucfirst($surfName).' '.ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="surf_history?t=clear"><?php echo ucfirst($clearName).' '. ucfirst($historyName);?></a></li>       
            <li><a class="dropdown-item" href="surf_settings"><?php echo ucwords($surfName.' '.$settingsName);?></a></li>
        </ul>
    </li>

    <!--shortLinks-->
    <li class="nav-item dropdown navbar-nav fw-bold">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo ucfirst($shortlinksName);?></a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="shortlinks"><?php echo ucfirst($shortlinksName);?></a></li>
            <li><a class="dropdown-item" href="shortlinks?t=statistics"><?php echo ucfirst($shortlinksName).' '. ucfirst($statisticsName);?></a></li>
            <li><a class="dropdown-item" href="shortlinks_history?t=today"><?php echo ucfirst($todayName).' '.ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="shortlinks_history"><?php echo ucfirst($shortlinksName).' '. ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="shortlinks_history?t=user"><?php echo ucfirst($user_sName).' '.ucfirst($shortlinksName).' '.ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="shortlinks_clear_history"><?php echo ucfirst($clearName).' '. ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="shortlinks_settings"><?php echo ucwords($shortlinksName.' '.$settingsName);?></a></li>                
        </ul>
    </li>

    <!--offerwall-->
    <li class="nav-item dropdown navbar-nav fw-bold">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo ucfirst($offerwallName);?></a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="offerwall"><?php echo ucfirst($offerwallName);?></a></li>
            <li><a class="dropdown-item" href="offerwall?t=today"><?php echo ucfirst($todayName).' '.ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="offerwall?t=history"><?php echo ucfirst($offerwallName).' '.ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="offerwall?t=user"><?php echo ucfirst($user_sName).' '.ucfirst($offerwallName).' '.ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="offerwall?t=clear"><?php echo ucfirst($clearName).' '. ucfirst($historyName);?></a></li>       
            <li><a class="dropdown-item" href="offerwall_settings"><?php echo ucwords($offerwallName.' '.$settingsName);?></a></li>
        </ul>
    </li>

    <!-- ref -->
    <li class="nav-item dropdown navbar-nav fw-bold">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo ucfirst($referralsName);?></a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="ref"><?php echo ucfirst($referralsName);?></a></li>
            <li><a class="dropdown-item" href="ref?t=history"><?php echo ucfirst($referralsName).' '. ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="ref?t=user"><?php echo ucfirst($user_sName).' '. ucfirst($referralsName);?></a></li>
            <?php if ($site_info_row['ref_market_action']){?>
            <li><a class="dropdown-item" href="refmarket"><?php echo ucfirst($referralsName).' '. ucfirst($marketsName);?></a></li>
            <li><a class="dropdown-item" href="refmarket_history"><?php echo ucfirst($referralsName).' '. ucfirst($marketsName).' '. ucfirst($historyName);?></a></li>
            <?php }?>
        </ul>
    </li>
    <?php
    //deposit
        if ($site_info_row['faucet_action'] || $site_info_row['surf_action'] || $site_info_row['shortlinks_action'] || $site_info_row['offerwall_action']){
        ?>
    
    <!--deposit-->
    <li class="nav-item dropdown navbar-nav fw-bold">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo ucfirst($depositName);?></a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="deposit?t=deposit"><?php echo ucfirst($depositName);?></a></li>
            <li><a class="dropdown-item" href="deposit?t=statistics"><?php echo ucfirst($depositName).' '. ucfirst($statisticsName);?></a></li>
            <li><a class="dropdown-item" href="deposit?t=history"><?php echo ucfirst($depositName).' '. ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="deposit?t=user"><?php echo ucfirst($user_sName).' '. ucfirst($depositName);?></a></li>
        </ul>
    </li>
    
    <?php
            }
    
    //withdraw
        if ($site_info_row['faucet_action'] || $site_info_row['surf_action'] || $site_info_row['shortlinks_action'] || $site_info_row['offerwall_action']){
        ?>
    
    <!--withdraw-->
    <li class="nav-item dropdown navbar-nav fw-bold">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo ucfirst($withdrawName);?></a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="withdraw?t=withdraw"><?php echo ucfirst($withdrawName);?></a></li>
            <li><a class="dropdown-item" href="withdraw?t=statistics"><?php echo ucfirst($withdrawName).' '. ucfirst($statisticsName);?></a></li>
            <li><a class="dropdown-item" href="withdraw?t=history"><?php echo ucfirst($withdrawName).' '. ucfirst($historyName);?></a></li>
            <li><a class="dropdown-item" href="withdraw?t=user"><?php echo ucfirst($user_sName).' '. ucfirst($withdrawName);?></a></li>
        </ul>
    </li>
    
    <?php
            }
            
        //user
        if ($site_info_row['faucet_action'] || $site_info_row['surf_action'] || $site_info_row['shortlinks_action'] || $site_info_row['offerwall_action']){
        ?>
    
    <!--user-->
    <li class="nav-item dropdown navbar-nav fw-bold">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo ucfirst($usersName);?></a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="users"><?php echo ucfirst($usersName);?></a></li>
            <li><a class="dropdown-item" href="users_info"><?php echo ucfirst($usersName).' '. ucfirst($infoName);?></a></li>
            <li><a class="dropdown-item" href="usersbycountry"><?php echo ucwords($usersName.' '.$byName.' '.$countryName);?></a></li>
            <li><a class="dropdown-item" href="banned_list"><?php echo ucfirst($bannedName).' '. ucfirst($listName);?></a></li>
            <li><a class="dropdown-item" href="users_login_session"><?php echo ucfirst($usersName).' '. ucfirst($loginName);?></a></li>
            <li><a class="dropdown-item" href="banned_domain"><?php echo ucfirst($bannedName).' '. ucfirst($domainName);?></a></li>
        </ul>
    </li>
    
    <?php
            }
            ?>
    
    <!--plugins-->
    <li class="nav-item dropdown navbar-nav fw-bold">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo ucfirst($pluginsName);?></a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="plugins"><?php echo ucfirst($pluginsName);?></a></li>
        </ul>
    </li>
    
    <!--theme-->
    <li class="nav-item dropdown navbar-nav fw-bold">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo ucfirst($appearanceName);?></a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="appearance"><?php echo ucfirst($appearanceName);?></a></li>
        </ul>
    </li>
    
    <!--settings-->
    <li class="nav-item dropdown navbar-nav fw-bold">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo ucfirst($settingsName);?></a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="menu"><?php echo ucfirst($menuName);?></a></li>
            <li><a class="dropdown-item" href="code"><?php echo ucfirst($codeName);?></a></li>
            <li><a class="dropdown-item" href="coin_type"><?php echo ucwords($coinsName.' '.$typeName);?></a></li>
            <li><a class="dropdown-item" href="payments"><?php echo ucfirst($paymentsName);?></a></li>
            <li><a class="dropdown-item" href="captcha"><?php echo ucfirst($captchaName);?></a></li>
            <li><a class="dropdown-item" href="backup"><?php echo ucfirst($backupName);?></a></li>
            <li><a class="dropdown-item" href="cookie"><?php echo ucfirst($cookieName);?></a></li>
            <li><a class="dropdown-item" href="cron"><?php echo ucwords($cronJobName);?></a></li>
            <li><a class="dropdown-item" href="seo"><?php echo strtoupper($seoName);?></a></li>
            <li><a class="dropdown-item" href="security"><?php echo ucfirst($securityName);?></a></li>
            <li><a class="dropdown-item" href="email"><?php echo ucfirst($emailName);?></a></li>
            <li><a class="dropdown-item" href="settings"><?php echo ucfirst($settingsName);?></a></li>
        </ul>
    </li>
   
    <!-- log out-->
    <li class="nav-item navbar-nav">
        <a class="nav-link text-secondary fw-bold" href="logout?logout=logout"><?php echo $logoutName;?></a>
    </li>
          
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


