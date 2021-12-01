<?php

    class Promotion {
        private $full_discount_x = 0;
        private $full_discount_z = 0;
        private $pad = 0;
        private $special_full_qty_x = 0;
        private $specil_full_discount_y = 0;
        private $full_gift_x = 0;

        function __construct($arr=array()){
            if(!empty($arr)){
                if(!empty($arr['full_discount_x'])){
                    $this->full_discount_x = $arr['full_discount_x'];
                }
                if(!empty($arr['full_discount_z'])){
                    $this->full_discount_z = $arr['full_discount_z']/100;
                }
                if(!empty($arr['pad'])){
                    $this->pad = $arr['pad'];
                }
                if(!empty($arr['special_full_qty_x'])){
                    $this->special_full_qty_x = $arr['special_full_qty_x'];
                }
                if(!empty($arr['specil_full_discount_y'])){
                    $this->specil_full_discount_y = $arr['specil_full_discount_y'];
                }
                if(!empty($arr['full_gift_x'])){
                    $this->full_gift_x = $arr['full_gift_x'];
                }
            }
        }

        function getFullDiscount($total){
            if($total > $this->full_discount_x){
                $total = round($total*$this->full_discount_z);
            }
            echo "滿額：".$this->full_discount_x."元，打折：".$this->full_discount_z."，共：".$total."元<br>";
            return $total;
        }
        function getSpecialFullDiscount($total){
            if($this->pad > $this->special_full_qty_x){
                $total = $total - $this->specil_full_discount_y;
            }
            return $total;
        }
        function getSpecialGiftQty($total){
            if($total > $this->full_discount_x){
                echo  "贈送特別商品：".$this->full_gift_x."個<br>";
            }
        }

        
    }


?>