<?php

namespace AppBundle\CustomerManagementFramework\SegmentBuilder;

use AppBundle\Ecommerce\IndexService\SegmentGetter;
use AppBundle\Website\Tool\ForceInheritance;
use CustomerManagementFrameworkBundle\Model\CustomerInterface;
use CustomerManagementFrameworkBundle\SegmentBuilder\AbstractSegmentBuilder;
use CustomerManagementFrameworkBundle\SegmentManager\SegmentManagerInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\Factory;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\AbstractOrder;
use Pimcore\Bundle\EcommerceFrameworkBundle\OrderManager\Order\Listing\Filter\CustomerObject;
use Pimcore\Model\DataObject\OnlineShopOrderItem;

/**
 * Sample Segment Builder that adds segments to customer based on products he ordered
 */
class ProductInterestSegmentBuilder extends AbstractSegmentBuilder
{
    /**
     * @var SegmentGetter
     */
    protected $segmentGetter;

    /**
     * ProductInterestSegmentBuilder constructor.
     *
     * @param SegmentGetter $segmentGetter
     */
    public function __construct(SegmentGetter $segmentGetter)
    {
        $this->segmentGetter = $segmentGetter;
    }

    /**
     * prepares data and configurations which could be reused for all buildSegment(CustomerInterface $customer) calls
     *
     * @param SegmentManagerInterface $segmentManager
     *
     * @return void
     */
    public function prepare(SegmentManagerInterface $segmentManager)
    {
        // nothing to do
    }

    /**
     * update calculated segment(s) for given customer
     *
     * @param CustomerInterface $customer
     * @param SegmentManagerInterface $segmentManager
     *
     * @return void
     */
    public function calculateSegments(CustomerInterface $customer, SegmentManagerInterface $segmentManager)
    {
        if (!$customer->getProfilingConsent()) {
            return;
        }

        ForceInheritance::run(function () use ($customer, $segmentManager) {
            $orderManager = Factory::getInstance()->getOrderManager();

            // create new order list
            $list = $orderManager->createOrderList();

            // set list type
            $list->setListType($list::LIST_TYPE_ORDER_ITEM);

            // set order state
            $list->setOrderState(AbstractOrder::ORDER_STATE_COMMITTED);
            $list->addFilter(new CustomerObject($customer));

            $segments = [];

            foreach ($list as $orderItem) {

                /**
                 * @var $orderItem OnlineShopOrderItem
                 */
                $product = $orderItem->getProduct();
                if ($product) {
                    $segments = array_merge($segments, $this->segmentGetter->get($product));
                }
            }

            $segmentManager->mergeSegments($customer, $segments, [], $this->getName());
        });
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ProductCategorySegmentBuilder';
    }

    /**
     * @return bool
     */
    public function executeOnCustomerSave()
    {
        //only for demo purposes on true, should be false in production environment
        return true;
    }
}
