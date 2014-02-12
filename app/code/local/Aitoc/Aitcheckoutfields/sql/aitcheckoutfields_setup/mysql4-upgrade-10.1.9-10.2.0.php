<?php
/**
 * Checkout Fields Manager
 *
 * @category:    Aitoc
 * @package:     Aitoc_Aitcheckoutfields
 * @version      10.5.3
 * @license:     x8JlL6PzUPBtvXBsIIWQy9KjFdhME32yIbvID6DGHQ
 * @copyright:   Copyright (c) 2014 AITOC, Inc. (http://www.aitoc.com)
 */
/**
* @copyright  Copyright (c) 2011 AITOC, Inc. 
*/

$installer = $this;

$installer->startSetup();


$installer->run("-- DROP TABLE IF EXISTS `aitoc_custom_attribute_cg`;
CREATE TABLE IF NOT EXISTS `aitoc_custom_attribute_cg` (
  `attribute_id` int(11) NOT NULL,
  `customer_group_id` int(11) NOT NULL,
  KEY `attribute_id` (`attribute_id`),
  KEY `customer_group_id` (`customer_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$installer->endSetup();