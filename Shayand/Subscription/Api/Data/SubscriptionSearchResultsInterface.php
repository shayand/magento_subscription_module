<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shayand\Subscription\Api\Data;

interface SubscriptionSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Subscription list.
     * @return \Shayand\Subscription\Api\Data\SubscriptionInterface[]
     */
    public function getItems();

    /**
     * Set created_at list.
     * @param \Shayand\Subscription\Api\Data\SubscriptionInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

