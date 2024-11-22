<!-- create db form -->
<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
    <!--sever name -->
    <div class="input-group mt-3 mb-3">
    <label class="input-group-text col-lg-4 fw-bold">Server Name : </label>
        <input class="form-control fw-bold" type="text" name="serverName" 
               placeholder="Enter Server Name" value="localhost" required="">
    </div>
    
    <div class="input-group mb-3">
    <label class="input-group-text col-lg-4 fw-bold">Database Name : </label>
        <input class="form-control fw-bold" type="text" name="dbName" 
               placeholder="Enter Database Name" required="">
    </div>
    
     <div class="input-group mb-3">
    <label class="input-group-text col-lg-4 fw-bold">Database User : </label>
        <input class="form-control fw-bold" type="text" name="dbUser" 
               placeholder="Enter Database User" required="">
    </div>
    
     <div class="input-group mb-3">
    <label class="input-group-text col-lg-4 fw-bold">Database Password : </label>
        <input class="form-control fw-bold" type="password" name="dbPass" placeholder="Enter Password" >
    </div>
    
    <div class="input-group mb-3"> 
    <input class="btn btn-outline-primary" type="submit" value="NEXT" name="next">
    </div>
</form>
