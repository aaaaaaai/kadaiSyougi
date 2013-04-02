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
        echo '�O�P�Q�R�S�T�U�V�W'."\n";
        echo '__________________'. "\n";
        for($x = 0;$x < 9;$x++){
            for($y = 0;$y < 9;$y++){
                switch($ban[$x][$y]){
                    case 0:
                        echo ('�E');
                        break;
                    case 1:
                        echo ("��");
                        break;
		            case 2:
                        echo ("��");
                        break;
		            case 3:
                        echo ("��");
                        break;
		            case 4:
                        echo ("�j");
                        break;
		            case 5:
                        echo ("��");
                        break;
		            case 6:
                        echo ("��");
                        break;
		            case 7:
                        echo ("��");
                        break;
		            case 8:
                        echo ("��");
                        break;
		            case 9:
                        echo ("�p");
                        break;
		            case 10:
                        echo ("��");
                        break;
		            case 11:
                        echo ("�p");
                        break;
		            case 12:
                        echo ("��");
                        break;
		            case 13:
                        echo ("��");
                        break;
    		        case 14:
                        echo ("��");
                        break;
		            case 15:
                        echo ("��");
                        break;
		            case 16:
                        echo ("��");
                        break;
                }
            }
            echo ('|');
            echo ($x + 0);
            echo ("\n");
        }
        echo ('�P�P�P�P�P�P�P�P�P');
    }
}
	
    $ban;
    $p = new Prepare();
    $p -> pre();
    $p -> Show($ban);
    echo '�s�Ɨ������͂��Ă��������B' ."\n";
    fscanf(STDIN, '%d %d', $a, $b);
    echo '�s�Ɨ������͂��Ă��������B' ."\n";
    fscanf(STDIN, '%d %d', $c, $d);
     
    $ban[$c][$d] = $ban[$a][$b];
    $ban[$a][$b] = 0;
    $p -> Show($ban);
  ?>
