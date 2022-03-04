<?php

class ModuleFurTestTaskModuleFrontController extends ModuleFrontController
{
    public function __construct()
    {
        return parent::__construct();
    }

    public function init()
    {
        return parent::init();
    }

    public function initContent()
    {
        parent::initContent();

        $this->context->smarty->assign([
            'nb_product' => Db::getInstance()->getValue('SELECT count(*) FROM ' . _DB_PREFIX_ . 'product'),
            'categories' => Db::getInstance()->executeS('SELECT id_category, name FROM '. _DB_PREFIX_ .'category_lang WHERE id_lang = ' . (int)$this->context->language->id),
            'store_name' => Configuration::get('PS_SHOP_NAME'),
            'manufacturer' => Db::getInstance()->getRow('SELECT * FROM '. _DB_PREFIX_ .'manufacturer')
        ]);
        
        $this->setTemplate('module:moduleFurTest/views/templates/front/task.tpl');
    }
}