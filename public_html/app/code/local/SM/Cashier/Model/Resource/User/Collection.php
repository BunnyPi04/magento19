<?php
/**
 * Created by PhpStorm.
 * User: hangpt
 * Date: 03/10/2017
 * Time: 16:28
 */
class SM_Cashier_Model_Resource_User_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('cashier/user');
    }

}
