<?php

//change api class
class settingsEarnClass{
    private $ftimer;
    private $famount;
    private $famount_usd;
    private $frefcommi;
    private $fcoin;
    private $fcoin_value;

    //set timer
    public function setTimer($ftimer){
        if (is_numeric($ftimer) && $ftimer > 0){
            $this->ftimer = (int)abs($ftimer);
        }
    }
    
    //set amount
    public function setAmount($famount){
        if (is_numeric($famount) && $famount > 0){
            $this->famount = (float)abs($famount);
        }
    }
    
    //set amount usd
    public function setAmountUSD($famount_usd){
        if (is_numeric($famount_usd) && $famount_usd > 0){
            $this->famount_usd = (float)abs($famount_usd);
        }
    }
    
    //set referrals commission
    public function setRefCommission($frefcommi){
        if (is_numeric($frefcommi) && $frefcommi > 0){
            $this->frefcommi = (float)abs($frefcommi);
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
            $sql = "UPDATE site_info SET faucet_timer = '$this->ftimer' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                    header('location:faucet_settings');
                    
                }
        }      
    }
    
    //update amount
    public function updateAmount($conn){
        if (isset($this->famount)){
            $sql = "UPDATE site_info SET faucet_amount = '$this->famount' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                    header('location:faucet_settings');
                    
                }
        }      
    }
    
    //update amount usd
    public function updateAmountUSD($conn){
        if (isset($this->famount_usd)){
            $sql = "UPDATE site_info SET faucet_amount_usd = '$this->famount_usd' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                    header('location:faucet_settings');
                    
                }
        }      
    }
    
    //update amount
    public function updateRefCommission($conn){
        if (isset($this->frefcommi)){
            $sql = "UPDATE site_info SET faucet_ref_commission = '$this->frefcommi' WHERE id = 1 ";
                if ($conn->query($sql) === TRUE){
                    header('location:faucet_settings');
                    
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
                    header('location:faucet_settings');
                    
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
                    header('location:faucet_settings');
                    
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
        if (isset($_POST['earnamountupdate'])){
            require 'libs/fun/coin_value_usd.php';
            coinValuUSD();
            $famount = $site_info_row['faucet_amount_usd']/$selectedCoin_value;
            $se->setAmount($famount);
            $se->updateAmount($conn);
        }
        
        //set amount
        if (isset($_POST['earnamount'])){
            $famount = test_input($_POST['earnamount']);
            $se->setAmount($famount);
            $se->updateAmount($conn);
        }
        
        //set amount usd
        if (isset($_POST['earnamountusd'])){
            $famount_usd = test_input($_POST['earnamountusd']);
            $se->setAmountUSD($famount_usd);
            $se->updateAmountUSD($conn);
        }
        
        //set referrals commission
        if (isset($_POST['earnrefcommission'])){
            $frefcommi = test_input($_POST['earnrefcommission']);
            $se->setRefCommission($frefcommi);
            $se->updateRefCommission($conn);
        }
        
        //set referrals commission
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