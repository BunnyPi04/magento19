<?php
class Pfay_Films_Model_Resource_Film extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('pfay_films/film', 'id_pfay_films');
    }
}
//CREATE TABLE `magento`.`pfay_films.xml` (
//`id_pfay_films` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
// `name` VARCHAR( 100 ) NOT NULL ,
//);

?>