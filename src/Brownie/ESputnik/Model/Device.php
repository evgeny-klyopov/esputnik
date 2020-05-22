<?php
namespace Brownie\ESputnik\Model;

use Brownie\ESputnik\Model\Base\ArrayList;
/**
 * User: ス
 * Date: 07.05.2020
 * Time: 6:29
 */

class Device extends ArrayList
{
    protected $fields = [
        'appId' => null,
        'deviceModel' => null,
        'os' => null,
        'locale' => null,
        'clientVersion' => 'esputnik-1',
        'appVersion' => null,
        'active' => null,
    ];

    public function toArray()
    {
        $fields = $this->fields;

        foreach ($fields as $key => $field) {
            if ($field === null) {
                unset($fields[$key]);
            }
        }

        return $fields;
    }
}