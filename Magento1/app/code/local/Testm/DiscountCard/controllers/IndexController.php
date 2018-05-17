<?php
class Testm_DiscountCard_IndexController extends Mage_Core_Controller_Front_Action{
    
	/**
     * Retrieve customer session model object
     *
     * @return Mage_Customer_Model_Session
     */
    protected function _getSession()
    {
        return Mage::getSingleton('customer/session');
    }
	/**
     * Action predispatch
     *
     * Check customer authentication for some actions
     */
    public function preDispatch()
    {
        // a brute-force protection here would be nice

        parent::preDispatch();

        if (!$this->getRequest()->isDispatched()) {
            return;
        }

        $action = $this->getRequest()->getActionName();
        $openActions = array(
            'post'
        );
        $pattern = '/^(' . implode('|', $openActions) . ')/i';

        if (!preg_match($pattern, $action)) {
            if (!$this->_getSession()->authenticate($this)) {
                $this->setFlag('', 'no-dispatch', true);
            }
        } else {
            $this->_getSession()->setNoReferer(true);
        }
    }

    /**
     * Action postdispatch
     *
     * Remove No-referer flag from customer session after each action
     */
    public function postDispatch()
    {
        parent::postDispatch();
        $this->_getSession()->unsNoReferer(false);
    }
	public function IndexAction() {
      
		$this->loadLayout();   
		$this->getLayout()->getBlock("head")->setTitle($this->__("Discount Cards"));
		$this->getLayout()->getBlock('discountcard_index')
            ->setFormAction( Mage::getUrl('*/*/post', array('_secure' => $this->getRequest()->isSecure())) );     

		$this->renderLayout(); 
	  
    }
	public function postAction()
    {		
		$post = $this->getRequest()->getPost();
		//print_r($post['discount_number']); die;
        if ( $post ) {
		try {
			$discountData = Mage::getModel('discountcard/discount');
			$discountData->setDiscountNumber($post['discount_number']);
			$discountData->setIsActive($post['is_active']);
			$discountData->setCustomerId($post['customer_id']);
			$discountData->save();
				Mage::getSingleton('core/session')->addSuccess('The discount card has been saved.');
			
			$this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
				Mage::getSingleton('core/session')->addError('Unable to submit your request. Please, try again later');
                $this->_redirect('*/*/');
                return;
            }
		}else {
            $this->_redirect('*/*/');
        }
	}
}