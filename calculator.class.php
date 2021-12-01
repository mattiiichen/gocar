<?php

    class Calculator {

        private $pen = 0;
        private $notebook = 0;
        private $pad = 0;
        private $eraser = 0;

        function __construct($arr=array()){
            if(!empty($arr)){
                if(!empty($arr['pen'])){
                    $this->pen = $arr['pen'];
                }
                if(!empty($arr['notebook'])){
                    $this->notebook = $arr['notebook'];
                }
                if(!empty($arr['pad'])){
                    $this->pad = $arr['pad'];
                }
                if(!empty($arr['eraser'])){
                    $this->eraser = $arr['eraser'];
                }
            }
        }

        function valid($pdo){
            $get_rows = $pdo -> query("select * from product");
        
            foreach($get_rows as $value){
                foreach($value as $v){
                    if($v == "pen"){
                        $pen_price = $value['price'];
                    }elseif($v == "notebook"){
                        $notebook_price = $value['price'];
                    }elseif($v == "pad"){
                        $pad_price = $value['price'];
                    }else{
                        $eraser_price = $value['price'];
                    }
                }               
            }
            $total = ($this->pen*$pen_price)+($this->notebook*$notebook_price)+($this->eraser*$eraser_price)+($this->pad*$pad_price);
            echo "總計：".$total."元<br>";
            echo "1. 筆(單價15元)".$this->pen."支 共".$this->pen*$pen_price."元<br>";
            echo "2. 記事本(單價20元)".$this->notebook."支 共".$this->notebook*$notebook_price."元<br>";
            echo "3. 像皮擦(單價10元)".$this->eraser."支 共".$this->eraser*$eraser_price."元<br>";
            echo "4. 墊板(單價15元)".$this->pad."支 共".$this->pad*$pad_price."元<br>";
            return $total;
        }
    }


?>