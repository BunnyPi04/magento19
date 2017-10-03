<?php
/**
 * Created by PhpStorm.
 * User: hangpt
 * Date: 03/10/2017
 * Time: 16:29
 */
require_once(BP . DS . 'app' . DS . 'code' . DS . 'core' . DS . 'Mage' . DS . 'Adminhtml' . DS . 'controllers' . DS . 'Report' . DS . 'SalesController.php');

class SM_Cashier_Adminhtml_CashierController extends Mage_Adminhtml_Controller_Action{

    public function indexAction(){
        $this->_title("Manager Cashiers");
        $collection = Mage::getModel('cashier/user')->getCollection();
//        var_dump($collection->getData());
//        die('gg');
        $this->loadLayout();
        $this->renderLayout();
    }

}