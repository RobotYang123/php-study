<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-10
 * Time: 下午5:37
 */

namespace PhpDemo\Advance\Structure;

/**
 * Class BinaryTree 二叉树节点
 * @package PhpDemo\Advance\Structure
 */
class TreeNode
{
    private $val = 0;
    private $left = null;
    private $right = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}
