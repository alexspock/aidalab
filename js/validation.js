function validateForm() {
    //получаем данные из формы
	var user_x = document.forms["login_form"]["user"].value;
	var pwd_x = document.forms["login_form"]["pwd"].value;
    
	//делаем проверку на случай пустых значений пароля или логина
	if (user_x == null || user_x == "") {
        alert("Name must be filled out");
        return false;
    }
	if (pwd_x==null || pwd_x==""){
		alert("Password must be filled out");
        return false;
	}
	
	else {
		//логин должен начинатся на латинскую букву и состоять не менее чем из 6 символов(разрешает точку и нижнее подчеркивание)
		if ( /^[a-zA-Z][a-zA-Z0-9-_\.]{5,20}/.test(user_x) ) {
			//console.log("Login ok");
			//пароль должен содержать верхний, нижний регистры и цифру(спецсимволы допускаются)
			if (/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*/.test(pwd_x)) {
				//console.log(pwd_x+" pwd is ok too!")
				return true;
			}
			else {
				alert("Password consists of invalid symbols.");
				return false;
			}
		}
		else {
			alert("Login consists of invalid symbols.");
			return false;
		}
	}
}

//function for adding hints during focusing the info fields
function addHint(div_id, hint_text,hint) {
	var para = document.getElementById(hint);
	var node = document.createTextNode(hint_text);
	para.appendChild(node);
	var element = document.getElementById(div_id);
	element.appendChild(para);
}

//function for removing hints during bluring the info fields
function removeHint(hint){
	document.getElementById(hint).innerHTML ="";
}


function compare_passwords(){
	var node_fail = "The passwords do not match. Please try again.";
	var node_succ = "The passwords match.";
	var e_pwd = document.getElementById("e_pwd").value;
	var c_pwd = document.getElementById("c_pwd").value;
	//console.log(e_pwd+" "+c_pwd);
	
	if (e_pwd!==c_pwd){
		document.getElementById("hint9").innerHTML = node_fail;
		return false;
	}
	else{
		document.getElementById("hint9").innerHTML = node_succ;
		return true;
	}
	
}

function validateValue(div_id, hint_text,id,hint_id,img_id) {
	var param = document.getElementById(id).value;
	//console.log("_"+param+"_");
	if (param==""){
		document.getElementById(img_id).style.display = "inline-block";
		document.getElementById(hint_id).innerHTML = hint_text;
		return false
	}
	else {
		return true;		
	}
}

function validateLength(a,b,hint_id,hint_text){
	var mobileNum= document.getElementById('mobile_phone').value;
	console.log(mobileNum.length);
	if (mobileNum.length>a && mobileNum.length<b){
		//console.log("Norm");
		return true;
	}
	else {
		document.getElementById(hint_id).innerHTML = hint_text;
	}
}

//function for Card Number client validation
function card_regExp(id1,id2,id3,id4,message_id,message_text){
	var field1 = document.getElementById(id1).value;
	var field2 = document.getElementById(id2).value;
	var field3 = document.getElementById(id3).value;
	var field4 = document.getElementById(id4).value;
	//console.log(field1+field2+field3+field4);
	
	//regular expresion for each card number octet(4 digit symbols)
	if ( /^[0-9]{4,4}$/.test(field1) &&	/^[0-9]{4,4}$/.test(field2) && /^[0-9]{4,4}$/.test(field3) && /^[0-9]{4,4}$/.test(field4)) {
		//console.log(field1+field2+field3+field4);
		document.getElementById('warn_img5').style.display = "none";
		document.getElementById(message_id).style.color = "green";
		document.getElementById(message_id).innerHTML = "Correct!";
		}
	else{
		document.getElementById(message_id).style.color = "red";
		document.getElementById(message_id).innerHTML = message_text;
		document.getElementById('warn_img5').style.display = "inline-block";
		}
}

//validation function
function regExp(input_id,message_id,message_text) {
	var field = document.getElementById(input_id).value;
	switch (input_id) {
		
		//regular expresion for first_name
		case 'fname_input':
			if ( (/^[a-zA-Z'-/ /]{2,50}$/.test(field)) )
			 {
				//console.log(field);
				document.getElementById('warn_img1').style.display = "none";
				document.getElementById(message_id).style.color = "green";
				document.getElementById(message_id).innerHTML = "Correct!";
				
				break;
			}
			else{
				document.getElementById(message_id).style.color = "red";
				document.getElementById(message_id).innerHTML = message_text;
				document.getElementById('warn_img1').style.display = "inline-block";
				break;
			}
		case 'lname_input':
		
		//regular expresion for last_name
			if ( /^[a-zA-Z'-/ /]{2,50}$/.test(field)  ) {
				//console.log(field);
				document.getElementById('warn_img1').style.display = "none";
				document.getElementById(message_id).style.color = "green";
				document.getElementById(message_id).innerHTML = "Correct!";
				break;
			}
			else{
				document.getElementById(message_id).style.color = "red";
				document.getElementById(message_id).innerHTML = message_text;
				document.getElementById('warn_img1').style.display = "inline-block";
				break;
			}
		case 'user_name':
		
		//regular expresion for user_name
			if ( /^[a-zA-Z][a-zA-Z0-9-_\.]{5,20}/.test(field) ) {
				//console.log(field);
				document.getElementById('warn_img2').style.display = "none";
				document.getElementById(message_id).style.color = "green";
				document.getElementById(message_id).innerHTML = "Correct!";
				break;
			}
			else{
				document.getElementById(message_id).style.color = "red";
				document.getElementById(message_id).innerHTML = message_text;
				document.getElementById('warn_img2').style.display = "inline-block";
				break;
			}
		case 'e_pwd':
			if ( /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/.test(field) ) {
				//console.log(field);
				document.getElementById('warn_img3').style.display = "none";
				document.getElementById(message_id).style.color = "green";
				document.getElementById(message_id).innerHTML = "Correct!";
				break;
			}
			else{
				document.getElementById(message_id).style.color = "red";
				document.getElementById(message_id).innerHTML = message_text;
				document.getElementById('warn_img3').style.display = "inline-block";
				break;
			}
		case 'c_pwd':
			if ( /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/.test(field) ) {
				document.getElementById('warn_img4').style.display = "none";
				document.getElementById(message_id).style.color = "green";
				document.getElementById(message_id).innerHTML = "Correct!";
				break;
			}
			else{
				document.getElementById(message_id).style.color = "red";
				document.getElementById(message_id).innerHTML = message_text;
				document.getElementById('warn_img4').style.display = "inline-block";
				break;
			}
		case 'b_day':
			if ( /(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d /.test(field) ) {
				//console.log(field);
				break;
			}
			else{
				document.getElementById(message_id).innerHTML = message_text;
				break;
			}
		case 'gender':
			if ( gender!=="" ) {
				//console.log("_"+field+"_");
				//document.getElementById('warn_img7').style.display = "none";
				//document.getElementById(message_id).style.color = "green";
				//document.getElementById(message_id).innerHTML = "Correct!";
				break;
			}
			else{
				//document.getElementById(message_id).style.color = "red";
				//document.getElementById(message_id).innerHTML = message_text;
				//document.getElementById('warn_img7').style.display = "inline-block";
				break;
			}
		case 'mobile_phone':
			if ( /^[0-9]{9,13}$/.test(field) ) {
				//console.log(field);
				document.getElementById('warn_img5').style.display = "none";
				document.getElementById(message_id).style.color = "green";
				document.getElementById(message_id).innerHTML = "Correct!";
				break;
			}
			else{
				document.getElementById(message_id).style.color = "red";
				document.getElementById(message_id).innerHTML = message_text;
				document.getElementById('warn_img5').style.display = "inline-block";
				break;
			}
			
		case 'cv2_input':
		
			//regular expresion for cv2 number
			if ( /^[0-9]{3,3}$/.test(field) ) {
				//console.log(field);
				document.getElementById('warn_img8').style.display = "none";
				document.getElementById(message_id).style.color = "green";
				document.getElementById(message_id).innerHTML = "Correct!";
				break;
			}
			else{
				document.getElementById(message_id).style.color = "red";
				document.getElementById(message_id).innerHTML = message_text;
				document.getElementById('warn_img8').style.display = "inline-block";
				break;
			}
		
		case 'year':
			
			//regular expresion for expiration date(year no more than 10 years from now)
			var today = new Date();
			var year = today.getFullYear();
			if (field>=year && field<=2026)  {
				console.log(year);
				document.getElementById('warn_img9').style.display = "none";
				document.getElementById(message_id).style.color = "green";
				document.getElementById(message_id).innerHTML = "Correct!";
				break;
			}
			else{
				document.getElementById(message_id).style.color = "red";
				document.getElementById(message_id).innerHTML = message_text;
				document.getElementById('warn_img9').style.display = "inline-block";
				break;
			}
			
		case 'email_input':
		
			//regular expresion for email
			if ( /^[-\w]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/.test(field) ) {
				//console.log(field);
				document.getElementById('warn_img6').style.display = "none";
				document.getElementById(message_id).style.color = "green";
				document.getElementById(message_id).innerHTML = "Correct!";
				break;
			}
			else{
				document.getElementById(message_id).style.color = "red";
				document.getElementById(message_id).innerHTML = message_text;
				document.getElementById('warn_img6').style.display = "inline-block";
				break;
			}
		default:
			alert( 'Я таких значений не знаю' );
	}
	
}

function finalValidation() {
	var firstN = document.forms["register_form"]["first_name"].value;
	var lastN = document.forms["register_form"]["last_name"].value;
	var userN = document.forms["register_form"]["user_name"].value;
	var pwd1 = document.forms["register_form"]["e_pwd"].value;
	var pwd2 = document.forms["register_form"]["c_pwd"].value;
	var birth = document.forms["register_form"]["b_day"].value;
	var gender = document.forms["register_form"]["gender"].value;
	var mob = document.forms["register_form"]["mobile_phone"].value;
	var email = document.forms["register_form"]["email_input"].value;
	var photo = document.forms["register_form"]["uploadFile"].value;
	var img_valid = ValidateFileUpload();
		if (
		(/^[a-zA-Z'-/ /]{2,20}$/.test(firstN)) &&
		(/^[a-zA-Z'-/ /]{2,20}$/.test(lastN)) &&
		(/^[a-zA-Z][a-zA-Z0-9-_\.]{5,20}/.test(userN)) &&
		(/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/.test(pwd1)) &&
		(/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/.test(pwd2)) &&
		(pwd1==pwd2) &&
		(birth!=="") && 
		(gender!=="") &&
		(/^[0-9]{9,13}$/.test(mob)) &&
		(/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/.test(email)) &&
		(img_valid)
		) 
			{
			console.log("Vse ok!");
			return true;
			}
	else {
			console.log("Not ok!");
			return false;
	}
	
}

//regular expresion for all parameters validation when user saves data (onsubmit)
function saveValidation() {
	var firstname = document.forms["main_form"]["fname_input"].value;
	var lastname = document.forms["main_form"]["lname_input"].value;
	var email = document.forms["main_form"]["email_input"].value;
	var cn1 = document.forms["main_form"]["cn_input1"].value;
	var cn2 = document.forms["main_form"]["cn_input2"].value;
	var cn3 = document.forms["main_form"]["cn_input3"].value;
	var cn4 = document.forms["main_form"]["cn_input4"].value;
	var cv2 = document.forms["main_form"]["cv2_input"].value;
	var year = document.forms["main_form"]["year"].value;
		if ( 
		(/^[a-zA-Z'-/ /]{2,50}$/.test(firstname)) &&
		(/^[a-zA-Z'-/ /]{2,50}$/.test(lastname)) &&
		( /^[-\w]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/.test(email) ) &&
		( /^[0-9]{4,4}$/.test(cn1) && /^[0-9]{4,4}$/.test(cn2) && /^[0-9]{4,4}$/.test(cn3) && /^[0-9]{4,4}$/.test(cn4)) &&
		( /^[0-9]{3,3}$/.test(cv2) ) &&
		(year>=2016 && year<=2026) &&
		(firstname !='' && lastname!='')
		) 
			{
			return true;
			}
		else {
			return false;
		}
	
}

function ValidateFileUpload() {
	
	var fuData = document.getElementById('uploadFile');
    var FileUploadPath = fuData.value;
	
	if (FileUploadPath == '') {
        alert("Please upload an image");
		return false;
    } 
	else {
        var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
		
			if (Extension == "gif" || Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
				return true;
			}
			else {
				alert("Photo only allows file types of GIF, PNG, JPG and JPEG.");
				return false;
			}
	}
}