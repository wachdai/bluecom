<?php
class SmashingMagazine_BrandDirectory_Model_Observer extends Mage_Core_Model_Observer{
    public function beforesave($data){
        die("I have config success Observer Kakakaka");
    }
}