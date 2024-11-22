
<input type="text" value="<?php echo $site_info_row['site_url'].'?r='.$user_info['id'];?>" id="myInput" style="visibility: hidden;">
<div class="row">   
    <div class="col-xl-12 bg-dark text-primary text-center border rounded" role="alert">  
        <h4 class="fw-blod"><?php echo countRef($user_info['id']).' '. ucfirst($referralsName);?></h4>
        <h5><?php echo $site_info_row['site_url'].'?r='.$user_info['id']. ' ';?><button class="btn btn-outline-primary btn-sm" onclick="myFunction()" onmouseout="outFunc()">
        <span id="cmyTooltip"><?php echo ucfirst($copyName);?></span></button></h5>

        <ul class="list-group list-group-flush">
            <?php if ($site_info_row['faucet_action'] == 1){?>
            <li class="list-group-item bg-transparent text-primary"><?php echo '<b>'.$site_info_row['faucet_ref_commission'].'</b>% '.$commissionName.' - '. ucfirst($faucetName);?></li>
            <?php } if ($site_info_row['surf_action'] == 1){?>
            <li class="list-group-item bg-transparent text-primary"><?php echo '<b>'.$site_info_row['surf_ref_commission'].'</b>% '.$commissionName.' - '. ucfirst($surfName);?></li>                
            <?php } if ($site_info_row['shortlinks_action'] == 1){?>
            <li class="list-group-item bg-transparent text-primary"><?php echo '<b>'.$site_info_row['shortlinks_ref_commission'].'</b>% '.$commissionName.' - '. ucfirst($shortlinksName);?></li>
            <?php } if ($site_info_row['offerwall_action'] == 1){?>
            <li class="list-group-item bg-transparent text-primary"><?php echo '<b>'.$site_info_row['offerwall_ref_commission'].'</b>% '.$commissionName.' - '. ucfirst($offerwallName);?></li>
            <?php } if ($site_info_row['ref_market_action'] == 1){?>
            <li class="list-group-item bg-transparent text-primary"><?php echo '<b>'.$site_info_row['ref_market_ref_commission'].'</b>% '.$commissionName.' - '. ucfirst($referralsName.' '.$marketsName);?></li>
            <?php }?>
        </ul>
    </div>
</div>

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
