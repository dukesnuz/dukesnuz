<?php //script 13.10 - rss.php

echo '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0">
<channel>
<title>Larry Ullman&apos;s Important Things</title>

<description>The most recent things Larry has been writing about.</description>

<link>http://LarryUllman.com/</link>
';

$data = array(
             0=>array('title'=> 'SSH Key Authentication',
			  'description'=>'Load 1',
			  'link=>http://www.ajaxtransport.com',
			  'pubDate'=> '1337930580'),
			  
			  1=>array('title'=> 'SSH Key Authentication',
			  'description'=>'Load 1',
			  'link=>http://www.ajaxtransport.com',
			  'pubDate'=> '1337930580'),
			  
			  2=>array('title'=> 'SSH Key Authentication',
			  'description'=>'Load 1',
			  'link=>http://www.ajaxtransport.com',
			  'pubDate'=> '1337930580'),
			  
			  );
			  
	
	  //print record as an item
	  foreach ($data as $item)
	 {
		 
		 
	   echo '<item>
				<title>'.htmlentities($item['title']).'</title>
				<description>'.htmlentities($item['description']).'</description>
				<link>'.$item['link'].'</link>
				<guid>'.$item	['link'].'</guid>
				<pubDate>'.date('r',$item['pubDate']).'</pubDate>
				</item>';	
				
	 	}
	 
	 echo '</channel>
	 </rss>';
	
	
	
	
