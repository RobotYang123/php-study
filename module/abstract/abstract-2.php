
<?php

/**
 * *
 * ====笔记部分====
 * 面向对象的一个观点:
 * 做的越多,越容易犯错
 * 抽象类{就定义类模板}--具体子类实现{china,japan,english}
 * 接口:
 * *
 */
// 抽象的数据库类
/*
 * 创业做网站
 * 到底用什么数据库? mysql, oracle,sqlserver,postgresql?
 * 这样:先开发网站,运行再说.
 * 先弄个mysql开发着,正式上线了再换数据库也不迟
 * 引来问题:
 * 换数据库,会不会以前的代码又得重写?
 * 答:不必,用抽象类
 * 开发者,开发时,就以db抽象类来开发.
 */
abstract class db
{

    public abstract function connect($h, $u, $p);

    public abstract function query($sql);

    public abstract function close();
}

/*
 * // 下面这个代码有误
 * // 因为子类实现时, connect和抽象类的connect参数不一致
 * class mysql extends db {
 * public function connect($h,$h) {
 * return true;
 * }
 * public function query($sql,$conn) {
 * }
 * public function close() {
 * }
 * }
 */
/*
 * 下面这个mysql类,严格实现了db抽象类
 * 试想: 不管上线时,真正用什么数据库
 * 我只需要再写一份如下类
 * class oracle extends db {
 * }
 * class mssql extends db {
 * }
 * class postsql extends db {
 * }
 * 业务逻辑层不用改?
 * 为什么不用改?
 * 因为都实现的db抽象类.
 * 我开发时,调用方法不清楚的地方,我就可以参考db抽象类.
 * 反正子类都是严格实现的抽象类.
 */
class mysql extends db
{

    public function connect($h, $h, $u)
    {
        return true;
    }

    public function query($sql)
    {}

    public function close()
    {}
}
?>