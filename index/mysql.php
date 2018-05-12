<?php
	header("content-Type: text/html; charset=UTF-8");
	
	class Consql {
	    private $ip,$user,$passwd;
	    private $con,$db,$sql,$rs;
	    
	    //构造函数，设置登入数据
	    function __construct() {          
    	    $this->ip='localhost';
    	    $this->user='abc';
    	    $this->passwd='123456';
    	    $this->db='shitang';
	    }
	    
	    //连接数据库
	    public function setCon() {
            $this->con=mysqli_connect( $this->ip, $this->user, $this->passwd)or die('数据库连接失败！');
        	mysqli_select_db($this->con, $this->db)or die('数据库选择失败');
        	mysqli_query($this->con, 'set names utf8');
	    }
	    
	    //关闭数据库
	    public function endCon() {
	        mysqli_close($this->con);
	    }
    	    
      /**
         * @return $ip
         */
        public function getIp()
        {
            return $this->ip;
        }
    
      /**
         * @return $db
         */
        public function getDb()
        {
            return $this->db;
        }
    
      /**
         * @return $rs
         */
        public function getRs()
        {
            return $this->rs;
        }
    
      /**
         * @param !CodeTemplates.settercomment.paramtagcontent!
         */
        public function setIp($ip)
        {
            $this->ip = $ip;
        }
    
      /**
         * @param !CodeTemplates.settercomment.paramtagcontent!
         */
        public function setUser($user)
        {
            $this->user = $user;
        }
    
      /**
         * @param !CodeTemplates.settercomment.paramtagcontent!
         */
        public function setPasswd($passwd)
        {
            $this->passwd = $passwd;
        }
    
      /**
         * @param !CodeTemplates.settercomment.paramtagcontent!
         */
        public function setDb($db)
        {
            $this->db = $db;
        }
    
      /**
         * @param !CodeTemplates.settercomment.paramtagcontent!
         */
        public function setRs($rs)
        {
            $this->rs = $rs;
        }

        /////////////////////////////////////////////////////////////////////////////////
        
	   //查询函数stmt
	    public function selStmt($sql) {
	        $this->setCon();
	        $this->rs=mysqli_query($this->con,$sql);
	        $this->endCon();
	        return $this->rs;
	    }
	    
	    //查询函数stmt
	    public function selPstmt($sql,$arr) {
	        $this->setCon();
	        $this->rs=mysqli_prepare($this->con, $sql);
	        mysqli_stmt_bind_param($this->rs, $arr[0]+",");
	        
	        $this->endCon();
	        return $this->rs;
	    }
	    
	}
	
	$consql=new Consql1();
	$sql='select * from tb_admin';
	$rs=$consql->selStmt($sql);
	while ($ro=mysqli_fetch_all($rs)) {
	    print_r($ro);
	}
	mysqli_free_result($rs);
	

    //     PDO Sql
	//     $pdosql=new Pdosql();
	//     $pdosql->setDb('smsql');
	
	//     $sql1='select * from user';
	//     $rs=$pdosql->selStmt($sql);
	
	//     $sql2='select * from user where id < ? and sex = ?';
	//     $arr1=array(4,'女');
	
	//     $sql3='insert into admin(phon,passwd) values(?,?)';
	//     $arr3=array('15595660','test123');
	
	//     if($pdosql->upPstmt($sql3, $arr3)){
	//         echo '更新成功！';
	//     }else {
	//         echo '更新失败！';
	//     }
	//     while($one = $rs->fetch()){
	//         for ($i = 0; $i < $rs->columnCount(); $i++) {
	//             echo $one[$i].' || ';
	//         }
	//         echo '<br/>';
	//     }
	//     $pdosql->endAll();
	
?>