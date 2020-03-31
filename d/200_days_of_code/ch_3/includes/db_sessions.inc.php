<?php #Script 3.1 - db_sessions.inc.php
// page 88
$sdbc = NULL;

//define function for opening session
function open_session(){
	global $sdbc;
	$sdbc = '../../include_2/mysqli_connect.php';
	return true;
}

//define function for closing a sesssion
function close_session(){
	global $sdbc;
	return mysqli_close($sdbc);
}

//define function for reading session
function read_session($sid)
{
	global $sdbc;
	
	$q = sprintf('SELECT data FROM sessions WHERE id="%s"',mysqli_real_escape_string($sdbc, $sid));
	$r = mysqli_query($sdbc, $q);
	if(mysqli_num_rows($r) ===1)
	{
		list($data)= mysqli_fetch_array($r, MYSQLI_NUM);
		return $data;
	}else{
		return '';
	}
}

//define function for writing to database
function write_session($sid, $data)
{
	global $sdbc;
	$q= sprintf('REPLACE INTO sessions (id,data)
				VALUES("%s","%s")', mysqli_real_escape_string($sdbc, $data));
				$r = mysqli_query($sdbc,$q);
				return true;
}

//create function to destroy session data
function destroy_session($sid)
{
	global $sdbc;
	$q = sprintf('DELETE FROM sessions WHERE id = "%s" ', mysqli_real_escape_string($sdbc, $sid));
	$r = mysqli_query($sdbc, $q);
	$_SESSION = array();
	return true;
}

//define garbage collection function
	function clean_session($expire)
	{
		global $sdbc;
	$q =sprintf('DELETE FROM sessions WHERE DATE_ADD(last_accessed, INTERVAL %d SECOND) < NOW()',(int) $expire);
	$r = mysqli_query($sdbc, $q);
	return true;
	}
	
//Tell PHP to use the session-handling functions
session_set_save_handler
('open_session', 'close_session', 'read_sesssion','write_session','destroy_session','clean_session');


//start the session
session_start();


