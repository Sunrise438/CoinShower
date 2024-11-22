<div class="row">
    <div class="col-lg-4">
        
        <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <div class="input-group">
                <input type="text" class="form-control" name="domain" 
                       placeholder="<?php echo ucfirst($enterName).' '. ucfirst($emailName).' (ex : example.com)';?>" required="">
                <button type="submit" class="btn btn-outline-primary"><?php echo ucfirst($addName);?></button>
            </div>
            <span class="text-danger fw-bold"><?php if(isset($dataErr)){ echo $dataErr;}?></span>
            
        </form>
        
    </div>
    <div class="col-lg-8"></div>
</div>