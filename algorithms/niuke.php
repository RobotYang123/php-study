<?php
///**
// * 设有n(n<100)个正整数，将他们连接成一排，组成一个最大的多位整数。
// * 如:n=3时，m= 3个整数13,312,343,连成的最大整数为34331213。
// * 如:n=4时, m= 4个整数7,13,4,246连接成的最大整数为7424613。
// * N（N<=100），第二行包含N个数(每个数不超过1000，空格分开)。
// * 控制台分两行，分别输入如下
//    2
//    12 123
//    4
//    7 13 4 246
//     * 输出
//    12312
//    7424613
// */
//while ($n = trim( fgets(STDIN)) ) {
//    $m = explode(' ', trim( fgets(STDIN) ));
//    usort($m, function ($a, $b) {
//        return ($a.$b <= $b.$a) ? 1 : -1;
//    });
//    $str = implode('', $m);
//    echo $str . "\n";
//}

//-----------------------------------------------------------------------------

///**
//题目描述
//现在有一棵合法的二叉树，树的节点都是用数字表示，现在给定这棵树上所有的父子关系，求这棵树的高度
//输入描述:
//输入的第一行表示节点的个数n（1 ≤ n ≤ 1000，节点的编号为0到n-1）组成，
//下面是n-1行，每行有两个整数，第一个数表示父节点的编号，第二个数表示子节点的编号
//输出描述:
//输出树的高度，为一个整数
//示例1
//输入
//
//复制
//5
//0 1
//0 2
//1 3
//1 4
//输出
//
//复制
//3
//*/
///* 不完全二叉树 test */
//$m = explode(' ', trim(fgets(STDIN)));
//$arr = [];
//for ($i = 0; $i < count($m); $i = $i + 2) {
//    $pid = $m[$i];
//    $cid = $m[$i + 1];
//    if (!$arr) {
//        $arr[0][] = $pid;
//    }
//    foreach ($arr as $l => &$a) {
//        if (in_array($pid, $a)) {
//            $arr[$l + 1][] = $cid;
//        }
//    }
//    unset($a);
//}
//
///* 不完全二叉树 rel */
//$n = trim( fgets(STDIN));
//$arr = [];
//while ($n > 1) {
//    $n--;
//    list($pid, $cid) = explode(' ', trim( fgets(STDIN) ));
//    if (!$arr) {
//        $arr[0][] = $pid;
//    }
//    foreach ($arr as $l => &$a) {
//        if (in_array($pid, $a)) {
//            $arr[$l + 1][] = $cid;
//        }
//    }
//    unset($a);
//}
//echo count($arr);

//-----------------------------------------------------------------------------

///* 完全二叉树情况 test */
//$m = explode(' ', trim(fgets(STDIN)));
//$arr = [];
//for ($i = 0; $i < count($m); $i = $i + 2) {
//    $pid = $m[$i];
//    $cid = $m[$i + 1];
//    if (!$arr) {
//        $arr[0][] = $pid;
//    }
//    foreach ($arr as $l => &$a) {
//        if (in_array($pid, $a)) {
//            $arr[$l + 1][] = $cid;
//        }
//    }
//    unset($a);
//}
//
//$c = 1; //第一排是0，第二排为基础，往后每排以此为基础
//$except_n = count($arr[$c]) * 2;
//for ($l = $c; $l < count($arr); $l++) {
//    $curl_n = count($arr[$l]);
//    if ($curl_n == $except_n) {
//        $c++;
//        $except_n = $curl_n * 2;
//    } else {
//        break;
//    }
//}
//
//echo $c;
//exit();

//-----------------------------------------------------------------------------

///* 完全二叉树情况 test */
////$m = explode(' ', trim(fgets(STDIN)));
//$m = explode(' ', trim($_REQUEST['m']));
//
////依次添加树节点，生成二叉树
//$tree = [];
//for ($i = 0; $i < count($m); $i = $i + 2) {
//    $pid = $m[$i];
//    $cid = $m[$i + 1];
//    add($tree, $pid, $cid);
//}
///**
// * 添加树节点
// * @param $tree
// * @param $pid
// * @param $cid
// */
//function add(&$tree, $pid, $cid) {
//    if (empty($tree)) {
//        $tree = [0 => []]; //初始化第一个节点
//    }
//
//    if (isset($tree[$pid])) {
//        $tree[$pid][$cid] = [];
//    } else {
//        foreach ($tree as &$a) {
//            if (!empty($a)) {
//                add($a, $pid, $cid);
//            }
//        }
//        unset($a);
//    }
//}
//
//$level_arr = get_tree_depth($tree, 0);
//
///**
// * 二叉树数组转一维
// */
//function get_tree_depth(&$tree, $y) {
//    static $level_arr = [];
//
//    foreach ($tree as $pid => &$a) {
//        $level_arr[$y][] = $pid;
//
//        if (!empty($a)) {
//            get_tree_depth($a, $y+1);
//        }
//    }
//    unset($a);
//    return count($level_arr);
//}


//-----------------------------------------------------------------------------

/**
 * ref: https://www.nowcoder.com/profile/4296572/codeBookDetail?submissionId=26484601
 * Class TreeNode
 */
//class TreeNode
//{
//    public $value;
//    public $rChild;
//    public $lChild;
//
//    public function __construct($value)
//    {
//        $this->value = $value;
//    }
//
//    public function createChild(TreeNode $child)
//    {
//        if (!$this->lChild) {
//            $this->lChild = $child;
//            return true;
//        } elseif (!$this->rChild) {
//            $this->rChild = $child;
//            return true;
//        } else {
//            return false;
//        }
//    }
//}
//
//function height(TreeNode $node = null)
//{
//    if (!$node) {
//        return 0;
//    } else {
//        return max(height($node->lChild), height($node->rChild)) + 1;
//    }
//}
//
//fscanf(STDIN, '%d', $num);
//$map = [];
//$map[0] = new TreeNode(0);
//for ($i = 1; $i < $num; $i++) {
//    $arr = trim(fgets(STDIN));
//    list($parent, $child) = explode(' ', $arr);
//    if (!isset($map[$parent])) {
//        continue;
//    }
//    if (!isset($map[$parent]->lChild)) {
//        $map[$child] = new TreeNode($child);
//        $map[$parent]->createChild($map[$child]);
//    } elseif (!isset($map[$parent]->rChild)) {
//        $map[$child] = new TreeNode($child);
//        $map[$parent]->createChild($map[$child]);
//    }
//}
//echo height($map[0]) . "\n";

//-----------------------------------------------------------------------------

//题目描述
//给定一个句子（只包含字母和空格）， 将句子中的单词位置反转，单词用空格分割, 单词之间只有一个空格，前后没有空格。 比如： （1） “hello xiao mi”-> “mi xiao hello”
//输入描述:
//输入数据有多组，每组占一行，包含一个句子(句子长度小于1000个字符)
//输出描述:
//对于每个测试示例，要求输出句子中单词反转后形成的句子
//示例1
//输入
//hello xiao mi
//输出
//mi xiao hello

//while ($text = trim( fgets(STDIN)) != null ) {
//    $words = explode(' ', $text);
//    krsort($words);
//
////    foreach ($words as &$w) {
////        $w = str_split($w);
////        print_r($w); echo PHP_EOL;
////        krsort($w);
////        $w = implode('', $w);
////    }
////    unset($w);
//
//    echo implode(' ', $words) . "\n";
//}
//
//while (($text = trim(fgets(STDIN))) != null) {
//    $words = explode(" ", $text);
//    $words = array_reverse($words);
//    echo implode(" ", $words) . "\n";
//}

//-----------------------------------------------------------------------------

//题目描述
//继MIUI8推出手机分身功能之后，MIUI9计划推出一个电话号码分身的功能：首先将电话号码中的每个数字加上8取个位，然后使用对应的大写字母代替
//     （"ZERO", "ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX", "SEVEN", "EIGHT", "NINE"）， 然后随机打乱这些字母，所生成的字符串即为电话号码对应的分身。
//输入描述:
//第一行是一个整数T（1 ≤ T ≤ 100)表示测试样例数；接下来T行，每行给定一个分身后的电话号码的分身（长度在3到10000之间）。
//输出描述:
//输出T行，分别对应输入中每行字符串对应的分身前的最小电话号码（允许前导0）。
//示例1
//输入
//4
//EIGHT
//ZEROTWOONE
//OHWETENRTEO
//OHEWTIEGTHENRTEO
//SEVENEIGHTSEVENEIGHT
//输出
//0
//234
//345
//0345

//$alphaNumStrArr = ["ZERO", "ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX", "SEVEN", "EIGHT", "NINE"];
//$maybeNumMap = ['Z' => 0, 'W' => 2, 'U' => 4, 'X' => 6, 'G' => 8, 'O' => 1, 'T' => 3, 'F' => 5, 'S' => 7, 'I' => 9];
//$T = intval( trim( fgets(STDIN) ) );
//while ($encryptPhone = trim(fgets(STDIN))) {
////    $encryptPhone = $_REQUEST['m'];
//    $maybeNumIntArr = [];
//    while ($encryptPhone) {
//        //依次按顺序匹配，逐渐缩小匹配范围
//        foreach ($maybeNumMap as $keyword => $mapNumInt) {
//            if (strpos($encryptPhone, $keyword) !== false) {
//                $maybeNumInt = $mapNumInt;
//                break;
//            }
//        }
//        //匹配到的数值后，通过正则 按字符去除 原字符串中的字符，如识别到 ONE， 则 OHWETENRTEO 剔除后为 HEENRTEO
//        $maybeNumIntArr[] = $maybeNumInt;
//        $alphaNumCharArr = str_split($alphaNumStrArr[$maybeNumInt]);
//        foreach ($alphaNumCharArr as $char) {
//            $pattern = "/$char{1}/"; //如 '/Z{1}/'
//            $encryptPhone = preg_replace($pattern, '', $encryptPhone, 1);
//        }
//    }
//
//    foreach ($maybeNumIntArr as &$v) {
//        $v = ($v + 10 - 8) % 10;
//    }
//    unset($v);
//    sort($maybeNumIntArr);
//
//    echo implode('', $maybeNumIntArr). PHP_EOL;
//}

//-----------------------------------------------------------------------------


























