<?php
class SmashingMagazine_BrandExample_Model_Observer {

    public function regeneratemenu($observer){

        if(!Mage::getStoreConfig('advanced/modules_disable_output/SmashingMagazine_BranExample')){

            $layout = Mage::getSingleton('core/layout');
            //



            $layout->getUpdate()->addUpdate('<remove name="catalog.topnav">');

            $layout->getUpdate()->load();

            $layout->generateXml();
            die;
            $layout->generateBlocks();

        }

    }

}