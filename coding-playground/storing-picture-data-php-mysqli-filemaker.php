<?php
/***************************grabbing images from mysqli database table artgallery*********************/

$title = "Pictures";

include('../views/header.inc.html');

?>
<section>
       
      <div class="content" >
      	
<h1>My Pictures</h1>
<h2>Coded using HTML, CSS, PHP, MySQL and Filemaker</h2>  	


<?php
require(MYSQL);

if(!empty($_GET['catagory']))
 {
 	echo "<p style='margin-bottom:5px;'>Catagory selected is: <strong>$_GET[catagory]</strong></p>";

}else{
	echo '';
}
 
if($_SERVER['REQUEST_METHOD'] === 'GET')
//if(4>6)
 {
      //$cat= "Water";
      if(!empty($_GET['catagory']))
	     {
            $cat = $_GET['catagory'];
  
			$q = "SELECT picture_name, comment, img_url, gallery_select, alt 
       					from Artgallery 
       					where 
       					catagory = '$cat'
       					AND 
       					Active = 'Active'";
	

					$r = mysqli_query($dbc , $q);

					if(mysqli_num_rows($r) > 0)
                        //<img src="pic_mountain.jpg" alt="Mountain View" style="width:304px;height:228px;">
						{

						while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
									{
				?>			
	 <table id="gb_retrieve">
		<tr>
			<th style='text-align: center'><?php echo $row['picture_name'];?></th>
		</tr>
	
		<tr>
			<?php
				if($row['gallery_select'] ==="GalleryTwo")
							{
				    		 echo '<td style="text-align:center"><img src="'.$row['img_url'].'" alt="'.$row['alt'].'" style="width:228px;height:300px;"></td>';
							}else{
							 echo '<td style="text-align:center"><img src="'.$row['img_url'].'" alt="'.$row['alt'].'" style="width:300px;height:228px;"></td>';
							}
			?>
		</tr>
	
		<tr>
			<td><?php echo $row['comment']; ?></td>
		</tr>
		<tr>
			<td style="text-align: center";><a href="<?php echo $row['img_url'];?>" target="blank">View larger image</a></td>
		</tr>
	</table>
				  
	<?php			  
									}//END while loop

	      			 }else{
	  	      				echo "<p class='error'>There are no pictures in the catagory: <strong>$_GET[catagory]</strong>.<br /> 
	  	      						Please select another catagory.";
	      			 }//END if mysqli
		
			}else{   
            ?>
            <aside><p>Please select a catagory to view pictures. I created this script using HTML, CSS and PHP.  The data 
            for each picture is stored in a MySQL database.  I developed a Filemaker solution to be used to input the data in the 
            MySQL database. I am using the Filemaker script Execute SQL to insert and edit each record in the MySQL database.
            The Select Catagory data ia also being retrieved from MySQL. I am using the MySQL Gorup By and Having clauses to
            retrieve only one Catagory.
            If you select the catagory &quot;Filemaker&quot;, you can see a screen shot of the Filemaker layout.
            </p><p>I hope you enjoy my pictures.</p></aside>
            <?php
			}

}//END GET
	
	//Grab all the catagories 
	$q = "SELECT catagory from Artgallery
	        Group BY catagory
	        HAVING COUNT(*) > 0
	        ORDER BY catagory ASC";
	$r= mysqli_query($dbc, $q);
	
?>

<form method="get" action="/coding/playground/storing-picture-data-php-mysqli-filemaker<?php echo MODWRITE;?>" style="margin-top:25px;">-

<!--<form method="get" action="./storing-picture-data-php-mysqli-filemaker.php"  style="margin-top:25px;">-->
	
	<P><label class="question">Catagories</label>
		<select name="catagory" class="question" style="width:100%;text-align: center;font-size: 1.15em">
			<option>Select a catagory</option>
			<?php 
			if(mysqli_num_rows($r) >0 )
	       	 	{
	     			while($row=mysqli_fetch_array($r, MYSQLI_ASSOC))
		     				{
			  					echo "<option>$row[catagory]</option>";
		     				}
	       		 }
			
			?>
		</select>
	</p>
	
	<p>
	<input type="submit" value="Submit" style="width:100%;font-size: 1.25em">
	</P>
</form>

	<aside>
			<ul>
				<li>Check out my code for this script on <a href="https://github.com/dukesnuz/Git-DukesNuz/blob/c4b3a0c62479e1c0541539869f0c593fe4a6daaf/coding-playground/storing-picture-data-php-mysqli-filemaker.php" target="blank">GitHub</a></li>
				<li>My other <a href="<?php echo URL;?>/d/artgallery/gallery_1.php">Art Gallery</a> using jQuery Anything Slider.</li>
				<li>Another <a href="<?php echo URL;?>/d/artgallery/gallery_2.php">Art Gallery</a> using jQuery Plugin Anything Slider.</li>
			</ul>

   	</aside>
   
   </div>
  </section>
<?php include('../views/footer.inc.html');?>