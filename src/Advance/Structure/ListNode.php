<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-15
 * Time: 上午10:58
 */

namespace PhpDemo\Advance\Structure;

/**
 * Class LinkList 链表
 * @package PhpDemo\Advance\Structure
 */
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}