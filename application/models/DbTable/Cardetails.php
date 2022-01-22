<?php

class Application_Model_DbTable_Cardetails extends Zend_Db_Table_Abstract
{

    protected $_name = 'cardetails';

    public function getCardetails($id){
    	$id = (int)$id;
    	$row = $this->fetchRow('id = ' . $id);
    	if(!$row){
    		throw new Exception(" $id");
    	}
    	return $row->toArray();
    }



    /*public function getdetails()
    {


       
        $db = Zend_Db_Table::getDefaultAdapter(); 

        $select = $db->select()
        ->from(array('c' => 'cardetails'), array('target', 'visit_id', 'rep_id'))
        ->joinInner(array('b' => 'carbrand'), 'v.visit_id = r.visit_id')
        ->where('v.visit_id = ?', $id);

        $query = $select->query();


        $dataresult=  $db->select->from(array('c' => $this->getDbTable()->getTableName()),array('*'))
               ->joinInner(array('B' => 'carbrand'),  "c.brandid = B.brandid", array('b.brandname'))
        $datamain=$dataresult->fetchAll();
        print_r($datamain);
        die;



    } */





     public function  brandname($brandid)
     {

        $id = (int)$brandid;
        $row = $this->fetchRow('id = ' . $id);
        if(!$row){
            throw new Exception(" $id");
        }
        return $row->toArray();

     }


    public function addCardetails($brandid,$areamilage, $engine,$fueltype,$settingcapicity,$bodytype){
    	$data = array(
                'brandid' =>$brandid,
    			'areamilage' => $areamilage,
    			'engine' => $engine,
                'fueltype' => $fueltype,
                'settingcapicity' => $settingcapicity,
                'bodytype' => $bodytype,


    	);
    	 $id = $this->insert($data);
         return $id;

        
    }
    public function updateCardetails($id, $brandid,$areamilage, $engine,$fueltype,$settingcapicity,$bodytype){
    	$data = array(
            'brandid' =>$brandid,
    		'areamilage' => $areamilage,
    		'engine' => $engine,
            'fueltype' => $fueltype,
            'settingcapicity' => $settingcapicity,
            'bodytype' => $bodytype,
    	);
    	 $id = $this->update($data,'id = ' . (int)$id);
        return $id;

    }
    public function deleteCardetails($id){
    	$this->delete('id = '. (int)$id);

        
    }
}


