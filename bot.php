<?php
//require "https://mhr-line-notify.herokuapp.com/vendor/autoload.php";
require "/vendor/autoload.php";
$access_token = 'WY2wFbKtnviUHzPKCrPS5QF9GrPfM3hOBTqocaL0OEjW3hzEBUh+MUcp0mjWKxX4OcZtWRremdOu3/6+1GMMJ1KVuJ+vhapax14Cn8lb094usbOmLiweZLlo/Pc6lqqf2uEjaKpNmmmjbZ/5nNCUKwdB04t89/1O/w1cDnyilFU=';
$channelSecret = '2bac43504e686b23ae42080ae49839f8';
$idPush = 'Ud16e3261b073f113338ba66c3aaa3e6';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
//$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => LINE_MESSAGE_CHANNEL_SECRET]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($idPush, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
