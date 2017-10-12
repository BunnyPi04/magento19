<?php
/**
 * Created by PhpStorm.
 * User: hangpt
 * Date: 12/10/2017
 * Time: 09:35
 */

class Magebase_Checkoutd_Block_Checkoutd extends Mage_Checkout_Block_Onepage
{
    public function getSteps()
    {
        $steps = array();

        if (!$this->isCustomerLoggedIn()) {
            //$steps['login'] = $this->getCheckout()->getStepData('login');
        }

        $stepCodes = array('billing', 'shipping', 'shipping_method', 'payment', 'review');

        foreach ($stepCodes as $step) {
            $steps[$step] = $this->getCheckout()->getStepData($step);
        }
        return $steps;
    }

    public function getActiveStep()
    {
        //return $this->isCustomerLoggedIn() ? 'billing' : 'login';
        return $this->isCustomerLoggedIn() ? 'billing' : 'billing';
    }
}