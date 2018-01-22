<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bit Secure Voting System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

                 <link rel="stylesheet" href="assets/css/buttons.css">
                <link rel="stylesheet" href="assets/css/w3.css">
                <link rel="stylesheet" href="assets/css/modal.css">


<script src="assets/js/test.js"></script>
<script type='text/javascript'>//<![CDATA[
window.onload=function(){
(function () {
var textFile = null,
  makeTextFile = function (text) {
    var data = new Blob([text], {type: 'text/plain'});

    // If we are replacing a previously generated file we need to
    // manually revoke the object URL to avoid memory leaks.
    if (textFile !== null) {
      window.URL.revokeObjectURL(textFile);
    }

    textFile = window.URL.createObjectURL(data);

    return textFile;
  };


  var create = document.getElementById('create'),
    textbox = document.getElementById('textbox');

  create.addEventListener('click', function () {
    var link = document.getElementById('downloadlink');
    //link.href =
     makeTextFile(textbox.value);
    link.style.display = 'block';
  }, false);
})();

}//]]> 

</script>

</head>
<body>

<br>
</br>

<div class="w3-container">
 <center><h1><u>
    Ballot Paper
 </h1></u>
 <p>Please Select Your Candidate</p></center>
<br>
</br>

 </div>





  

</div>




  <div class="container">
    <div class="col-sm-4">
      <img src="https://www.news.lk/media/k2/items/cache/3409e45349ec9f6b3397bfe10e87a1d0_XL.jpg" class="media-object" style="width:100%">
    </div>
    <div class="col-sm-8" style="background-color:lavenderblush;" width="100%">
      

<br>

</br>
      <center>
      <h1>Mahinda Rajapaksha</h1>
      <h1>මහින්ද රාජපක්ෂ</h1>
      <h1>மகிந்த ராசபக்ச</h1>
      </center>



 <center><button type="button"  onclick="sendmessage();" class="btn btn-success btn-lg round" style="width:250px">Vote</button></center>



<script type="text/javascript">

    
    var webSocket=new WebSocket("ws://localhost:9091/mavenproject1/NewClass");

  
 
    function sendmessage()
    {
       
        webSocket.send("mahinda rajapaksha");
  
    
    }

</script>

<br>
</br>



    </div>
  </div>
</div>
   
<hr>

  <div class="container">
    <div class="col-sm-4">
      <img src="http://newsfirst.lk/english/wp-content/uploads/2017/09/Maithripala-Sirisena.jpg" class="media-object" style="width:100%">
    </div>
    <div class="col-sm-8" style="background-color:lavenderblush;" width="100%">
      

<br>

</br>
      <center>
        <h1>Maithripala Sirisena</h1>
        <h1>මෛත්‍රීපාල සිරිසේන</h1>
        <h1>மைத்திரிபால சிறிசேன</h1>
      </h1></center>



 

      <center><button type="button"  onclick="sendmessage2();" class="btn btn-success btn-lg round" style="width:250px">Vote</button></center>



<script type="text/javascript">

     var webSocket=new WebSocket("ws://localhost:9091/mavenproject1/NewClass");

  
 
    function sendmessage2()
    {
       
        webSocket.send("maithripala sirisena");
  
    
    }
    </script>
<br>
</br>


    </div>
  </div>
</div>
   
<hr>

  <div class="container">
    <div class="col-sm-4">
      <img src="https://www.colombotelegraph.com/wp-content/uploads/2015/03/Ranil.jpg" class="media-object" style="width:100%">
    </div>
    <div class="col-sm-8" style="background-color:lavenderblush;" width="100%">
      

<br>

</br>
      <center>
        <h1>Ranil Wickremesinghe</h1>
        <h1>රනිල් වික්‍රමසිංහ</h1>
        <h1>ரணில் விக்ரமசிங்க</h1>
      </center>





      <center><button type="button"  onclick="sendmessage3();" class="btn btn-success btn-lg round" style="width:250px">Vote</button></center>



<script type="text/javascript">

    var webSocket=new WebSocket("ws://localhost:9091/mavenproject1/NewClass");

  
 
    function sendmessage3()
    {
       
        webSocket.send("Ranil wickramasinghe");
  
    
    }
    </script>

<br>





</br>





    </div>
  </div>
</div>
   
<hr>



 
<script type="text/javascript">
 
function saveTextAsFile()
{

  
    var textToSave = "Mahinda Rajapaksha";
    var textToSaveAsBlob = new Blob([textToSave], {type:"text/plain"});
    var textToSaveAsURL = window.URL.createObjectURL(textToSaveAsBlob);
    var fileNameToSaveAs = document.getElementById("inputFileNameToSaveAs").value;
 
    var downloadLink = document.createElement("a");
    downloadLink.download = fileNameToSaveAs;
    downloadLink.innerHTML = "Download File";
    downloadLink.href = textToSaveAsURL;
    downloadLink.onclick = destroyClickedElement;
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
 
    downloadLink.click();
    
}
 
function destroyClickedElement(event)
{
    document.body.removeChild(event.target);
}

</script>
 
<script type="text/javascript">
 
function saveTextAsFile1()
{
    var textToSave = "Maithripala Sirisena";
    var textToSaveAsBlob = new Blob([textToSave], {type:"text/plain"});
    var textToSaveAsURL = window.URL.createObjectURL(textToSaveAsBlob);
    var fileNameToSaveAs = document.getElementById("inputFileNameToSaveAs").value;
 
    var downloadLink = document.createElement("a");
    downloadLink.download = fileNameToSaveAs;
    downloadLink.innerHTML = "Download File";
    downloadLink.href = textToSaveAsURL;
    downloadLink.onclick = destroyClickedElement;
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
 
    downloadLink.click();
}
 
function destroyClickedElement(event)
{
    document.body.removeChild(event.target);
}

</script>
 
<script type="text/javascript">
 
function saveTextAsFile2()
{
    var textToSave = "Ranil Wickremesinghe";
    var textToSaveAsBlob = new Blob([textToSave], {type:"text/plain"});
    var textToSaveAsURL = window.URL.createObjectURL(textToSaveAsBlob);
    var fileNameToSaveAs = document.getElementById("inputFileNameToSaveAs").value;
 
    var downloadLink = document.createElement("a");
    downloadLink.download = fileNameToSaveAs;
    downloadLink.innerHTML = "Download File";
    downloadLink.href = textToSaveAsURL;
    downloadLink.onclick = destroyClickedElement;
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
 
    downloadLink.click();
}
 
function destroyClickedElement(event)
{
    document.body.removeChild(event.target);
}

</script>



<br>
</br>

</div>



</body>
</html>
