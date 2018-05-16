<?php
// $resOK = array(1,2,3,4,5);
// sleep($resOK[rand(0,4)]);

$image1 = "image/".$row['messageid'].".jpg";
$image2 = "image/".$messageid.".jpg";

//$image1 = "image/7136904352366.jpg";
//$image2 = "image/7291868702511.jpg";

exec("./TestOpencv $image1 $image2 2>&1 &", $output);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.line.me/v2/bot/message/push",
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{
    \"to\": \"$userid\",
    \"messages\": [
      \t      {
            \"type\": \"text\",
            \"text\": \"Similarity degree: $output[0]\"
            }

      ]
 }",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer " . $access_token,
    "content-type: application/json",
  ),
));
//$output[0]
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

require "_alldbconnect.php";

$sql = "UPDATE `apiline` SET `similarity_degree`='$output[0]' WHERE userid = '$userid' ORDER BY id DESC LIMIT 1;";
if ($conn->query($sql) === TRUE) {
  echo "insert success";
} else {
  echo "error:" . $sql . "<br>" . $conn->error;
}
