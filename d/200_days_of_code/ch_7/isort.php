<?php //script 7.7 isort.php page 235

//define isort interface
interface iSort{
	function sort(array $list);
}

class MultiAlphaSort implements iSort{
	private $_order;
	private $_index;
	
	//define constructor
	function __construct($index, $order = 'ascending')
	{
		$this->_index = $index;
		$this->_order = $order;
	}
	
	function sort(array $list)
	{
		if($this->_order == 'ascending')
		{
			uasort($list, array($this, 'ascSort'));
		}else{
			uasort($list, array($this, 'descSort'));
		}
		return $list;
	}//END of sort() method
	
	//define the comparison functions and complete the class
	function ascSort($x, $y)
	{
		return strcasecmp($x[$this->_index], $y[$this->_index]);
	}
	function descSort($x, $y)
	{
		return strcasecmp($y[$this->_index],$x[$this->_index]);
	}
}//END MultiAlphaSort class

//define multi number sort class
class MultiNumberSort implements iSort{
	private $_order;
	private $_index;
	function __construct($index, $order = 'ascending')
	{
		$this->_index = $index;
		$this->_order = $order;
	}
	
	//implement the sort
	function sort(array $list)
	{
		if($this->_order == 'ascending')
		{
			uasort($list, array($this, 'ascSort'));
		}else{
			uasort($list, array($this, 'descSort'));
		}
		return $list;
	}//END of sort() method
	
	//implent comparison functions and complete the class
	function ascSort($x,$y)
	{
		return ($x[$this->_index] .$y[$this->_index]);
	}
	function descSort($x,$y)
	{
		return ($x[$this->_index]< $y[$this->_index]);
	}
}//END of MultiNumberSort class
