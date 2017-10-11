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
            $arr_products[] = array(
                'sku'=>$ob->getSKU(),
                'name'=>$ob->getName(),
                'type_id'=>$ob->getType_id(),
                'description'=>$ob->getDescription(),
                'color'=>$ob->getColor(),
                'fit'=>$ob->getFit(),
                'size'=>$ob->getSize(),
                'price'=>$ob->getPrice(),
                'weight'=>$ob->getWeight(),
                'img'=>Mage::getModel('catalog/product_media_config')->getMediaUrl($ob->getData("small_image"))
            );        }
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
    {   $search = $_GET["search"];http://magento1.dev/index.php/hello/index/product
//        $productSku = array('msj006c-Red-M', 'wbk012c-Royal Blue-L');
        $products = Mage::getModel('catalog/product')
            ->getCollection()
            ->addAttributeToFilter('name', array('like' => "%$search%"))
            ->addAttributeToSelect('*')
//            ->addAttributeToSelect(array('sku','name','description','price','small_image','weight'))
            ->load();
        $arr_search = array();
//        $images = array();
        foreach($products as $product){
            $arr_search[] = array(
                'sku'=>$product->getSKU(),
                'name'=>$product->getName(),
                'description'=>$product->getDescription(),
                'size'=>$product->getSize(),
                'price'=>$product->getPrice(),
                'weight'=>$product->getWeight(),
                'img'=>Mage::getModel('catalog/product_media_config')->getMediaUrl($product->getData("small_image"))
        );

//            $arr_search[]= $product
//                ->toArray(array());
//            $images_obj = Mage::helper('catalog/image')->init($product, 'small_image');
//            $images[] = (string)$images_obj;
        }
        return $this->getResponse()
            ->setHeader('Content-type', 'application/json')
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setBody(json_encode($arr_search));
    }

}