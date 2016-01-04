
//jQuery file, which consist of ajax functionality for saving entered user's data to DB 
$(document).ready(function(){
$("#submit").click(function(){
var flag = saveValidation();
if (flag==true){
var user = $("#uname_input").val();
var fname = $("#fname_input").val();
var lname = $("#lname_input").val();
var email = $("#email_input").val();
var card_number = $("#cn_input1").val()+' '+$("#cn_input2").val()+' '+$("#cn_input3").val()+' '+$("#cn_input4").val();
var cv2 = $("#cv2_input").val();
var exp_date = $("#month").val() +' '+$("#year").val();
var card_hold = $("#ch_num_input").val();

// returns successful data submission message when the entered information is stored in database
var dataString = '&user1='+ user + '&firstname1='+ fname +'&lastname1='+ lname + '&email1='+ email + '&card_num1='+ card_number + '&cv2='+ cv2 + '&exp_date1='+ exp_date + '&card_hold_num1='+ card_hold;

//check if some field was not filled
if(fname==''||lname==''||email==''||card_number==''||cv2==''||exp_date==''||card_hold=='')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form
$.ajax({
type: "POST",
url: "savedata.php",
data: dataString,
cache: false,
success: function(result){
alert(result);
}
});
}
}
return false;
});
});

//shows transer form
function frmShow() {
	var amount = $('#card_amount_input').val();
	if (amount>0){
		$('#frm').show();
	}
	if (amount==0){
		alert('You cannot make transfers. Your amount is 0.');
	}
}

//closes transfer form 
function frmClose() {
	$('#frm').hide();
}