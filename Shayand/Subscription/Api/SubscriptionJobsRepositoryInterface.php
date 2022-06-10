<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shayand\Subscription\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface SubscriptionJobsRepositoryInterface
{

    /**
     * Save SubscriptionJobs
     * @param \Shayand\Subscription\Api\Data\SubscriptionJobsInterface $subscriptionJobs
     * @return \Shayand\Subscription\Api\Data\SubscriptionJobsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Shayand\Subscription\Api\Data\SubscriptionJobsInterface $subscriptionJobs
    );

    /**
     * Retrieve SubscriptionJobs
     * @param string $subscriptionjobsId
     * @return \Shayand\Subscription\Api\Data\SubscriptionJobsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($subscriptionjobsId);

    /**
     * Retrieve SubscriptionJobs matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Shayand\Subscription\Api\Data\SubscriptionJobsSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete SubscriptionJobs
     * @param \Shayand\Subscription\Api\Data\SubscriptionJobsInterface $subscriptionJobs
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Shayand\Subscription\Api\Data\SubscriptionJobsInterface $subscriptionJobs
    );

    /**
     * Delete SubscriptionJobs by ID
     * @param string $subscriptionjobsId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($subscriptionjobsId);
}

