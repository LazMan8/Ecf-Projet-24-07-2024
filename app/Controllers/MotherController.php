<?php
 
 class MotherController{
    protected $arrData = array();


     protected function display($strView){
        foreach($this ->arrData as $key=>$value){
            $$key = $value;
        }

     }

 }