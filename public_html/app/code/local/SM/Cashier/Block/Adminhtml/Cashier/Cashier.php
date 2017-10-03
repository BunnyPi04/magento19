<?php
/**
 * Created by PhpStorm.
 * User: hangpt
 * Date: 03/10/2017
 * Time: 16:39
 */

class SM_Cashier_Block_Adminhtml_Cashier_Cashier extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        die('sdfsd');
        parent::__construct();
        $this->_controller = 'adminhtml_cashier';
        $this->_blockGroup = 'cashier';
        $this->_headerText = Mage::helper('cashier')->__('Cashier Manager');
        $this->_addButtonLabel = Mage::helper('cashier')->__('Add cashier');

    }
}
