 <?php
//check if db connection
/****************For developement**************/
    //echo "History";
    //define('CONTACT_EMAIL','Email');//for dev
	//$title = "page_history";
	//$my_ip = "::1";//for dev
/*********************************************/
/******Set ip address to filter out in page count******/
   // old ip 76.107.223.9
    $my_ip = "73.5.43.112";
	//$my_ip = "0";
/*******filter browsers********/
	$browser_filter = "other";
	//$browser_filter= "Null";
/*******END filter browsers********/


if(!isset($dbch))
  {
  	//check if constant declared and if file exists
   if(!defined(MYSQLH) && file_exists(MYSQLH) )
   		{
   			require(MYSQLH);
   			//exit();

		}elseif(!defined(MYSQLH1) && file_exists(MYSQLH1) )
		{
		     require(MYSQLH1);
		     //exit();
         }else{
         	//$body = "";
 			 $body = "Page: site_utilities/page_history.inc.php\rline17\rEND email";
 			// mail(CONTACT_EMAIL,"Error DukesNuz",$body,CONTACT_EMAIL);
 		    exit($body);
         }
 }

if(isset($dbh))
       {

		//Get the user's browser
		//I added if statement was throughing error
/****For browser detection I used this site for ref.
 * https://developer.mozilla.org/en-US/docs/Browser_detection_using_the_user_agent
 */
	if(isset($_SERVER['HTTP_USER_AGENT']))
		{
			$user_agent = $_SERVER['HTTP_USER_AGENT'];

	   		function get_user_browser()
				{

				 $user_agent = $_SERVER['HTTP_USER_AGENT'];
				if(preg_match('/MSIE/i',$user_agent) || preg_match('/Trident/i',$user_agent) )
					{
						$browser = "IE";
					}
					elseif(preg_match('/Firefox/i',$user_agent))
					{
						$browser = "Firefox";
					}
					elseif(preg_match('/Opera/i',$user_agent) || preg_match('/OPR/i',$user_agent))
					{
						$browser = "Opera";
					}
					elseif( preg_match('/Chrome/i',$user_agent))
					{
						$browser = "Chrome";
					}
					elseif(preg_match('/Safari/i',$user_agent))
					{
						$browser = "Safari";
					}
					else
					{
						$browser = "Other";
					}

					return $browser;
					}
					$browser = get_user_browser();
			}else{
				$browser= "0";
				$user_agent="Null";
			}

			if(isset($browser))
				{
					$browser = mysqli_real_escape_string($dbh, trim($browser));
				}else{
					$browser= "browser";
				}
		/******END get browser info******/

			if(isset($_SERVER['HTTP_REFERER']))
				{
					$page_from=$_SERVER['HTTP_REFERER'];
					$page_from= mysqli_real_escape_string($dbh, trim($page_from));
				}else{
					$page_from= "page_from";
				}


			if(isset($_SERVER['REQUEST_TIME']))
				{
					$page_time = $_SERVER['REQUEST_TIME'];
					$page_time= mysqli_real_escape_string($dbh, trim($page_time));
				}else{
					$page_time= "0";
				}

			if(isset($_SERVER['PHP_SELF']))
                  {
                  	 $p = basename($_SERVER['PHP_SELF']);
					 $p= mysqli_real_escape_string($dbh, trim($p));
				  }else{
				      $p = Null;
				  }

			if(isset($_SERVER['REMOTE_ADDR']))
				  	{
				  		 $ip = $_SERVER['REMOTE_ADDR'];
						 $ip= mysqli_real_escape_string($dbh, trim($ip));
				  	}else{
				  		$ip = Null;
				  	}

  				 //$Host ='host'. $_SERVER['REMOTE_HOST'];
		 	if(isset($_SERVER['REMOTE_ADDR']))
				{
					$host =gethostbyaddr($_SERVER['REMOTE_ADDR']);
					$host= mysqli_real_escape_string($dbh, trim($host));
				}else{
    				$host= "host";
				}


			if( (isset($_SERVER['HTTP_HOST']))  && (isset($_SERVER['REQUEST_URI'])) )
				{
					$url_complete="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					$url_complete= mysqli_real_escape_string($dbh, trim($url_complete));
				}else{
					$url_complete= "url";
				}



	 		if(isset($track_id))
   				{
   					//$track_id=$track_id;
    				$track_id= mysqli_real_escape_string($dbh, trim($track_id));
   				}else{
   					$track_id= "0";
   				}




			    if(isset($title))
					{
					   $page_title = mysqli_real_escape_string($dbh, $title);

					}else{
					  $page_title = Null;
					}
                if(isset( $_SESSION['uid']))
                  {
                  	  $uid = mysqli_real_escape_string($dbh, $_SESSION['uid']);

				  }else{
				  	$uid = Null;
				  }



				if(isset( $_GET['name']))
                  {
                  	$in = mysqli_real_escape_string($dbh, $_GET['name']);

				  }else{
				  	$in = "item_name";
				  }

				 if(isset( $_GET['id']))
                  {
                  	$id = mysqli_real_escape_string($dbh, $_GET['id']);

				  }else{
				  	$id = Null;
				  }

/*****************************Grab location information***************************************************************/
/*******************************from the book PHP ADvanced and Object Orieted programming page 340********************/

    //$fp = fopen($url, 'r');
	//if(!file_exists(fopen($url, 'r')))
	//exit("File not found page_history.inc.php line 199");


    //$ip = "76.107.223.9";

	$url = 'http://freegeoip.net/csv/'.$ip;
	//$fp = @fopen($url, 'r');
	if(!file_exists($url))
	//check if fopen works
	//if($fp != TRUE)
	{
		$country_abbr = "Null";
		$country = "Null";
		$state_abbr = "Null";
		$state = "Null";
		$city = "Null";
		$zip = "Null";
		$time_zone = "Null";
		$latitude = "Null";
		$longitude = "Null";
		$metro_code = "Null";
	}else{
		$fp = fopen($url, 'r');
		$read = fgetcsv($fp);
		fclose($fp);
		$country_abbr = $read[1];
		$country =$read[2];
		$state_abbr = $read[3];
		$state = $read[4];
		$city = $read[5];
		$zip = $read[6];
		$time_zone = $read[7];
		$latitude = $read[8];
		$longitude = $read[9];
		$metro_code = $read[10];
	}



/*****************************END Grab location information**********************************************************/

//echo $user_agent;
//echo $country_abbr;


    $q= "INSERT INTO page_history (user_id,track_id,item_id,item_name, page_title, page,ip,host,page_from,page_time,url_complete,browser,country,country_abbr,state_abbr,state,city,zip,time_zone,latitude,longitude,metro_code,user_agent)
					   VALUES('$uid','$track_id','$id','$in','$page_title','$p', '$ip','$host','$page_from','$page_time','$url_complete','$browser','$country','$country_abbr','$state_abbr','$state','$city','$zip','$time_zone','$latitude','$longitude','$metro_code','$user_agent')";

echo '<br>'.$uid;
echo '<br>'.$track_id;
echo '<br>'.$id;
echo '<br>'.$in;
echo '<br>'.$page_title;
echo '<br>'.$p;
echo '<br>'.$ip;
echo '<br>'.$host;
echo '<br>'.$page_from;
echo '<br>'.$page_time;
echo '<br>'.$url_complete;
echo '<br>'.$browser;
echo '<br>'.$country;
echo '<br>'.$country_abbr;
echo '<br>'.$state_abbr;
echo '<br>'.$state;
echo '<br>'.$city;
echo '<br>'.$zip;
echo '<br>'.$time_zone;
echo '<br>'.$latitude;
echo '<br>'.$longitude;
echo '<br>'.$metro_code;
echo '<br>'.$user_agent;
	/*  $h= "INSERT INTO page_views(user_id,track_id,ip,browser,host,url,page,page_from,page_time,page_title)
            VALUES('$uid','$track_id','$ip','$Browser','$host','$url','$page','$page_from','$page_time','$page_title')";
	 */


						    $r = mysqli_query($dbh, $q);
							if(mysqli_affected_rows($dbh) !=1)
								{
									$body = "Error on '.SITE_NAME.'\n";
									$body .="Page: $page_title Line 243 history query\n";
									$body .="END email";
								//mail(CONTACT_EMAIL,'Error'.SITE_NAME.'', $body, 'From:'.CONTACT_EMAIL.'');
								}


			/********************************grab page views and saved count******/
			/**I not countin my ip address nor if page accessed without a browser-I believe these may be search bots**/
	$q = "SELECT COUNT(page_id) AS page_views FROM page_history
	                    WHERE
	                    page = '$p'
	                    AND
	                    ip != '$my_ip'
	                    AND
	                    browser != '$browser_filter' ";

						$r = mysqli_query($dbh, $q);
						if(mysqli_num_rows($r) === 1)
							{
								$row = mysqli_fetch_array($r,MYSQLI_ASSOC);

								//$page_views="Page Hits Since 12-30-2015:&nbsp;".$row['page_views'];
							       $page_views= $row['page_views'];
							}else{
								//$page_views="Page views:&nbsp;&nbsp;0";
								$page_views=0;
							}
                               //echo $page_views;
	/**************************END grab page count****************************************/

		//echo "Success";
}else{
	   //echo "No database connection";
      $body = "Page: site_utilities/page_history.inc.php\rline 225-No Database Connection\rEND email";
 			 mail(CONTACT_EMAIL,'ERROR DukesNuz',$body,CONTACT_EMAIL);
	         //echo $body;
		     exit();
 }//END  if(!isset($dbc))
