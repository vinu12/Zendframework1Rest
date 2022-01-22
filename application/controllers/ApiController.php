<?php

/***  Car details 
 *    Developed by vinod K Maurya
 * */


class ApiController extends Zend_Controller_Action
{

    public function init()
    {
        
    $this->_helper->contextSwitch()
         ->addActionContext('getJsonResponse', array('json'))
         ->initContext();


    }

public function getJsonResponseAction() 
{
    $jsonData = ''; // your json response

    return $this->_helper->json->sendJson($jsonData);
}


    public function indexAction()
    {
        $cars = new Application_Model_DbTable_Cardetails();
       //$this->view->carsdetails = $cars->fetchAll();

        $arrresult['Cardetails']=$cars->fetchAll()->toArray();

        $arrresult['status']="Success";
        $arrresult['code']='200';
        $this->getHelper('json')->sendJson($arrresult);
    
    }

    public function addAction()
    {

        if ($this->getRequest()->isPost()) {
           
                $brandid            = $_REQUEST['brandid'];
                $areamilage         = $_REQUEST['areamilage'];
                $engine             = $_REQUEST['engine'];
                $fueltype           = $_REQUEST['fueltype'];
                $settingcapicity    = $_REQUEST['settingcapicity'];
                $bodytype           = $_REQUEST['bodytype'];

                $cars = new Application_Model_DbTable_Cardetails();
                $Data= $cars->addCardetails($brandid,$areamilage, $engine,$fueltype,$settingcapicity,$bodytype);


                if($Data)
                {
                    
                    $arrresult['status']="Success";
                    $arrresult['code']=200;
                    $arrresult['message']="added successfully";
                    $this->getHelper('json')->sendJson($arrresult);
                }

                else

                {
                     
                     $arrresult['code']=400;
                     $arrresult['status']="fail";
                     $this->getHelper('json')->sendJson($arrresult);

                }
 
        }
    }



/**Edit API */



    public function editAction()
    {

        if ($this->getRequest()->isPost()) {
            
                $id = (int)$_REQUEST['id'];
                $brandid=(int)$_REQUEST['brandid'];
                $areamilage = $_REQUEST['areamilage'];
                $engine = $_REQUEST['engine'];
                $fueltype = $_REQUEST['fueltype'];
                $settingcapicity = $_REQUEST['settingcapicity'];
                $bodytype = $_REQUEST['bodytype'];
                $cars = new Application_Model_DbTable_Cardetails();
                $dataupdate=$cars->updateCardetails($id,$brandid,$areamilage, $engine,$fueltype,$settingcapicity,$bodytype);

                if($dataupdate)
                {

                    $arrresult['status']="Success";
                    $arrresult['code']=200;
                    $arrresult['message']="Update successfully";
                    $this->getHelper('json')->sendJson($arrresult);

                }
                else
                {

                     $arrresult['code']=400;
                     $arrresult['status']="fail";
                     $this->getHelper('json')->sendJson($arrresult);

                }
                
            
        } 


       
    }


    /**Delete API */

    public function deleteAction()
    {


        if ($this->getRequest()->isPost()) {
       
        $id = $this->getRequest()->getPost('id');

            if($id)
            {
                $cars = new Application_Model_DbTable_Cardetails();
                $deleteddata =$cars->deleteCardetails($id);
                $deleteresult['status']="Success";
                $deleteresult['code']=200;
                $deleteresult['message']="deleted successfully";
                $this->getHelper('json')->sendJson($deleteresult);

            }

            else {

                    
                 $deleteresult['code']=400;
                 $deleteresult['status']="fail";
                 $this->getHelper('json')->sendJson($deleteresult);
           
                 }
        }
        
        
    }
}
