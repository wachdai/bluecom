<?php
class Bluecom_Helloworld_IndexController extends Mage_Core_Controller_Front_Action{
    public function indexAction(){


        $this->loadLayout();
        $this->renderLayout();
    }
    public function byeAction(){
        $this->loadLayout();
        $this->renderLayout();
    }
    public function paramsAction(){
        echo "you are in params action";
        echo '<dl>';
        foreach($this->getRequest()->getParams() as $key=>$value){
            echo '<dt><strong>Param: </strong>'. $key.'</dt';
            echo '<dl><strong>Value: </strong>'. $value.'</dt>';
        }
    }
}