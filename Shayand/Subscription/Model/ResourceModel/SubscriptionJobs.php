<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shayand\Subscription\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SubscriptionJobs extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('shayand_subscription_subscriptionjobs', 'subscriptionjobs_id');
    }
}

