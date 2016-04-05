<?php
	
  if($_SESSION['id'] == $myrow['supplier_ID']){
	echo "Edit Property";
    /*echo "
		<tr>
			<td style=\"padding-top: 2px;\">
				<button 
				   onMouseOver=\"this.style.color='#ec7568'\"
				   onMouseOut=\"this.style.color='black'\"
				   style=\"color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px; width: 9em;  height: 2em; \"
				   id='editPropBtn' name='editPropBtn'
				   onclick=\"window.location.href='EditProperty.php?property_ID=" . $_GET['property_ID'] .  "'\"/> Edit Property </button>
			</td>
		</tr>";*/
  } else {
	echo "Request Booking";
    /*echo "	
		<tr>
			<td></td>
			<td>
				<input 
				   onMouseOver=\"this.style.color='#ec7568'\"
				   onMouseOut=\"this.style.color='black'\"
				   style=\"color:black; background-color: #FFF; padding: 5px 5px; border-radius: 5px\"
				   type='submit' id='request_btn' name='request_btn' value='Request Property' /> 
			</td>
		</tr>";*/
  }

?>