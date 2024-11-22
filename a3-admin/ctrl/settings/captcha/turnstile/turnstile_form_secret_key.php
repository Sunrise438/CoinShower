<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

    <div class="input-group mt-3 mb-3">
        <div class="form-floating">
            <input type="text" class="form-control" name="turnstilesecretkey" value="<?php echo $turnstile_secret_key;?>"
            placeholder="<?php echo ucfirst($enterName).' '. ucfirst($secretName).' '. ucfirst($keyName)?>" required="">
            <label><?php echo ucfirst($secretName).' '. ucfirst($keyName);?></label>
        </div>
        <input type="submit" class="btn btn-outline-primary btn-sm fw-bold" value="<?php echo ucfirst($changeName);?>">
    </div>

</form>
