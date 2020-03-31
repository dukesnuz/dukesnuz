/************************************HED Extra Credit Assignemnt Two Fall 2016**************************************************
 *  Teachiing Fellow:  JaZahn Clevenger
 *  Student: David Petringa
 *  Thank you for checking my work.
 *  Last updated 11/2222222222222244444444444444444444444444444/16
 **********************************************************************************************************************************/
/*************************************************************************************
 *This function builds the output for the output div. it takes 2 parameters title and desc from theDom object
 * @param {Object} title
 * @param {Object} desc
 *************************************************************************************/

function buildOutput(title, desc) {
	var output = document.getElementById("output");
	// clear the output div
	output.innerHTML = "";
	// create an h2 element
	var h2 = document.createElement('h2');
	// create text node using the title parameter for the value
	var titleText = document.createTextNode(title);
	// append the h2 element to the output div
	output.appendChild(h2);
	// append the text to the h2 element
	h2.appendChild(titleText);
	// set p variable to the p element
	var p = document.createElement('p');
	// append the p to the output element
	output.appendChild(p);
	// create a text node using the desc parameter for the value
	var descText = document.createTextNode(desc);
	// append the text to the p element
	p.appendChild(descText);
}

/***************************************************************************************
 * The Dom object is an object containing object literals. Each object has 3 properties. A title, desc and printIt function which is a function that
 * calls the buildOutput function and passes in the title and the desc.
 ***************************************************************************************/

var theDom = {

	domData : {
		"title" : "THE DOM",
		"desc" : "The Document Object Model also known as the DOM, is an object representation of the HTML document. This is the root of the DOM. The DOM ties HTML, CSS and JavaScript together. The DOM is represented as a tree structure. The DOM is made up nodes which are represented as objects. Nodes can be elements, comments and other HTML. There are also whitespace nodes created by spaces which are between each node. Node properties are nodeName, nodeValue and nodeType. There are 12 node types. The most common node types are elements, attribute, text, comment and document. HTML documents also contain whitespace text elements. Nodes are described as parent, child, and sibling nodes.  By working with these nodes we can change the HTML page. The HTML DOM has methods and properties that can be used to work with nodes to change the structure, style(css) and content(text) of the HTML document. This has no parent and one child node which is the html node. This var doc = document.documentElement gives us the root element of the document. Here it is the HTML element. I will be using the variable doc throughout this presentation so you can follow along at home.",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	},

	htmlData : {
		"title" : "The Html Node",
		"desc" : " This HTML node has the document as its parent node we can see this using doc.parentNode. There are three child nodes, the HEAD, TEXT and the BODY. We can accees these as an array with doc.childNodes. They are array like objects. Also called a node list. There is a difference between child and children nodes. The children property only contains element nodes, use doc.children to see the HEAD and BODY element. The child nodes includes all nodes including text and whitespaces. The HEAD node can be accessed using doc.firstChild or doc.firstElementChild property. The BODY node can be accessed using the doc.lastChild, doc.lastElementChild property or as doc.childNodes[2]. Child nodes can be seen as an array using doc.childNodes, which are head, text and body.",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	},

	headData : {
		"title" : "The Head Node",
		"desc" : "The HEAD node can be accessed using doc.childNodes[0]. This node has as its parent the HTML node and can be accessed by doc.childNodes[0].parentNode. Using the children property doc.childNodes[0].children we see the HTML collection with one element of title. Using doc.childNodes[0].firstElementChild returns. <title>the document</title>, element and text nodes.",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	},

	titleData : {
		"title" : "The Title Node",
		"desc" : "The title and text nodes can also be accessed using doc.childNodes[0].childNodes[1]. Using doc.childNodes[0].childNodes[1].parentNode we see the TITLE node has HEAD as its parent node. TITLE has a node name of text, accsesed using doc.childNodes[0].childNodes[1].nodeName. This doc.childNodes[0].childNodes gives us all the nodes in the HEAD in an array like format.",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	},

	titleTextData : {
		"title" : "The Title Text",
		"desc" : "Using  doc.childNodes[0].childNodes[1].firstChild we see title has a value of \"the document\". We could have also used doc.childNodes[0].childNodes[1].innerHTML  to get this value. This gives us the node name of TITLE doc.childNodes[0].childNodes[1].nodeName.",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	},

	docElementData : {
		"title" : "The Root",
		"desc" : "Using var doc = document.documentElement gives us the root element of the document. Here it is the HTML element. This entry point gives access to the top HTML tag. An HTML document almost always only contains one HTML element. Thus it is  a  good entry point and should be used to get the root element of the document.",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	},

	docBodyData : {
		"title" : "document.body",
		"desc" : "The document.body gives access to the body contents. This gives us all the elements in the body. This is not a good entry point for accessing the DOM. Reason. If you try to access the document.body from the head you will get null back because there is no body element at that point.",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	},

	bodyData : {
		"title" : "The Body Node",
		"desc" : "The body node can be accssed using doc.childNodes[2]. Its parent node is HTML. We can access its children using doc.childNodes[2].children. This gives us the HTMLCollection. These are array like objects representing the javascript equivalent of the HTML element.  One way to access one of the divs is by using this syntax doc.childNodes[2].children.a where a = the id value in the div. The syntax doc.childNodes[2].childNodes gives us a node list containing all the nodes including text nodes. And we can get the node name of BODY by using doc.childNodes[2].nodeName. To get the first div this syntax can also be used doc.childNodes[2].childNodes[1].",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	},

	divData : {
		"title" : "1st Div Node",
		"desc" : "This syntax  doc.childNodes[2].children[0] will also return this div. The div has a parent node of BODY which can be found using this syntax doc.childNodes[2].children.a.parentNode. This node has the ul element as its next sibling which can be found using doc.childNodes[2].children.a.nextElementSibling. If we want to access the text inside the div we could use doc.childNodes[2].children.a.firstChild or doc.childNodes[2].children.a.innerHTML. Paste this to the console var doc = document.documentElement. Copy and past the line in your console and watch the first div change doc.childNodes[2].children.a.innerHTML = 'New Text Here' .",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	},

	data : {
		"title" : "data",
		"desc" : "We can see this node value is data by using the syntax doc.childNodes[2].children.a.firstChild.nodeValue. We can also see that the node type is text by using doc.childNodes[2].children.a.firstChild.nodeType which return 3 for node type of text. Say we want the node name, use the syntax doc.childNodes[2].children.a.firstChild.nodeName which returns text. Because this is a text node this will return #text.",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	},

	ul : {
		"title" : "UL Element",
		"desc" : "This syntax returns the ul element doc.childNodes[2].children[1]. Its parent node is the body using ths syntax doc.childNodes[2].children[0].parentNode. Its previous element sibling is the div with the text of data using the syntax doc.childNodes[2].children[1].previousElementSibling. Its next sibling element is the div with text of top secret, doc.childNodes[2].children[1].nextElementSibling. Its children are the 2 li elements in an HTML Collection using the syntax doc.childNodes[2].children[1].children. Its node name of UL can be seen using the syntax doc.childNodes[2].children[1].nodeName. Its node type is element which is represented by a 1, doc.childNodes[2].children[1].nodeType.",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	},

	liWarning : {
		"title" : "LI Element warning text",
		"desc" : "This syntax returns the li element with its text of warning, doc.childNodes[2].children[1].childNodes[1]. Its parent node is the UL element using ths syntax doc.childNodes[2].children[1].childNodes[1].parentNode. Its next sibling element is the other li , doc.childNodes[2].children[1].childNodes[1].nextElementSibling. Using this syntax we can get it's text value of warning, doc.childNodes[2].children[1].childNodes[1].innerHTML.",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	},

	li : {
		"title" : "LI Element no text",
		"desc" : "This syntax returns the li element with no text, doc.childNodes[2].children[1].childNodes[3]. Its parent node is the UL element using ths syntax doc.childNodes[2].children[1].childNodes[3].parentNode. Its previous sibling element is the other li with text of warning, doc.childNodes[2].children[1].childNodes[3].previousElementSibling.",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	},

	divTop : {
		"title" : "2nd Div Node",
		"desc" : "This syntax  doc.childNodes[2].children[2] will return this div. The div has a parent node of body which can be found using this syntax doc.childNodes[2].children.b.parentNode. This node has the ul element as its previous sibling which can be found using doc.childNodes[2].children.b.previousElementSibling. If we want to access the text inside the div we could use doc.childNodes[2].children.b.firstChild or doc.childNodes[2].children.b.innerHTML. Paste this to the console var doc = document.documentElement. Copy and past the line in your console and watch the first div change doc.childNodes[2].children.b.innerHTML = 'New Text Here for the Second Div.' .",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	},

	warning : {
		"title" : "warning text",
		"desc" : "This syntax returns the li text of waning, doc.childNodes[2].children[1].childNodes[1].innerHTML. Its parent node is the ul element using ths syntax doc.childNodes[2].children[1].childNodes[1].parentNode. Using this syntax we can change the text value of warning,  doc.childNodes[2].children[1].childNodes[1].innerHTML = 'new warning'.",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	},

	topSecret : {
		"title" : "top secret text",
		"desc" : "This syntax returns the div text of top secret, doc.childNodes[2].children[2].innerHTML. Using this syntax we can change the text value of top secret,  doc.childNodes[2].children[2].innerHTML = 'really really top secret'.",
		"printIt" : function() {
			buildOutput(this.title, this.desc);
		}
	}

};
