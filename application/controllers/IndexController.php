<?php

/***  Car details 
 *    Developed by vinod K Maurya
 * */


class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        
    

    }


    public function indexAction()
    {
        $cars = new Application_Model_DbTable_Cardetails();
        $brand = new Application_Model_DbTable_Brands();

        $this->view->carsdetails = $cars->fetchAll();

       
        // $brandname=$brand->brandname(3);
         
        // $ddd=$cars->getdetails();
        
    
    }

    public function addAction()
    {


        $form = new Application_Form_Album();
        $form->submit->setLabel('add cars');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {

                $brandid             = $form->getValue('brandid');
                $areamilage         = $form->getValue('areamilage');
                $engine              = $form->getValue('engine');
                $fueltype           = $form->getValue('fueltype');
                $settingcapicity    = $form->getValue('settingcapicity');
                $bodytype           = $form->getValue('bodytype');
                $cars = new Application_Model_DbTable_Cardetails();
                $cars->addCardetails($brandid,$areamilage, $engine,$fueltype,$settingcapicity,$bodytype);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function editAction()
    {


        $form = new Application_Form_Album();
        $form->submit->setLabel('car brand details');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();

            if ($form->isValid($formData)) {



                $id = (int)$form->getValue('id');
                $brandid=(int)$form->getValue('brandid');
                $areamilage = $form->getValue('areamilage');
                $engine = $form->getValue('engine');
                $fueltype = $form->getValue('fueltype');
                $settingcapicity = $form->getValue('settingcapicity');
                $bodytype = $form->getValue('bodytype');

                $cars = new Application_Model_DbTable_Cardetails();

                

                $cars->updateCardetails($id,$brandid,$areamilage, $engine,$fueltype,$settingcapicity,$bodytype);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $cars = new Application_Model_DbTable_Cardetails();
                $form->populate($cars->getCardetails($id));
            }
        }
    }

    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
        if ($del == 'Yes') {
            $id = $this->getRequest()->getPost('id');
            $cars = new Application_Model_DbTable_Cardetails();
            $cars->deleteCardetails($id);
        }
        $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id', 0);
            $cars = new Application_Model_DbTable_Cardetails();
            $this->view->cars = $cars->getCardetails($id);
        }
    }
}
