<?php
	$ban = array(
	array(16,15,14,13,12,13,14,15,16)
	,8 =>array(3,4,5,6,7,6,5,4,3));
     for($x = 1;$x < 8;$x++){
         for($y = 0;$y < 9;$y++){
             if($x == 6){
                 $ban[$x][$y] = 1;
             }elseif($x == 2){
                 $ban[$x][$y] = 2;
             }elseif($x == 2){
                 $ban[$x][$y] = 2;
             }elseif($x == 1 && $y == 7){
                 $ban[$x][$y] = 8;
             }elseif($x == 7 && $y == 7){
                 $ban[$x][$y] = 9;
             }elseif($x == 7 && $y == 1){
                 $ban[$x][$y] = 10;
             }elseif($x == 1 && $y == 1){
                 $ban[$x][$y] = 11;
             }else{
                 

		$ban[$x][$y] = 0;
             }
         }
     }
     
     echo '侽侾俀俁係俆俇俈俉'."\n";
     echo '__________________'. "\n";
     for($x = 0;$x < 9;$x++){
         for($y = 0;$y < 9;$y++){
             switch($ban[$x][$y]){
                 case 0:
                     echo ('丒');
                     break;
                 case 1:
                     echo ("曕");
                     break;
		 case 2:
                     echo ("傆");
                     break;
		case 3:
                     echo ("崄");
                     break;
		case 4:
                     echo ("宩");
                     break;
		case 5:
                     echo ("嬧");
                     break;
		case 6:
                     echo ("嬥");
                     break;
		case 7:
                     echo ("戝");
                     break;
		case 8:
                     echo ("旘");
                     break;
		case 9:
                     echo ("妏");
                     break;
		case 10:
                     echo ("旘");
                     break;
		case 11:
                     echo ("妏");
                     break;
		case 12:
                     echo ("党");
                     break;
		case 13:
                     echo ("份");
                     break;
		case 14:
                     echo ("忿");
                     break;
		case 15:
                     echo ("共");
                     break;
		case 16:
                     echo ("樊");
                     break;
             }
         }
         echo ('|');
         echo ($x + 0);
         echo ("\n");
     }
     echo ('丳丳丳丳丳丳丳丳丳');
     
     echo '峴傪擖椡偟偰偔偩偝偄丅' ."\n";
     fscanf(STDIN, '%d', $a);
     echo '楍傪擖椡偟偰偔偩偝偄丅' ."\n";
     fscanf(STDIN, '%d', $b);
     echo '峴傪擖椡偟偰偔偩偝偄丅' ."\n";
     fscanf(STDIN, '%d', $c);
     echo '楍傪擖椡偟偰偔偩偝偄丅' ."\n";
     fscanf(STDIN, '%d', $d);
     
     $ban[$c][$d] = $ban[$a][$b];
     $ban[$a][$b] = 0;
     
     echo '侽侾俀俁係俆俇俈俉'."\n";
     echo '__________________'. "\n";
     for($x = 0;$x < 9;$x++){
         for($y = 0;$y < 9;$y++){
             switch($ban[$x][$y]){
                 case 0:
                     echo ('丒');
                     break;
                 case 1:
                     echo ("曕");
                     break;
		 case 2:
                     echo ("傆");
                     break;
		case 3:
                     echo ("崄");
                     break;
		case 4:
                     echo ("宩");
                     break;
		case 5:
                     echo ("嬧");
                     break;
		case 6:
                     echo ("嬥");
                     break;
		case 7:
                     echo ("戝");
                     break;
		case 8:
                     echo ("旘");
                     break;
		case 9:
                     echo ("妏");
                     break;
		case 10:
                     echo ("旘");
                     break;
		case 11:
                     echo ("妏");
                     break;
		case 12:
                     echo ("党");
                     break;
		case 13:
                     echo ("份");
                     break;
		case 14:
                     echo ("忿");
                     break;
		case 15:
                     echo ("共");
                     break;
		case 16:
                     echo ("樊");
                     break;
             }
         }
         echo ('|');
         echo ($x + 0);
         echo ("\n");
     }
     echo ('丳丳丳丳丳丳丳丳丳');
?>