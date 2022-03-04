<?php
require_once('../../config/config.inc.php');
require_once('../../init.php');

$obj_mp = Module::getInstanceByName('moduleFurTest');
echo $obj_mp->getProductsByCategoryId(Tools::getValue('id_category'));
die;