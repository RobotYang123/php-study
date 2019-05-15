<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-10
 * Time: 下午5:37
 */

namespace PhpDemo\Advance\Algorithm;

/**
 * Class Tree
 * 多级树
 * 二叉树
 */
class MultiTree
{
    /**
     * 转换 平行数组到树型数组
     * @param array $list 待树型化数组
     * @param int $pid 初始父类id值
     * @param string $pid_field 父类字段
     * @param string $id_filed 子类字段
     * @param string $chi_key 子类键名
     * @return array $tree 树型数组
     */
    public static function tree(
        array $list,
        $pid = 0,
        $pid_field = 'parent_id',
        $id_filed = 'id',
        $chi_key = '_children'
    ): array {
        $tree = [];
        foreach ($list as $k => $v) {
            if ($v[$pid_field] == $pid) {
                $tmp = $list[$k];
                unset($list[$k]);
                $tmp[$chi_key] = self::tree($list, $v[$id_filed], $pid_field);
                $tree[] = $tmp;
            }
        }
        return $tree;
    }

    /**
     * 根据 $ck_ids 过滤树型数组
     * @param array $tree 树型数组
     * @param array $ck_ids 待保留 id 数组
     * @param string $id_filed 子类字段
     * @param string $chi_key 子类键名
     * @return array $ckTree 过滤后的树型数组
     */
    public static function accept(array $tree, array $ck_ids, $id_filed = 'id', $chi_key = '_children'): array
    {
        $ckTree = [];
        foreach ($tree as $k => $item) {
            $ckItems = [];
            if ($item[$chi_key]) {
                $ckItems = self::accept($item[$chi_key], $ck_ids);
            }

            if (in_array($item[$id_filed], $ck_ids)) {
                $item[$chi_key] = $ckItems;
                $ckTree[] = $item;
            } else { //当前元素丢弃, 但子元素保留 时
                if ($ckItems) {
                    $ckTree = array_merge($ckTree, $ckItems);
                }
            }
        }
        return $ckTree;
    }
}
