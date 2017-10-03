<?php

class Pfay_Films_Block_Adminhtml_Grid extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        die('xxx');
        $this->_controller = 'adminhtml_films';
        $this->_blockGroup = 'films';
        $this->_headerText = Mage::helper('pfay_films')->__('ádasd');
        $this->_addButtonLabel = 'Add a movie';
        parent::__construct();
     }

    protected function _prepareLayout()
    {
        $this->setChild( 'grid',
            $this->getLayout()->createBlock( $this->_blockGroup.'/' . $this->_controller . '_grid',
                $this->_controller . '.grid')->setSaveParametersInSession(true) );
        return parent::_prepareLayout();
    }
}