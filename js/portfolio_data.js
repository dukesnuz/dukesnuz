/********************************
 * * author: David Petringa
 * created: February 2017
 *
 * object used to store portfolio image information
 * object has objects for each image
 * portfolio_data.js  used with portfolio.html, submit_contact_form.js, portfolio_data.js files
 */

var imageDescriptions = {
	p4: {
        "title": "Final Project For Dynamic Web Applications",
        "description": "Final project for Dynamic Web Applications class at Harvard Extension School.",
        "comment": "This web app is developed using the Laravel framework.",
        "link": "http://p4.dukesnuz.com"
    },
	
	davidPetringa_net: {
        "title": "My First Angular Web App",
        "description": "This is my first attempt at creating an Angular Web Application. I'am new to Angular 2 and as a result this app uses some simple features. As my skills increase, I will be adding more to this website.",
        "comment": "Once you get past the learning curve, Angular 2 is very cool.",
        "link": "http://dukesnuz.com/coding-playground/angular/my-first-angular-app-ll/"
    },

    ajaxDrones: {
        "title": "Drones",
        "description": "Wordpress was used to develop this site. I like word press except for the fact that wordpress takes a lot of the fun out of coding from scratch.",
        "comment": "I like drones. I use this site to post cool information on drones.",
        "link": "http://drones.dukesnuz.com/"
    },

    popsFoodCreations: {
        "title": "Pops Food Creations",
        "description": "This site is for a food truck called Pop's Food Creations. I used wordpress on this site.",
        "comment": "If you are ever in Meridith, NH, stop by and check it out.",
        "link": "http://www.popsfoodcreations.com/"
    },

    weatherWebcams: {
        "title": "Weather and Webcams",
        "description": "I am using JavaScript and AJAX to make a call to the api to get the city & state. Another api is called to retrieve the weather and webcam data.",
        "comment": "The objective is to demonstate JavaScript, jQuery and making api calls. I used a PHP script with cURL to make the calls to the api. jQuery jCarousel plugin is used to display the webcam images.",
        "link": "http://dukesnuz.com/weather/get-current-weather-webcams"
    },

    capeMediation: {
        "title": "Cape Mediation",
        "description": "This is one of the two websites our team created at 48 in 48.",
        "comment": "We created 2 websites in 48 hours using wordpress.",
        "link": "https://capemediation.org/"
    },

    theBFund: {
        "title": "The B Fund",
        "description": "This is one of the two websites our team created at 48 in 48",
        "comment": "This site came in third place. We used wordpress",
        "link": "https://thebfund.org/"
    },

    theDom: {
        "title": "The Dom Tree",
        "description": "This is a detailed explantion of the DOM(Document Object Model).",
        "comment": "This was an extra credit assignment for the Harvard Extension class, Introduction to Web Programming Using JavaScript.",
        "link": "http://www.dukesnuz.com/harvard/introduction-to-web-programming-using-javascript/extraCreditAssignments/extraCreditAssignmentTwo/the_dom.html"
    },

    ajaxTransport: {
        "title": "Ajax Transport",
        "description": "This is my company website I am working on. I am in the process of re-developing this site. I am pushing the pages live as I complete them. Thus the variance in colors.",
        "comment": "On this site I am using HTML, CSS, JavaScript, PHP and MySql. I am still building out the site. This is why the colors are not the same on all pages.",
        "link": "http://www.ajaxtransport.com/"
    },

    theCentralDispatch: {
        "title": "The Central Dispatch",
        "description": "This page is a simple page with links.",
        "comment": "The objective was to demonstrate PHP and MySQL. All the links are stored in a MySQL table.",
        "link": "http://www.thecentraldispatch.com"
    },

    loadedAndRolling: {
        "title": "Loaded and Rolling",
        "description": "This demonstrates HTML and CSS and JavaScript. I added to the backend using PHP to make calls to a MySQL table I created.",
        "comment": "This was my final project for Fundamentals of Website Development at Harvard Extension.",
        "link": "http://www.loadedandrolling.co"
    },

    mortgageCalculator: {
        "title": "Mortgage Calculator",
        "description": "This is a demonstration using JavaScript to make calculation and verifying form data.",
        "comment": "This was an assignment I created for the Harvard Extension class, Introduction to Web Programming Using JavaScript.",
        "link": "http://www.dukesnuz.com/harvard/introduction-to-web-programming-using-javascript/graduateCreditAssignments/petringa_david_graduateCreditAssignmentOne/graduateCreditAssignmentOne.html"
    },

    getTheBlob: {
        "title": "Get The Blob",
        "description": "Using JavaScript I created a game. I am using an api to make calls to populated the city menu. The map is retrieved from Mapquest using JavaScript.",
        "comment": "This is my final project for the Harvard Extension class, Introduction to Web Programming Using JavaScript. To me the best part is viewing the links to each cities' own webpage.",
        "link": "http://www.dukesnuz.com/games/get-the-blob"
    },

    bookmarklets: {
        "title": "Bookmarklets",
        "description": "Using JavaScript to create a bookmarklet. I also created a PHP script that stores the bookmarklet in a MySQL table.",
        "comment": "This was an assignment I created for the Harvard Extension class, Introduction to Web Programming Using JavaScript.",
        "link": 'http://www.dukesnuz.com/bookmarklets/bookmarks.php'
    },

    webDevHome: {
        "title": "Fundamentals of Website Development at Harvard Extension school",
        "description": "This is the home page for Fundamentals of Website Development at Harvard Extension school.",
        "comment": "Just some basic HTML and CSS",
        "link": "http://www.dukesnuz.com/harvard/fundamentals-of-web-development/index.html"
    },

    davidPetringa: {
        "title": "David's Blog",
        "description": "Demonstrating using PHP and MySQL",
        "comment": "PHP is used to dynamically create the pages. All the blog posts are stored in a MySQL table. Yes I know the colors are dark.",
        "link": "http://blog.dukesnuz.com/"
    },

    introWebProgHome: {
        "title": "Harvard Extension class, Introduction to Web Programming Using JavaScript",
        "description": "This is the home page for Harvard Extension class, Introduction to Web Programming Using JavaScript.",
        "comment": "Just some basic HTML and CSS",
        "link": "http://www.dukesnuz.com/harvard/introduction-to-web-programming-using-javascript/intro_to_web_programming_javascript.html"
    },

    htmlBrunch5Home: {
        "title": "HTML5 Brunch Season 5",
        "description": "An online virtual self study I participated in. The topic was HTML and CSS.",
        "comment": "I coded the home page without a templete. I think it came out cool looking.",
        "link": "http://www.dukesnuz.com/d/html5_brunch_5/index.html"
    },

    filemakermysqlpictures: {
        "title": "Filemaker Using Execute SQL Script",
        "description": "This Filemaker solution adds, edits and deletes data in a mySQL table.",
        "comment": "I am using the table to store links to pictures and data for each picture.",
        "link": "http://dukesnuz.com/d/artgallery/images/filemaker_using_mysql.jpg"
    }

};
