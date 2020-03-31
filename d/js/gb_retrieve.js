/************************Used to retrievecomments from database************************/

 	<!--
//Browser support Code
setInterval(function ajaxFunction(){
	//alert ('hi');
	
	
	//var ajaxRequest; //The var that makes ajax possible
	try{
		//Opera 8.0+, Firefox,Safari
		ajaxRequest = new XMLHttpRequest();
		
	}catch(e){
		//Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxm12.XMLHTTP");
		}catch (e){
			//Something went wrong
			alert("Your browser broke!");
			return false;
		}
	}
//}
//
//create a function that will recieve data
//sent from the server
//and will update div section in the page

ajaxRequest.onreadystatechange = function(){
	
	if(ajaxRequest.readyState ==4)
	{
	var ajaxDisplay = document.getElementById('ajaxDiv');
	ajaxDisplay.innerHTML = ajaxRequest.responseText;
	}
}

//alert ('2');
//Now get the values to retrieve from database
/*
queryString += "&type=guest_book;
ajaxRequest.open("GET","ajax/ajax_gb_retrieve.php"+queryString, true);
ajaxRequest.send(null);
*/
ajaxRequest.open("GET","ajax/ajax_gb_retrieve.php", true);
ajaxRequest.send(null);
},3000);//refresh every 3 sec
//}
//-->



























