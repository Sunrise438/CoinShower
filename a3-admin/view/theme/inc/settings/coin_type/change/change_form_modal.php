<!-- The payment_method Modal -->
<div class="modal" id="cointypeform">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo ucfirst($editName).' '. ucfirst($menuName);?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <!-- Modal body -->
                <div class="modal-body">
                    
                    <div id="change"></div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button  class="btn btn-outline-primary" type="submit"><?php echo ucfirst($saveName)?></button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo ucfirst($closeName)?></button>
                </div>
                    </form>

        </div>
    </div>
</div>