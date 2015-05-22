<?php
class Basetut_Salestaff_Block_Adminhtml_Staff_Grid extends Mage_Adminhtml_Block_Widget_Grid{

    public function __construct(){
        parrent::__construct();

        $this->setId('staffGrid');

        $this->setDefaultSort(staff_id);

        $this->setDefaultDir('ASC');

        $this->setSaveParametersInSession(true);
    }
    /**
     * lay ra collection can hien thi len grid
     */
    protected function _prepareCollection(){
        $collection = Mage::getModel('salestaff/staff')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    /**
     * Ham chuan bij truoc khi in ra grid
     */

    protected function _prepareColumns(){
        $this->addColumn('staff_id', array(
            'header'    =>  Mage::helper('salestaff')->__('ID'),
            'align'     =>  'right',
            'width'     =>'50px',
            'index'     =>'staff_id'


        ));
        $this->addColumn('name',array(
            'header'    => Mage::helper('salestaff')->__('Name'),
            'align'     => 'left',
            'index'     => 'name'
        ));
        $this->addColumn('birthday',array(
            'header'    => Mage::helper('salestaff')->__('Birthday'),
            'width'     => '150px',
            'index'     => 'birthday',
            'type'      => 'date'

        ));
        $this->addColumn('sex', array(
            'header' => Mage::helper('salestaff')->__('Sex'),
            'align' => 'left',
            'width' => '80px',
            'index' => 'sex',
            'type' => 'options',
            'options' => array(
                1 => 'Male',
                2 => 'Female',
            ),
        ));

        $this->addColumn('status', array(
            'header' => Mage::helper('salestaff')->__('Status'),
            'align' => 'left',
            'width' => '80px',
            'index' => 'status',
            'type' => 'options',
            'options' => array(
                1 => 'Enabled',
                2 => 'Disabled',
            ),
        ));

        return parent::_prepareColumns();
    }
    /**
     * Ham tra lai URL cho moi row trong grid
     */
    public function getRowUrl($row){
        return '#';
    }
}