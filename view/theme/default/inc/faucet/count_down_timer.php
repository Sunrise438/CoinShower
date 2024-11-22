<div class="row">
    <div class="col-lg-8 border rounded">
        <div class="col-lg-12 mt-3 mb-3">
            <?php require_once 'view/theme/'.$themeAction.'/inc/code/code_faucet_top.php';?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center mt-3 mb-3"> 
                    <span class="">
                        <?php echo ucfirst($claimName).' <strong>'.number_format($site_info_row['faucet_amount'],8).' '. strtoupper($selectedCoin). '</strong> '. ucfirst($everyName).' '.$site_info_row['faucet_timer'].' '. ucfirst($minutesName);?>
                    </span>
                </h3>
            </div>
        </div>

        <div class="col-lg-12 mt-3 mb-3">
            <h1 id="faucettimer" class="text-center" style="font-size: 60px;"></h1>
        </div>
        
        <div class="col-lg-12 mt-3 mb-3">
            <?php require_once 'view/theme/'.$themeAction.'/inc/code/code_faucet_bottom.php';?>
        </div>
    </div>
    <div class="col-lg-4">
        <?php require requireRightCode();?>
    </div>
</div>


<script>
    function cd(){
    var ct = "<?php echo $site_info_row['faucet_timer'];?>";
    var ct = parseInt(ct);

var countDownDate = new Date().getTime();

var cd = "<?php echo getNextClaimTime();?>";
var c = parseInt(cd);

var cd = countDownDate + c;

var x = setInterval(function() {

  var now = new Date().getTime();
   
  var distance = cd - now; 
    
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  if (ct <= 3600){
      document.getElementById("faucettimer").innerHTML = minutes + "m " + seconds + "s ";

  }else{
      document.getElementById("faucettimer").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
  }
  
   
  
  if (distance < 0) {
    clearInterval(x);
    location.reload();
    
  }
}, 1000);

}

cd();
</script>