<?php
 class SmashingMagazine_BrandDirectory_Block_Adminhtml_Template_Grid_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract{
     public function render(Varien_Object $row)
     {
         $out = '';
         if ($row && $image = $row->getImage())
         {
             $fileAdapter = new Varien_Io_File();
             $imageDir = Mage::getBaseDir('media') . DS . 'brand' .DS . $image;
             if ($fileAdapter->fileExists($imageDir)) {

                 $out   = "<img src='".Mage::getBaseUrl('media') . DS . 'brand' .DS . $image ."' width='100px'/>";
             }

         }

         return $out;
     }
 }