<?php
class SmashingMagazine_BrandExample_Block_Navigation extends Mage_Catalog_Block_Navigation{

    public function renderCategoriesMenuHtml($level = 0, $outermostItemClass='', $childrenWrapClass=''){

        $active = ($this->getRequest()->getRouteName()=='brand' ? 'active' : '');

        $html   =   parent::renderCategoriesMenuHtml($level, $outermostItemClass, $childrenWrapClass);

        // if module is active
        if(Mage::helper('core/data')->isModuleEnabled('SmashingMagazine_BrandExample')){
            //adding new menu item, you can also add few or child elements there
            $html .= "<li class ='$outermostItemClass $active'><a class='$outermostItemClass'> href='" . Mage::getUrl('brand') . "'><span>". Mage::helper('brand')->__('Shop by brand')."</span></a></li>";

        }
        return $html;

    }
}