<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shayand\Subscription\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Shayand\Subscription\Api\Data\SubscriptionJobsInterface;
use Shayand\Subscription\Api\Data\SubscriptionJobsInterfaceFactory;
use Shayand\Subscription\Api\Data\SubscriptionJobsSearchResultsInterfaceFactory;
use Shayand\Subscription\Api\SubscriptionJobsRepositoryInterface;
use Shayand\Subscription\Model\ResourceModel\SubscriptionJobs as ResourceSubscriptionJobs;
use Shayand\Subscription\Model\ResourceModel\SubscriptionJobs\CollectionFactory as SubscriptionJobsCollectionFactory;

class SubscriptionJobsRepository implements SubscriptionJobsRepositoryInterface
{

    /**
     * @var ResourceSubscriptionJobs
     */
    protected $resource;

    /**
     * @var SubscriptionJobs
     */
    protected $searchResultsFactory;

    /**
     * @var SubscriptionJobsCollectionFactory
     */
    protected $subscriptionJobsCollectionFactory;

    /**
     * @var SubscriptionJobsInterfaceFactory
     */
    protected $subscriptionJobsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceSubscriptionJobs $resource
     * @param SubscriptionJobsInterfaceFactory $subscriptionJobsFactory
     * @param SubscriptionJobsCollectionFactory $subscriptionJobsCollectionFactory
     * @param SubscriptionJobsSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceSubscriptionJobs $resource,
        SubscriptionJobsInterfaceFactory $subscriptionJobsFactory,
        SubscriptionJobsCollectionFactory $subscriptionJobsCollectionFactory,
        SubscriptionJobsSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->subscriptionJobsFactory = $subscriptionJobsFactory;
        $this->subscriptionJobsCollectionFactory = $subscriptionJobsCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        SubscriptionJobsInterface $subscriptionJobs
    ) {
        try {
            $this->resource->save($subscriptionJobs);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the subscriptionJobs: %1',
                $exception->getMessage()
            ));
        }
        return $subscriptionJobs;
    }

    /**
     * @inheritDoc
     */
    public function get($subscriptionJobsId)
    {
        $subscriptionJobs = $this->subscriptionJobsFactory->create();
        $this->resource->load($subscriptionJobs, $subscriptionJobsId);
        if (!$subscriptionJobs->getId()) {
            throw new NoSuchEntityException(__('SubscriptionJobs with id "%1" does not exist.', $subscriptionJobsId));
        }
        return $subscriptionJobs;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->subscriptionJobsCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(
        SubscriptionJobsInterface $subscriptionJobs
    ) {
        try {
            $subscriptionJobsModel = $this->subscriptionJobsFactory->create();
            $this->resource->load($subscriptionJobsModel, $subscriptionJobs->getSubscriptionjobsId());
            $this->resource->delete($subscriptionJobsModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the SubscriptionJobs: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($subscriptionJobsId)
    {
        return $this->delete($this->get($subscriptionJobsId));
    }
}

