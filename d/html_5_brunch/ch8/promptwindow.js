// JavaScript Document

	function show_prompt()
		{
			var name=prompt("Please enter your name", "Chris P Bacon");
			if(name!=null && name!="")
				{
					document.write("Hello " + name + "! How are you today?");
				}
		}