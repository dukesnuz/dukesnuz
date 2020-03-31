<?php //script 7.5 -workunit.php

abstract class WorkUnit{
	protected $tasks = array();
	protected $name = NULL;
	function __construct($name){
		$this->name= $name;
	}
	function getName(){
		return $this->name;
	}
	
	abstract function add(Employee $e);
	abstract function remove(Employee $e);
	abstract function assignTask($task);
	abstract function completeTask($task);
}//END workunit class

class Team extends WorkUnit{
	private $_employees = array();
	function add(Employee $e){
		$this->_employees[] = $e;
		echo "<p>{$e->getName()} has been added to team {$this->getName()}.</p>";
	}
	
	function remove(Employee $e){
		$index = array_search($e,$this->_employees);
		unset($this->_employees[$index]);
		
		echo "<p>{$e->getName()} has been removed from team {$this->getName()}.</p>";
	}
	
	function assignTask($task){
		$this->tasks[] = $task;
		
		echo "<p>A new task has been assigned to team {$this->getName()}.  
		It shouldbe easy to do with {$this->getCount()} team member(s).</p>";
	}
	
	function completeTask($task){
		$index = array_search($task, $this->tasks);
		
		unset($this->tasks[$index]);
		
		echo "<p>The '$task' task has been completed by team {$this->getName()}.</p>";
	}
	
	function getCount(){
		return count($this->_employees);
	}
}//END of team class

//Define employee class
class Employee extends WorkUnit{
	function add(Employee $e){
	return false;
	}
	function remove(Employee $e)
	{
		return false;
	}
	
	function assignTask($task){
		$this->task[] = $task;
		
		echo "<p>A new task has been assigned to {$this->getName()}.
		   It will be done by {$this->getName()} alone.</p>";
	}
	
	function completeTask($task){
		$index = array_search($task, $this->tasks);
		
		unset($this->tasks[$index]);
		
		echo "<p>The '$task' task has been completed by employee {$this->getName()}.</p>";
	}
}//END of employee class
