<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.line.me/v2/bot/message/'.$messageid.'/content",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer $access_token",
    "cache-control: no-cache",
    "postman-token: d931261a-486a-8f95-4665-6dcc3a545cb3"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $decoded_image=base64_encode($response);
  echo $decoded_image;
  // echo "<img src='data:image/jpeg;base64,".$decoded_image."'>";
}
