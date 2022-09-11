<?php
if (!defined('_PS_VERSION_')) {
    exit;
}


/**
 * Module represents test task for Veebipoed.
 */
class Generalmodule extends Module
{

    protected $config_form = false;

    /**
     * Basic constructor.
     * Defines all necessary fields.
     */
    public function __construct()
    {
        $this->version = '1.0.0';
        $this->name = 'generalmodule';
        $this->tab = 'front_office_features';
        $this->author = 'Roman Makejev';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('General Module');
        $this->description = $this->l('The basic module is used to learn how to configure settings, show information on front-end and how to add extra fields in back-office list views.');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    /**
     * Methods that handle module installation. 
     * Should contain addition actions to be performed during installation.
     */
    public function install()
    {
        Configuration::updateValue('GENERALMODULE_LIVE_MODE', false);

        return parent::install() &&
            $this->registerHook('header');
    }

    /**
     * Methods that handle module deletion.
     * Should remove data added during installation and usage. 
     */
    public function uninstall()
    {
        Configuration::deleteByName('GENERALMODULE_LIVE_MODE');

        return parent::uninstall();
    }


    /**
     * This method handles the module's configuration page
     * @return string The page's HTML content 
     */
    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */
        if (((bool)Tools::isSubmit('submitGeneralmoduleModule')) == true) {
            $this->postProcess();
        }

        $this->context->smarty->assign('module_dir', $this->_path);

        $output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

        return $output.$this->renderForm();
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitGeneralmoduleModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Builds the configuration form
     * @return string HTML code
     */
    protected function getConfigForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                'title' => $this->l('Settings'),
                'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'col' => 4,
                        'type' => 'text',
                        'label' => $this->l('Heading'),
                        'placeholder' => $this->l('Your module heading..'),
                        'name' => 'GENERALMODULE_HEADING',
                        'required' => true,
                    ),
                    array(
                        'col' => 4,
                        'type' => 'text',
                        'label' => $this->l('Content'),
                        'placeholder' => $this->l('Your module content..'),
                        'name' => 'GENERALMODULE_CONTENT',
                        'required' => true,
                    ),
                    array(
                        'col' => 4,
                        'type' => 'text',
                        'label' => $this->l('Color'),
                        'placeholder' => $this->l('Your border color..'),
                        'name' => 'GENERALMODULE_COLOR',
                        'required' => true,
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        return array(
            'GENERALMODULE_HEADING' => Configuration::get('GENERALMODULE_HEADING', null),
            'GENERALMODULE_CONTENT' => Configuration::get('GENERALMODULE_CONTENT', null),
            'GENERALMODULE_COLOR' => Configuration::get('GENERALMODULE_COLOR', null),
        );
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();

        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addCSS($this->_path.'/views/css/generalmodule.css', 'all');
        $this->context->controller->addJS($this->_path.'/views/js/generalmodule.js');

        $this->context->smarty->assign([
            'GENERALMODULE_HEADING' => Configuration::get('GENERALMODULE_HEADING', null),
            'GENERALMODULE_CONTENT' => Configuration::get('GENERALMODULE_CONTENT', null),
            'GENERALMODULE_COLOR' => Configuration::get('GENERALMODULE_COLOR', null),
        ]);

        return $this->display(__FILE__, 'generalmodule.tpl');
    }
}
