<?php

    class Product {

       

        function getProducts($pdo){
            $get_rows = $pdo -> query("select * from product");
            foreach($get_rows as $arr){
                print_r($arr);
            }
            exit;
        }
        
    }


?>