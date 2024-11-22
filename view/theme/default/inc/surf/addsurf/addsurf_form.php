<div class="addsurf-blade col-lg-12" ng-app="">
    <div class="row">
        <div class="col-lg-12 p-3 border rounded mt-3 mb-3">
            <span class="text-center"><?php echo $addAdsComandName;?></span>
        </div>
    </div>
    
    <span class="text-danger fw-bold" id="err"><?php if(isset($dataErr)){ echo ucfirst($dataErr);}?></span>
   
<div class="row">
    <div class="col-lg-12 p-3 border rounded mt-3 mb-3">
        <form id="advertisesurf" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="a" 
                   value="<?php if (isset($ads_info)){ echo 'e';}else{ echo 'a';}?>" required="">
            <input type="hidden" name="id" 
                   value="<?php if (isset($ads_info)){ echo $ads_info['id'];}?>" required="">
            
    <!-- title -->
    <div class="form-floating mb-3">
        <input  class="form-control bg-transparent" type="text" name="title" id="title" ng-model="title"
                ng-init="title='<?php if (isset($ads_info)){ echo $ads_info['title'];}?>'"  required="">
        <label class="fw-bold">
            <span id="titlelabel"><?php echo ucfirst($titleName.' '.$uptoName. ' 60 '.$charactersName);?></span><span class="text-danger d-none" id="titleErr"><?php echo ' '.ucfirst($titleShouldBeName);?></span>
        </label>
    </div>
            
   <!-- description -->
    <div class="form-floating mb-3">
        <textarea class="form-control bg-transparent" name="description" id="description" ng-model="description"
                  rows="1" ng-init="description='<?php if (isset($ads_info)){ echo $ads_info['description'];}?>'"></textarea>
        <label class="fw-bold">
            <span id="descriptionlabel"><?php echo ucfirst($descriptionName.' '.$uptoName. ' 200 '.$charactersName);?></span><span class="text-danger d-none" id="descriptionErr"><?php echo ' '.ucfirst($descriptionShouldBeName);?></span>
        </label>
   </div>
            
    <!-- url -->
    <div class="form-floating mt-3 mb-3">
        <input class="form-control bg-transparent" type="url" id="url" name="url" ng-model="url"
               ng-init="url='<?php if (isset($ads_info)){ echo $ads_info['url'];}?>'" required="">
        <label class="fw-bold">
            <span id="urllabel"><?php echo ucfirst($urlName).' (https://example.com)';?></span><span class="text-danger d-none" id="urlErr"><?php echo ' '.ucfirst($enterName).' '. ucfirst($validName).' '. ucfirst($urlName);?></span>
        </label> 
    </div>

    <!-- counrty -->
    <div class="form-floating mb-3">
        <select class="form-control bg-transparent" name="countryCode">
            <?php
            foreach ($countries AS $key => $value){
                echo '<option value="'.$key.'">'.$value.'</option>';
            }
            ?>
        </select>
        <label class="fw-bold"><?php echo ucfirst($targetCountryName)?></label>
    </div>
    
    <div class="row">
        <div class="col-xl-4">
            <!-- Base Price -->
            <div class="form-floating mb-3">
                <input class="form-control bg-transparent" type="number" 
                       value="<?php echo number_format($site_info_row['surf_base_price'],8);?>" readonly="">
                <input type="hidden" min="<?php echo number_format($site_info_row['surf_base_price'],8);?>" 
                       ng-model="baseprice"
                               value="<?php echo number_format($site_info_row['surf_base_price'],8);?>"  name="baseprice"  
                               id="baseprice" required="">
                <label class="fw-bold"><?php echo ucfirst($basePriceName);?></label> 
            </div>
        </div>
        <div class="col-xl-4">
            <!-- duration -->
            <div class="form-floating mb-3">
                <input type="hidden" id="min" value="<?php echo $site_info_row['surf_min_duration'];?>">
                <input type="hidden" id="max" value="<?php echo $site_info_row['surf_max_duration'];?>">
                <input class="form-control bg-transparent" type="number" id="duration" 
                       name="duration" ng-model="duration"
                       ng-init="duration=<?php if (isset($ads_info)){ echo $ads_info['duration'];}else{ echo $site_info_row['surf_min_duration'];}?>" 
                       min="<?php echo $site_info_row['surf_min_duration'];?>" max="<?php echo $site_info_row['surf_max_duration'];?>"
                       step="1" required="">
                <label class="fw-bold">
                    <span id="durationlabel"><?php echo ucfirst($durationName.' ('.$minName.' : '.$site_info_row['surf_min_duration'].', '.$maxName.' : '.$site_info_row['surf_max_duration']).')';?></span><span class="text-danger d-none" id="durationErr"><?php echo ' '.ucfirst($durationShouldBeName.' '.$site_info_row['surf_min_duration'].' '.$orMoreThanName.' '.$site_info_row['surf_max_duration'].' '.$secondsName);?></span>
                </label> 
            </div>
        </div>
        
        <div class="col-xl-4">
            <!--min rating -->
            <div class="form-floating mb-3">
                    <input class="form-control bg-transparent" type="number" min="0" step="any" 
                           value="<?php if (isset($ads_info)){ echo $ads_info['r_min'];}else{ echo 0;}?>"  
                           name="rmin" id="rmin"  required="">
                <label class="fw-bold">
                    <span id="rminlabel"><?php echo ucfirst($ratingToViewName);?> : <?php echo ucfirst($minName);?></span><span class="text-danger d-none" id="rminErr"><?php echo ' '.ucfirst($ratingShouldBeName);?></span>
                </label>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-12">
            <p class="text-justify text secondary"><?php echo ucfirst($surfRatinInfoName);?></p>
        </div>
    </div>
    
    <input type="hidden" value="<?php echo $site_info_row['surf_price_per_second'];?>" name="pricepersecond" id="pricepersecond"
           ng-model="pricepersecond"  >
    
    <?php 
    if (isset($_GET['q']) && isset($_GET['token'])){
    ?>
        <input type="hidden" name="edit" value="edit" required="">
        <input type="hidden" name="id" value="<?php if (isset($ads_info)){ echo $ads_info['id'];}?>" required="">
    <?php
    } else {
    ?>
        <input type="hidden" name="add" value="add" required="">
    <?php
    }
        ?>
    
   <div class="row">
       <div class="col-lg-12 mt-3 mb-3 p-3 text-break">
           <h2 class="text-primary" ng-bind="title"></h2>
           <h4 class="text-secondary" ng-bind="description"></h4>       
               <h5><?php echo ucfirst($durationName).' ';?><span id="TadsS" ng-bind="duration"><?php echo $site_info_row['surf_min_duration'];?></span>
                   <?php echo ' '.$secondsName;?></h5>
               <h5><span id="adsV">
                   <?php 
                   if (isset($ads_info['price'])){
                       echo number_format($ads_info['price'],$site_info_row['truncate_currency']);
                   } else {
                       echo number_format($site_info_row['surf_base_price'],$site_info_row['truncate_currency']);
                   }
                   ?> 
                   </span>
               <?php echo strtoupper($selectedCoin).' '.$perName.' '.$viewName;?></h5>
           <a class="btn btn-outline-success" target="_blank" id="link-6" ng-href="{{url}}"><?php echo ucfirst($viewName);?></a>
       </div>
   </div>   
   
    <?php
    if (isset($ads_info)){
        ?>
       <div class="col-lg-12">
       <input type="submit" class="btn btn-outline-primary fw-bold" name="submit" id="submitbtn"
              value="<?php echo strtoupper($createName).' '. strtoupper($campaignName);?>">
        </div>
       <?php
    }else if (checkpreviousSurfViewed()){
        if ($user_info['p_bal'] > $site_info_row['surf_min_bal']){
        ?>
       <div class="col-lg-12">
       <input type="submit" class="btn btn-outline-primary fw-bold" name="submit" id="submitbtn"
              value="<?php echo strtoupper($createName).' '. strtoupper($campaignName);?>">
        </div>
           <?php
       }elseif (isset($ads_info)) {
           ?>
       <div class="col-lg-12">
       <input type="submit" class="btn btn-outline-primary fw-bold" name="submit" id="submitbtn"
              value="<?php echo strtoupper($createName).' '. strtoupper($campaignName);?>">
        </div>
           <?php
       } else {
           ?>
           <div class="text-danger fw-bold">
               <?php echo ucfirst($yourPBIsInsufficientToSurfName);?>
           </div>
           <?php
       }
    } else {
       ?>
       <div class="text-danger fw-bold">
           <?php echo ucfirst($youCanNotCreateMultipleAdsName);?>
       </div>
       <?php
    }
   ?>
           
   
        </form>
    </div>
</div>
 

</div>


<script src="view/theme/<?php echo $themeAction;?>/js/surf.js" type="text/javascript"></script>