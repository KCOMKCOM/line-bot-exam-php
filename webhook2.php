<?php // callback.php
require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'WY2wFbKtnviUHzPKCrPS5QF9GrPfM3hOBTqocaL0OEjW3hzEBUh+MUcp0mjWKxX4OcZtWRremdOu3/6+1GMMJ1KVuJ+vhapax14Cn8lb094usbOmLiweZLlo/Pc6lqqf2uEjaKpNmmmjbZ/5nNCUKwdB04t89/1O/w1cDnyilFU=';


$content = file_get_contents('php://input');//php://input は、POST の生データの読み込みを 許可します。http://ivystar.jp/programming/php/what-is-phpinput/
// Parse JSON
$events = json_decode($content, true);

date_default_timezone_set('Asia/Tokyo');

if (!is_null($events['events'])) { //is_null — 変数が NULL かどうか調べる。var が null の場合に TRUE、 それ以外の場合に FALSE を返します。
if ($events['events'][0]['type'] == 'message'/* && $event['message']['type'] == 'text'*/) {

				
if($events['events'][0]['message']['type'] == 'image'){
				$message_id= $events['events'][0]['message']['id'];


				$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
				$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '50790bf0d5ecfcf0f4b08de2c24c5ab6']);
				$response = $bot->getMessageContent($message_id);
				if ($response->isSucceeded()) {
   				 	$tempfile = tmpfile();
    				fwrite($tempfile, $response->getRawBody());
    				$text = sys_get_temp_dir();
				} else {
    			error_log($response->getHTTPStatus() . ' ' . $response->getRawBody());
				}

			}

			$replyToken = $events['events'][0]['replyToken'];
			$messages = [
				'type' => 'text',
				'text' => $text
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
		}
}
echo "OK";
?>
