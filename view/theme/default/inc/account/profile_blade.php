<div class="container mt-3 mb-3">
    <div class="main-body">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="image/img/profile.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4 class="text-primary fw-bold"><?php echo $user_info['uname']?></h4>
                      <p class="text-dark"><?php echo $user_info['email']?></p>
                      <p class="text-muted font-size-sm"><img src="image/flag/<?php echo strtolower($user_info['country_code']);?>.png"> <?php if (array_key_exists($user_info['country_code'], $countries)){ echo $countries[$user_info['country_code']]; }?></p>
                      <p class="text-muted font-size-sm"><?php echo ucfirst($ipName).' : '.$user_info['login_ip'];?></p>
                      <p class="text-secondary mb-1"><?php echo ucfirst($ratingName).' : '.hrfFormat($user_info['rating'])?></p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0"><?php echo ucwords($accountName.' '.$balanceName)?></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo number_format($user_info['bal'], $site_info_row['truncate_currency']). ' '. strtoupper($selectedCoin);?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0"><?php echo ucwords($purchaseName.' '.$balanceName)?></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo number_format($user_info['p_bal'], $site_info_row['truncate_currency']). ' '. strtoupper($selectedCoin);?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><?php echo ucwords($statusName)?></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php 
                        if($user_info['status']){
                            echo '<h6 class="text-primary">'.ucfirst($activeName).'</h6>';

                        }else{ 
                            echo '<h6 class="text-danger">'.ucfirst($banedName).'</h6>';

                        }?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><?php echo ucwords($registeredName)?></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $user_info['date'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><?php echo ucwords($referralsName)?></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <a href="referrals"><?php echo countRef($user_info['id']);?></a>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>

            </div>
          </div>

        </div>
    </div>