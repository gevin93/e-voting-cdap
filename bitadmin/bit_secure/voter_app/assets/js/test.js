<SCRIPT LANGUAGE="JavaScript">
 function WriteToFile(passForm) {

    set fso = CreateObject("Scripting.FileSystemObject");  
    set s = fso.CreateTextFile("C:\test.txt", True);
    s.writeline("HI");
    s.writeline("Bye");
    s.writeline("-----------------------------");
    s.Close();
 }
  </SCRIPT>

</head>

<body>
<p>To sign up for the Excel workshop please fill out the form below:
</p>
<form onSubmit="WriteToFile(this)">
Type your first name:
<input type="text" name="FirstName" size="20">
<br>Type your last name:
<input type="text" name="LastName" size="20">
<br>
<input type="submit" value="submit">
</form> 