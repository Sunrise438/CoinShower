<div class="row">
    <div class="col-lg-3">
        
        <div class="input-group mt-3 mb-3">
            <input type="number" class="form-control fw-bold" id="ch" step="1" min="1" value="1000">
            <button class="btn btn-outline-secondary fw-bold" 
                    id="chbtn"><?php echo ucfirst($clearName.' '. ucfirst($historyName));?></button>
        </div>
        
        <div class="row">
            <div class="col-lg-12 mb-1 fw-bold">
                <p id="clearing" class="text-info" style="display: none;"><span class="spinner-border spinner-border-sm"></span>
                    <?php echo ucfirst($clearingName).'....';?>
                </p>
                <p id="crleared" class="text-success"></p>
            </div>
        </div>
             
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <p class="fw-bold text-secondary"><i class="bi bi-info-circle"></i> <?php echo ucwords($clearHistoryMSGName);?></p>
    </div>
</div>

<script src="ctrl/offerwall/clear/js/clear.js"></script>