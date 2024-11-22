<!-- The seo settings Modal -->
<div class="modal" id="seo">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo ucfirst($editName).' '. strtoupper($seoName);?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <!-- Modal body -->
                <div class="modal-body">
                    
                    <input type="hidden" name="seosettings" required="">
    
                    
                     <div class="form-floating mt-3 mb-3">
                         <textarea name="description" class="form-control fw-bold"><?php echo $site_info_row['description'];?></textarea>
                            <label><?php echo ucfirst($descriptionName);?></label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea type="text" name="key" class="form-control fw-bold"><?php echo $site_info_row['keywords'];?></textarea>
                            <label><?php echo ucfirst($keyName).' '. ucfirst($wordsName);?></label>
                    </div>
                    <span class="text-secondary">(<?php echo $separateKeyWordsByCommaName;?>)</span>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button  class="btn btn-outline-primary" type="submit"><?php echo ucfirst($saveName)?></button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo ucfirst($closeName)?></button>
                </div>
                
                    </form>

        </div>
    </div>
</div>
</div>