<?php

class Application_Form_Album extends Zend_Form
{

    public function init() {
    	$this->setName('album');
		$id = new Zend_Form_Element_Hidden('id');
		$id->addFilter('Int');



	   $db = Zend_Db_Table::getDefaultAdapter(); 
       $brand = new Application_Model_DbTable_Brands();
       $brandall= $brand->brandall();
       foreach($brandall as $key=>$valdata)
       {
       
       	$brandid=$valdata['brandid'];
       	$brandname=$valdata['brandname'];

       }

      

		/*$brandid = new Zend_Form_Element_Select('brandid');
		$this->setName('Brancname');
		$brandid->setMultiOptions(array(
		0 => 'Select Brannd',
		1 => 'Marutisuzki',
		2 => 'Hundayee'
		))

		->addValidator(new Zend_Validate_Int(), false)
		->addValidator(new Zend_Validate_GreaterThan(0), false);

		$this->setDefaults(array(
		'brandid' => 0
		));

		$this->addElement($brandid); */


		$arrValue = array();

	    foreach($brandall as $key=>$valdata)
        {		

		$brandid=$valdata['brandid'];
       	$brandname=$valdata['brandname'];

       	$arrValue[0] = 'Select Brand';
		$arrValue[$brandid] = $brandname;
		
	    } 

		$brandid = new Zend_Form_Element_Select('brandid');
		$brandid->setMultiOptions($arrValue)
		->addValidator(new Zend_Validate_Int(), false)
		->addValidator(new Zend_Validate_GreaterThan(0), false);

		$this->setDefaults(array(
		'brandid' => 0
		));
		$this->addElement($brandid);

		



		$areamilage = new Zend_Form_Element_Text('areamilage');
		$areamilage->setLabel('areamilage')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');
		

		$engine = new Zend_Form_Element_Text('engine');
		$engine->setLabel('engine')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');
				
		$fueltype = new Zend_Form_Element_Text('fueltype');
		$fueltype->setLabel('fueltype')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');
		
		$settingcapicity = new Zend_Form_Element_Text('settingcapicity');
		$settingcapicity->setLabel('settingcapicity')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty'); 
				

		$bodytype = new Zend_Form_Element_Text('bodytype');
		$bodytype->setLabel('bodytype')
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');


		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton');
		$this->addElements(array($id,$brandid,$areamilage, $engine,$fueltype,$settingcapicity,$bodytype, $submit));
    }


}
