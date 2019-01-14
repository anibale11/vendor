<?php
/**
 * Copyright © eComBricks. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Ecombricks\Vendor\Observer\Framework\Model\ResourceModel\Db\Collection\AbstractCollection\AfterLoad;

/**
 * Collection after load vendor flag observer trait
 */
trait VendorFlagTrait
{
    
    /**
     * Vendor flag execute
     * 
     * @param \Magento\Framework\Event\Observer $observer
     * @param array $targetedTypes
     * @return $this
     */
    protected function vendorFlagExecute(\Magento\Framework\Event\Observer $observer, $targetedTypes)
    {
        $collection = $this->getCollection($observer);
        if (!$collection) {
            return $this;
        }
        if (!$this->isTargetedType($collection, $targetedTypes)) {
            return $this;
        }
        $collection->vendorFlagAfterLoad();
        return $this;
    }
    
}