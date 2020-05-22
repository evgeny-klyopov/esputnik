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

    public function toArray()
    {
        if ($this->getDevice()) {
            return ['device' => $this->getDevice()] + parent::toArray();
        }
        return parent::toArray();
    }
}