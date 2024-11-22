<div class="row">
    <div class="col-lg-4">
        
        <form class="form-horizontal">

            <div class="input-group">
                <input type="hidden" name="t" value="user" required="">
                
                <input type="email" class="form-control" name="req" 
                       placeholder="<?php echo ucfirst($enterName).' '. ucfirst($emailName);?>" required="">
                <button type="submit" class="btn btn-outline-primary"><?php echo ucfirst($viewName);?></button>
            </div>
            <span class="text-danger fw-bold"><?php if(isset($dataErr)){ echo $dataErr;}?></span>
            
        </form>
        
    </div>
    <div class="col-lg-8"></div>
</div>