<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shayand\Subscription\Observer\Checkout;

use Magento\Framework\Mview\View\SubscriptionFactory;
use Magento\Sales\Model\Order\Item;
use Psr\Log\LoggerInterface;
use Shayand\Subscription\Model\Subscription;
use Shayand\Subscription\Model\SubscriptionRepository;

class SubmitAllAfter implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * Order Model
     *
     * @var \Magento\Sales\Model\Order $order
     */
    protected $order;
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var SubscriptionRepository
     */
    private $subscription;
    /**
     * @var SubscriptionRepository
     */
    private $subscriptionRepository;

    public function __construct(
        \Magento\Sales\Model\Order $order,
        LoggerInterface $logger,
        Subscription $subscription,
        SubscriptionRepository $subscriptionRepository
    )
    {
        $this->order = $order;
        $this->logger = $logger;
        $this->subscription = $subscription;
        $this->subscriptionRepository = $subscriptionRepository;
    }

    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(
        \Magento\Framework\Event\Observer $observer
    ) {
        $orderId = $observer->getEvent()->getOrder()->getEntityId();
        $order = $this->order->load($orderId);

        $itemCollection = $order->getItemsCollection();
        $customerId = $order->getCustomerId();

        foreach ($itemCollection->getItems() as $singleItem){
            if ($singleItem instanceof Item){

                $subscriptionStatus = $singleItem->getProduct()->getAttributeText('subscription_status');
                if ($subscriptionStatus == 'Yes'){
                    $itemId = $singleItem->getId();
                    $itemSku = $singleItem->getProduct()->getSku();

                    $options = $singleItem->getProductOptions();
                    if (isset($options['options']) && !empty($options['options'])) {
                        foreach ($options['options'] as $option) {
                            /***
                             * (
                            [label] => Subsciption Type
                            [value] => 1 week Subscription
                            [print_value] => 1 week Subscription
                            [option_id] => 1
                            [option_type] => drop_down
                            [option_value] => 2
                            [custom_view] =>
                            )
                             */
                            $totalWeeks = $option['option_value'] - 1;
                            if ($totalWeeks > 0){
                                $period = $totalWeeks * 7;
                                $model = $this->subscription->setOrderId($orderId)
                                    ->setPeriod($period)
                                    ->setOrderItemId($itemId)
                                    ->setCustomerId($customerId);

                                $this->subscriptionRepository->save($model);
                            }
                        }
                    }

                }
            }
        }
    }
}

