<!-- The Modal -->
<div class="modal" id="<?php echo 'addmodal'.$row["id"];?>">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><?php echo ucfirst($depositName);?></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="col-xl-12">
                    <h6><?php echo ucwords($purchaseName.' '.$balanceName).' '.number_format($user_info['p_bal'],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?></h6>
                </div>
                
                <div class="col-xl-12" ng-app="">

                <div class="row">
                    <div class="col-lg-12 p-3 border rounded mt-3 mb-3">
                        <form id="advertisesurf" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <input type="hidden" name="id" 
                                   value="<?php if (isset($row)){ echo $row['id'];}?>" required="">


                        <div class="col-lg-6">
                            <!-- surf deposit -->
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control"
                                       min="<?php echo number_format($site_info_row['surf_min_deposit'],$site_info_row['truncate_currency']);?>" 
                                       max="<?php echo number_format($user_info['p_bal'],$site_info_row['truncate_currency']);?>" 
                                               value="<?php echo number_format($site_info_row['surf_min_deposit'],$site_info_row['truncate_currency']);?>"    
                                       step="any" name="deposit"  required="">
                                <label class="fw-bold"><?php echo ucfirst($depositName);?></label> 
                            </div>
                        </div>

                        <div class="col-lg-12">
                        <input type="submit" class="btn btn-outline-primary fw-bold" name="submit" id="submitbtn"
                              value="<?php echo strtoupper($depositName);?>">
                        </div>

                        </form>
                    </div>
                </div>


                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>



