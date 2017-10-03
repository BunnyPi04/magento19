<?php
/**
 * Created by PhpStorm.
 * User: hangpt
 * Date: 03/10/2017
 * Time: 16:34
 */
$installer = $this;
$installer->startSetup();

die('ghh');

    $installer->run("
DROP TABLE IF EXISTS {$this->getTable('cashier/user')};
CREATE TABLE {$this->getTable('cashier/user')} (
  `cashier_user_id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(4) unsigned NULL DEFAULT 0,
  `username` varchar(24) NULL,
  `password`  varchar(120) NULL,
  `email` varchar(255) NULL,
  `type` int(2) unsigned NULL DEFAULT 1,
  `firstname` varchar(255) NULL,
  `lastname` varchar(255) NULL,
  `created_time` datetime NULL,
  `modified_time` datetime NULL,
  `lastvisit` datetime NULL,
  `is_active` int(11) NULL,
  `role` varchar(255) NULL,
  PRIMARY KEY (`cashier_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");


$installer->endSetup();
