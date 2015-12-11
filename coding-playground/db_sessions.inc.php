<?php
/***********************Using book PHP Advanced and Object Orietned Programming page 82***********************************/


$sdbc = NULL;
//set time to delete expired session
$expire = 60;

define('ERROR',"<p style='color:red'>OOppss! System Error. We apologize.</p>");


function open_session(){
	global $dbc;
	require('../include_2/mysqli_connect.php');
	return true;
	
}

function close_session(){
	global $dbc;
	return mysqli_close($dbc);
}

//define function for reading the session data
function read_session($sid){
	global $dbc;
	
	$q = sprintf('SELECT data FROM sessions WHERE id="%s"', mysqli_real_escape_string($dbc, $sid));
	
	$r = mysqli_query($dbc, $q);
	if(mysqli_num_rows($r) ==1)
		{
			list($data) = mysqli_fetch_array($r, MYSQLI_NUM);
			return $data;
		}else{
			return '';
		}
}

//define function for writing data
function write_session($sid, $data){
	global $dbc;
	$q = sprintf('REPLACE INTO sessions(id, data) 
				VALUES ("%s","%s")', mysqli_real_escape_string($dbc, $sid), 
				     mysqli_real_escape_string($dbc,$data));
		$r = mysqli_query($dbc,$q);
		if(mysqli_affected_rows($dbc) ==1)
		{
		    //echo 'true';
		}else{
		 // echo ERROR;
		}
			 
}


//function to destroy session
function destroy_session($sid){
	global $dbc;
	
	 $q = sprintf('DELETE FROM sessions
					WHERE id = "%s"',
					mysqli_real_escape_string($dbc,$sid));
		$r = mysqli_query($dbc, $q);
		
		
		if(mysqli_affected_rows($dbc)==1)
		{
			//echo 'true1';
			$_SESSION = array();
		}else{
			// echo ERROR;
		}

					
}
//define garabage collection function
function clean_session($expire){
	global $dbc;
	
       $q = sprintf('DELETE FROM sessions WHERE DATE_ADD(last_accessed, INTERVAL %d SECOND) < NOW()', (int) $expire); 
      
		$r = mysqli_query($dbc,$q);
		
if(mysqli_affected_rows($dbc) ==1)
	{
		//echo 'true3';
	}else{
		 //echo ERROR;
	}
	
}

//tell PHP to use session-handling functions
session_set_save_handler('open_session', 'close_session', 'read_session', 'write_session', 'destroy_session', 'clean_session');

session_start();

//echo $expire;
//echo ERROR;
