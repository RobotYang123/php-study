
<?php

/*
 * 接口 就更加抽象了
 * 比如一个社交网站,
 * 关于用户的处理是核心应用.
 * 登陆
 * 退出
 * 写信
 * 看信
 * 招呼
 * 更换心情
 * 吃饭
 * 骂人
 * 捣乱
 * 示爱
 * 撩骚
 * 这么多的方法,都是用户的方法,
 * 自然可以写一个user类,全包装起来
 * 但是,分析用户一次性使不了这么方法
 * 用户信息类:{登陆,写信,看信,招呼,更换心情,退出}
 * 用户娱乐类:{登陆,骂人,捣乱,示爱,撩骚,退出}
 * 开发网站前,分析出来这么多方法,
 * 但是,不能都装在一个类里,
 * 分成了2个类,甚至更多.
 * 作用应用逻辑的开发,这么多的类,这么多的方法,都晕了.
 */
interface UserBase
{

    public function login($u, $p);

    public function logout();
}

interface UserMsg
{

    public function wirteMsg($to, $title, $content);

    public function readMsg($from, $title);
}

interface UserFun
{

    public function spit($to);

    public function showLove($to);
}

/*
 * 作为调用者, 我不需要了解你的用户信息类,用户娱乐类,
 * 我就可以知道如何调用这两个类
 * 因为: 这两个类 都要实现 上述接口.
 * 通过这个接口,就可以规范开发.
 */
/*
 * 下面这个类,和接口声明的参数不一样,就报错,
 * 这样,接口强制统一了类的功能
 * 不管你有几个类,一个类中有几个方法
 * 我只知道,方法都是实现的接口的方法.
 */
class User implements UserBase
{

    public function login($u)
    {}
}
?>