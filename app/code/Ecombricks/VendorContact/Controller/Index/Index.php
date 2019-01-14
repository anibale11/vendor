<?php
/**
 * Copyright © eComBricks. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Ecombricks\VendorContact\Controller\Index;

/**
 * Contact index controller
 */
class Index extends \Magento\Contact\Controller\Index\Index
{
    
    use \Ecombricks\Vendor\Controller\Vendor\VendorTrait;
    
    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Contact\Model\ConfigInterface $contactsConfig
     * @param \Magento\Framework\Registry $registry
     * @param \Ecombricks\Vendor\Model\VendorManagement $vendorManagement
     * @return void
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Contact\Model\ConfigInterface $contactsConfig,
        \Magento\Framework\Registry $registry,
        \Ecombricks\Vendor\Model\VendorManagement $vendorManagement
    )
    {
        parent::__construct($context, $contactsConfig);
        $this->registry = $registry;
        $this->vendorManagement = $vendorManagement;
    }
    
    /**
     * Dispatch
     * 
     * @param \Magento\Framework\App\RequestInterface $request
     * @return \Magento\Framework\App\ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $vendor = $this->vendorInit();
        if (!$vendor) {
            throw new \Magento\Framework\Exception\NotFoundException(__('Vendor not found.'));
        }
        return parent::dispatch($request);
    }
    
    /**
     * Execute
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $vendor = $this->getVendor();
        $pageResult = parent::execute();
        $this->setPageTitle($pageResult, __('Contact %1', $vendor->getName()));
        return $pageResult;
    }
    
}