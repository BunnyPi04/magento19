<?php
/**
 * Created by PhpStorm.
 * User: hangpt
 * Date: 03/10/2017
 * Time: 16:31
 */

class SM_Cashier_Model_User extends Mage_Core_Model_Abstract{
    public function _construct(){
        parent::_construct();
        $this->_init('cashier/user');
    }

}