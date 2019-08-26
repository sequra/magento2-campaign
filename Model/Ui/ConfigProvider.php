<?php
/**
 * Copyright © 2017 SeQura Engineering. All rights reserved.
 */

namespace Sequra\Campaign\Model\Ui;

use Magento\Checkout\Model\ConfigProviderInterface;

/**
 * Class ConfigProvider
 */
final class ConfigProvider extends \Sequra\Core\Model\Ui\ConfigProvider
{
    const CODE = 'sequra_campaign';

    /**
     * Retrieve assoc array of checkout configuration
     *
     * @return array
     */
    public function getConfig()
    {
        $config = parent::getConfig();
        return [
            'payment' => [
                self::CODE => [
                    'configuration' => $config['payment']['sequra_configuration'],
                    'showlogo' => $this->config->getValue('showlogo'),
                    'product' => $this->config->getValue('product'),
                    'campaign' => $this->config->getValue('campaign')
                ]
            ]
        ];
    }
}
