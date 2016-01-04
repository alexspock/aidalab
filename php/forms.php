<?php
// this function creates page with User's info
function draw_form($data){

// processing user's data from db: cut year, month and octets of card number 
$year = trim(preg_replace('/\D/', '', $data[8]));
$month = trim(preg_replace('/[^a-zA-Z]+/', '', $data[8]));
$cn = array(
    0 => trim(substr($data[6], 0, 4)),
    1 => trim(substr($data[6], 5, 4)),
	2 => trim(substr($data[6], 10, 4)),
	3 => trim(substr($data[6], 15, 4))
);

// drawing page with user's info 
echo"
	<div class=\"main_block\">
		<h1>User Info</h1><br>
			<form name=\"main_form\"  method=\"post\">
				<div class=\"simple_label\">
					<label class=\"label_name\">Username</label>
				</div>
				<div id=\"username\">
					<input readonly disabled id=\"uname_input\" type=\"text\" name=\"uname\" value=\"" .$data[1]."\">
				</div>
				
				<div class=\"simple_label\">
					<label class=\"label_name\">Password</label>
				</div>
				<div id=\"pwd\">
					<input readonly  disabled id=\"passwd_input\" type=\"password\" name=\"passwd\" value=\"" .$data[2]."\">
				</div>
				
				<div class=\"simple_label\">
					<label class=\"label_name\">First Name</label>
				</div>
				<div id=\"firstname\">
					<input id=\"fname_input\" type=\"text\" maxlength=\"50\" name=\"fname\" value=\"" .$data[3]."\" onfocus=\"removeHint('hint1');\" onblur=\"removeHint('hint1');regExp('fname_input','warn1','Incorrect firstname format.');\">
					<img id=\"warn_img1\" src=\"../img/warning.png\" style=\"width:2%;display:none;\" />
					<span id=\"warn1\" class=\"warning\"></span>
					<p id=\"hint1\" class=\"hint\"></p>
				</div>
				
				<div class=\"simple_label\">
					<label class=\"label_name\">Last Name</label>
				</div>
				<div id=\"lastname\">
					<input id=\"lname_input\" type=\"text\" maxlength=\"50\" name=\"lname\" value=\"" .$data[4]."\" onfocus=\"removeHint('hint8');\" onblur=\"removeHint('hint2');regExp('lname_input','warn2','Incorrect lastname format.');\">
					<img id=\"warn_img2\" src=\"../img/warning.png\" style=\"width:2%;display:none;\" />
					<span id=\"warn2\" class=\"warning\"></span>
					<p id=\"hint2\" class=\"hint\"></p>
				</div>
				
				<div class=\"simple_label\">
					<label class=\"label_name\">E-mail</label>
				</div>
				<div id=\"email\">
					<input id=\"email_input\" type=\"text\" name=\"email\" onfocus=\"removeHint('hint6');\" onblur=\"removeHint('hint6');regExp('email_input','warn6','Entered e-mail is not correct.');\" value=\"" .$data[5]."\">
					<img id=\"warn_img6\" src=\"../img/warning.png\" style=\"width:2%;display:none;\" />
					<span id=\"warn6\" class=\"warning\"></span>
					<p id=\"hint6\" class=\"hint\"></p>
				</div>
				
				<div class=\"simple_label\">
					<label class=\"label_name\">Card Number</label>
				</div>
				<div id=\"number\">
					<input id=\"cn_input1\" maxlength=\"4\" style=\"width:25%;text-align: center;\" type=\"text\" name=\"cnumber\" value=\"" .$cn[0]."\" onblur=\"removeHint('hint7');card_regExp('cn_input1','cn_input2','cn_input3','cn_input4','warn5','Incorrect Card Number.');\" onfocus=\"addHint('number','Each octet should have 4 numbers.','hint7');\" style=\"width:28%;\">
					<input id=\"cn_input2\" maxlength=\"4\" style=\"width:24%;text-align: center;\" type=\"text\" name=\"cnumber\" value=\"" .$cn[1]."\" onblur=\"removeHint('hint7');card_regExp('cn_input1','cn_input2','cn_input3','cn_input4','warn5','Incorrect Card Number.');\" onfocus=\"addHint('number','Each octet should have 4 numbers.','hint7');\" style=\"width:28%;\">
					<input id=\"cn_input3\" maxlength=\"4\" style=\"width:25%;text-align: center;\" type=\"text\" name=\"cnumber\" value=\"" .$cn[2]."\" onblur=\"removeHint('hint7');card_regExp('cn_input1','cn_input2','cn_input3','cn_input4','warn5','Incorrect Card Number.');\" onfocus=\"addHint('number','Each octet should have 4 numbers.','hint7');\" style=\"width:28%;\">
					<input id=\"cn_input4\" maxlength=\"4\" style=\"width:24%;text-align: center;\" type=\"text\" name=\"cnumber\" value=\"" .$cn[3]."\" onblur=\"removeHint('hint7');card_regExp('cn_input1','cn_input2','cn_input3','cn_input4','warn5','Incorrect Card Number.');\" onfocus=\"addHint('number','Each octet should have 4 numbers.','hint7');\" style=\"width:28%;\">
					<img id=\"warn_img5\" src=\"../img/warning.png\" style=\"width:2%;display:none;\"/>
					<span id=\"warn5\" class=\"warning\"></span>
					<p id=\"hint7\" class=\"hint\"></p>
				</div>
				
				<div class=\"simple_label\">
					<label class=\"label_name\">CV2</label>
				</div>
				<div id=\"cv\">
					<input id=\"cv2_input\" type=\"text\" name=\"cv2\" maxlength=\"3\" onfocus=\"removeHint('hint8');\" onblur=\"removeHint('hint8');regExp('cv2_input','warn8','Incorrect CV2 number.');\"  value=\"" .$data[7]."\">
					<img id=\"warn_img8\" src=\"../img/warning.png\" style=\"width:2%;display:none;\" />
					<span id=\"warn8\" class=\"warning\"></span>
					<p id=\"hint8\" class=\"hint\"></p>
				</div>
				
				<div class=\"simple_label\">
					<label class=\"label_name\">Expiration Date</label>
				</div>
				<div id=\"expdate\">
					<select id=\"month\" style=\"width:84%;\" selected=\"" . $month."\">
						<option value=\"January\" >January</option>
						<option value=\"February\">February</option>
						<option value=\"March\">March</option>
						<option value=\"April\">April</option>
						<option value=\"May\">May</option>
						<option value=\"June\">June</option>
						<option value=\"July\">July</option>
						<option value=\"August\">August</option>
						<option value=\"September\">September</option>
						<option value=\"October\">October</option>
						<option value=\"November\">November</option>
						<option value=\"December\">December</option>
					</select>
					<input id=\"year\" type=\"text\" name=\"year\" style=\"width:15%;\" placeholder=\"year\" maxlength=\"4\" value=\"" . $year."\"  onfocus=\"removeHint('hint9');\" onblur=\"removeHint('hint9');regExp('year','warn9','Incorrect year value.');\">
					<img id=\"warn_img9\" src=\"../img/warning.png\" style=\"width:2%;display:none;\" />
					<span id=\"warn9\" class=\"warning\"></span>
					<p id=\"hint9\" class=\"hint\"></p>
				</div>
							
				<div class=\"simple_label\">
					<label class=\"label_name\">Card Holder Number</label>
				</div>
				<div id=\"cardholdnum\">
					<input id=\"ch_num_input\" type=\"text\" name=\"chnumber\" maxlength=\"30\" value=\"" .$data[9]."\">
				</div>
				
				<div class=\"simple_label\">
					<label class=\"label_name\">Card Amount</label>
				</div>
				<div id=\"amount\">
					<input readonly disabled id=\"card_amount_input\" type=\"text\" name=\"camount\"  value=\"" .$data[10]."\">
				</div>
				
				<input id=\"submit\" type=\"submit\"  class=\"reg save-submit\" value=\"Save\">
				<input id=\"transfer\" type=\"button\" class=\"reg tr-submit\" value=\"Make a Transfer\" onclick=\"frmShow();\">
			</form>
	";
	
//drawing form for transfering money between accounts	
echo 
			"<form action=\"transfer.php\" method=\"get\" ><div class=\"frmFrame\" id=\"frm\" style=\"display:none;top: 40%;\">
				<div class=\"ttl\"><input id=\"closebutton\" type=\"button\" onclick=\"frmClose();\"><span id=\"frmtitle\"></span>Transfer money</div>
				<table class=\"info\" id=\"frmInfo\">
					<input type=\"hidden\" id=\"info\" name=\"info\" value=\"\" />
					<tr><th><label style=\"float: left;\" for=\"sender\">Sender</label></th><td>
					<input readonly type=\"text\" id=\"sender\" value=\"" .$data[1]."\" name=\"sender\"/>
					</td></tr>
					<tr><th><label style=\"float: left;\" for=\recipient\">Recipient</label></th><td>";
					
$usr = htmlspecialchars($_POST[user]);

//getting all users from DB (except current one) in order to create the list of recipients in select tag
$res = mysql_query("select user from users where user!='$usr'");
echo "<select id=\"recipients\" name=\"recipients\">";
while ($row1 = mysql_fetch_assoc($res)) {
	echo 
						"<option value=\"". $row1['user'] ."\" >" . $row1['user'] . "</option>"
	;
}
echo "</select>";

//drawing the bottom of the form with inputs for transfer amount and submit button
echo"		
					</td></tr>
					<tr><th><label style=\"float: left;\" for=\"transfer_amount\">Transfer Amount</label></th><td>
					<input type=\"number\" id=\"transfer_amount\" value=\"" .$data[10]."\" step=\"0.01\" min=\"0\" max= \"" .$data[10]."\" name=\"transfer_amount\"/>
					
					</td></tr>
				</table>
				<div style=\"padding:20px 0 0 0;text-align:right;\">
				<input type=\"submit\" class=\"reg reg-submit\" value=\"Confirm\"></div>
			</div></form>"
			;

// script for setting user's expiration month "selected" in select tag
echo "<script>
	$(function() {
	$(\"#month\").val('";
echo $month;
echo "');
	});
	</script>";
}
?>