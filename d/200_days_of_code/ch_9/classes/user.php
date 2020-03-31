<?php # User.php - Script 9.6
// This script defines the User class.

/*  Class User.
 *  The class contains six attributes: id, userType, username, email, pass, and dateAdded.
 *  The attributes match the corresponding database columns.
 *  The class contains four methods: 
 *  - getId()
 *  - isAdmin()
 *  - canEditPage()
 *  - canCreatePage()
 */
 
 
//define the class
class User{
	protected $id = null;
	protected $userType = null;
	protected $username = null;
	protected $email = null;
	protected $pass = null;
	protected $dateAdded = null;
	
	//define the getId() method
	function getId(){
		return $this->id;
	} 
	
	//define admin method
	function isAdmin(){
		return ($this->userType == 'admin');
	}
	
	//define the can edit page
	function canEditPage(Page $p)
	{
		return ($this->isAdmin() || ($this->id == $page->getCreatorID()));
	}
	
	//define the canCreatePage() id
	function canCreatePage(){
		return($this->isAdmin() || ($this->userType == 'author'));
	}
}//END of user class
