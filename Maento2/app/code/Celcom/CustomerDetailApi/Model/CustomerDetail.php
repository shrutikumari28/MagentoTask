<?php
namespace Celcom\CustomerDetailApi\Model;
/**
 * Class CustomerDetail
 * @package Celcom\CustomerDetailApi\Model
 */
class CustomerDetail implements \Celcom\CustomerDetailApi\Api\CustomerDetailInterface
{

    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */
    protected $_customerRepositoryInterface;

    /**
     * CustomerDetail constructor.
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
     */
    public function __construct(
		\Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
		)
	{
		$this->_customerRepositoryInterface = $customerRepositoryInterface;	  
	}

    /**
     * @param $id
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function customerDetail($id)
	{
		$customer = $this->_customerRepositoryInterface->getById($id);
      		
      		$customerInfo[] = array( 									
      			'Name'=> $customer->getFirstname().' '.$customer->getLastname(),
      			'Email'=> $customer->getEmail()
            );

       	return $customerInfo;
    }
}