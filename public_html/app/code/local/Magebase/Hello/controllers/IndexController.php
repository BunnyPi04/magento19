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
            ->setPageSize(100);
        $arr_customers = array();
        foreach ($customer as $ob)
        {
            $arr_customers[]= $ob
                ->toArray(array());
            //->toArray();
        }
        return $this->getResponse()
            ->setHeader('Content-type', 'application/json')
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setBody(json_encode($arr_customers));
    }

    public function productAction()
    {
        $product = Mage::getModel('catalog/product')
            ->getCollection()
            ->addAttributeToSelect('*')
            ->setOrder('entity_id', 'DESC')
            ->setPageSize(100);
        $arr_products = array();
        foreach ($product as $ob)
        {
            $arr_products[]= $ob
                ->toArray(array());
            //->toArray();
        }
        return $this->getResponse()
            ->setHeader('Content-type', 'application/json')
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setBody(json_encode($arr_products));
    }
    public function paymentAction()
    {
        $payment = Mage::getModel('payment/config')->getAllMethods();

        foreach ($payment as $paymentCode=>$paymentModel) {
            $paymentTitle = Mage::getStoreConfig('payment/'.$paymentCode.'/title');
            $paymentStatus = Mage::getStoreConfig('payment/'.$paymentCode.'/active');
            $methods[] = array(
                'title'   => $paymentTitle,
                'code' => $paymentCode,
                'status' => $paymentStatus
            );
        }
        return $this->getResponse()
            ->setHeader('Content-type', 'application/json')
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setBody(json_encode($methods));
    }
    public function shippingAction()
    {
        $shipping = Mage::getModel('shipping/config')->getAllCarriers();
        $arr_shipping = array();

        foreach ($shipping as $shippingCode=>$shippingModel) {
            $shippingTitle = Mage::getStoreConfig('carriers/'.$shippingCode.'/title');
            $shippingStatus = Mage::getStoreConfig('carriers/'.$shippingCode.'/active');
            $methods[] = array(
                'title'   => $shippingTitle,
                'code' => $shippingCode,
                'status' => $shippingStatus
            );
        }
        return $this->getResponse()
            ->setHeader('Content-type', 'application/json')
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setBody(json_encode($methods));
    }
    public function searchproductAction()
    {   $search = $_GET["search"];
//        $productIds = array('msj006c-Red-M', 'wbk012c-Royal Blue-L');
        $products = Mage::getModel('catalog/product')
            ->getCollection()
            ->addAttributeToFilter('name', array('like' => "%$search%"))
            ->addAttributeToSelect(array('name','description','price','small_image','weight'))
            ->load();
        $arr_search = array();
        foreach($products as $product){
            $arr_search[]= $product
                ->toArray(array());
        }
        return $this->getResponse()
            ->setHeader('Content-type', 'application/json')
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setBody(json_encode($arr_search));
    }

}