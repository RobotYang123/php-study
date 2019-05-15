<?php
/**
 * 全局函数类: 与其他类没有交互的, 常用的, 纯 php 代码的函数 置于此文件
 */

/**
 * 示例 hello_word
 * @param $who
 * @param string $say
 * @return string
 */
function hello_word($who, $say = ''): string
{
    return "{$who} say {$say} to the world.";
}

/**
 * 解析 运算符号单词对应的数学符号
 * @param $symbol
 * @return string
 */
function parse_symbol($symbol): string
{
    $map = [
        'plus' => '+',
        'minus' => '-',
        'multi' => '*',
        'divide' => '/',
    ];
    return $map[$symbol];
}
