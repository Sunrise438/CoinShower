


<div class="row">
    <div class="col-lg-6 border">
        
        <div class="col-lg-12">
            <div class=" p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($userNameName);?></h5>
                        <h6 class="text-primary"><?php echo $row['uname'];?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-person text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class=" p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($emailName);?></h5>
                        <input type="text" value="<?php echo $row['email'];?>" id="myInput" style="visibility: hidden;">
                        <h6 class="text-primary"><?php echo $row['email'];?> <button class="btn btn-outline-primary btn-sm" onclick="myFunction()" onmouseout="outFunc()">
                        <span id="cmyTooltip"><?php echo ucfirst($copyName);?></span></button></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-person text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class=" p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($locationName);?></h5>
                        <h6><img src="image/flag/<?php echo strtolower($row['country_code']);?>.png" title="<?php echo getCountryName($row['country_code']);?>"/><?php echo ' '.getCountryName($row['country_code']);?></h6>
                        <h6><?php echo strtoupper($ipName).' '.$row['login_ip'];?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-geo-alt text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class=" p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucwords($accountName.' '.$balanceName);?></h5>
                        <h6><?php echo number_format($row['bal'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight">
                        <?php 
                            require 'user_bal/user_bal_data.php';
                            require 'user_bal/user_bal_form.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class=" p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucwords($purchaseName.' '.$balanceName);?></h5>
                        <h6><?php echo number_format($row['p_bal'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight">
                        <?php 
                            require 'user_bal/user_p_bal_data.php';
                            require 'user_bal/user_p_bal_form.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($earnedName);?></h5>
                        <h6><?php echo number_format($row['earned_faucet'] + $row['earned_surf'] +  $row['earned_shortlink'] + $row['earned_offerwall'] + $row['earned_buysell'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-cash-stack text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($earnedName).' '. ucfirst($commissionName);?></h5>
                        <h6><?php echo number_format($row['earned_faucet_ref'] + $row['earned_surf_ref'] +  $row['earned_shortlink_ref'] + $row['earned_offerwall_ref'] + $row['earned_buysell_ref'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-cash-stack text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($faucetName);?></h5>
                        <h6><?php echo number_format($row['earned_faucet'],$site_info_row['truncate_currency']). strtoupper($selectedCoin);?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-cash-stack text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($faucetName).' '. ucfirst($commissionName);?></h5>
                        <h6><?php echo number_format($row['earned_faucet_ref'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-cash-stack text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($surfName);?></h5>
                        <h6><?php echo number_format($row['earned_surf'],$site_info_row['truncate_currency']). strtoupper($selectedCoin);?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-cash-stack text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($surfName).' '. ucfirst($commissionName);?></h5>
                        <h6><?php echo number_format($row['earned_surf_ref'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-cash-stack text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($shortlinksName);?></h5>
                        <h6><?php echo number_format($row['earned_shortlink'],$site_info_row['truncate_currency']). strtoupper($selectedCoin);?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-cash-stack text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($shortlinksName).' '. ucfirst($commissionName);?></h5>
                        <h6><?php echo number_format($row['earned_shortlink_ref'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-cash-stack text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($offerwallName);?></h5>
                        <h6><?php echo number_format($row['earned_offerwall'],$site_info_row['truncate_currency']). strtoupper($selectedCoin);?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-cash-stack text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($offerwallName).' '. ucfirst($commissionName);?></h5>
                        <h6><?php echo number_format($row['earned_offerwall_ref'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-cash-stack text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($refName).' '. ucfirst($marketsName);?></h5>
                        <h6><?php echo number_format($row['earned_buysell'],$site_info_row['truncate_currency']). strtoupper($selectedCoin);?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-cash-stack text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($refName).' '. ucfirst($marketsName).' '. ucfirst($commissionName);?></h5>
                        <h6><?php echo number_format($row['earned_buysell_ref'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-cash-stack text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($registeredName).' '. ucfirst($dateName);?></h5>
                        <h6><?php echo $row['date'];?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-calendar-week text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($statusName);?></h5>
                            <?php 
                            if($row['status'] == 1){
                                echo '<h6 class="text-primary">'.ucfirst($activeName).'</h6>';
                                
                            }else{ 
                                echo '<h6 class="text-danger">'.ucfirst($banedName).'</h6>';
                                
                            }?>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight">
                        <?php 
                            require 'user_action/user_action_data.php';
                            require 'user_action/user_action_form.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($ratingName);?></h5>
                        <h6><?php echo hrfFormat($row['rating']);?></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-star text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-secondary"><?php echo ucfirst($totalName).' '. ucfirst($referralsName);?></h5>
                        <?php require 'users_info_tot_ref.php';?>
                        <h6><a href="ref?t=user&token=<?php echo $user_id;?>" target="_blank"><?php echo userTotalRef($user_id);?></a></h6>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight"><i class="bi h1 bi-people text-primary"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="p-1 bg-transparent  text-dark rounded">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight col-lg-10">
                        <h5 class="text-warning"><?php echo ucfirst($actionName);?></h5>
                        <p class="text-danger"><?php echo ucfirst($beCarefulBeforeYouDeleteTheUserName);?></p>
                    </div>
                    <div class="p-2 col-lg-3 flex-shrink-1 bd-highlight">
                        <?php 
                            require 'user_info_delete/user_info_delete_data.php';
                            require 'user_info_delete/user_info_delete_form.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-12 mt-3 mb-3">
                <?php require 'user_chart/daily_earning.php';?>
                <h4 class="text-secondary"><?php echo ucfirst($dailyName).' '. ucfirst($earningName)?></h4>
                <canvas id="userearning" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 mt-3 mb-3">
                <?php require 'user_chart/daily_ref.php';?>
                <h4 class="text-secondary"><?php echo ucfirst($dailyName).' '. ucfirst($registeredName).' '. ucfirst($referralsName)?></h4>
                <canvas id="userref" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
        
    </div>
</div>

<script src="ctrl/faucet/users/users_info/user_chart/js/daily_earning.js"></script>
<script src="ctrl/faucet/users/users_info/user_chart/js/daily_ref.js"></script>

<script>
    function myFunction() {
      var copyText = document.getElementById("myInput");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      navigator.clipboard.writeText(copyText.value);

      var tooltip = document.getElementById("cmyTooltip");
      tooltip.innerHTML = "<?php echo ucfirst($copiedName);?>";
    }

    function outFunc() {
      var tooltip = document.getElementById("cmyTooltip");
      tooltip.innerHTML = "<?php echo ucfirst($copyName);?>";
    }
</script>