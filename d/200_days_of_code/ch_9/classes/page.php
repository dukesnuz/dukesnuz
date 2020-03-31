<?php # Page.php - Script 9.5
// This script defines the Page class.

/*  Class Page.
 *  The class contains six attributes: id, creatorId, title, content, dateAdded, and dateUpdated.
 *  The attributes match the corresponding database columns.
 *  The class contains seven methods: 
 *  - getId()
 *  - getCreatorId()
 *  - getTitle()
 *  - getContent()
 *  - getDateAdded()
 *  - getDateUpdated()
 *  - getIntro()
 */
 
 //define the classes
 class Page{
 		protected $id = null;
		protected $creatorId = null;
		protected $title = null; 
		protected $content = null;
		protected $dateAdded = null;
		protected $dateUpdated = null;
		
		//define the 6 getter methods
		 function getId(){
		 	return $this->id;
		 }
		 
		 function getCreatorId(){
		 	return $this->creatorId;
		 }
		 
		 function getTitle(){
		 	return $this->title;
		 }
		 
		 function getContent(){
		 	return $this->content;
		 }
		 
		 function getDateAdded(){
		 	return $this->dateAdded;
		 }
		 
		 function getDateUpdated(){
		 	return $this->dateUpdated;
		 }
		 
		 function getIntro($count = 200)
		 {
		 	return substr(strip_tags($this->content), 0, $count).'...';
		 }
		 
 	}//END page class
 