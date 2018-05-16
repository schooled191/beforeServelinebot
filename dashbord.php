<?php
	foreach ($events['events'] as $event) {
     if ($event['type'] == 'message' && ($event['message']['text'] == 'ocr' || $event['message']['text'] == 'Ocr' || $event['message']['text'] == 'OCR')){
      $userid = $event['source']['userId'];
			$text = $event['message']['text'];
			$replyToken = $event['replyToken'];
			$process = 'ocr';
			$messages = [
				'type' => 'text',
				'text' => "กรุณาส่งภาพที่ต้องการทำ ocr"
			];
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
      require "connectdatabase.php";
		}elseif ($event['type'] == 'message' && ($event['message']['text'] == 'similarity' || $event['message']['text'] == 'Similarity' || $event['message']['text'] == 'SIMILARITY')) {
      $userid = $event['source']['userId'];
      // $text = "similarities";
      $replyToken = $event['replyToken'];
			$process = 'similarity';
      $messages = [
        'type' => 'text',
        'text' => "กรุณาส่งภาพที่ต้องการตรวจสอบ 2 ภาพ โดยทำการส่งทีละภาพเพื่อให้ระบบได้ทำการตรวจสอบภาพอย่างละเอียด"
      ];
      $url = 'https://api.line.me/v2/bot/message/reply';
      $data = [
        'replyToken' => $replyToken,
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);
      echo $result . "\r\n";
      require "connectdatabase.php";
		}
	}
echo "OK";
