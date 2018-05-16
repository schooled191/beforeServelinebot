<?php

//$linkOCR = $_POST["link"];
$linkOCR = "www.google.co.th";
require "_alldbconnect.php";

$sql = "UPDATE `apiline` SET `ocr_link`='$linkOCR' WHERE userid = '$userid' ORDER BY id DESC LIMIT 1;";
if ($conn->query($sql) === TRUE) {
  echo "insert success";
} else {
  echo "error:" . $sql . "<br>" . $conn->error;
}
 ?>
