<?php
class Programmerrkt_PageSizeSetter_Model_Observer {
  
    /**
	  *
	  * Holds special category Id
	  *
	  * @var int
	  *
    */
	protected $_categoryId = 23 ;

	/**
	  *
	  * Holds page Size
	  *
	  * @var int
	  *
    */
	protected $_pageSize = 24 ;

	/**
	  *
	  * Use to set Page Size
	  *
	  * @param Varint Object  | $observer
	  * 
	  * 
	*/
	public function setPageSizeForCategory($observer){
		//echo "<pre>";
		$controller = $observer->getAction();
		$fullActionName = $controller->getFullActionName();
		$id = (int)$controller->getRequest()->getParam('id');
		$handlers = $controller->getLayout()->getUpdate()->getHandles();

        //check whether current page is correspond to our special category. If not, returns
		if($fullActionName == "catalog_category_view" && $id == $this->_categoryId)
		//if($fullActionName == "catalog_category_view" && in_array('CATEGORY_'.$this->_categoryId, $handlers))
		{
			//check whether toolbar block exist or not
			$toolbar =  $controller->getLayout()->getBlock('product_list_toolbar');
			if($toolbar)
			{
				//sets page size to corresponding mode
				$listMode = $toolbar->getCurrentMode();
	        	$toolbar = $toolbar->addPagerLimit($listMode , $this->_pageSize);
			}
			
		}

		return;
	}
}


?>


