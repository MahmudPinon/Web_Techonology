<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>  
			window.onload = function() {
        document.body.style.backgroundImage = "url('data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDQ0HBw0HBwcNBw0HBwcHBw8IDQcNFREWFhURExMYHSggGBolGxMVITEhJSkrLi4uFx8zODMsNygtLisBCgoKDQ0NDw8PDysZFRkrKzctLSsrLS0rNzcrKy03LTc3KzctNzc3LTc3LTctLS03LSsrLTctLS03LS0tLTctLf/AABEIALYBFQMBIgACEQEDEQH/xAAWAAEBAQAAAAAAAAAAAAAAAAAAAQb/xAAVEAEBAAAAAAAAAAAAAAAAAAAAAf/EABcBAQEBAQAAAAAAAAAAAAAAAAABBQT/xAAVEQEBAAAAAAAAAAAAAAAAAAAAAf/aAAwDAQACEQMRAD8A2ADuYwAAAAAAAAAgAKAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACAAoAAAAAAAAAAAAAIACgAAAAAAAAAAAAAAAgAKAAAAAAAAAAAAAAAAAAAAAAAAKICgAgAAAACggAAAAAAAAAgAKAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACoAAAAgAAAKAAAAAAAAAAAAAAAAAAAAAAAACoIKgKAKCAAAAAACoAAAAgAKAAAAAAAAgAKAAAAAAAIACgqAAACoAAAACAAoCoIAoAAAAAAAAAAAAAAAIAAAqKCoAAAAAACAAoAAqAAAAAAAAAAAAAAAACAAoAAACAqCgAgAKACAAAAAAAAAAoAAAAAAAAAAAAAAAIAAAAABAAAAQLQUoAgAAACgAoAAAAAgAKAAgAIAAAKj/9k=')";
    }
		function validateform(){  
           
                  var corpname=document.getElementById("crpname").value;
                  
                  if (corpname.trim() == "") {
                  alert("Please Enter Your Corporation Name");
                  return false;
                  }
                 
    if (corpname != "") {
        var res=helpvalidateform(corpname);

        if(res==true)
        {
            //alert("true");
            return true;
        }
        else if(res==false)
        {
            //alert("false");
            return false;
        } 
    }
 

}
function helpvalidateform(corpname) {
  var xhttp = new XMLHttpRequest();
  var result = false;
               
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "corp exists") {
        alert("Corporation Name already exists. Please choose another one."); 
        result = false;
      } else if (this.responseText == "corp set already") {
        alert("Your Corporation Name Already Set. If you want to change Your Corporation Name than you need to Contact to the Head Office"); 
        result = false;
      } else {
        result = true;
      }
    }
  };
  xhttp.open("POST", "../Controller/CheckDuplicationCorporationName.php", false);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("corpname=" + corpname);
  return result;
}

function checkName() {
			if (document.getElementById("crpname").value == "") {
			  	document.getElementById("nameErr").innerHTML = "Corporation Name can't be blank";
			  	document.getElementById("crpname").style.borderColor = "red";
			}else{
			  	document.getElementById("nameErr").innerHTML = "";
			  	document.getElementById("crpname").style.borderColor = "black";

			}
			
        }

</script>  
</head>
<title>Registration form</title> 
<link rel="stylesheet" href="../../Transport Owner/Style/TrnasportOwnerReg.css">
</head>
<body>
<br />
<div>  
	<fieldset >
	  <legend><b>Registration</legend>                
	  <center><form  method="post" action="../Controller/ExporterImporterSetCorporationName.php" onsubmit="return validateform()" > 
            Product Id: <input type="text" name="productid" id="productid" placeholder="Enter Product Id" onblur="checkprid()" onkeyup="checkprid()">
            <p id="prid"></p> 
            Transport Registration Number: <input type="text" name="regnum" id="regnum" placeholder="Enter Transport Registration Number" onblur="checkprid()" onkeyup="checkprid()">
            <p id="prid"></p>
<input type="submit" name="submit" value="Set"></br> 
</form>  </center>
</body>
</html>