<?php

class Monolito_FooBar_Model_Observer {

    /*
     */
    public function customerRegistered(Varien_Event_Observer $observer) {
        Mage::log("on registration");
    }

    /*
     */
    public function sendRegistration($newAffiliate, $affiliateID) {
        $data = array(
            "Membership" => array(
            )
        );

        $mem = new SimpleXMLElement('<UpgradeMembership></UpgradeMembership>');

        foreach ($data["Membership"] as $k => $v) {
            if(empty($v)){
                $mem->addChild($k, '0');
            } else {
                $mem->addChild($k, $v);
            }
        }

        $postData = $mem->asXML();
        $response = $this->doPost($affiliateUrl, $postData);

        if($response->code != 201) {
            Mage::log("Status Code: [".$response->code."]. Response Result: ".$response->body);
        }
    }

    /*
     */
    public function orderSaved(Varien_Event_Observer $observer) {
        Mage::log("on order saved");

        try {
            $event = $observer->getEvent();
            $order = $event['order'];
            Mage::log("got order".$order->getBaseSubtotal());
        } catch (Exception $e) {
            Mage::log("Error in observer:". $e->getMessage(), 1);
        }
    }

    /*
     */
    private function doPost($url, $data){
        $config = array('timeout' => 20);
        try {
            $curl = new Varien_Http_Adapter_Curl();
            $curl->setConfig($config);
            $curl->write(Zend_Http_Client::POST, $url, '1.1', array(), $data);

            return (object)array(
                'code' => $curl->getInfo(CURLINFO_HTTP_CODE),
                'body' => $curl->read());
        } catch (Exception $e) {
            throw $e;
        } finally {
            $curl->close();
        }
    }
}
