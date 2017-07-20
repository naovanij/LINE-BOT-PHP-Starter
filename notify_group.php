define('LINE_API',"https://notify-api.line.me/api/notify");

$token = "mgHiaNHqIMUjqA2s1rjMY8mXbjzc5bqv4u3T4dY3erB"; //ใส่Token ที่copy เอาไว้

$str = "Hello"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

$stickerPkg = 2; //stickerPackageId
$stickerId = 34; //stickerId
 
$res = notify_message($str,$stickerPkg,$stickerId,$token);
var_dump($res);
function notify_message($message,$stickerPkg,$stickerId,$token){
     $queryData = array(
      'message' => $message,
      'stickerPackageId'=>$stickerPkg,
      'stickerId'=>$stickerId
     );
     $queryData = http_build_query($queryData,'','&');
     $headerOptions = array(
         'http'=>array(
             'method'=>'POST',
             'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                 ."Authorization: Bearer ".$token."\r\n"
                       ."Content-Length: ".strlen($queryData)."\r\n",
             'content' => $queryData
         ),
     );
     $context = stream_context_create($headerOptions);
     $result = file_get_contents(LINE_API,FALSE,$context);
     $res = json_decode($result);
  return $res;
 }
