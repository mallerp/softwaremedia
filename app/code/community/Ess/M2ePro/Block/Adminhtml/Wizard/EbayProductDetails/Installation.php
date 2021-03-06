<?php

/*
 * @copyright  Copyright (c) 2015 by  ESS-UA.
 */

class Ess_M2ePro_Block_Adminhtml_Wizard_EbayProductDetails_Installation
    extends Ess_M2ePro_Block_Adminhtml_Wizard_Installation
{
    // ########################################

    protected function _beforeToHtml()
    {
        // Steps
        //-------------------------------
        $this->setChild(
            'step_marketplaces_synchronization',
            $this->helper('M2ePro/Module_Wizard')->createBlock(
                'installation_marketplacesSynchronization',$this->getNick()
            )
        );
        //-------------------------------

        return parent::_beforeToHtml();
    }

    // ########################################

    protected function getHeaderTextHtml()
    {
        return 'eBay Integration Upgrade Wizard';
    }

    protected function _toHtml()
    {
        $urls = json_encode(array(
            'marketplacesSynchronization' => $this->getUrl('*/*/marketplacesSynchronization')
        ));

        $js = <<<JS
        <script>
            M2ePro.url.add({$urls});
            WizardEbayProductDetails = new WizardEbayProductDetails();
        </script>
JS
;
        return parent::_toHtml()
        . $js
        . $this->getChildHtml('step_marketplaces_synchronization');
    }

    // ########################################
}