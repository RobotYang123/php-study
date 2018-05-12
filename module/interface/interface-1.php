  <?php
header("Content-type: text/html; charset=utf-8");
/*
 * 类: 是某一类事物的抽象,是某类对象的蓝图.
 * 比如: 女娲造人时,脑子中关于人的形象 就是人类 class Human
 * 如果,女娲决定造人时, 同时,形象又没最终定稿时,
 * 她脑子有哪些支离破碎的形象呢?
 * 她可能会这么思考:
 * 动物: 吃饭
 * 猴子: 奔跑
 * 猴子: 哭
 * 自己: 思考
 * 小鸟: 飞
 * 我造一种生物,命名为人,应该有如下功能
 * eat()
 * run();
 * cry();
 * think();
 * 类如果是一种事物/动物的抽象
 * 那么 接口,则是事物/动物的功能的抽象,
 * 即,再把他们的功能各拆成小块
 * 自由组合成新的特种
 */
;

interface animal
{

    const NAME = 'zxg';
 // 不能定义属性,但可以定义常量;
    public function eat();
}

interface monkey
{

    public function run();

    public function cry();
}

interface wisdom
{

    public function think();
}

interface bird
{

    public function fly();
}

/*
 * 如上,我们把每个类中的这种实现的功能拆出来
 * 分析: 如果有一种新生物,实现了eat() + run() +cry() + think() ,这种智慧生物,可以叫做人.
 * class Human implements animal,monkey,wisdom {
 *
 * }
 *
 * Human类必须要包含animal,monkey,wisdom接口里面的方法,缺一不可,否则就会报错
 * Class Human contains 4 abstract methods
 */
class Human implements animal, monkey, wisdom, bird
{
 // 这里的接口数量可以随意增加;增加了以后本类里面的方法必须要有新增加的接口里面的方法
    public function eat()
    {
        echo "吃东西方法";
    }

    public function run()
    {
        echo self::NAME; // 可以通过self来访问任意一个接口所定义的常量;
        echo '行走的方法';
    }

    public function cry()
    {
        echo '哭的方法';
    }

    public function think()
    {
        echo animal::NAME; // 也可以通过 接口名
        echo '思考的方法';
    }

    public function smile()
    {
        echo "这是新增加的微笑方法";
    }

    public function fly()
    {
        echo "这是新增加的接口bird里面的fly方法";
    }
}

$obj = new Human();
$obj->think();
?>