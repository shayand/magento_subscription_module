<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shayand\Subscription\Api\Data;

interface SubscriptionJobsInterface
{

    const SUBSCRIPTIONJOBS_ID = 'subscriptionjobs_id';
    const CREATED_AT = 'created_at';
    const SUBSCRIPTION_ID = 'subscription_id';

    /**
     * Get subscriptionjobs_id
     * @return string|null
     */
    public function getSubscriptionjobsId();

    /**
     * Set subscriptionjobs_id
     * @param string $subscriptionjobsId
     * @return \Shayand\Subscription\SubscriptionJobs\Api\Data\SubscriptionJobsInterface
     */
    public function setSubscriptionjobsId($subscriptionjobsId);

    /**
     * Get subscription_id
     * @return string|null
     */
    public function getSubscriptionId();

    /**
     * Set subscription_id
     * @param string $subscriptionId
     * @return \Shayand\Subscription\SubscriptionJobs\Api\Data\SubscriptionJobsInterface
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
     * @return \Shayand\Subscription\SubscriptionJobs\Api\Data\SubscriptionJobsInterface
     */
    public function setCreatedAt($createdAt);
}

