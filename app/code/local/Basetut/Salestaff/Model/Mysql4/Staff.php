<?php
class Basetut_Salestaff_Model_Mysql4_Staff extends Mage_Core_Model_Mysql4_Abstract{

    protected function _construct(){
        $this->_init('salestaff/staff', 'staff_id');
    }
}