<?php

class Application_Model_DbTable_Brands extends Zend_Db_Table_Abstract
{

    protected $_name = 'carbrand';


     public function  brandname($brandid)
     {

        $brandid = (int)$brandid;
        $row = $this->fetchRow('brandid = ' . $brandid);
        if(!$row){
            throw new Exception(" $id");
        }
        return $row->toArray();

     }




     public function  brandall()
     {

        
        $row = $this->fetchAll();
        if(!$row){
            throw new Exception(" $id");
        }
        return $row->toArray();

     }


    
}


