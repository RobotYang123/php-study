
<?php

class SportObject
{

    private $type = '';

    public function __get($name)
    {
        if (isset($this->$name)) {
            echo '变量' . $name . '的值为：' . $this->$name . '<br>';
        } else {
            echo '变量' . $name . '未定义，初始化为0<br>';
            $this->$name = 0;
        }
    }

    public function __set($name, $value)
    {
        if (isset($this->$name)) {
            $this->$name = $value;
            echo '变量' . $name . '赋值为：' . $value . '<br>';
        } else {
            $this->$name = $value;
            echo '变量' . $name . '被初始化为：' . $value . '<br>';
        }
    }
}

$MyComputer = new SportObject();
$MyComputer->name;
?>