<?php
/**
 * Copyright © eComBricks. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Ecombricks\VendorCatalog\Observer\Model\Eav\Entity\Collection\AbstractCollection;

/**
 * EAV collection before load observer
 */
class BeforeLoad implements \Magento\Framework\Event\ObserverInterface
{
    
    /**
     * Execute
     * 
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $event = $observer->getEvent();
        if (!$event) {
            return $this;
        }
        $collection = $event->getCollection();
        if (!$collection || !($collection instanceof \Magento\Catalog\Model\ResourceModel\Product\Collection)) {
            return $this;
        }
        $collection->vendorBeforeLoad();
        return $this;
    }

}