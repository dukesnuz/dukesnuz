<?php

//email_receipt.php
//plain text version
$body_plain = "Thank you for your order.  Your order number is {$_SESSION['order_id']}.
All orders are processed on the next business day.  You will be contacted in case of any delays.\n\n";

//begin HTML version of the body
$body_html = file_get_contents('includes/plain_header.html');
$body_html .= '<p>Thank you for your order. Your order number is '.$_SESSION['order_id'].'. All orders 
are processed on the next business day.  You will be contacted in case of any delays.</p>

<table border="0" cellspacing="3" cellpadding="3">
	<tr>
		<th align="center">Item</th>
		<th align="center">Quantity</th>
		<th align="right">Price</th>
		<th align="right">Subtotal</th>
	</tr>';

//grab order contents
$r =mysqli_query($dbc, "CALL get_order_contents({$_SESSION['order_id']})");
 
  
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			   {
				//add item to each version of the body
				$body_plain.="{$row['category']}::{$row['name']}({$row['quantity']}) @ \$" .number_format($row['price_per']/100,2)."each: $" .number_format($row['subtotal']/100,2). "\n";
				
				$body_html .='<tr><td>' .$row['category']. '::' .$row['name']. '</td>
				<td align="center">' .$row['quantity']. '</td>
				<td align="right">$' .number_format($row['price_per']/100, 2). '</td>
				<td align="right">$' .number_format($row['subtotal']/100, 2). '</td>
				</tr>';
				
	 
	
				//store shipping and order total for later use
				$shipping = number_format($row['shipping']/100,2);
				$total = number_format($row['total']/100,2);
			}//END while Loop clear next results
  
  
				mysqli_next_result($dbc);
			 
				
				//above mitigates problems with the stored procedure retrieveing extra set of results
				
				//add shipping
				$body_plain .= "Shipping: \$$shipping\n";
				$body_html .='<tr>
					<td colspan="2"></td><th align="right">Shipping</th>
					<td align="right">$' .$shipping. '</td>
					</tr>';
 


					//add the total
					$body_plain .="Total: \$$total\n";
					$body_html .= '<tr>
						<td colspan="2"></td><th align="right">Total</th>
						<td align="right">$' .$total. '</td>
						</tr>';
					


						//complete the HTML body
						
						$body_html .='</table>
										 </body>
											</html>';
						
		//the plain_footer.html can be sued here ...the plain header was used in this script
	
	
	//echo 44;
		//include autoload
		require('includes/vendor/autoload.php');
		
		//include Zend Framework namespaces
		use Zend\Mail;
		use Zend\Mime\Message as MimeMessage;
		use Zend\Mime\Part as MimePart;		
	

//check if below 2 lines are in book
        use Zend\Mail\Transport\Smtp as SmtpTransport;
        use Zend\Mail\Transport\SmtpOptions;

	// echo 55;
	 
         //$body_plain= '';
		 //$body_html = '';
		//create the 2 parts of th email
	    $html = new MimePart($body_html);
		$html->type = "text/html";
		$plain = new MimePart($body_plain);
		$plain->type = "text/plain";
		//create message 
		$body = new MimeMessage();
		$body->setParts(array($plain, $html));

		//echo 66;
		
		//establish email parameters
		/*
		$mail = new Mail\Message();
		$mail->setForm('admin@example.com');
		$mail->addTo($_SESSION['email']);
		$mail->setSubject("Order #{$_SESSION['order_id']} at the Coffee Site");
		$mail->setEncoding("UTF-8");
		$mail->setBody($body);
		$mail->getHeaders()->get('content-type')->setType('multipart/alternative');
	*/
	//my code above has error not sure where so I copy and pasted below
		$mail = new Mail\Message();
		$mail->setFrom('admin@example.com');
		$mail->addTo($_SESSION['email']);
		$mail->setSubject("Order #{$_SESSION['order_id']} at the Coffee Site");
		$mail->setEncoding("UTF-8");
		$mail->setBody($body);
		$mail->getHeaders()->get('content-type')->setType('multipart/alternative');

      // echo 77;

		//check if below 2 lines in book
		//using below 2 lines will only display email receipt on final.php
		//echo $body_html;
		//echo $body_plain; 
		//die();
		
		
		//send the email
		$transport = new Mail\Transport\Sendmail();
		$transport->send($mail);
		
		
 
