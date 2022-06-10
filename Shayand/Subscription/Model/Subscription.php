<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shayand\Subscription\Model;

use Magento\Framework\Model\AbstractModel;
use Shayand\Subscription\Api\Data\SubscriptionInterface;

class Subscription extends AbstractModel implements SubscriptionInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Shayand\Subscription\Model\ResourceModel\Subscription::class);
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

    /**
     * @inheritDoc
     */
    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCustomerId($customerId)
    {
        return $this->setData(self::CUSTOMER_ID, $customerId);
    }

    /**
     * @inheritDoc
     */
    public function getOrderId()
    {
        return $this->getData(self::ORDER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setOrderId($orderId)
    {
        return $this->setData(self::ORDER_ID, $orderId);
    }

    /**
     * @inheritDoc
     */
    public function getOrderItemId()
    {
        return $this->getData(self::ORDER_ITEM_ID);
    }

    /**
     * @inheritDoc
     */
    public function setOrderItemId($orderItemId)
    {
        return $this->setData(self::ORDER_ITEM_ID, $orderItemId);
    }

    /**
     * @inheritDoc
     */
    public function getPeriod()
    {
        return $this->getData(self::PERIOD);
    }

    /**
     * @inheritDoc
     */
    public function setPeriod($period)
    {
        return $this->setData(self::PERIOD, $period);
    }

    /**
     * @inheritDoc
     */
    public function getDeletedAt()
    {
        return $this->getData(self::DELETED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setDeletedAt($deletedAt)
    {
        return $this->setData(self::DELETED_AT, $deletedAt);
    }
}

