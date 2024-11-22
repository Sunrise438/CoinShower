<div class="col-lg-12" ng-app="">
    <div class="row">
        <div class="col-lg-12 bg-dark text-secondary p-3 rounded mt-3 mb-3">
            <h4 class="text-center"><?php echo ucwords($depositName.' '.$usingName).' '.ucfirst($balanceName)?></h4>
            <span class="text-center"><?php echo ucfirst($depositCommandName);?></span>
        </div>
    </div>
    
<span class="text-danger" id="err"></span>
   
<div class="row">
    <div class="col-lg-12 bg-dark text-secondary p-3 rounded mt-3 mb-3">
        <form id="addsurf" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?t=baltopb">
            
        <input type="hidden" name="a" value="baltopb" required="">
        <input type="hidden" name="mindep" value="<?php echo number_format($site_info_row['FLmin_baltopb_deposit'],8);?>" id="mindep">
            
        <!-- move -->
        <div class="form-floating mb-3">
            <input class="form-control bg-transparent text-white" type="number" name="amount" id="amount"
                   value="<?php echo number_format($site_info_row['FLmin_baltopb_deposit'],8);?>"
                   min="<?php echo number_format($site_info_row['FLmin_baltopb_deposit'],8);?>" 
                   step="<?php echo number_format($site_info_row['FLmin_baltopb_deposit'],8);?>">
            <label class="fw-bold" id="amountlabel"><?php echo ucwords($enterName.' '.$amountName). ' ('.$minName.' : '.$site_info_row['FLmin_baltopb_deposit'].' '. strtoupper($selectedCoin).')';?></label> 
            <label class="fw-bold text-danger d-none" id="amountErr"><?php echo ucwords($enterName.' '. ucfirst($validName).' '.$amountName);?></label> 
        </div>   

        <div>
            <button class="btn btn-outline-primary" type="submit" id="submitbtnbaltopb"
                    <?php if ($site_info_row['FLmin_baltopb_deposit'] > $user_info['FLbal']){ echo 'disabled';}?>><?php echo ucfirst($moveName);?></button>
        </div>
   
        </form>
    </div>
</div>
 

</div>

<script src="ctrl/deposit/baltopb/js/js.js" type="text/javascript"></script>