<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>Interfaces</title>
			<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Interfaces</h1>';
		echo '<h2>Script 6.4 - interface.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
       	echo '<div class="main_ex">';
  	//////////***********begin code****************//////////////
		
			//declare the iCrud interface
			interface iCrud{
				public function create($data);
				public function read();
				public function update($data);
				public function delete();
			}
			
			
			
			//begin using the user class
			class User implements iCrud
			{
				private $_userId = NULL;
				private $_username = NULL;
				
				//define the constructor
				function __construct($data)
				{
					$this->_userId = uniqid();
					$this->_username = $data['username'];
				}//END of constructor

				//define the create method
				function create($data)
				{
					self::__construct($data);
				}

				//define the read method
				function read()
				{
					return array('userId'=>$this->_userId, 'username'=>$this->_username);
				}

                //define the update method
                function update($data)
				{
					$this->_username = $data['username'];
				}

                //define the delete method
                public function delete()
				{
					$this->_username- NULL;
					$this->_userId -NULL;
				}
			}//END of user class	

    		
				//create a new user object
				$user = array('username' => 'trout');
				echo "<h2>Creating a new user</h2>";
				$me= new User($user);
				
				
				//get user's ID
				$info = $me->read();
				echo "<p>The user ID is {$info['userId']}.</p>";
	
				//change the user's name and confirm
				$me->update(array('username'=> 'troutster'));
				$info = $me->read();
				echo "<p>The user name is now {$info['username']}.</p>";
				
				//delete record
				$me->delete();
				
				unset($me);
		

			
			
			echo '</div>';
////////////////************END Coding******************///////////////////
  include('../includes/footer.html');		
/**********************This link to stat counter works*************************/
  include('../../stats.html');
/******************************************************************************/
	?>
	</div>
	</body>
</html>

