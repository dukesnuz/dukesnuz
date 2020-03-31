<?php
//script 8.1 writetofile.php

	//define write to file class
	class WriteToFile{
		private $_fp = NULL;
		
		//defice constructor
		function __construct($file)
		{
			if(!file_exists($file) || !is_file($file))
			{
				throw new Exception('The file does not exist!');
			}
			//complete costructor
			if(!$this->_fp = @fopen($file,'w'))
			{
				throw new Exception('Could not open the file.');
			}
		}//END constructor
		//define write method
		function write($data)
		{
			if(@!write($this->_fp,$data,"\n"))
			{
				throw new Exception('Could not write to the file.');
			}
		}//END of write() method
		//define close method
		function close()
		{
			if($this->_fp)
			{
				fclose($this->_fp);
				$this->_fp = NULL;
			}
		}//END close method
		//define destructor and complete the class
		function __destruct()
		{
			$this->close();
		}//END of destructor
	}//END od WriteToFile class
