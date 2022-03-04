<?php

class AdminOriginController extends ModuleAdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        parent::init();  
        $this->bootstrap = true;  
    }

    public function initContent()
    {
        parent::initContent();
        $this->context->smarty->assign([]);
        //$this->display(__FILE__, );
        $this->setTemplate('origin.tpl');
    }   
}