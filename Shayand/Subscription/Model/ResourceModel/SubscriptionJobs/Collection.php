<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shayand\Subscription\Model\ResourceModel\SubscriptionJobs;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'subscriptionjobs_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Shayand\Subscription\Model\SubscriptionJobs::class,
            \Shayand\Subscription\Model\ResourceModel\SubscriptionJobs::class
        );
    }
}

