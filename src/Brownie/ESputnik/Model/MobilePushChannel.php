<?php
namespace Brownie\ESputnik\Model;

use Brownie\ESputnik\Model\Base\Channel;
/**
 * User: ス
 * Date: 07.05.2020
 * Time: 6:29
 */

class MobilePushChannel extends Channel
{
    protected $fields = [
        'value' => null,
        'device' => null,
    ];

    protected $type = 'mobilepush';
}