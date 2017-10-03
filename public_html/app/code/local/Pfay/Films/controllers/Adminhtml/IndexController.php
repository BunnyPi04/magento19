<?php

class Pfay_Films_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        die('xxx');
        $this->loadLayout();
        $this->_setActiveMenu('pfay/films');
        $this->_addContent($this->getLayout()->createBlock('pfay_films/'));
        $this->renderLayout();
    }

    public function demoAction(){
        var_dump('asdad');die;
    }
}