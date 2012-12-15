<?php
 error_reporting(0);
  function ReadLastValue()
   {
    $file=fopen("barcodes/last.txt","r");
    if (!$file) { return 1; } 
 
    $val = fgets($file);
    fclose($file);
    return $val;
   }
?>


<html>
  <head> 
    <title>Barcode Generator</title>
  </head>
<body>


<br><br><br><br><br><br><br><br><br>
<center>
  <h1>PHPBarcode generator</h1><br><br>

  <form action="barcode.php" method="get">
    <h3>How many : <input type="text" name="count" value="1000"> <input type="submit" value="Generate"></h3> 
        <br><br><br>

 <table>
  <tr> 
   <td>
    <i>Fine Tuning</i><br>  
    _____________________________________________________
   </td> 
  </tr><tr> 
  <tr> 
   <td>
    Start From : <input type="text" name="startfrom" size=10  value="<?php echo ReadLastValue();?>">
   </td> 
  </tr><tr> 
   <td>
     Prefix : <input type="text" name="prefix" value="ABC%07d"> ( <a href="http://en.wikipedia.org/wiki/Printf_format_string#Format_placeholders" target="_new">?</a> )
   </td>
  </tr><tr>
   <td>
    Labels per page : <input type="text" name="thecolumns" value="3" size=3 > x <input type="text" name="therows" value="7" size=3 >
   </td> 
  </tr><tr>
   <td>  
     Page Margin , Horizontal : <input type="text" name="xpagemargin" value="5" size=2> mm , Vertical : <input type="text" name="ypagemargin" value="15" size=2> mm 
   </td> 
  </tr><tr> 
   <td>  
     Per Label Internal Margin ,  Horizontal : <input type="text" name="xmargin" value="10" size=2 > mm , Vertical : <input type="text" name="ymargin" value="5" size=2> mm 
   </td> 
  </tr><tr>
   <td> 
    _____________________________________________________
   </td> 
  </tr><tr> 
   <td>
     <br> 
      <center>
        <input type="hidden" name="batchid" value="<?php echo rand(0,100000);?>">
      </center>
   </td></tr>
  </table>
</form> 
  

</center>
</body>
</html>
