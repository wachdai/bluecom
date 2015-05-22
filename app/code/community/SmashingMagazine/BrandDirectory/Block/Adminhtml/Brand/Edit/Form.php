<?php
class SmashingMagazine_BrandDirectory_Block_Adminhtml_Brand_Edit_Form
    extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        // instantiate a new form to display our brand for editing
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl(
                    'smashingmagazine_branddirectory_admin/brand/edit',
                    array(
                        '_current' => true,
                        'continue' => 0,
                    )
                ),
            'method' => 'post',
            'enctype' => 'multipart/form-data'

        ));
        $form->setUseContainer(true);
        $this->setForm($form);

        // define a new fieldset, we only need one for our simple entity
        $fieldset = $form->addFieldset(
            'general',
            array(
                'legend' => $this->__('Brand Details')
            )
        );

        $brandSingleton = Mage::getSingleton(
            'smashingmagazine_branddirectory/brand'
        );

        // add the fields we want to be editable

        $this->_addFieldsToFieldset($fieldset, array(
            'name' => array(
                'label' => $this->__('Name'),
                'input' => 'text',
                'required' => true,
            ),
            'url_key' => array(
                'label' => $this->__('URL Key'),
                'input' => 'text',
                'required' => true,
            ),
            'description' => array(
                'label' => $this->__('Description'),
                'input' => 'textarea',
                'required' => true,
            ),
            'visibility' => array(
                'label' => $this->__('Visibility'),
                'input' => 'select',
                'required' => true,
                'options' => $brandSingleton->getAvailableVisibilies(),
            ),

            /**
             * Note: we have not included created_at or updated_at,
             * we will handle those fields ourself in the Model before save.
             */
        ));
        $fieldset->addField('image','image',array(
            'label' => $this->__('Brand Image'),
            'required'=>true,
            'name'    =>'image'
        ));

        return $this;
    }

    /**
     * This method makes life a little easier for us by pre-populating
     * fields with $_POST data where applicable and wraps our post data in
     * 'brandData' so we can easily separate all relevant information in
     * the controller. You can of course omit this method entirely and call
     * the $fieldset->addField() method directly.
     */
    protected function _addFieldsToFieldset(
        Varien_Data_Form_Element_Fieldset $fieldset, $fields)
    {
        $requestData = new Varien_Object($this->getRequest()
            ->getPost('brandData'));

        foreach ($fields as $name => $_data) {
            if ($requestValue = $requestData->getData($name)) {
                $_data['value'] = $requestValue;
            }

            // wrap all fields with brandData group
            $_data['name'] = "brandData[$name]";

            // generally label and title always the same
            $_data['title'] = $_data['label'];

            // if no new value exists, use existing brand data
            if (!array_key_exists('value', $_data)) {
                $_data['value'] = $this->_getBrand()->getData($name);
            }

            // finally call vanilla functionality to add field
            $fieldset->addField($name, $_data['input'], $_data);
        }

        return $this;
    }

    /**
     * Retrieve the existing brand for pre-populating the form fields.
     * For a new brand entry this will return an empty Brand object.
     */
    protected function _getBrand()
    {
        if (!$this->hasData('brand')) {
            // this will have been set in the controller
            $brand = Mage::registry('current_brand');

            // just in case the controller does not register the brand
            if (!$brand instanceof
                SmashingMagazine_BrandDirectory_Model_Brand) {
                $brand = Mage::getModel(
                    'smashingmagazine_branddirectory/brand'
                );
            }

            $this->setData('brand', $brand);
        }

        return $this->getData('brand');
    }
}