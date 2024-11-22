<?php

    $js_faucetName = json_encode($faucetName);
    $js_surfName = json_encode($surfName);
    $js_shortlinksName = json_encode($shortlinksName);
    $js_offerwallName = json_encode($offerwallName);
    $js_refBuySellName = json_encode($refName.' '.$buyName.' '.$sellName);
    
    $js_faucetName_data = $user_info['earned_faucet'];
    $js_surfName_data = $user_info['earned_surf'];
    $js_shortlinksName_data = $user_info['earned_shortlink'];
    $js_offerwallName_data = $user_info['earned_offerwall'];
    $js_refBuySellName_data = $user_info['earned_buysell'];
    
    $js_faucetName_data_ref = $user_info['earned_faucet_ref'];
    $js_surfName_data_ref = $user_info['earned_surf_ref'];
    $js_shortlinksName_data_ref = $user_info['earned_shortlink_ref'];
    $js_offerwallName_data_ref = $user_info['earned_offerwall_ref'];
    $js_refBuySellName_data_ref = $user_info['earned_buysell_ref'];
    

?>

<script type='text/javascript'>
<?php 

echo "var faucet = $js_faucetName;\n";
echo "var surf = $js_surfName;\n";
echo "var shortlinks = $js_shortlinksName;\n";
echo "var offerwall = $js_offerwallName;\n";
echo "var refbuysell = $js_refBuySellName;\n";

echo "var faucetData = $js_faucetName_data;\n";
echo "var surfData = $js_surfName_data;\n";
echo "var shortlinksData = $js_shortlinksName_data;\n";
echo "var offerwallData = $js_offerwallName_data;\n";
echo "var refbuysellData = $js_refBuySellName_data;\n";

echo "var faucetDataRef = $js_faucetName_data_ref;\n";
echo "var surfDataRef = $js_surfName_data_ref;\n";
echo "var shortlinksDataRef = $js_shortlinksName_data_ref;\n";
echo "var offerwallDataRef = $js_offerwallName_data_ref;\n";
echo "var refbuysellDataRef = $js_refBuySellName_data_ref;\n";

?>
</script>

<div class="row">
    <div class="col-lg-6 mt-2 mb-2">
        <div id="myChartEarn" style="width:100%; max-width:600px; height:250px;"></div>
    </div>
    
    <div class="col-lg-6 mt-2 mb-2">
        <div id="myChartEarnRef" style="width:100%; max-width:600px; height:250px;"></div>
    </div>
</div>

<script src="view/theme/<?php echo $themeAction;?>/inc/dashboard/chart/js/js.js"></script>