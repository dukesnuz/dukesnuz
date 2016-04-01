
<!--
	for ref.
	http://www.w3schools.com/css/css3_gradients.asp
	http://www.w3schools.com/css/css3_2dtransforms.asp
	
-->
<style>
	#grad, body{
		  
		  background: #0F0E0E ;
		  height: 1000px;
		  padding:15%;
	}
	#grad{
	    background: -moz-repeating-radial-gradient(#FFA860,#0A1146  10%, white 15%);
	    background: -ms-repeating-radial-gradient(#FFA860,#0A1146  10%, white 15%);
	    background: -o-repeating-radial-gradient(#FFA860,#0A1146  10%, white 15%);
	    background: -webkit-repeating-radial-gradient(#FFA860,#0A1146  10%, white 15%);
	    background: repeating-radial-gradient(#FFA860,#0A1146  10%, white 15%);
	    
		width:30%;
		height:30%;
	
		border-radius:90%;
	}
	
	#grad:hover{
	
		-moz-transform:scale(.8);
		-ms-transform:scale(.8);
		-o-transform:scale(.8);
		-webkit-transform:scale(.8);
		transform:scale(.8);
		
		-moz-transform:rotate(180deg);
		-ms-transform:rotate(180deg);
		-o-transform:rotate(180deg);
		-webkit-transform:rotate(180deg);
		transform:rotate(180deg);
		
	}
	p{
		font-size: 2.5em;
		width:100%;
		text-align:center;
		color:#ffffff;
		font-weight: bold;
	}
	
	h1{
		color:#EC6B00;
	}
		        /*-moz-transform:scale(.5);
				-ms-transform:scale(.5);
				-o-transform:scale(.5);
				-webkit-transform:scale(.5);
				tranform:scale(.5);*/
</style>

	<h1>CSS3 Repeating Radial Gradient and Transform</h1>


<div id="grad"><p >&#8681; Hover &#8681; </p></div>
