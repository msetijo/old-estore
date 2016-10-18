function makeDate(){

	var newDate=new Date();
	var date = newDate.getDate();
	var month = newDate.getMonth()+1;
	var year = newDate.getFullYear();
	var hours = newDate.getHours();
	var minutes = newDate.getMinutes();
	var seconds = newDate.getSeconds();
	
	var string = date + "/" + month + "/" + year + " " + hours + ":" + minutes + ":" + seconds;
	
	var a = document.getElementById("date");
	a.innerHTML = string;
	setTimeout("makeDate()", 1000);

}

function validateForm(){
	
	var firstName = document.getElementById("firstname");
	var lastName = document.getElementById("lastname");
	var pass     = document.getElementById("password");
	var pass2    = document.getElementById("password2");
	var errorStr = "";
	var phonenumber   = document.getElementById("phonenumber").value;
	var emailadd    = document.getElementById("emailaddress").value;
	
	if(firstName.value == "") errorStr += "Enter a first name<br />";
	else if(firstName.value.match(fname) == null)
	{
		errorStr += "Incorrect First Name<br />";
	}
	
	if(lastName.value=="") errorStr += "Enter a last name<br />";
	else if(lastName.value.match(lname) == null)
	{
		errorStr += "Incorrect Last Name<br />";
	}
	
	if(pass.value == "" || pass2.value == "") errorStr += "Enter a password<br />";
	else if(pass.value != pass2.value) errorStr += "Passwords must match<br />";
	
	
	var reg_phonenumber = /^\d{3}\-?\d{3}\-?\d{4}$/;
	var email = /^\w+@[A -z0-9]+\.com$/i;
	var fname = /[A-Za-z][A-Za-z]+/;
	var lname = /[A-Za-z][A-Za-z]+/
	
	if(emailadd.value == "")
		errorStr += "Enter email address <br/>";
		
	if(phonenumber.match(reg_phonenumber) == null)
	{
		errorStr += "Incorrect Phone Number format<br />";
	}

	if(emailadd.match(email) == null)
	{
		errorStr += "Incorrect email format<br />";
	}
	
	
	if(errorStr == ""){
		// ALL IS GOOD
		return true;
	}else{
		// VALIDATION ISSUE
		var errorDiv = document.getElementById("error");
		errorDiv.innerHTML = errorStr;
		return false;
	}	
	
		
}

function validate(){
	
	var pass     = document.getElementById("password");
	var errorStr = "";
	var emailadd    = document.getElementById("emailaddress").value;
	
	
	
	if(pass.value == "" ) errorStr += "Enter a password<br />";
		
	if(emailadd == "") errorStr += "Enter email address <br/>";
		
	if(errorStr == ""){
		// ALL IS GOOD
		return true;
	}else{
		// VALIDATION ISSUE
		var errorDiv = document.getElementById("error");
		errorDiv.innerHTML = errorStr;
		return false;
	}	
	
}

function validateBook1(keyword)
{
	var xhr = new XMLHttpRequest();
	
	xhr.onreadystatechange = function () {	
	if(xhr.status == 200 && xhr.readyState == 4)
	{
		var res = xhr.responseText;
		
		if(res.match(/\d+/)== null){
			document.getElementById("err1").innerHTML = res;
			document.getElementById("book1").innerHTML = "";
			total(0,1);			
		}
		else{
			document.getElementById("book1").innerHTML = res;
			document.getElementById("err1").innerHTML = "";
			total(res,1);
		}
				
	}
	}
				
	xhr.open("get","test1.php?amount1=" + keyword,true);
	xhr.send();
}
			
			
function validateBook2(keyword)
{
	var xhr = new XMLHttpRequest();
			
	xhr.onreadystatechange = function () {			
	if(xhr.status == 200 && xhr.readyState == 4)
	{
		var res = xhr.responseText;
		
		if(res.match(/\d+/)== null){
			document.getElementById("err2").innerHTML = res;
			document.getElementById("book2").innerHTML = "";
			total(0,2);
		}
		else{
			document.getElementById("book2").innerHTML =  res;
			document.getElementById("err2").innerHTML = "";
			total(res,2);
		}
	}
	}	
	
	xhr.open("get","test1.php?amount2=" + keyword,true);
	xhr.send();
}

			
function validateBook3(keyword)
{
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function () {
					
		if(xhr.status == 200 && xhr.readyState == 4)
		{
			var res = xhr.responseText;
						
			if(res.match(/\d+/)== null){
				document.getElementById("err3").innerHTML = res;
				document.getElementById("book3").innerHTML = "";
				total(0,3);
			}
				
			else{
				document.getElementById("book3").innerHTML = res;
				document.getElementById("err3").innerHTML = "";
				total(res,3);
			}
		}
	}
	
	xhr.open("get","test1.php?amount3=" + keyword,true);
	xhr.send();
}

function remove(keyword)
{
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function () {
					
		if(xhr.status == 200 && xhr.readyState == 4)
		{
			var res = xhr.responseText;
			if(keyword == 1){
				document.getElementById("b1").innerHTML = res;
				document.getElementById("book1").innerHTML = 0;
				total(0,1);
			}
			if(keyword == 2){
				document.getElementById("b2").innerHTML = res;
				document.getElementById("book2").innerHTML = 0;
				total(0,2);
			}
			if(keyword == 3){
				document.getElementById("b3").innerHTML = res;
				document.getElementById("book3").innerHTML = 0;
				total(0,3);
			}
		}
	}
	
	xhr.open("get","test1.php?amount=" + keyword,true);
	xhr.send();
}

	var book1 = 0;
	var book2 = 0;
	var book3 = 0;
	
function total(amount, book)
{	
	amount = Math.round(amount*100)/100;
	if( book == 1)
		book1 = amount;
		
	if( book == 2)
		book2 = amount;
		
	if( book == 3)
		book3 = amount;
		
	var total = book1 + book2 + book3;
	
	document.getElementById("total").innerHTML = Math.round(total*100)/100;
	
}
