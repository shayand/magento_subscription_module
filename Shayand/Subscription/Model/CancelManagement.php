<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shayand\Subscription\Model;

class CancelManagement implements \Shayand\Subscription\Api\CancelManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function postCancel($param)
    {
        return 'hello api POST return the $param ' . $param;
    }
}

