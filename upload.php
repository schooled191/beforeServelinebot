<?php
$targetDir = "images/";
$targetID1 = "sourceImage1";
$targetID2 = "sourceImage2";

$path1 = $_FILES["".$targetID1]['name'];
$extension1 = pathinfo($path1, PATHINFO_EXTENSION);
$path2 = $_FILES["".$targetID2]['name'];
$extension2 = pathinfo($path2, PATHINFO_EXTENSION);
$date = new DateTime();

$targetImg1 = $targetDir . $date->format('YmdHis') . "_scr." . $extension1;
$targetImg2 = $targetDir . $date->format('YmdHis') . "_dest." . $extension2;

$isUploadOK1 = uploadImage($targetImg1, $targetID1);
$isUploadOK2 = uploadImage($targetImg2, $targetID2);

if($isUploadOK1 == 1 && $isUploadOK2 == 1){
  exec("./TestOpencv $targetImg1 $targetImg2 2>&1 &", $output);
  $degree = "";

  //echo "img: ".$targetImg1."</br>";
  //echo "img: ".$targetImg2."</br>";

  foreach ($output as $line) {
      $degree = $line;
  }
  echo "Similarity degree: ".$line;
}

// upload image ///////////////////////////////////////////////////////////////
function uploadImage($targetFile, $targetID){
  $uploadOk = 1;
  $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);

  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["".$targetID]["tmp_name"]);
      if($check !== false) {
          $uploadOk = 1;
      } else {
          $uploadOk = 0;
      }
  }

  // Check if file already exists
  if (file_exists($targetFile)) {
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["".$targetID]["size"] > 500000) {
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 1) {
      if (move_uploaded_file($_FILES["".$targetID]["tmp_name"], $targetFile)) {
          $uploadOk = 1;
      } else {
          $uploadOk = 0;
      }
  }

  return $uploadOk;
}
?>
