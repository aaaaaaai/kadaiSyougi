<?php
     for($x = 0;$x < 9;$x++){
         for($y = 0;$y < 9;$y++){
             if($x == 8){
                 $ban[$x][$y] = 1;
             }else{
                 $ban[$x][$y] = 0;
             }
         }
     }
     
     echo '‚P‚Q‚R‚S‚T‚U‚V‚W‚X'. "\n";
     echo '__________________'. "\n";
     for($x = 0;$x < 9;$x++){
         for($y = 0;$y < 9;$y++){
             switch($ban[$x][$y]){
                 case 0:
                     echo ('E');
                     break;
                 case 1:
                     echo ("•à");
                     break;
             }
         }
         echo ('|');
         echo ($x + 1);
         echo ("\n");
     }
     echo ('PPPPPPPPP');
?>