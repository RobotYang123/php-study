<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-15
 * Time: 下午5:39
 */

namespace PhpDemo\Advance\Algorithm;


use PhpDemo\Advance\Structure\ListNode;

class LinkList
{
    public static function toList(array $arr): ListNode
    {
        $ls = new ListNode($arr[0]);
        $lp = &$ls;
        for ($i = 1; $i < count($arr); $i++) {
            $lp->next = new ListNode($arr[$i]);
            $lp = &$lp->next;
        }
        unset($lp);

        return $ls;
    }
}