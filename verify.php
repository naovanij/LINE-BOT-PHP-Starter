<?php
$access_token = '1qTJiV0GNTjSmT51U4jKhCvqrxsPRwHwo5BOGyVZAS3Q+scxW1wTGY/bNlO6NFRN879WJFh02OVF52QE6zTlNOxCUNWCB8XylFGaG5k7AYG/PZB88jN2zDOYICvD0cIKxJS443W8IvdnJfaYgtU0HAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>