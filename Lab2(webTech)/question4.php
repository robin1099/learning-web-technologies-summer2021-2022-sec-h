<!DOCTYPE html>
<html>
<body>

<?php
      $num1=6;
      $num2=4;
      $num3=6;
      
      if($num1>$num2 && $num1>$num3){
        echo $num1;
      }
      
      else {
       	if($num2>$num1 && $num2>$num3){
          echo $num2;
        }
        
       else
          echo $num3;
      }
?> 

</body>
</html>
