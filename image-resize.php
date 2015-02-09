
<!-- File upload form -->
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Choose your file here:
    <input name="file1" type="file" /><br /><br />
    <input type="submit" value="Upload It" />
</form>


<?php
// File information
$fileName = $_FILES["file1"]["name"]; 
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; 
$fileType = $_FILES["file1"]["type"]; 
$fileSize = $_FILES["file1"]["size"]; 


// Checks file type and size requirements

if (!$fileTmpLoc) { 
    echo "You did not choose a file";
    exit();
} else if($fileSize > 2000000) { 
    echo "Your image must be less than 2mb.";
    unlink($fileTmpLoc);
    exit();
} else if (!preg_match("/.(jpg|png)$/i", $fileName) ) { 
    echo "Image must be a .jpg, or .png.";
    unlink($fileTmpLoc);
    exit();
}

// Moves file to directory
move_uploaded_file($fileTmpLoc, "uploads/$fileName");

// Math to resize image 
$filename = "uploads/$fileName";
list($width, $height) = getimagesize($filename);
$ratio = (400 / $width);
$newheight = ($ratio * $height);

echo "Resized:<br />";
?>


<!-- HTML5 cavas for resized image -->


<html>
<head>
<title>Part 3) Image Resize</title>
</head>
  <body>
   
   <!-- The Canvas with php variables for height -->

    <canvas id="myCanvas" width="400" height="<?php echo $newheight;?>"></canvas>
    <script>
      var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');
      var x = 0;
      var y = 0;
      var width = 400;
      var height = <?php echo $newheight;?>;
      var imageObj = new Image();

      imageObj.onload = function() {
        context.drawImage(imageObj, x, y, width, height);
      };
      imageObj.src = '<?php echo "uploads/$fileName";?>';
    </script>
    <br>
  </body>
</html>   


<?php 
// The original image
echo "Original:<br />"."<img src='uploads/$fileName'/>"; ?>

 