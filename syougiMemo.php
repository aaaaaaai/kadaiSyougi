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
             }}}

	function Show($ban)
	{
	
     
     echo '０１２３４５６７８'."\n";
     echo '__________________'. "\n";
     for($x = 0;$x < 9;$x++){
         for($y = 0;$y < 9;$y++){
             switch($ban[$x][$y]){
                 case 0:
                     echo ('・');
                     break;
                 case 1:
                     echo ("歩");
                     break;
		 case 2:
                     echo ("ふ");
                     break;
		case 3:
                     echo ("香");
                     break;
		case 4:
                     echo ("桂");
                     break;
		case 5:
                     echo ("銀");
                     break;
		case 6:
                     echo ("金");
                     break;
		case 7:
                     echo ("大");
                     break;
		case 8:
                     echo ("飛");
                     break;
		case 9:
                     echo ("角");
                     break;
		case 10:
                     echo ("飛");
                     break;
		case 11:
                     echo ("角");
                     break;
		case 12:
                     echo ("ｵｳ");
                     break;
		case 13:
                     echo ("ｷﾝ");
                     break;
		case 14:
                     echo ("ｷﾞ");
                     break;
		case 15:
                     echo ("ｹｲ");
                     break;
		case 16:
                     echo ("ｷｮ");
                     break;
             }
         }
         echo ('|');
         echo ($x + 0);
         echo ("\n");
     }
     echo ('￣￣￣￣￣￣￣￣￣');
     }
	
	Show($ban);
     echo '行と列を入力してください。' ."\n";
     fscanf(STDIN, '%d %d', $a, $b);
     echo '行と列を入力してください。' ."\n";
     fscanf(STDIN, '%d %d', $c, $d);
     
     $ban[$c][$d] = $ban[$a][$b];
     $ban[$a][$b] = 0;
     	Show($ban);
  ?>