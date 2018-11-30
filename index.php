
<?php
//echo phpinfo();
?> 
<html>
<head>
  <link rel="stylesheet" type="text/css" href="progress_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="http://malsup.github.io/min/jquery.form.min.js"></script>
  <script type="text/javascript" src="upload_progress.js"></script>
 <style>
body
{ 
  padding: 30px 
}
form 
{ 
  display: block; 
  margin: 20px auto; 
  background: #eee; 
  border-radius: 10px; 
  padding: 15px 
}
.progress 
{
  display:none; 
  position:relative; 
  width:400px; 
  border: 1px solid #ddd; 
  padding: 1px; 
  border-radius: 3px; 
}
.bar 
{ 
  background-color: #B4F5B4; 
  width:0%; 
  height:20px; 
  border-radius: 3px; 
}
.percent 
{ 
  position:absolute; 
  display:inline-block; 
  top:3px; 
  left:48%; 
}

</style>
</head>
<body>
<form action="upload_file.php"id="myForm" name="frmupload" method="post" enctype="multipart/form-data">
  <input type="file" id="upload_file" name="upload_file" />
  <input type="submit" name='submit_image' value="Submit Comment" onclick='upload_image();'/>
</form>
<div class='progress' id="progress_div">
<div class='bar' id='bar1'></div>
<div class='percent' id='percent1'>0%</div>
</div>
<div id='output_image'>
</body>
</html>
<script>

function upload_image() 
{
debugger;
  var bar = $('#bar1');
  var percent = $('#percent1');
  $('#myForm').ajaxForm({
    beforeSubmit: function() {
      document.getElementById("progress_div").style.display="block";
      var percentVal = '0%';
      bar.width(percentVal)
      percent.html(percentVal);
    },

    uploadProgress: function(event, position, total, percentComplete) {
	debugger;
      var percentVal = percentComplete + '%';
      bar.width(percentVal)
      percent.html(percentVal);
    },
    
	success: function() {
      var percentVal = '100%';
      bar.width(percentVal)
      percent.html(percentVal);
    },

    complete: function(xhr) {
      if(xhr.responseText)
      {
        document.getElementById("output_image").innerHTML=xhr.responseText;
      }
    }
  }); 
}
</script>
