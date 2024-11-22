<?php

//change api class
class settingsEarnClass{
    private $ftimer;
    private $fbase_price;
    private $fprice_per_second;
    private $fbase_price_usd;
    private $fprice_per_second_usd;
    private $fcommi;
    private $frefcommi;
    private $fcoin;
    private $fcoin_value;
    private $fsurf_min_deposit;

    //set timer
    public function setTimer($ftimer){
        if (is_numeric($ftimer) && $ftimer > 0){
            $this->ftimer = (int)abs($ftimer);
        }
    }
    
    //set base price
    public function setBasePrice($fbase_price){
        if (is_numeric($fbase_price) && $fbase_price > 0){
            $this->fbase_price = (float)abs($fbase_price);
        }
    }
    
    //set price per second
    public function setPricePerSecond($fprice_per_second){
        if (is_numeric($fprice_per_second) && $fprice_per_second > 0){
            $this->fprice_per_second = (float)abs($fprice_per_second);
        }
    }
    
    //set base price USD
    public function setBasePriceUSD($fbase_price_usd){
        if (is_numeric($fbase_price_usd) && $fbase_price_usd > 0){
            $this->fbase_price_usd = (float)abs($fbase_price_usd);
        }
    }
    
    //set price per second USD
    public function setPricePerSecondUSD($fprice_per_second_usd){
        if (is_numeric($fprice_per_second_usd) && $fprice_per_second_usd > 0){
            $this->fprice_per_second_usd = (float)abs($fprice_per_second_usd);
        }
    }
    
    //set commission
    public function setCommission($fcommi){
        if (is_numeric($fcommi) && $fcommi > 0){
            $this->fcommi = (float)abs($fcommi);
        }
    }
    
    //set referrals commission
    public function setRefCommission($frefcommi){
        if (is_numeric($frefcommi) && $frefcommi > 0){
            $this->frefcommi = (float)abs($frefcommi);
        }
    }
    
    //surf min deposit
    public function setSurfMinDeposit($fsurf_min_deposit){
        if (is_numeric($fsurf_min_deposit) && $fsurf_min_deposit > 0){
            $this->fsurf_min_deposit = (float)abs($fsurf_min_deposit);
        }
    }
    
     //set coin type
    public function setCoinType($fcoin){
        if (isset($fcoin)){
            $this->fcoin = $fcoin;
        }
    }
    
     //set coin value
    public function setCoinValue($fcoin_value){
        if (isset($fcoin_value)){
            $this->fcoin_value = $fcoin_value;
        }
    }

    //update timer
    public function updateTimer($conn){
        if (isset($this->ftimer)){
            $sql = "UPDATE site_info SET earn_timer = '$this->ftimer' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                    header('location:earn_settings');
                    
                }
        }      
    }
    
    //update base price
    public function updateBaseprice($conn){
        if (isset($this->fbase_price)){
            $sql = "UPDATE site_info SET surf_base_price = '$this->fbase_price' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                    header('location:surf_settings');
                    
                }
        }      
    }
    
    //update price per second
    public function updatePricePerSecond($conn){
        if (isset($this->fprice_per_second)){
            $sql = "UPDATE site_info SET surf_price_per_second = '$this->fprice_per_second' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                    header('location:surf_settings');
                    
                }
        }      
    }
    
    //update base price USD
    public function updateBasepriceUSD($conn){
        if (isset($this->fbase_price_usd)){
            $sql = "UPDATE site_info SET surf_base_price_usd = '$this->fbase_price_usd' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                    header('location:surf_settings');
                    
                }
        }      
    }
    
    //update price per second USD
    public function updatePricePerSecondUSD($conn){
        if (isset($this->fprice_per_second_usd)){
            $sql = "UPDATE site_info SET surf_price_per_second_usd = '$this->fprice_per_second_usd' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                    header('location:surf_settings');
                    
                }
        }      
    }
    
    //update amount usd
    public function updateAmountUSD($conn){
        if (isset($this->famount_usd)){
            $sql = "UPDATE site_info SET earn_amount_usd = '$this->famount_usd' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                    header('location:earn_settings');
                    
                }
        }      
    }
    
    //update commission
    public function updateCommission($conn){
        if (isset($this->fcommi)){
            $sql = "UPDATE site_info SET surf_commission = '$this->fcommi' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                    header('location:surf_settings');
                    
                }
        }      
    }
    
    //update ref commission
    public function updateRefCommission($conn){
        if (isset($this->frefcommi)){
            $sql = "UPDATE site_info SET surf_ref_commission = '$this->frefcommi' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                    header('location:surf_settings');
                    
                }
        }      
    }
    
    //update ref commission
    public function updateSurfMinDeposit($conn){
        if (isset($this->fsurf_min_deposit)){
            $sql = "UPDATE site_info SET surf_min_deposit = '$this->fsurf_min_deposit' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                    header('location:surf_settings');
                    
                }
        }      
    }
    
    //update coin type
    public function updateCoinType($conn){
        if (isset($this->fcoin)){
            //change action 0
            $x = 0;
            $sql = "UPDATE coin_type SET status = 0 ";
                if ($conn->query($sql) === TRUE){
                    $x = 1;
                }
                
            if ($x = 1){
            //change coin type
            $sql = "UPDATE coin_type SET status = 1 WHERE coin = '$this->fcoin' ";
                if ($conn->query($sql) === TRUE){
                    header('location:surf_settings');
                    
                }
            }
            
        }      
    }
    
    //update coin type
    public function updateCoinValue($conn){
        if (isset($this->fcoin_value) && isset($this->fcoin)){

            //change coin type
            $sql = "UPDATE coin_type SET value = $this->fcoin_value WHERE coin = '$this->fcoin' ";
                if ($conn->query($sql) === TRUE){
                    header('location:surf_settings');
                    
                }           
        }      
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $se = new settingsEarnClass();
        
        //set timmer
        if (isset($_POST['earntimer'])){
            $ftimer = test_input($_POST['earntimer']);
            $se->setTimer($ftimer);
            $se->updateTimer($conn);
        }
        
        //set update faucet amount auto
        if (isset($_POST['surfpriceupdate'])){
            require 'libs/fun/coin_value_usd.php';
            coinValuUSD();
            
            $fbase_price = test_input($site_info_row['surf_base_price_usd']);
            $fbase_price = $fbase_price/$selectedCoin_value;
            $se->setBasePrice($fbase_price);
            $se->updateBasePrice($conn);
                    
            $fprice_per_second = test_input($site_info_row['surf_price_per_second_usd']);
            $fprice_per_second = $fprice_per_second/$selectedCoin_value;
            $se->setPricePerSecond($fprice_per_second);
            $se->updatePricePerSecond($conn);
        }
        
        //set base price
        if (isset($_POST['surfbaseprice'])){
            $fbase_price = test_input($_POST['surfbaseprice']);
            $se->setBasePrice($fbase_price);
            $se->updateBasePrice($conn);
        }
        
        //set price per seconds
        if (isset($_POST['surfpricepersecond'])){
            $fprice_per_second = test_input($_POST['surfpricepersecond']);
            $se->setPricePerSecond($fprice_per_second);
            $se->updatePricePerSecond($conn);
        }
        
        //set base price USD
        if (isset($_POST['surfbasepriceusd'])){
            $fbase_price_usd = test_input($_POST['surfbasepriceusd']);
            $se->setBasePriceUSD($fbase_price_usd);
            $se->updateBasePriceUSD($conn);
        }
        
        //set price per seconds USD
        if (isset($_POST['surfpricepersecondusd'])){
            $fprice_per_second_usd = test_input($_POST['surfpricepersecondusd']);
            $se->setPricePerSecondUSD($fprice_per_second_usd);
            $se->updatePricePerSecondUSD($conn);
        }
        
        //set amount usd
        if (isset($_POST['earnamountusd'])){
            $famount_usd = test_input($_POST['earnamountusd']);
            $se->setAmountUSD($famount_usd);
            $se->updateAmountUSD($conn);
        }
        
        //set commission
        if (isset($_POST['surfcommission'])){
            $fcommi = test_input($_POST['surfcommission']);
            $se->setCommission($fcommi);
            $se->updateCommission($conn);
        }
        
        //set referrals commission
        if (isset($_POST['surfrefcommission'])){
            $frefcommi = test_input($_POST['surfrefcommission']);
            $se->setRefCommission($frefcommi);
            $se->updateRefCommission($conn);
        }
        
        //set referrals commission
        if (isset($_POST['surfmindeposit'])){
            $fsurf_min_deposit = test_input($_POST['surfmindeposit']);
            $se->setSurfMinDeposit($fsurf_min_deposit);
            $se->updateSurfMinDeposit($conn);
        }
        
        //set coin type
        if (isset($_POST['coin'])){
            $fcoin = test_input($_POST['coin']);
            $se->setCoinType($fcoin);
            $se->updateCoinType($conn);
        }
        
        //set coin value
        if (isset($_POST['coinvalue'])){
            $fcoin_value = test_input($_POST['coinvalue']);
            $fcoin_value = (float)$fcoin_value;
            $se->setCoinValue($fcoin_value);
            $se->setCoinType($selectedCoin);
            $se->updateCoinValue($conn);
        }

}