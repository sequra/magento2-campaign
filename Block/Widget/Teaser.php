<?php
/**
 * Copyright © 2017 SeQura Engineering. All rights reserved.
 */

namespace Sequra\Campaign\Block\Widget;

use Sequra\Core\Block\Widget\AbstractTeaser;

class Teaser extends AbstractTeaser
{
    public function getCampaign()
    {
        return $this->config->getValue("campaign");
    }
}
