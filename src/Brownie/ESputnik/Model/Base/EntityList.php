<?php
/**
 * @category    Brownie/ESputnik
 * @author      Brownie <oss.brownie@gmail.com>
 * @license     http://www.gnu.org/copyleft/lesser.html
 */

namespace Brownie\ESputnik\Model\Base;

/**
 *
 */
abstract class EntityList
{

    private $list;

    public function __construct()
    {
        $this->createList();
    }

    private function createList()
    {
        $this->list = new \ArrayIterator();
    }

    /**
     * @return \ArrayIterator
     */
    private function getList()
    {
        return $this->list;
    }

    public function append($entity)
    {
        $this->getList()->append($entity);
    }

    public function getKeyName()
    {
        return $this->keyName;
    }

    public function toArray()
    {
        return $this->getList()->getArrayCopy();
    }

    public function count()
    {
        return $this->getList()->count();
    }

    /**
     * @param ArrayList $entity
     * @param array $equalityFields
     *
     * @return ArrayList|null
     */
    public function find(ArrayList $entity, array $equalityFields)
    {
        $equalityFields = array_map(function ($value) {
            return 'get' . ucfirst($value);
        }, $equalityFields);


        $object = null;
        foreach ($this->getList() as $row) {
            $equality = false;
            foreach ($equalityFields as $method) {
                if ($entity->$method() === $row->$method()) {
                    $equality = true;
                } else {
                    $equality = false;
                    break;
                }
            }

            if (true === $equality) {
                $object = $row;
                break;
            }
        }

        return $object;
    }
}
