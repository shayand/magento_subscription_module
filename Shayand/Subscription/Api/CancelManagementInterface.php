<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shayand\Subscription\Api;

interface CancelManagementInterface
{

    /**
     * POST for cancel api
     * @param string $param
     * @return string
     */
    public function postCancel($param);
}

