<?php
class Testm_DiscountCard_Model_Mysql4_Discount extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("discountcard/discount", "entity_id");
    }
}