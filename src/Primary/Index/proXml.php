<?php
	header("content-Type: text/html; charset=UTF-8");
		
	class Xmlpro2 {
	    private $dom=null;
	    private $root=null;
	    private $path=null;
	    private $rows=null;
	    
	    //构造函数，创建dom
	    public function __construct() {
	        $this->dom = new DomDocument('1.0','UTF-8');
	        $this->path="tmp\\test6.xml";
	        if (!file_exists($this->path)) {
	            $this->createXml();
	        }
    	    $this->dom->load($this->path);
	        $this->root=$this->dom->getElementsByTagName('root')->item(0);
    	    $this->rows=$this->dom->getElementsByTagName('row');
	    }
	    
	    //创建xml文件、根root
	    public function createXml(){
    	    $this->dom->appendChild($this->dom->createElement ('root'));
    	    $this->saveXml();
    	}
    	
    	//载入xml文件
    	public function loadXml() {
    	}
    	
    	//格式化保存
    	public function saveXml(){
    	    $this->dom->save($this->path);
    	}
    	
    	//插入一条记录
    	public function insertRow() {
    	    $row = $this->root->appendChild($this->dom->createElement ('row'));
    	    $checked = $row->appendChild($this->dom->createElement ('checked'));
    	    $name = $row->appendChild($this->dom->createElement ('name'));
    	    $price = $row->appendChild($this->dom->createElement ('price'));
    	    $restaurant = $row->appendChild($this->dom->createElement ('restaurant'));
    	    $type = $row->appendChild($this->dom->createElement ('type'));
    	    $combin = $row->appendChild($this->dom->createElement ('combin'));
    	    $imgid = $row->appendChild($this->dom->createElement ('imgid'));
    	    
    	    $checked->appendChild($this->dom->createTextNode('0'));
    	    $name->appendChild($this->dom->createTextNode(''));
    	    $price->appendChild($this->dom->createTextNode(''));
    	    $restaurant->appendChild($this->dom->createTextNode('0'));
    	    $type->appendChild($this->dom->createTextNode('0'));
    	    $combin->appendChild($this->dom->createTextNode('1'));
    	    $imgid->appendChild($this->dom->createTextNode(''));
    	    
    	    $this->saveXml();
    	}    	
    	
    	//获得记录条数
    	public function getRowCount() {
            return $this->rows->length;
    	}
    	
    	//获得子节点数
    	public function getChilds() {
    	    return $this->rows->item(0)->childNodes->length;
    	}    	

    	//设置定位节点的值ById
    	public function setPosiById($i,$j,$value) {
    	    $this->rows->item($i)->childNodes->item($j)->nodeValue=$value;
    	    $this->saveXml();
    	}

    	//获得定位节点的值ById
    	public function getPosiById($i,$j) {
    	    return $this->rows->item($i)->childNodes->item($j)->nodeValue;
    	}
    	
	    //获得定位节点的值ByName
    	public function getPosiByName($i,$childName) {
    	    $childs=$this->dom->getElementsByTagName($childName);
    	    return $childs->item($i)->nodeValue;
    	}

    	//设置定位节点的值ByName
    	public function setPosiByName($row,$childName,$value) {
    	    $childs=$this->dom->getElementsByTagName($childName);
    	    $childs->item($row)->nodeValue=$value;
    	    $this->saveXml();
    	}    	
    	
    	//删除一条记录
    	public function deleteRow($row){
    	    if ($this->getRowCount()==0) {
    	        return false;
    	    }else {
    	        $r=$this->rows->item($row);
    	        $r->parentNode->removeChild($r);
    	        $this->saveXml();
    	        return true;
    	    }
    	}    	
    	
    	//删除所有记录
    	public function deleteAll(){
//     	    $count=$this->getRowCount();
//     	    while (--$count!=-1) {
//     	        $this->deleteRow($count);
//     	    }
            if($this->deleteRow(0)){
                $this->deleteAll();
            }
    	}
    	
    	//获得数组形式的xml
    	public function getArr(){
    	    $arr=array();
    	    for ($i = 0; $i < $this->getRowCount(); $i++) {
    	        $row=$this->rows->item($i);
    	        for ($j = 0; $j < $row->childNodes->length; $j++) {
    	            $arr[$i][$j]= $row->childNodes->item($j)->nodeValue;
    	        }
    	    }
    	    return $arr;
    	}
    	
      /**
         * @return $dom
         */
        public function getDom()
        {
            return $this->dom;
        }
    
      /**
         * @return $root
         */
        public function getRoot()
        {
            return $this->root;
        }
    
      /**
         * @return $path
         */
        public function getPath()
        {
            return $this->path;
        }
    
      /**
         * @return $path
         */
        public function getRows()
        {
            return $this->rows;
        }
        
    
      /**
         * @param !CodeTemplates.settercomment.paramtagcontent!
         */
        public function setDom($dom)
        {
            $this->dom = $dom;
        }
    
      /**
         * @param !CodeTemplates.settercomment.paramtagcontent!
         */
        public function setRoot($root)
        {
            $this->root = $root;
        }
    
      /**
         * @param !CodeTemplates.settercomment.paramtagcontent!
         */
        public function setPath($path)
        {
            $this->path = $path;
        }
	
	}
	
	$dom=new Xmlpro2();
	echo $dom->getPosiById(1, 3);	
	
?>