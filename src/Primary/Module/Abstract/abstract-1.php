
<?php

/*
 * 春秋战国时期,燕零七 飞行器专家,能工巧匠.
 * 他写了一份图纸---飞行器制造术
 * 飞行器秘制图谱
 * 1: 要有一个有力的发动机,喷气式.
 * 2: 要有一个平衡舵,掌握平衡
 * 他的孙子问: 发动机怎么造呢?
 * 燕零七眼望夕阳: 我是造不出来,但我相信后代有人造出来
 * 燕零七的构想在当时的科技造不出来,即这个类只能在图纸化,无法实例化.
 * *
 */
// 此时这个类没有具体的方法去实现,还太抽象.
// 因此我们把他做成一个抽象类
abstract class FlyIdea
{
    // 大力引擎,当时也没法做,这个方法也实现不了,因此方法也是抽象的
    public abstract function engine();
    // 平衡舵
    public abstract function blance();
    /*
     * 注意:抽象方法 不能有方法体
     * 下面这样写是错误的
     * public abstract function blance() {
     * }
     * Fatal error: Abstract function FlyIdea::engine() cannot contain body
     */
}

/*
 * 抽象类不能 new 来实例化
 * 下面这行是错误的
 * $kongke = new FlyIdea();
 * Cannot instantiate abstract class FlyIdea
 */
// 到了明朝,万户用火箭解决了发动机的问题
abstract class Rocket extends FlyIdea
{
    // 万户把engine方法,给实现了,不再抽象了
    public function engine()
    {
        echo '点燃火药,失去平衡,嘭!<br />';
    }
    // 但是万户实现不了平衡舵,因此平衡舵对于Rocket类来说,还是抽象的,类也是抽象的
    // 此处由于继承父类的也是抽象类,所以可以不必完成抽象类中的所有抽象方法;
}

/*
 * 到了现代,燕十八亲自制作飞行器
 * 这个Fly类中,所以抽象方法,都已经实现了,不再是梦想.
 */
// 到了这个类就必须要完成所有的抽象方法;
class Fly extends Rocket
{

    public function engine()
    {
        echo '有力一扔<br />';
    }

    public function blance()
    {
        echo '两个纸翼保持平衡~~~';
    }

    public function start()
    {
        $this->engine();
        for ($i = 0; $i < 10; $i ++) {
            $this->blance();
            echo '平稳飞行<br />';
        }
    }
}
$apache = new Fly();
$apache->start();
?>