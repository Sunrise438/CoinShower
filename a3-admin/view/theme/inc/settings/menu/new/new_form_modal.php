<!-- The Modal -->
<div class="modal" id="addnew">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><?php echo ucfirst($addName).' '. ucfirst($newName);?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          
          <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              
            <input type="hidden" name="new" value="1" required=""> 
            <div class="input-group mt-3 mb-3">
                        <span class="input-group-text col-lg-4"><?php echo ucfirst($slugName);?> : </span>
                        <input type="text" class="form-control" name="slug" 
                               placeholder="<?php echo ucfirst($enterName).' '. ucfirst($slugName);?>" required="">
                    </div>
              
              <div class="input-group mt-3 mb-3">
                        <span class="input-group-text col-lg-4"><?php echo ucfirst($nameName);?> : </span>
                        <input type="text" class="form-control" name="name" 
                               placeholder="<?php echo ucfirst($enterName).' '. ucfirst($nameName);?>" required="">
                    </div>
            
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text col-lg-4"><?php echo ucfirst($typeName);?> : </span>
                <select class="form-select" name="type">
                    <option value="m"><?php echo ucwords($mainName.' '.$menuName);?></option>
                    <option value="u"><?php echo ucwords($userName.' '.$menuName);?></option>
                    <option value="s"><?php echo ucwords($sideName.' '.$menuName);?></option>
                    <option value="f"><?php echo ucwords($footerName.' '.$menuName);?></option>
                </select>
            </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
          <button  class="btn btn-outline-primary" type="submit"><?php echo ucfirst($saveName)?></button>
      </form>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>