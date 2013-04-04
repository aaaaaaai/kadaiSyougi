<?php

class Prepare
{
    function pre()
    {
	    global $ban;
	    $ban = array(
	        array(16,15,14,13,12,13,14,15,16)
	        ,8 =>array(3,4,5,6,7,6,5,4,3)
	    );
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
    }
    
	function Show($ban)
    {
        echo '‚O‚P‚Q‚R‚S‚T‚U‚V‚W'."\n";
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
		            case 2:
                        echo ("‚Ó");
                        break;
		            case 3:
                        echo ("");
                        break;
		            case 4:
                        echo ("Œj");
                        break;
		            case 5:
                        echo ("‹â");
                        break;
		            case 6:
                        echo ("‹à");
                        break;
		            case 7:
                        echo ("‘å");
                        break;
		            case 8:
                        echo ("”ò");
                        break;
		            case 9:
                        echo ("Šp");
                        break;
		            case 10:
                        echo ("”ò");
                        break;
		            case 11:
                        echo ("Šp");
                        break;
		            case 12:
                        echo ("µ³");
                        break;
		            case 13:
                        echo ("·Ý");
                        break;
    		        case 14:
                        echo ("·Þ");
                        break;
		            case 15:
                        echo ("¹²");
                        break;
		            case 16:
                        echo ("·®");
                        break;
                }
            }
            echo ('|');
            echo ($x + 0);
            echo ("\n");
        }
        echo ('PPPPPPPPP' . "\n");
    }
}
	
class Move
{
    function move()
    {
        global $ban;
        $l = new Limit();
    
        echo 's‚Æ—ñ‚ð“ü—Í‚µ‚Ä‚­‚¾‚³‚¢B' ."\n";
        fscanf(STDIN, '%d %d', $a, $b);
        echo 's‚Æ—ñ‚ð“ü—Í‚µ‚Ä‚­‚¾‚³‚¢B' ."\n";
        fscanf(STDIN, '%d %d', $c, $d);
        
        $koma = $ban[$a][$b];
        
        $l -> limit1($koma, $a, $b, $c, $d);
    }
}

class Limit
{
    
    function limit1($koma, $a, $b, $c, $d)
    {
        global $ban, $m, $check;
        
        switch($koma){
            case 1:
                if($c == $a - 1 && $d == $b){
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
                    $check = true;
                }else{
                    echo 'ˆÚ“®‚Å‚«‚Ü‚¹‚ñB' . "\n";
                    $check = false;
                }
                break;
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