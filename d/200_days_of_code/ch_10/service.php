<?php //script 10.3 - service.php

//check that a format was passed to the service in POST
if(isset($_POST['format']))
	{
		switch($_POST['format'])
			{
			case 'csv':
				$type = 'text/csv';
				break;
				
			case 'json':
				$type = 'application/json';
				break;
				
			case 'xml':
				$type ='text/xml';
				break;
				
			default:
				$type = 'text/plain';
				break;
				
			}
			
			//start biulding the response
			$data = array();
			$data['timestamp'] = time();
			
			foreach($_POST as $k=>$v)
				{
					$data[$k] = $v;
				}
				
				//create output
				if($type == 'application/json')
					{
						$output = json_encode($data);
						//create out put in csv
					}elseif($type =='text/csv') 
					{
						$output = '';
						foreach ($data as $v)
						{
							$output .= '"'.$v.'",';
						}
						$output = substr($output, 0, -1);
						
						//create output in plain text format
					}elseif($type == 'text/plain')
					{
						$output = print_r($data,1);
				    }
					
	        }else{
	        	$type = 'text/plain';
				$output = 'This service has been incorrectly usesd';
	        }
      //set content-type header
      header("Content-Type:$type");
	  
	  //send the data
	  echo $output;
