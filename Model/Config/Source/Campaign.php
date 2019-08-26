<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sequra\Campaign\Model\Config\Source;

/**
 * @api
 * @since 100.0.2
 */
class Campaign implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var Sequra\Campaign\Model\Config
     */
    protected $config;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Sequra\Campaign\Model\Config $config
    ) {
        $this->config = $config;
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $conditions = $this->config->getCampaigns();
        return array_merge(
            [['value' => '', 'label' => __('Select...')]],
            array_map(
                function ($item) {
                    return [
                        'value' => $item['campaign'],
                        'label' => $this->parseCampaignTitle($item)
                    ];
                },
                $conditions[$this->config->getProduct()]
            )
        );
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        $conditions = $this->config->getCampaigns();
        return array_map(
            $conditions[$this->config->getProduct()],
            function ($item) {
                return $item['campaign'];
            }
        );
    }

    private function parseCampaignTitle($item)
    {
        $ret = isset($item['title'])?$item['title']:$item['campaign'];
        $ret .=  ' (' . sprintf(
            __('From %s to %s'),
            $item['start_date'],
            $item['end_date'] . ')'
        );
        return $ret;
    }
}
