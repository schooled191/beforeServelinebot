<?php
exec("./TestOpencv image/book.jpg image/book.jpg 2>&1 &", $output);
for ($i=0; $i < count($output); $i++) {
  echo $output[0]." / ";
}
echo "<br />";
exec("./TestOpencv image/book.jpg image/nectec.jpg 2>&1 &", $output2);
for ($i=0; $i < count($output2); $i++) {
  echo $output2[0]." / ";
}
 ?>
