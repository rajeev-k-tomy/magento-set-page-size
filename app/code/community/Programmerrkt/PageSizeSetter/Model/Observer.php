<?php
/**
 * Programmerrkt_PageSizeSetter extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE_PSS.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category       Programmerrkt
 * @package        Programmerrkt_PageSizeSetter
 * @copyright      Copyright (c) 2015   
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */

/**
 * Observer Class of extension Programmerrkt_PageSizeSetter
 *
 * @category    Programmerrkt
 * @package     Programmerrkt_PageSizeSetter
 * @author      Rajeev K Tomy <programmer.rkt@gmail.com>
 */
class Programmerrkt_PageSizeSetter_Model_Observer 
{
  
    /**
	 *
	 * Holds special category Id
	 *
	 * @var int
     */
	protected $_categoryId = 23 ;

	/**
	 *
	 * Holds page Size
	 *
	 * @var int
     */
	protected $_pageSize = 24 ;

	/**
	 *
	 * Use to set Page Size
	 *
	 * @param    Varien_Event_Observer $observer
	 * @return   Programmerrkt_PageSizeSetter_Model_Observer
	 */
	public function setPageSizeForCategory(Varien_Event_Observer $observer)
	{
		$currentCategory = Mage::registry('current_category');

        //check whether current page is a category page
		if ($currentCategory instanceof Mage_Catalog_Model_Category) {
			//ensure the the cateogory page is our specific category
			if ($currentCategory->getId() == $this->_categoryId) {
				
				//check whether toolbar block exist or not
				$toolbar =  $observer->getLayout()->getBlock('product_list_toolbar');
				if ($toolbar) {
					//sets page size to corresponding mode
					$listMode = $toolbar->getCurrentMode();
	        		$toolbar = $toolbar->addPagerLimit($listMode , $this->_pageSize);
				}
			}
		}

		return $this;
	}
}
