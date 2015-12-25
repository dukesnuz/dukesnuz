<?php
/***************************grabbing images from mysqli database table artgallery*********************/

$title = "Pictures";

include('./views/header.inc.html');

?>
<section>
       
      <div class="content" >
      	
      	

<h4>Check out my code on github</h4>




<?php
require(MYSQL);

if(!empty($_GET['catagory']))
 {
 	echo "<h2 style='margin-bottom:5px;'>Catagory selected is $_GET[catagory]</h2>";

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
  
			$q = "SELECT picture_name, comment, img_url, record_id, gallery_select, alt 
       					from Artgallery 
       					where catagory = '$cat' ";
	

					$r = mysqli_query($dbc , $q);

					if(mysqli_num_rows($r) > 0)
                        //<img src="pic_mountain.jpg" alt="Mountain View" style="width:304px;height:228px;">
						{
		       
					//echo "<ul>";
					//echo "<tr>";
					//echo"<th>Comment</th>";
					//$display_string .="<th>Commentator</th>";
					//echo "</tr>";
					
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
	</table>
				  
	<?php			  
									}//END while loop

	      			 }else{
	  	      				echo "<p class='error'>There are no pictures in the selected catagory. Please select another catagory.";
	      			 }//END if mysqli
		
			}else{   
            echo "<p class='error'>Please Select a catagory for pictures.</p><p>I created this myself</p>";
			}

}//END GET
	
	//Grab all the catagories 
	$q = "SELECT catagory from artgallery
	        Group BY catagory
	        HAVING COUNT(*) > 0
	        ORDER BY catagory ASC";
	$r= mysqli_query($dbc, $q);
	
?>


<form method="get" action="./images.php" id="contact">
	
	<P><label class="question">Catagories</label>
		<select name="catagory">
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
	<input type="submit" value="Submit" >
	</P>
</form>

   </div>
  </section>
<?php include('./views/footer.inc.html');?>