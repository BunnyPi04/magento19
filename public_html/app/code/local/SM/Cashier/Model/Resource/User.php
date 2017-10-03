<?php
/**
 * Created by PhpStorm.
 * User: hangpt
 * Date: 03/10/2017
 * Time: 16:28
 */

class SM_Cashier_Model_Resource_User extends Mage_Core_Model_Resource_Db_Abstract{
    public function _construct(){
        $this->_init('cashier/user','cashier_user_id');
    }
}
