<?php
namespace app\models;

use yii\base\Model;

class Tree extends Model
{
    const forMinI = 100;
    const forMaxI = 1000;
    private static $items = [];

    /**
     * @return array
     */
    static public function getRandomAll()
    {
        for($i = self::forMinI;$i <= self::forMaxI;$i++) {
            $parent_id = self::getParentID($i);
            self::$items[$parent_id][$i] = $i;
        }
        //print_r($items);die;
        return self::$items;
    }

    /**
     * @param $i
     * @return int
     */
    static private function getParentID($i)
    {
        $parent_id = rand(self::forMinI, self::forMaxI);
        if($parent_id == $i) {
            self::getParentID($i);
        }
        return $parent_id;
    }

    /**
     * @param $items
     * @return mixed
     */
    static public function getMinParentID()
    {
        return min(array_keys(self::$items));
    }
}