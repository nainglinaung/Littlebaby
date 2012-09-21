<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


  $crlf=chr(13).chr(10);
  $itime=3;  // minimum number of seconds between one-visitor visits
  $imaxvisit=10;  // maximum visits in $itime x $imaxvisits seconds
  $ipenalty=($itime * $imaxvisit);  // minutes for waitting
  $iplogdir="./";
  $iplogfile="AttackersIPs.Log";
  
  // Time
  
  $today = date("Y-m-j,G");
  $min = date("i");
  $sec = date("s");
  $r = substr(date("i"),0,1);
  $m =  substr(date("i"),1,1);
  $minute = 0;
  
  // Set ur admin's email address and others as u like
  
  $to      = 'tweetycoaster@gmail.com';   //ur admin's email address
  $headers = 'From: Little Lady Baby@yehg.net' . "\r\n" .   //  change as ur wish 	   
    		 'X-Mailer: yehg.net DDoS Attack Shield';
  $subject = "Warning of Possible DoS Attack @ $today:$min:$sec";
  

  //     Warning Messages:
  
  $message1='<font color="red">Temporarily under heavy traffic or some like as DoS attack !!!</font><br>';
  $message2='Please wait ... ';
  $message3=' seconds or try again after some minutes from now.<br>';
  $message4='<font color="blue">Protected by TweetyCoaster Little Lady Baby DDoS Shield !!!</font><br>If you are a human, change IP or using freedom, ultra surf etc.<br>We temporarily banned IP <b>'.$_SERVER["REMOTE_ADDR"].' </b>from DoS attack.';
  $message5=' Your site got attacking or bot like visiting from IP address: '.$_SERVER["REMOTE_ADDR"];
 
//---------------------- End of Initialization ---------------------------------------  

  //     Get file time:
  
  $ipfile=substr(md5($_SERVER["REMOTE_ADDR"]),-3);  // -3 means 4096 possible files
  $oldtime=0;
  if (file_exists($iplogdir.$ipfile)) $oldtime=filemtime($iplogdir.$ipfile);

  //     Update times:
  
  $time=time();
  if ($oldtime<$time) $oldtime=$time;
  $newtime=$oldtime+$itime;

  //     Check human or bot:
  
  if ($newtime>=$time+$itime*$imaxvisit)
  {
    
  	//     To block visitor:
    touch($iplogdir.$ipfile,$time+$itime*($imaxvisit-1)+$ipenalty);
    header("HTTP/1.0 503 Service Temporarily Unavailable");
    header("Connection: close");
    header("Content-Type: text/html");
    echo '<html><head><title>Overload Warning by Little Lady Baby DDoS Shield beta 1.02!!!</title></head><body><p align="center"><strong>'
          .$message1.'</strong>';
    echo $message2.$ipenalty.$message3.$message4.'</p></body></html>'.$crlf;
    
    //     Mailing Warning Message to Site Admin
     {
	@mail($to, $subject, $message5, $headers);	
     }
    
    //     logging:
    $fp=@fopen($iplogdir.$iplogfile,"a");
    
    if ($fp!==FALSE)
    {
      $useragent='<unknown user agent>';
      if (isset($_SERVER["HTTP_USER_AGENT"])) $useragent=$_SERVER["HTTP_USER_AGENT"];
      @fputs($fp,$_SERVER["REMOTE_ADDR"].' on '.date("D, d M Y, H:i:s").' as '.$useragent.$crlf);
    }
    
    @fclose($fp);
    exit();

  }

  
   //  Modify file time:
  touch($iplogdir.$ipfile,$newtime);



/* End of file Littlebaby_helper.php */
/* Location: ./application/helpers/littlebaby_helper.php */

