<?php

class ModuleFurTest extends Module
{

    public $id_lang;

    public function __construct()
    {
        $this->name = "moduleFurTest";
        $this->author = "Wolf";
        $this->version = "1.0.0";
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('ModuleFurTest');
        $this->description = $this->l('Module furry test for prestashop 1.7... owo, i want bread *bit bit bittt uwu*');
        $this->ps_versions_compliancy = ['min' => '1.6.0.0', 'max' => _PS_VERSION_];

        $this->id_lang = $this->context->language->id;
    }

    public function install()
    {
        return parent::install() && 
            $this->registerHook("displayHome") &&
            $this->registerHook('header') && 
            $this->registerHook('moduleRoutes') && 
            $this->createTabLink();
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplayHome()
    {
        //echo $this->_path.'views/scss/moduleFurTest.scss';
        
        $this->context->smarty->assign([
            "MODULEFURTEST_STR_OWO" => Configuration::get("MODULEFURTEST_STR_OWO")
        ]);
        
        return $this->display(__FILE__, 'views/templates/hook/home.tpl');
    }

    public function hookHeader()
    {
        // adding data for ajax 
        Media::addJsDef([
            'mp_ajax' => $this->_path.'/ajax.php'
        ]);

        // adding archive css
        $this->context->controller->addCSS([
            $this->_path.'views/scss/moduleFurTest.scss'
        ]);

        // adding archive js
        $this->context->controller->addJS([
            $this->_path.'views/js/moduleFurTest.js'
        ]);

    }

    public function getContent()
    {
        if (Tools::isSubmit('save-moduleFurTest')){
            $name = Tools::getValue('print');
            Configuration::updateValue('MODULEFURTEST_STR_OWO', $name);
        }   

        // manando todo al form y al front
        $this->context->smarty->assign([
            "MODULEFURTEST_STR_OWO" => Configuration::get("MODULEFURTEST_STR_OWO")
        ]);

        return $this->display(__FILE__, 'views/templates/admin/moduleFurTestAdminForm.tpl');
    }

    public function hookModuleRoutes()
    {
        return [
            'furTest' => [
                'controller' => 'task',
                'rule' => 'furTest',
                'keywords' => [],
                'params' => [
                    'fc' => 'module',
                    'module' => $this->name,
                    'controller' => 'fedme'
                ]
            ]
        ];
    }

    public function createTabLink()
    {
        $tab = new Tab;
        foreach (Language::getLanguages() as $lang) {
            $tab->name[$lang['id_lang']] = $this->l('Origin');
        }
        $tab->class_name = 'AdminOrigin';
        $tab->module = $this->name;
        $tab->id_parent = 0;
        $tab->add();
        return true;
    }

    // getProductsByCategoryId
    public function getProductsByCategoryId($id_category)
    {
        $obj_cat = new Category($id_category, $this->id_lang);
        $products = $obj_cat->getProducts($this->id_lang, 0, 1000);

        $html = "<ol>";
        foreach ($products as $pr) {
            $html .= '<li>'.$pr['name'].'</li>';
        }
        $html .= "</ol>";

        return $html;
    }

}