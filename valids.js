function validation()
{
  var pass1=f1.password.value;
  var mail=f1.email.value;
  if(mail=="")

    alert("Enter some E-Mail");

  else if(mail.indexOf('@')==-1 || mail.indexOf('.')==-1)
  {
    alert("It is a invalid email id");
  }
  else  if(mail.indexOf("@")==0 || mail.indexOf(".")==0 || mail.indexOf('@')>mail.indexOf('.') )
  {
    alert("It is a invalid email id");
  }

  else if(mail.indexOf('@') +1== mail.indexOf('.'))
  {
     alert("It is a invalid email id");
  }
  else
  {
    alert("vaild email id");
  }

  if(pass1=="")

    alert("Enter some password");

  else if(pass1.length<6)

    alert("Enter morethan 6 characters");
  else
  {
    alert("valid password");
  }
 }


 function validation1(){
   var uname=f2.name.value;
   var mail=f2.email.value;
   var pass1=f2.password.value;
   var pass2=f2.password2.value;
   //Username
   if(uname=="")
 {
 alert("Enter username");
 }
   if(uname.length<6)
 {
     alert("Enter username with more than 6 characters");
   }
   if(uname!=" ")
   {
     for(var i=0;i<uname.length;i++)
     {
       if(splchar.indexof(uname.charAt(i))!= -1)
       {
         alert("Special characters are not allowed");

         f1.text.value = " ";
         f1.text.focus( );
         return false;
       }
     }
   }
   else
     alert("Valid name");

    //Email Validation
     if(mail=="")

       alert("Enter some E-Mail");

     else if(mail.indexOf('@')==-1 || mail.indexOf('.')==-1)
     {
       alert("It is a invalid email id");
     }
     else  if(mail.indexOf("@")==0 || mail.indexOf(".")==0 || mail.indexOf('@')>mail.indexOf('.') )
     {
       alert("It is a invalid email id");
     }

     else if(mail.indexOf('@') +1== mail.indexOf('.'))
     {
        alert("It is a invalid email id");
     }
     else
     {
       alert("vaild email id");
     }
     //passwords validation
       if(pass1=="")

         alert("Enter password");

       else if(pass1.length<8)

         alert("Enter password with more than 8 characters");
         else if(pass1.length>15)

           alert("Enter password with less than 15 characters");

           else if(pass1!=pass2)

         alert("Passwords not matched");

     else{
       alert("Passwords matched");
     }

 }
