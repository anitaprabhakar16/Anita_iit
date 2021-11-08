/* Lab 5 JavaScript File 
   Place variables and functions in this file */
function deletetext(formObj) {
   var comment = document.getElementById("comments");
   if(comment.value === "Please enter your comments") {
       comment.value = "";
   }
}

function validate(formObj) {
   // put your validation code here
   // it will be a series of if statements

   if (formObj.firstName.value == "") {
      alert("You must enter a first name");
      formObj.firstName.focus();
      return false;
   }
   else if (formObj.lastName.value == "") {
      alert("You must enter a last name");
      formObj.lastName.focus();
      return false;
   }
   else if (formObj.title.value == "") {
      alert("You must enter a title");
      formObj.title.focus();
      return false;
   }
   else if (formObj.org.value == "") {
      alert("You must enter a organization");
      formObj.org.focus();
      return false;
   }
   else if (formObj.pseudonym.value == "") {
      alert("You must enter a nickname");
      formObj.pseudonym.focus();
      return false;
   }
   else if (formObj.comments.value == "") {
      alert("You must enter a comment");
      formObj.comments.focus();
      return false;
   }

   alert("The form was submitted successfully!");
   return true;
}

function nickname(formObj) {
    var Fname = document.getElementById('firstName');
    var Lname = document.getElementById('lastName');
    var Nname = document.getElementById('pseudonym');

    alert(Fname.value+" "+Lname.value+" is "+Nname.value);
}