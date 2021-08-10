<?php

class CallApi{

    static function callSmsApi(){

       $ID = "94766670970";
       $PW ="8632";
       $TO="0766670970";
       $TEXT="ccdc";

       $user = "94766670970";
       $password = "8632";
       $text = urlencode("This is an example message");
       $to = "0766670970";
       
       $baseurl ="http://www.textit.biz/sendmsg";
       $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
       $ret = file($url);
       
       $res= explode(":",$ret[0]);
       
       print($res[0]);
       if (trim($res[0])=="OK")
       {
       echo "Message Sent - ID : ".$res[1];
       return $res[0];
       }
       else
       {
       echo "Sent Failed - Error : ".$res[1];
      
       }
       
       return $res[0];
       
      //   $method = 'GET';
      //   $url="https://www.textit.biz/sendmsg?id=94766670970&pw=8632&to=0766670970&text=Hello+World";
      //   //$url= "https://www.textit.biz/sendmsg?id='$ID'&pw='$PW'&to='$TO'&text='$TEXT'";
      //   //$url="https://jsonplaceholder.typicode.com/todos/1";
      //   $data= false;

      //   //  function apiCall($method, $url, $data){
      //       $curl = curl_init();
      //       switch ($method){
      //          case "POST":
      //             curl_setopt($curl, CURLOPT_POST, 1);
      //             if ($data)
      //                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      //             break;
      //          case "PUT":
      //             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
      //             if ($data)
      //                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
      //             break;
      //          default:
      //             if ($data)
      //                $url = sprintf("%s?%s", $url, http_build_query($data));
      //       }
      //       // OPTIONS:
      //       curl_setopt($curl, CURLOPT_URL, $url);
      //       curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      //          'APIKEY: 111111111111111111111',
      //          'Content-Type: application/json',
      //       ));
      //       curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      //       curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      //       // EXECUTE:
      //       $result = curl_exec($curl);
      //       if(!$result){die("Connection Failure");}
      //       curl_close($curl);
      //       print($result);
      //       return $result;
        //  }

        }

}
