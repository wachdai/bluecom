<?php
class Alanstormdotcom_Weblog_Model_Mysql4_Entity extends Mage_Core_Model_Mysql4_Abstract{
    protected function _construct(){
        $this->_init('weblog/entity','entity_id');
    }
}