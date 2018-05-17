<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table discountcards(entity_id int not null auto_increment, discount_number varchar(100), is_active smallint(5),customer_id int(10) UNIQUE, primary key(entity_id));
   
		
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 