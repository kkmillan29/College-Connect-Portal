<?php 


/**
* 
*/
class Template
{
	
	//function __construct(argument)
	

	public function emailTemplate($teplate_name,$pin,$email,$regno){
		    //set the root
		$templateRaw = file_get_contents($teplate_name);

	    //grab the template content             
	    //replace all the tags
		//$template="";
		$arrayName = array('{pin}','{email}','{regno}');
		$arrayName2 = array($pin,$email,$regno);
		// $result = preg_replace(
	 //    array('{pin}',$pin),
	 //    array('{email}',$email)

	 //    );
	    $template= preg_replace($arrayName,$arrayName2, $templateRaw);
	   // $template+= preg_replace('{email}',$email, $templateRaw);
	  //  $template+= preg_replace('{regno}',$regno, $templateRaw);
	    return $template;
	}




}




