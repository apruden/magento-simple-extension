<?php
require_once Mage::getModuleDir('controllers', 'Mage_Customer').DS.'AccountController.php';

class Monolito_FooBar_Frontend_Customer_AccountController extends Mage_Customer_AccountController {
    protected function _getCustomerErrors($customer) {
        Mage::log("Validating referral", 1);
        $errors = parent::_getCustomerErrors($customer);
        $errors = array_merge($errors, array("toto" => "missing"));
        return $errors;
    }
}
