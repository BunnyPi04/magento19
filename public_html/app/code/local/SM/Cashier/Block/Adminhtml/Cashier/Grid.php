<?php
/**
 * Created by PhpStorm.
 * User: hangpt
 * Date: 03/10/2017
 * Time: 16:29
 */

class SM_Cashier_Block_Adminhtml_Cashier_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId('cashierGrid');
        $this->setDefaultSort('cashier_user_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel('cashier/user')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('cashier_user_id', array(
            'header' => Mage::helper('cashier')->__('ID'),
            'align' => 'right',
            'width' => '50px',
            'index' => 'xpos_user_id',
        ));

        $this->addColumn('username', array(
            'header' => Mage::helper('cashier')->__('Username'),
            'align' => 'left',
            'index' => 'username',
        ));

        $this->addColumn('firstname', array(
            'header' => Mage::helper('cashier')->__('FirstName'),
            'align' => 'left',
            'index' => 'firstname',
        ));

        $this->addColumn('lastname', array(
            'header' => Mage::helper('cashier')->__('LastName'),
            'align' => 'left',
            'index' => 'lastname',
        ));

        $this->addColumn('created_time', array(
            'header' => Mage::helper('cashier')->__('CreatedTime'),
            'align' => 'left',
            'index' => 'created_time',
        ));

        $this->addColumn('modified_time ', array(
            'header' => Mage::helper('cashier')->__('ModifiedTime '),
            'align' => 'left',
            'index' => 'modified_time',
        ));


        return parent::_prepareColumns();
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getCashierUserId()));
    }

    protected function _prepareMassaction() {
        $this->setMassactionIdField('cashier_user_id');
        $this->getMassactionBlock()->setFormFieldName('cashier');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => Mage::helper('cashier')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('cashier')->__('Are you sure?')
        ));

        return $this;
    }

}
