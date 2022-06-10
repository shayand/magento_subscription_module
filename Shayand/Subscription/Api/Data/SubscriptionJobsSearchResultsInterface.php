<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shayand\Subscription\Api\Data;

interface SubscriptionJobsSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get SubscriptionJobs list.
     * @return \Shayand\Subscription\Api\Data\SubscriptionJobsInterface[]
     */
    public function getItems();

    /**
     * Set subscription_id list.
     * @param \Shayand\Subscription\Api\Data\SubscriptionJobsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

