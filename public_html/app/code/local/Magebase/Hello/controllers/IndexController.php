<?php

class Magebase_Hello_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * index action
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    public function customerAction()
    {
        $customer = Mage::getModel('customer/customer')
            ->getCollection()
            ->addAttributeToSelect('*')
            ->setOrder('entity_id', 'DESC')
            ->setPageSize(1);
        $arr_products = array();
        foreach ($customer as $ob)
        {
            $arr_products[]= $ob
                ->toArray(array());
            //->toArray();
        }
        return $this->getResponse()->setBody(json_encode($arr_products));
    }
}