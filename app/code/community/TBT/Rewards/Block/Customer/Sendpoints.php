<?php

/**
 * WDCA - Sweet Tooth
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the WDCA SWEET TOOTH POINTS AND REWARDS 
 * License, which extends the Open Software License (OSL 3.0).

 * The Open Software License is available at this URL: 
 * http://opensource.org/licenses/osl-3.0.php
 * 
 * DISCLAIMER
 * 
 * By adding to, editing, or in any way modifying this code, WDCA is 
 * not held liable for any inconsistencies or abnormalities in the 
 * behaviour of this code. 
 * By adding to, editing, or in any way modifying this code, the Licensee
 * terminates any agreement of support offered by WDCA, outlined in the 
 * provided Sweet Tooth License. 
 * Upon discovery of modified code in the process of support, the Licensee 
 * is still held accountable for any and all billable time WDCA spent 
 * during the support process.
 * WDCA does not guarantee compatibility with any other framework extension. 
 * WDCA is not responsbile for any inconsistencies or abnormalities in the
 * behaviour of this code if caused by other framework extension.
 * If you did not receive a copy of the license, please send an email to 
 * support@sweettoothrewards.com or call 1.855.699.9322, so we can send you a copy 
 * immediately.
 * 
 * @category   [TBT]
 * @package    [TBT_Rewards]
 * @copyright  Copyright (c) 2014 Sweet Tooth Inc. (http://www.sweettoothrewards.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Customer Send Points
 *
 * @category   TBT
 * @package    TBT_Rewards
 * * @author     Sweet Tooth Inc. <support@sweettoothrewards.com>
 */
class TBT_Rewards_Block_Customer_Sendpoints extends TBT_Rewards_Block_Customer_Abstract {
	
	protected function _construct() {
		parent::_construct ();
		$this->headerText = $this->__ ( "Send Points to a Friend" ); //unused
	}
	
	protected function _prepareLayout() {
		parent::_prepareLayout ();
	}
	
	protected function _toHtml() {
		$show_me = Mage::getStoreConfigFlag ( 'rewards/display/showSendPointsToAFriend' );
		if (! $show_me) {
			return '';
		}
		return parent::_toHtml ();
	}
	
	/**
	 * Fetches all the points currency ids that are available for the currently logged in customer
	 */
	public function getPointsCurrencyIds() {
	    $currency_ids = $this->getRewardsCustomer()->getCustomerCurrencyIds();
	    return $currency_ids;
	}

	/**
	 * Returns whether or not mutliple poitns currencies exist for the logged in customer
	 */
	public function hasMultipleCurrencies() {
	    $points_currency_ids = $this->getPointsCurrencyIds();
	    $has_multi = (sizeof($points_currency_ids) > 1);
	    return $has_multi;
	}
	
	public function getNumPointsCurrencies() {
	    return $this->getRewardsCustomer()->getNumCurrencies();
	}
	
}

?>