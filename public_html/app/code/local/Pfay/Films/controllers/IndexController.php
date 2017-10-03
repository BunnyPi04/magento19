<?php
class Pfay_Films_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    public function mamethodeAction()
    {
//        $collection = Mage::getModel('pfay_films.xml/film')->getCollection();
//        foreach ($collection as $film) {
//            echo $film->getId().' Name: '.$film->getName().'<br/>';
//        }

//        $ids = array(1,3);
//        $collection = Mage::getModel('pfay_films.xml/film')
//                    ->getCollection()
//                    ->addFieldToFilter('id_pfay_films',array('in'=>$ids));
//        foreach ($collection as $film) {
//            echo $film->getId().' Name: '.$film->getName().'<br/>';
//        }

        $ids = array(1,3);
        $collection = Mage::getModel('pfay_films/film') //
                    ->getCollection();
//                    ->addFieldToFilter('name',array('like'=>'%2%'));
//                    ->setOrder('id_pfay_films','desc');
        foreach ($collection as $film) {
            echo $film->getId().' Name: '.$film->getName().'<br/>';
        }
    }
    public function saveAction() {
        $name = $this
                ->getRequest()
                ->getPost('name');
        $film = Mage::getModel('pfay_films/film'); //
        $film->setName($name);
        $film->save();

        $this->_redirect('films/index/index');
 //       echo $name;
  //      die('save action');
    }
}
