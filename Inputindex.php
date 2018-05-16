<!DOCTYPE html>
<html>
<head>
  <script src="js/jquery-2.2.4.js"></script>
</head>
<body>

<form id="myForm" name="myForm" action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:<br/><br/>
    Source image: <input type="file" name="sourceImage1" id="sourceImage1"><br/>
    Target image: <input type="file" name="sourceImage2" id="sourceImage2"><br/><br/>
    <input type="submit" id="submit" value="Check match" name="submit">
    <button type="reset" value="Reset">Clear</button>
</form>

</body>
</html>
