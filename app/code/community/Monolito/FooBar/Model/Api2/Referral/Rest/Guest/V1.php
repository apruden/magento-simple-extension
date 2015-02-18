<?php
class Monolito_FooBar_Model_Api2_Referral_Rest_Guest_V1 extends Mage_Api2_Model_Resource
{
    /*
     */
    public function _retrieve()
    {
        Mage::log("retreiving referral");
        return NULL;
    }

    /*
     */
    public function _retrieveCollection()
    {
        Mage::log("retriveing referrals collection");
        $q = Mage::app()->getRequest()->getQuery('q');

        if(strlen($q) < 3) {
            return array();
        }

        $resource = Mage::getSingleton('core/resource');
        $readConnection = $resource->getConnection('core_read');
        $tableName = $resource->getTableName('customer_entity_varchar');
        $query = 'select concat(c1.value, \' \', c2.value) as name from '.$tableName.' c1 left outer join customer_entity_varchar c2 on c1.entity_id = c2.entity_id where c1.attribute_id=5 and c2.attribute_id=7 and concat(c1.value, c2.value) like \'%'.$q.'%\' limit 20';
        $results = $readConnection->fetchAll($query);

        return $results;
    }
}
?>
