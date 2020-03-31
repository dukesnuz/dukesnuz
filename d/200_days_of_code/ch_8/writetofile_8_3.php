<?php
//script 8.3 writetofile8_3.php
     //script 8.3 FileExceptionClass
     class FileException extends Exception
     {
     	function getDetails()
		{
			switch ($this->code)
			{case 0:
			return 'No filename was provided';
			break;
			
				case 1:
					return 'The file does not exist.';
					break;
					
				case 2:
					return 'The file is not a file.';
					break;
					
				case 3:
					return 'The file is not writable.';
					break;
					
				case 4:
					return 'An invalid mode was provided.';
					break;
					
				case 5:
					return 'The data could not be written.';
					break;
					
				case 6:
					return 'The file could not be closed.';
					break;
					
				default:
					return 'No further information is avaialble.';
					break;
			}//END of switch
		}//END getDetails()
     }//END FileException
     
     //define write to file class
	class WriteToFile{
		private $_fp = NULL;
	    private $_message ='';
	 
	 function __construct($file = null, $mode = 'w')
	  {
		$this->message = "File: $file Mode: $mode";
		if(empty($file)) throw new FileException($this->message,0);
		if(!file_exists($file)) throw new FileException ($this->message,1);
		if(!is_file($file)) throw new FileException($this->message,2);
		
		if(!is_writeable($file)) throw new FileException($this->message,3);
		
		if(!in_array($mode, array('a','a+','w','w+'))) throw new FileException($this->message,4);
		
		//open file and complete
		$this->fp = fopen($file,$mode); 
	 }//END constructor
	 
	 function write($data)
	 {
	 	if(@!fwrite($this->_fp,$data."\n")) throw new FileException($this->message."Data: $data",5);
	 }//END write
	 
	 function close()
	 {
	 	if($this->fp_)
		{
			if(@!fclose($this->_fp)) throw new FileException ($this->message, 6);
			$this->_fp =NULL;
		}
	 }//END Close() method
     
     
	

		function __destruct()
		{
			$this->close();
		}//END of destructor
	}//END od WriteToFile class
