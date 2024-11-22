<!-- create db form -->
<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
    <!--sever name -->
    <div class="input-group mt-3 mb-3">
    <label class="input-group-text col-lg-4 fw-bold">Email : </label>
    <input class="form-control fw-bold" type="email" name="email" 
               placeholder="Enter Email" value="" required="">
    </div>
    
    <div class="input-group mb-3">
    <label class="input-group-text col-lg-4 fw-bold">Password : </label>
    <input class="form-control fw-bold" type="password" name="pass" 
               placeholder="Enter Password" required="">
    </div>
    
    <div class="input-group mb-3"> 
    <input class="btn btn-outline-primary" type="submit" value="NEXT" name="next">
    </div>
</form>
