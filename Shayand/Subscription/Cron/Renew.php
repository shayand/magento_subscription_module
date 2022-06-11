<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shayand\Subscription\Cron;

use DateTime;
use Magento\Sales\Model\Order;
use Shayand\Subscription\Model\SubscriptionJobs;
use Shayand\Subscription\Model\Subscription;
use Shayand\Subscription\Model\ResourceModel\Subscription\CollectionFactory as SubscriptionResources;
use Shayand\Subscription\Model\ResourceModel\SubscriptionJobs\CollectionFactory as SubscriptionJobsResources;
use Shayand\Subscription\Model\ResourceModel\SubscriptionJobs as SubscriptionJobsEntity;

class Renew
{

    protected $logger;
    /**
     * @var Subscription
     */
    private $subscription;
    /**
     * @var SubscriptionResources
     */
    private $subscriptionResources;
    /**
     * @var SubscriptionJobs
     */
    private $subscriptionJobs;
    /**
     * @var SubscriptionJobsResources
     */
    private $subscriptionJobsResources;
    /**
     * @var SubscriptionJobsEntity
     */
    private $subscriptionJobsEntity;
    /**
     * @var Order
     */
    private $order;

    public function __construct(
        \Psr\Log\LoggerInterface              $logger,
        Subscription                          $subscription,
        SubscriptionResources                 $subscriptionResources,
        SubscriptionJobs                      $subscriptionJobs,
        SubscriptionJobsResources             $subscriptionJobsResources,
        SubscriptionJobsEntity                $subscriptionJobsEntity,
        Order                                 $order
    )
    {
        $this->logger = $logger;
        $this->subscription = $subscription;
        $this->subscriptionResources = $subscriptionResources;
        $this->subscriptionJobs = $subscriptionJobs;
        $this->subscriptionJobsResources = $subscriptionJobsResources;
        $this->subscriptionJobsEntity = $subscriptionJobsEntity;
        $this->order = $order;
    }

    /**
     * Execute the cron
     *
     * @return void
     */
    public function execute()
    {
        $allSubscription = $this->subscriptionResources->create();
        #$currentDate = new DateTime("2022-06-25");
        $currentDate = new DateTime();

        foreach ($allSubscription as $singleSubscription) {
            if ($singleSubscription instanceof Subscription) {
                $subscriptionId = $singleSubscription->getSubscriptionId();
                $period = (int)$singleSubscription->getPeriod();
                $orderId = $singleSubscription->getOrderId();
                $orderItem = $singleSubscription->getOrderItemId();

                $jobModel = $this->subscriptionJobsResources->create();
                $jobModel->addFieldToFilter('subscription_id', ['eq' => $subscriptionId])
                    ->setOrder('created_at', 'DESC')
                    ->setPageSize(1);

                if (count($jobModel) > 0) {
                    foreach ($jobModel as $singleJob) {
                        if ($singleJob instanceof SubscriptionJobs) {
                            $lastExecution = $singleJob->getCreatedAt();
                        }
                    }
                } else {
                    $lastExecution = $singleSubscription->getCreatedAt();
                }
                $lastExecutionObj = new DateTime($lastExecution);
                $dateDiff = $currentDate->diff($lastExecutionObj)->days;

//                $this->logger->info('date diff is' . $dateDiff);
//                $this->logger->info('fmod is' . fmod($dateDiff, $period));
//                $this->logger->info('period is' .  $period);

                if (fmod($dateDiff, $period) == 0) {
                    // renew order
                    $this->logger->info('renew order' . $orderId);
                    $this->logger->info('renew order Item' . $orderItem);

                    $order = $this->order->load($orderId);

                    // @TODO: Add custom re-order with ability to store custom option

                    $jobRecord = $this->subscriptionJobs->setSubscriptionId($subscriptionId);
                    $this->subscriptionJobsEntity->save($jobRecord);
                }
            }
        }
    }



}

