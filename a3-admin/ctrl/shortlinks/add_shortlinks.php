<?php
    $gid = htmlspecialchars(strip_tags(trim($_GET['token'])));
    $gid = intval($gid);
    
    $sql = "SELECT * FROM shortlinks WHERE id = '$gid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
?>

<form method="post" action="">
    
    <div class="form-floating mb-3 mt-3">
        <input class="form-control" type="text" value="<?php echo $site_info_row['site_url'].'/shortlinks?q='. $row["link"];?>" readonly="">
        <label class="form-label"><?php echo ucfirst($linkName);?></label>
    </div>
    
    <input type="hidden" name="addlink" value="addshortlink" required="">
    <input type="hidden" name="linkid" value="<?php echo $row['id'];?>" required="">
    
    <div class="form-floating mb-3">
        <input class="form-control" type="number" name="limit" min="0"  step="1" 
               placeholder="Enter your limit" value="<?php echo $row['view_limit']?>" required="">
        <label class="form-label"><?php echo ucfirst($limitName);?></label>
    </div>
    
    <div class="form-floating mb-3">
        <input class="form-control" type="number" name="price" min="0.00000001" step="0.00000001" 
               placeholder="Enter your price" value="<?php if ($row['pay_amount'] != 0){echo number_format($row['pay_amount'],8); }else{ echo number_format(0.00000001,8);}?>" required="">
        <label class="form-label"><?php echo ucfirst($priceName);?></label>
    </div>
    
    <div class="form-floating mb-3">
        <input class="form-control" type="number" name="priceusd" min="0" step="0.0001" 
               placeholder="Enter USD price" value="<?php echo $row['usd_amount']?>" required="">
        <label class="form-label"><?php echo ucfirst($priceName).' USD';?></label>
    </div>
    
    <div class="form-floating mb-3">
        <input class="form-control" type="url" name="link" value="<?php echo $row['shortlinks']?>" placeholder="Enter your shortlink" required="">
        <label class="form-label"><?php echo ucfirst($shortlinksName);?></label>
    </div>
    
    <div class="form-floating mb-3">
        <input type="url" name="siteref" class="form-control" value="<?php echo $row['ref_shortlinks']?>" placeholder="Enter The Short Linkks Site Referral Link" required="">
        <label class="form-label"><?php echo ucfirst($referralName).' '. ucfirst($linkName);?></label>
    </div>
    
    <div class="form-floating mb-3">
        <input type="text" name="sitename" class="form-control" value="<?php echo $row['site_name']?>" placeholder="Enter Short site name" required="">
        <label class="form-label"><?php echo ucfirst($nameName);?></label>
    </div>
    
    <button class="btn btn-outline-primary"><b><?php echo ucfirst($addName).' '. ucfirst($shortlinksName);?></b></button>
            
</form>

<?php

class shortLink{
    private $shortlink;
    private $shortid;
    private $shortlimit;
    private $shortprice;
    private $shortpriceusd;
    private $siteref;
    private $sitename;
            
    function checkUrl($shortlink, $siteref){
        if (filter_var($shortlink, FILTER_VALIDATE_URL)){
            $this->shortlink = $shortlink;  
        }
        
        if (filter_var($siteref, FILTER_VALIDATE_URL)){
            $this->siteref = $siteref;  
        }
        
    }
            
    function setShortLink($shortid, $shortlimit, $shortprice, $shortpriceusd, $sitename, $conn){
        $this->shortid = intval($shortid);
        $this->shortlimit = intval($shortlimit);
        $this->shortprice = floatval($shortprice);
        $this->sitename = $sitename;
        $this->shortpriceusd = $shortpriceusd;
        
        if(isset($this->shortlink) && isset($this->shortid) && isset($this->shortlimit) && isset($this->shortprice)
                && isset($this->siteref) && isset($this->sitename)&& isset($this->shortpriceusd)){
            //update database
            $sql = "UPDATE shortlinks SET shortlinks = '$this->shortlink', view_limit = '$this->shortlimit',
                    pay_amount = '$this->shortprice', usd_amount = '$this->shortpriceusd', ref_shortlinks = '$this->siteref', site_name = '$this->sitename' "
                    . "WHERE id = '$this->shortid'";
            if($conn->query($sql) === TRUE){
                header('location:shortlinks');
              
            }
        }
    }
}
//generate new link
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($_POST['addlink'] == 'addshortlink'){
        
        $shortid = test_input($_POST['linkid']);
        $shortlink = test_input($_POST['link']);
        $shortlimit = test_input($_POST['limit']);
        $shortprice = test_input($_POST['price']);
        $shortpriceusd = test_input($_POST['priceusd']);
        $siteref = test_input($_POST['siteref']);
        $sitename = test_input($_POST['sitename']);
        
        //call to class
        $sg = new shortLink();
        $sg->checkUrl($shortlink, $siteref, $sitename);
        $sg->setShortLink($shortid, $shortlimit, $shortprice, $shortpriceusd, $sitename, $conn);
        
    }
}