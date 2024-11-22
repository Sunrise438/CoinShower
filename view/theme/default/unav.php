<nav class="navbar-main navbar navbar-expand-xl bg-white fw-bold border mb-3 fixed-top">
    <div class="container-fluid">
        
        <?php
            //home logo or text
            if ($site_info_row['logo_action']){
        ?>
        <a class="navbar-brand text-primary" href="index"><img src="image/img/logo.png" style="height: 40px"></a>
        <?php
            } else {
        ?>
              <a class="navbar-brand text-primary" href="index"><?php echo '<b>'.$site_info_row['site_name'].'</b>';?></a>
        <?php
            }
        ?>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <div class="d-xl-none d-xxl-none">
                    <?php nav('u');?>
                </div>
            </ul>
            
        <div class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <?php
                     if (isset($_SESSION['uname'])){
                 ?>
                    <li class="nav-item navbar-nav">
                        <a class="nav-link text-primary" href="logout?logout=logout"><?php echo ucfirst($logoutName);?></a>
                    </li>
                 <?php
                     }
                 ?>
                
            </ul>
        </div>
            
        </div>
    </div>
</nav>