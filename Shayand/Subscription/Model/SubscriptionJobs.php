<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shayand\Subscription\Model;

use Magento\Framework\Model\AbstractModel;
use Shayand\Subscription\Api\Data\SubscriptionJobsInterface;

class SubscriptionJobs extends AbstractModel implements SubscriptionJobsInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Shayand\Subscription\Model\ResourceModel\SubscriptionJobs::class);
    }

    /**
     * @inheritDoc
     */
    public function getSubscriptionjobsId()
    {
        return $this->getData(self::SUBSCRIPTIONJOBS_ID);
    }

    /**
     * @inheritDoc
     */
    public function setSubscriptionjobsId($subscriptionjobsId)
    {
        return $this->setData(self::SUBSCRIPTIONJOBS_ID, $subscriptionjobsId);
    }

    /**
     * @inheritDoc
     */
    public function getSubscriptionId()
    {
        return $this->getData(self::SUBSCRIPTION_ID);
    }

    /**
     * @inheritDoc
     */
    public function setSubscriptionId($subscriptionId)
    {
        return $this->setData(self::SUBSCRIPTION_ID, $subscriptionId);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}

