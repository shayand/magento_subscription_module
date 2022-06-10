<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shayand\Subscription\Api\Data;

interface SubscriptionInterface
{

    const CUSTOMER_ID = 'customer_id';
    const ORDER_ID = 'order_id';
    const SUBSCRIPTION_ID = 'subscription_id';
    const PERIOD = 'period';
    const ORDER_ITEM_ID = 'order_item_id';
    const CREATED_AT = 'created_at';
    const DELETED_AT = 'deleted_at';

    /**
     * Get subscription_id
     * @return string|null
     */
    public function getSubscriptionId();

    /**
     * Set subscription_id
     * @param string $subscriptionId
     * @return \Shayand\Subscription\Subscription\Api\Data\SubscriptionInterface
     */
    public function setSubscriptionId($subscriptionId);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Shayand\Subscription\Subscription\Api\Data\SubscriptionInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get customer_id
     * @return string|null
     */
    public function getCustomerId();

    /**
     * Set customer_id
     * @param string $customerId
     * @return \Shayand\Subscription\Subscription\Api\Data\SubscriptionInterface
     */
    public function setCustomerId($customerId);

    /**
     * Get order_id
     * @return string|null
     */
    public function getOrderId();

    /**
     * Set order_id
     * @param string $orderId
     * @return \Shayand\Subscription\Subscription\Api\Data\SubscriptionInterface
     */
    public function setOrderId($orderId);

    /**
     * Get order_item_id
     * @return string|null
     */
    public function getOrderItemId();

    /**
     * Set order_item_id
     * @param string $orderItemId
     * @return \Shayand\Subscription\Subscription\Api\Data\SubscriptionInterface
     */
    public function setOrderItemId($orderItemId);

    /**
     * Get period
     * @return string|null
     */
    public function getPeriod();

    /**
     * Set period
     * @param string $period
     * @return \Shayand\Subscription\Subscription\Api\Data\SubscriptionInterface
     */
    public function setPeriod($period);

    /**
     * Get deleted_at
     * @return string|null
     */
    public function getDeletedAt();

    /**
     * Set deleted_at
     * @param string $deletedAt
     * @return \Shayand\Subscription\Subscription\Api\Data\SubscriptionInterface
     */
    public function setDeletedAt($deletedAt);
}

