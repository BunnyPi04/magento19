<?php
class Pfay_Films_Block_Monblock extends Mage_Core_Block_Template
{
    public function methodblock()
    {

//        $film = Mage::getModel('pfay_films.xml/film');
//        $film->setName('James');
//        $film->save();
        $retour='';
        $collection = Mage::getModel('pfay_films/film')
            ->getCollection();
//            ->addFieldToFilter('name','James')
//            ->setOrder('name','asc');

        foreach ($collection as $film) {
            ?>
            <a> * Bản ghi: id= </a>
            <?php
            echo $film->getId_pfay_films().'<br/>'; ?>
            <a>Tên phim: </a>
            <?php
            echo $film->getName().'<br/>';
//            echo $film->getName().'<br/>';
//            $retour.=$film->getData('name.').'<br/>';
        };
//        Mage::getSingleton('adminhtml/session')->addSuccess('Cool Ca marrche !!');
//        return $retour;
////        var_dump($filmDeux->getData());
//        $helper = Mage::helper('pfay_films.xml');
//        return '2*2 = '.$helper->foisdeux(2);
     }
}
