<?php
//product_functions.inc.php

//define function
function get_stock_status($stock)
	{
		//retuen diff messages based on stock number
		if($stock>5)
		{
			return 'In stock';
		}elseif ($stock>0)
		{
			return 'Low stock';
		}else{
		    return 'Currently out of stock';
		}
	
	//complete function
	}

//added end of cp 8 page 249
  function get_price($type,$regular, $sales)
  	{
  		//check if prod = coffee
  		if($type === 'coffee')
			{
				//return sale price if applicable
				if((0 < $sales) && ($sales < $regular) )
					{
						return ' Sale: $'. number_format($sales/100,2). '!';
					}
			}elseif($type === 'goodies')
				{
					//return appropriate price
					if((0 < $sales) && ($sales < $regular))
							{
								return '<strong>Sale Price:</strong>$'. 
								number_format($sales/100, 2) . '! (normally $' . 
								number_format($regular/100,2).')<br />';
							}else{
								return '<strong>Price:</strong> $' . 
								number_format($regular/100, 2). '<br />';
							}//complete else if
				}//end of get price()
  	}
