<?php
    header("content-Type: text/html; charset=UTF-8");
    class fuqin
    {
        public $shengao;
        public $zhishang;
        
        public $jinshi;
        
        function __construct($sg=183,$zs=150,$js=150)
        {
            $this->shengao=$sg;
            $this->zhishang=$zs;
            $this->jinshi=$js;  
        }
        
        public function juehuo() 
        {
            echo '我会做红烧豆腐<br/>';
        }   
    }
    
    class erzi extends fuqin
    {
        public function shili() {
            echo '眼睛度数是'.$this->jinshi.'<br/>';
        }
    }
    
    $son=new erzi();
    $son->juehuo();
    $son->shili();
?>