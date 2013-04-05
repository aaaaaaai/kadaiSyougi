<?php

class Prepare
{
    function Prepare()
    {
	    global $ban;
	    $ban = array(
	        array(16,15,14,13,12,13,14,15,16)
	        ,8 =>array(2,3,4,5,6,5,4,3,2));

        for($x = 1;$x < 8;$x++){
            for($y = 0;$y < 9;$y++){
                if($x == 6){
                    $ban[$x][$y] = 1;
                }elseif($x == 1 && $y == 7){
                    $ban[$x][$y] = 7;
                }elseif($x == 7 && $y == 7){
                    $ban[$x][$y] = 8;
                }elseif($x == 2)	   {
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
    }
    
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
                        echo ("香");
                        break;
		            case 3:
                        echo ("桂");
                        break;
		            case 4:
                        echo ("銀");
                        break;
		            case 5:
                        echo ("金");
                        break;
		            case 6:
                        echo ("大");
                        break;
		            case 7:
                        echo ("飛");
                        break;
		            case 8:
                        echo ("角");
                        break;
		            case 9:
                        echo ("フ");
                        break;
		            case 10:
                        echo ("ﾋｼ");
                        break;
		            case 11:
                        echo ("ｶｸ");
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
        echo ('￣￣￣￣￣￣￣￣￣' . "\n");
    }
}
	
class Move
{
    function move()
    {
        global $ban;
        $l = new Limit();
    
        echo '行と列を入力してください。' ."\n";
        fscanf(STDIN, '%d %d', $a, $b);
        echo '行と列を入力してください。' ."\n";
        fscanf(STDIN, '%d %d', $c, $d);
        
        $koma = $ban[$a][$b];
        
        if($koma != 2){
            $l -> limit1($koma, $a, $b, $c, $d);
        }else{
            $l -> limit2($koma, $a, $b, $c, $d);
        }
    }
}

class Limit
{
    
    function limit1($koma, $a, $b, $c, $d)
    {
        global $ban, $m, $check;
        
        switch($koma){
            case 1:					//歩
                if($c == $a - 1 && $d == $b){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
		case 3:					//桂
                if($c == $a -2 && $d == $b +1){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }elseif($c == $a -2 && $d == $b -1){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
		case 4:					//銀
                if($c == $a - 1 && $d == $b){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }elseif($c == $a -1 && $d == $b +1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
  		}elseif($c == $a -1 && $d == $b -1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a +1 && $d == $b +1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a +1 && $d == $b -1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
		case 5:					//金
                if($c == $a - 1 && $d == $b){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }elseif($c == $a  && $d == $b +1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
  		}elseif($c == $a  && $d == $b -1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a -1 && $d == $b +1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a -1 && $d == $b -1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a +1 && $d == $b ){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
		case 6:					//大
                if($c == $a - 1 && $d == $b){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }elseif($c == $a  && $d == $b +1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
  		}elseif($c == $a  && $d == $b -1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a -1 && $d == $b +1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a -1 && $d == $b -1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a +1 && $d == $b +1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a +1 && $d == $b -1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a +1 && $d == $b ){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
		case 7:					//飛
                if($c == $a - 1 && $d == $b){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
		
		case 8:					//角
                if($c == $a - 1 && $d == $b){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
		
		case 9:					//ふ
                if($c == $a + 1 && $d == $b){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
		case 10:					//ﾋｼ
                if($c == $a - 1 && $d == $b){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
		case 11:					//ｶｸ
                if($c == $a - 1 && $d == $b){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
		case 12:					//ｵｳ
                if($c == $a + 1 && $d == $b){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }elseif($c == $a +1 && $d == $b -1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
  		}elseif($c == $a +1 && $d == $b +1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a  && $d == $b +1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a  && $d == $b -1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a -1 && $d == $b +1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a -1 && $d == $b -1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a -1 && $d == $b ){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
		case 13:					//ｷﾝ
                if($c == $a + 1 && $d == $b){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }elseif($c == $a  && $d == $b -1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
  		}elseif($c == $a  && $d == $b +1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a +1 && $d == $b +1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a +1 && $d == $b -1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a -1 && $d == $b ){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
		case 14:					//ｷﾞﾝ
                if($c == $a + 1 && $d == $b){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }elseif($c == $a +1 && $d == $b +1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
  		}elseif($c == $a +1 && $d == $b -1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a -1 && $d == $b +1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}elseif($c == $a -1 && $d == $b -1){
		    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
		}else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
		case 15:					//ｹｲ
                if($c == $a +2 && $d == $b +1){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }elseif($c == $a +2 && $d == $b -1){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
		case 16:					//ｷｮ
                if($c == $a - 1 && $d == $b){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;

        }
    }
    
    function limit2($koma, $a, $b, $c, $d)
    {
        global $ban, $m, $check;
        $count = 0;
        $x = $a;
        
        switch($koma){
            case 2:
                if($c < $a && $d == $b){
                    while($x >= $c){
                        if($ban[$x][$d] == 0)
                            $count++;
                        $x--;
                    }
                    if($count != $a - $c){
                        if($ban[$c][$d] < 7){
                            echo '移動できません。' . "\n";
                            $check = false;
                            break;
                        }elseif($count != $a - $c - 1){
                            echo '移動できません。' . "\n";
                            $check = false;
                            break;
                        }
                    }
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
 /*           case 16:
                if($c > $a && $d == $b){
                    while($x =< $c){
                        if($ban[$x][$d] == 0)
                            $count++;
                        $x++;
                    }
                    if($count != $c - $a){
                        if($ban[$c][$d] != 2 && $ban[$c][$d] < 10){
                            echo '移動できません。' . "\n";
                            $check = false;
                            break;
                        }elseif($count != $a - $c - 1){
                            echo '移動できません。' . "\n";
                            $check = false;
                            break;
                        }
                    }
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;*/
        }
    }
    
}
	
    $ban;
    
    $p = new Prepare();
    $p -> Show($ban);
    
    do{
        $m = new Move();
    }while($check == false);
    
    $p -> Show($ban);
?>