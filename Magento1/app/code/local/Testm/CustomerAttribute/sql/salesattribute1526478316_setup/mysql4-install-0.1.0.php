<?php
$installer = $this;
$installer->startSetup();

$installer->addAttribute("quote_address", "mobile_number", array("type"=>"varchar"));
$installer->addAttribute("order_address", "mobile_number", array("type"=>"varchar"));
$installer->endSetup();
	 