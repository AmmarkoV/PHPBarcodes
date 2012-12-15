<?php



  function WriteNewLastValue($newlastval)
   {
    $file=fopen("barcodes/last.txt","w");
    fwrite($file,$newlastval);
    fclose($file);
   }
  
  



 if ( 
      (!isset($_REQUEST["batchid"]) ) ||
      (!isset($_REQUEST["prefix"]) ) ||
      (!isset($_REQUEST["startfrom"]) )  ||
      (!isset($_REQUEST["count"]) )  ||
      (!isset($_REQUEST["thecolumns"]) ) ||
      (!isset($_REQUEST["therows"]) ) ||
      (!isset($_REQUEST["xpagemargin"]) ) ||
      (!isset($_REQUEST["ypagemargin"]) ) ||
      (!isset($_REQUEST["xmargin"]) ) ||
      (!isset($_REQUEST["ymargin"]) ) 
    )
   {
    echo "Bad Request , Go <a href=\"index.html\">back</a>";
   }
  

 $filename = md5($_REQUEST["batchid"]);
 $prefix = $_REQUEST["prefix"];
 $startfrom=($_REQUEST["startfrom"]+0);
 $count = ($_REQUEST["count"]+0);
 $count = $count + $startfrom;

 $columns = ( $_REQUEST["thecolumns"] + 0 ) ;
 $rows = ( $_REQUEST["therows"] + 0 ) ;

 $xpagemargin = ( $_REQUEST["xpagemargin"] + 0 ) ;
 $ypagemargin = ( $_REQUEST["ypagemargin"] + 0 ) ;

 $xmargin = ( $_REQUEST["xmargin"] + 0 ) ;
 $ymargin = ( $_REQUEST["ymargin"] + 0 ) ;

 $filename = preg_replace('/[";.<>&*~|#]/', '', $filename);  


 $formatting = $columns."x".$rows."+".$xpagemargin."+".$ypagemargin; 

 $internal_margin =  $xmargin.",". $ymargin;

 $command = "./barcodes.sh \"".$filename."\" ".$startfrom." ".$count." \"".$prefix ."\" \"".$formatting."\" \"".$internal_margin."\"";
 #echo "Request for ".$command;

 WriteNewLastValue($count);   
 exec($command);
 
 echo "<html>
<head>
  <title>Its Done</title>
  <style type=\"text/css\">
  body {
    background-image: url(back.jpg);
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
  </style>
</head>

 
<body background=\"back.jpg\"><br><br><br><br><br><br><br><br><br><br><br><br><br><center><h1><a href=\"barcodes/".$filename.".ps\">Download it!</a></h1></center></body></html>"


?>
